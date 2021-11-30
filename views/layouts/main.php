<?php

$path = str_replace("\\", "/", "http://" . $_SERVER['SERVER_NAME'] . __DIR__ . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

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

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/product_detail.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/about.css">
    <link rel="stylesheet" href="/css/stores.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/order.css">

    <title>Kaffee store</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="/js/product_detail.js"></script>
    <script src="/js/addcart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>
    <div class=" header">

        <nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand" href="/">
                <img class="logo" alt="logo" src='/images/logo/logo-4.png'>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu">Thực đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/collection">Bộ sưu tập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/stores">Store</a>
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

                if (Application::isGuest() == 1) : ?>
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
                            <div class="header-image header-image-user">
                                <img class="header-image-icon" src="/images/user.png" />
                            </div>
                            Chào <?php echo Application::$app->user->getDisplayName() ?>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/cart">
                            <div class="header-image">
                                <img class="header-image-icon" src="/images/cart.png" />
                            </div>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/orders">
                            <div class="header-image">
                                <img class="header-image-icon" src="/images/orders.png" />
                            </div>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/logout">
                            <div class="header-image">
                                <img class="header-image-icon" src="/images/logout.png" />
                            </div>
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
    <div class="footer info">
        <div class="footer-container">
            <div class="footer-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-lg-4">
                            <div class="footer-info-logo">
                                <img class="footer-logo" src="/images/logo/logo-3.png" />
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-8">
                            <div class="footer-info-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-4">
                                            <h6>Thông tin website</h6>
                                            <ul>
                                                <li><a href="#">Trang chủ</a></li>
                                                <li><a href="#">Thực đơn</a></li>
                                                <li><a href="#">Cửa hàng</a></li>
                                                <li><a href="#">Về chúng tôi</a></li>
                                                <li><a href="#">Liên hệ</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-5 col-lg-4">
                                            <h6>Điều khoản sử dụng</h6>
                                            <ul>
                                                <li><a href="#">Quy chế website</a></li>
                                                <li><a href="#">Bảo mật thông tin</a></li>

                                            </ul>
                                        </div>
                                        <div class="col-md-12 col-lg-4">
                                            <h6>Liên hệ</h6>
                                            <ul>
                                                <li>Head Office 1: 86 - 88 Cao Thang, Ward 4, District 3, Ho Chi Minh,
                                                    Vietnam. Head Office 2: Floor 3 & 4 The Hub Building - 195/10E Dien
                                                    Bien
                                                    Phu, Ward 15, Binh Thanh District, Ho Chi Minh, Vietnam.</li>
                                                <li>
                                                    Head Office 2: Floor 3 & 4 The Hub Building - 195/10E Dien Bien Phu,
                                                    Ward 15, Binh Thanh District, Ho Chi Minh, Vietnam.
                                                </li>
                                                <li>
                                                    (+84)778 812 3456
                                                </li>
                                                <li>
                                                    <a href="https://kaffeestore.herokuapp.com">
                                                        https://kaffeestore.herokuapp.com
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <div class="footer__inner">
            <h6>Copyright @ 2021 KAFFEE STORE. All rights reversed.</h6>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>