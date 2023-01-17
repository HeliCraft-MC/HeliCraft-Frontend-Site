

<?php

//check if session exists
if(isset ($_SESSION['username'])){
    //session exists
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="/css/styles.css">
        <title>Личный кабинет</title>
    </head>
    <body>
        
    </body>
    </html>
    <?php
}else{
    //session does not exist
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="/css/auth.css">
        <title>Вход</title>
    </head>
    <body>
        <h1 class="font2 text-center text-white">Вход</h1>
        <div class="d-flex justify-content-center mg-10">
        <div class="card card-log">
            <div class="card-inner">
                <form class="mg10-e" action="login.php" method="post">
                    <label class="form-label text-white">Никнейм:</label>
                    <input class="form-control" type="text" name="username" required/>
                    <div id="passwordHelpBlock" class="form-text text-white-50 mg5-d">
                        Никнейм, с которым вы играете на сервере
                    </div>
                    <label class="form-label text-white">Пароль:</label>
                    <input class="form-control" type="password" name="password" required/>
                    <div id="passwordHelpBlock" class="form-text text-white-50">
                        Пароль, с которым вы авторизируйтесь на сервере
                    </div>
                    <button name="sumbit" class="btn btn-primary mg5">Войти</button>
                </form>
            </div>
        </div>
        </div>
    </body>
    </html>
    <?php
}
?>