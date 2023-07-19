import mysql, { type RowDataPacket } from 'mysql2'
import bcrypt from 'bcrypt'

import { MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB, MYSQL_PORT, MYSQL_CHARSET, MYSQL_TABLE_NAME, MYSQL_COLUMN_NICKNAME, MYSQL_COLUMN_HASHED_PASSWORD } from '@/config/main'


const pool = mysql.createPool({
    host: MYSQL_HOST,
    user: MYSQL_USER,
    password: MYSQL_PASSWORD,
    database: MYSQL_DB,
    port: MYSQL_PORT,
    charset: MYSQL_CHARSET,
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
})

/**
 * Checks if the provided password matches the password associated with the given username.
 *
 * @param {string} nickname - The username to check.
 * @param {string} providedPassword - The password to compare.
 * @return {Promise<boolean>} A promise that resolves to true if the passwords match, and false otherwise.
 */
export function checkPassword(nickname: string, providedPassword: string): Promise<boolean>{
    return new Promise((resolve, reject) => {
        pool.getConnection((err, connection) => {
            if (err) {
                reject(err)
            } else {
                connection.query(`SELECT ${MYSQL_COLUMN_HASHED_PASSWORD} FROM ${MYSQL_TABLE_NAME} WHERE ${MYSQL_COLUMN_NICKNAME} = ?`, [nickname], (err: any, result: RowDataPacket[]) => {
                    connection.release()
                    if (err) {
                        reject(err)
                    } else {
                        if (bcrypt.compareSync(providedPassword, result[0].password)) {
                            resolve(true)
                        } else {
                            resolve(false)
                        }
                    }
                })
            }
        })
    })
}

