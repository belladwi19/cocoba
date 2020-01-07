<?php
session_start();
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DONTEERS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">

        <div class="container">
            <a class="navbar-brand mr-4" href="index.php"><img id="brand-logo" src="assets/img/DONTEERS.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active mr-2">
                        <a class="nav-link" id="menu-btn" href="search-activity.php">Cari Aktivitas</a>
                    </li>
                    <li class="nav-item active mr-2">
                        <a class="nav-link" id="menu-btn" href="#">Menu</a>
                    </li>
                    <li class="nav-item active mr-2">
                        <a class="nav-link" id="menu-btn" href="#">Menu</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle " id="menu-btn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tentang Kami
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="about.php">Tentang Donteers</a>
                        </div>
                    </li>

                </ul>
                <ul class="navbar-nav ">
                    <?php if (isset($_SESSION['email'])) { ?>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle " id="menu-btn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hy, <?= $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">Profile</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a class="nav-link btn-auth" id="menu-btn" href="#" data-toggle="modal" data-target="#modallogin">Login</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" id="regis-btn" href="#">Register</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>