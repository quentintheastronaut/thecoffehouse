<?php

$path = str_replace("\\", "/", "http://" . $_SERVER['SERVER_NAME'] . __DIR__ . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);


define('ROOT', str_replace("app/core", "public", $path));
define('ASSETS', str_replace("app/core", "public/assets", $path));
?>

<!doctype html:5>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type='text/css' href="<?= ASSETS ?>styles/main.css">

    <link rel='stylesheet' type='text/css' href="<?= ASSETS ?>bootstrap/css/bootstrap.css" />

    <title><?php echo $this->title ?></title>

    <style>
    .header {
        width: 100%;
        /* background-color: orange; */
        display: flex;
        flex-direction: row;
        justify-content: center;
        font-weight: 500;
        font-size: 16px;
        position: fixed;
    }

    .navbar {
        max-width: 1230px;
        height: 80px;
        width: 100%;
    }

    .nav-link {
        color: black;
    }

    .logo {
        width: 150px;
    }

    .main {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        min-height: 100%;
    }

    .container {
        padding-top: 80px;
        max-width: 1230px;
        width: 100%;
    }

    .login__button {
        border: none;
        border-radius: 20px;
        padding: 10px 20px !important;
        background-color: black;
        color: white;
    }

    .login__button:hover {

        text-decoration: none;
        color: white;
        background-color: #FFC30B;
    }

    .nav-link:hover {
        color: black;
        border-bottom: 2px solid black;
    }

    .navbar-toggler {

        border-color: rgba(0, 0, 0, .1);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .navbar-nav {
        align-items: center;
    }

    .navbar-collapse {
        width: 100%;
        /* background-color: orange; */
        border-radius: 0 0 10px 10px;
    }

    .footer {
        width: 100%;
        background-color: black;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }

    .footer__inner {
        max-width: 1230px;
        width: 100%;
        color: white;
    }
    </style>
</head>

<body>
    <div class=" header">
        <nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand" href="#">
                <img class="logo" alt="logo"
                    src='https://scontent.xx.fbcdn.net/v/t1.15752-9/249426569_623767225451559_1690571583270484820_n.png?_nc_cat=101&ccb=1-5&_nc_sid=aee45a&_nc_ohc=0Rtk3InAuI8AX8CEOhA&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=84412e789d90501c9610cbf3ac542c54&oe=619FF4D7'>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/collection">Tumblr collection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/stores">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Về KAFFEE STORE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Liên hệ</a>
                    </li>
                </ul>
                <?php

                use app\core\Application;

                if (app\core\Application::isGuest()) : ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="login__button nav-link" href="/login">Đăng nhập</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/register">Đăng ký</a>
                    </li>
                </ul>
                <?php else : ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/profile">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/logout">
                            Welcome <?php echo app\core\Application::$app->user->getDisplayName() ?> (Logout)
                        </a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </nav>
    </div>

    <div class="main">
        <div class="container">
            <?php if (app\core\Application::$app->session->getFlash('success')) : ?>
            <div class="alert alert-success">
                <p><?php echo app\core\Application::$app->session->getFlash('success') ?></p>
            </div>
            <?php endif; ?>
            {{content}}
        </div>
    </div>
    <div class="footer">
        <div class="footer__inner">
            <h6>Copyright @ 2021 KAFFEE STORE. All rights reversed.</h6>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>