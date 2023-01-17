<?php
require_once 'database.php';
?>
        
        <nav class="navbar navbar-expand-lg fs-5">
            <div class="container-fluid">
              <a class="navbar-brand text-white font2" href="/">HeliCraft</a>
              <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
              </button>
              <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <div>
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link text-white" aria-current="page" href="/"><i class="bi bi-bookmark"></i> Главная</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="/rules"><i class="bi bi-book"></i> Правила</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="/allowed-mods-and-rp/"><i class="bi bi-check-square"></i> Разрешенные моды</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white-50 disabled">Новости</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white-50 disabled">Бан-лист</a>
                    </li>
                  </ul>
                </div>
                <div>
                  <?php if(isset ($_SESSION['logged_user'])){ ?>
                  <div class="dropstart">
                    <a class="dropdown-toggle nav-link text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Аккаунт <?php $_SESSION['logged_user'] ?>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/account">Аккаунт</a></li>
                      <li><a class="dropdown-item" href="#">Что-то ещё...</a></li>
                      <li><a class="dropdown-item" href="/account/logout.php">Выйти</a></li>
                    </ul>
                  </div>
                  <?php }else{ ?>
                  <div class="dropstart">
                    <a class="dropdown-toggle nav-link text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Аккаунт
                    </a>
                    <ul class="dropdown-menu">
                      <p>Вы не вошли в аккаунт.</p>
                      <li><a class="dropdown-item" href="/account">Войти</a></li>
                    </ul>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
        </nav>