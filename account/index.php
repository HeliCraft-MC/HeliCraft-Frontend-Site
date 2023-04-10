<?php
require '../api/database.php';
//check if session exists
if(isset ($_SESSION['logged_user'])){
    //session exists
    $player = $_SESSION['logged_user'];

    include '../api/head.php';

    //
    // Checking for a skin is null
    //
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($handle);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    if($httpCode == 404) {
        // Skin is null, set to default
        $skinURL = 'https://skins.helicraft.ru/skins/default/skin.png';
    } else {
        // Skin is not null, set to player's skin
        $skinURL = 'https://skins.helicraft.ru/capes/'.$_SESSION['logged_user'].'.png';
    }
    curl_close($handle);
    ?>
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/minecraft-skinviewer.css">
    <body>
        <?php
        include '../api/preloader.php';
        ?>
        <?php include '../api/navbar.php'; ?>

        <div class="hidden container-fluid" id="content">
        <div class="modal fade" id="newPassModal" tabindex="-1" aria-labelledby="newPassModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            </div>
        </div>

            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-log mb-3">
                                <div class="card-inner py-5">
                                    <h2 class="text-white text-center"> Управление скином <!-- <?php echo $_SESSION['logged_user'];?> --> </h2>
                                    <div>
                                        <!-- Set Skin for the Viewer -->
                                        <style>
                                            #skin-viewer *{ background-image: url('<? echo $skinURL; ?>'); }
                                            #skin-viewer .cape{ background-image: url('https://skins.helicraft.ru/capes/<?php echo $_SESSION['logged_user']; ?>.png'); }
                                        </style>

                                        <!-- Skin Viewer HTML Elements -->
                                        <div id="skin-viewer" class="mc-skin-viewer-11x legacy spin classForChangeBack">
                                            <div class="player">
                                                <!-- Head -->
                                                <div class="head" >
                                                    <div class="top"></div>
                                                    <div class="left"></div>
                                                    <div class="front"></div>
                                                    <div class="right"></div>
                                                    <div class="back"></div>
                                                    <div class="bottom"></div>
                                                    <div class="accessory">
                                                        <div class="top"></div>
                                                        <div class="left"></div>
                                                        <div class="front"></div>
                                                        <div class="right"></div>
                                                        <div class="back"></div>
                                                        <div class="bottom"></div>
                                                    </div>
                                                </div>
                                                <!-- Body -->
                                                <div class="body">
                                                    <div class="top"></div>
                                                    <div class="left"></div>
                                                    <div class="front"></div>
                                                    <div class="right"></div>
                                                    <div class="back"></div>
                                                    <div class="bottom"></div>
                                                    <div class="accessory">
                                                        <div class="top"></div>
                                                        <div class="left"></div>
                                                        <div class="front"></div>
                                                        <div class="right"></div>
                                                        <div class="back"></div>
                                                        <div class="bottom"></div>
                                                    </div>
                                                </div>
                                                <!-- Left Arm -->
                                                <div class="left-arm">
                                                    <div class="top"></div>
                                                    <div class="left"></div>
                                                    <div class="front"></div>
                                                    <div class="right"></div>
                                                    <div class="back"></div>
                                                    <div class="bottom"></div>
                                                    <div class="accessory">
                                                        <div class="top"></div>
                                                        <div class="left"></div>
                                                        <div class="front"></div>
                                                        <div class="right"></div>
                                                        <div class="back"></div>
                                                        <div class="bottom"></div>
                                                    </div>
                                                </div>
                                                <!-- Right Arm -->
                                                <div class="right-arm">
                                                    <div class="top"></div>
                                                    <div class="left"></div>
                                                    <div class="front"></div>
                                                    <div class="right"></div>
                                                    <div class="back"></div>
                                                    <div class="bottom"></div>
                                                    <div class="accessory">
                                                        <div class="top"></div>
                                                        <div class="left"></div>
                                                        <div class="front"></div>
                                                        <div class="right"></div>
                                                        <div class="back"></div>
                                                        <div class="bottom"></div>
                                                    </div>
                                                </div>
                                                <!-- Left Leg -->
                                                <div class="left-leg">
                                                    <div class="top"></div>
                                                    <div class="left"></div>
                                                    <div class="front"></div>
                                                    <div class="right"></div>
                                                    <div class="back"></div>
                                                    <div class="bottom"></div>
                                                    <div class="accessory">
                                                        <div class="top"></div>
                                                        <div class="left"></div>
                                                        <div class="front"></div>
                                                        <div class="right"></div>
                                                        <div class="back"></div>
                                                        <div class="bottom"></div>
                                                    </div>
                                                </div>
                                                <!-- Right Leg -->
                                                <div class="right-leg">
                                                    <div class="top"></div>
                                                    <div class="left"></div>
                                                    <div class="front"></div>
                                                    <div class="right"></div>
                                                    <div class="back"></div>
                                                    <div class="bottom"></div>
                                                    <div class="accessory">
                                                        <div class="top"></div>
                                                        <div class="left"></div>
                                                        <div class="front"></div>
                                                        <div class="right"></div>
                                                        <div class="back"></div>
                                                        <div class="bottom"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 px-5">
                                        <form class="d-flex gap-2" enctype="multipart/form-data" action="<?php include '../api/domain.php'; ?>/api/uploadSkin.php" method="post">
                                            <input type="file" class="form-control form-control-sm" name="file">
                                            <button type="submit" name="" id="" class="btn btn-primary">Загрузить скин</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="card card-log">
                        <div class="card-inner py-5">
                            <h2 class="text-white text-center"> Секция в разработке <!-- для <?php echo $_SESSION['logged_user'];?> --> ...</h2>
                            <p class="text-white text-center">Скоро здесь что-нибудь будет...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
    <script>
        var imageUrl = '<? echo $skinURL; ?>';
        var timestamp = new Date().getTime();
        imageUrl = imageUrl.split('?')[0] + '?t=' + timestamp;
        var elements = document.querySelectorAll('.top, .left, .front, .right, .back, .bottom');
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.backgroundImage = 'url(' + imageUrl + ')';
        }
    </script>
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
                    <button name="submit" class="btn btn-primary mg5">Войти</button>
                </form>
            </div>
        </div>
        </div>
    </body>
    </html>
    <?php
}
?>
