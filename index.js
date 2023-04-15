//configs
const serverConfig = require('config/server.json');
const databaseConfig = require('config/database.json');

const port = serverConfig.PORT;
const secretKey = serverConfig.SECRET_KEY;

const minecraftServerHost = serverConfig.MINECRAFT_SERVER_HOST;
const minecraftServerPort = serverConfig.MINECRAFT_SERVER_PORT;

const host = databaseConfig.HOST;
const user = databaseConfig.USER;
const password = databaseConfig.PASSWORD;
const database = databaseConfig.DATABASE;
const table = databaseConfig.TABLE;
const usernameColumn = databaseConfig.USERNAME_COLUMN;
const passwordColumn = databaseConfig.PASSWORD_COLUMN;

///////////////////////////////
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');

/////////////////////////////////
const net = require('net');

//Express
const express = require('express');
const app = express();

app.listen(port, function () {
    console.log(`http://localhost:${port}`);
})

app.use(express.static(`public`));
app.use(express.urlencoded({ extended: true }))

//hbs
const hbs = require('hbs');
app.set('views', 'views');
app.set('view engine', 'hbs');

const mysql = require('mysql');

const connection = mysql.createConnection({
  host,
  user,
  password,
  database
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to database: ', err.stack);
    return;
  }

  console.log('Connected to database as id ', connection.threadId);
});

//functions

function pingMinecraftServer(host, port) {
  return new Promise((resolve, reject) => {
    const client = net.connect({ host, port }, () => {
      // Send handshake packet
      const handshakePacket = Buffer.from([0x00, 0x00, 0x00, 0x00, 0x00, 0x01, 0x00, 0x00, 0x00, 0x01, 0x00, host.length, ...Buffer.from(host), port >> 8, port & 0xff, 0x01]);
      const buffer = Buffer.from([0x01, 0x00]);
      client.write(Buffer.concat([handshakePacket, buffer]));

      // Listen for response
      client.once('data', (data) => {
        if (data[0] !== 0x00) {
          reject(new Error('Received unexpected packet type'));
        }

        const responsePacket = data.slice(1);
        const response = responsePacket.toString();
        const match = response.match(/§aPlayers: §r(.*?)\/(.*?)\n/);
        if (!match) {
          reject(new Error('Could not parse response'));
        }

        const onlinePlayers = parseInt(match[1], 10);
        resolve(onlinePlayers);
      });
    });

    client.on('error', (err) => {
      reject(err);
    });
  });
}



function authenticate(req, res, next) {
    const token = req.headers.authorization?.split(' ')[1];
  
    if (!token) {
      next();
    }
  
    jwt.verify(token, secretKey, (error, decoded) => {
      if (error) {
        console.error(error);
        res.status(401).json({ error: 'Unauthorized' });
        return;
      }
  
      req.user = decoded;
      next();
    });
  }



//routes

app.post('/login', (req, res) => {
    const { nickname, password } = req.body;
  
    // Check if user exists
    const query = `SELECT * FROM ${table} WHERE ${usernameColumn} = '${nickname}'`;
    connection.query(query, (error, results) => {
      if (error) {
        console.error(error);
        res.status(500).json({ error: 'Internal server error' });
        return;
      }
  
      if (results.length === 0) {
        res.status(401).json({ error: 'Invalid credentials' });
        return;
      }
  
      // Check if password is correct
      bcrypt.compare(password, results[0] [passwordColumn], (error, isMatch) => {
        if (error) {
          console.error(error);
          res.status(500).json({ error: 'Internal server error' });
          return;
        }
  
        if (!isMatch) {
          res.status(401).json({ error: 'Invalid credentials' });
          return;
        }
  
        // Generate JWT token
        const token = jwt.sign(
          { nickname: results[0].nickname },
          secretKey,
          { expiresIn: '1d' }
        );
  
        res.json({ token });
      });
    });
  });

  router.get('/', authenticate, (req, res) => {
    let online = -1;
    pingMinecraftServer(minecraftServerHost, minecraftServerPort).then((onlinePlayers) => {
    online = Number(onlinePlayers);
  }).catch((err) => {
    console.error(`Failed to ping Minecraft server: ${err.message}`);
  });
    if (req.user) {
      // The user is authenticated, continue with authenticated logic
      res.render(`index`, { user: req.user, online });
    } else {
      // The user is unauthenticated, continue with unauthenticated logic
      res.render(`index`, { online });
    }
  });
  

