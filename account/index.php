

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
        <div class="card ">
            <div class="card-inner"></div>
        </div>
        </div>
    </body>
    </html>
    <?php
}
?>