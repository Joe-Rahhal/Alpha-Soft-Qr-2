<?php

include "connection.php";
if (isset($_SESSION["isAdmin"])) {
    $isAdmin = $_SESSION["isAdmin"];
} else {
    $isAdmin = false;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<style>
    html,
    body {
        width: 100%;
        margin: 0px;
        padding: 0px;
        min-height: 100vh;
    }

    header {
        min-height: 50px;
        background: lightcyan;
    }

    footer {
        background: PapayaWhip;
    }


    /* Trick: */
    body {
        position: relative;
    }

    body::after {
        content: '';
        display: block;
        height: 50px;
        /* Set same as footer's height */
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
    }
</style>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <img src="bgs/Logo.jpeg" style="width: 100px; height: 70px" />
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <div class="row">
                            <div class="col-3">
                                <a class="nav-link" aria-current="page" href="index">Home</a>
                            </div>
                            <div class="col-3">
                                <a class="nav-link" href="login">Login</a>
                            </div>
                            <div class="col-3">
                                <a class="nav-link" href="#">About Us</a>
                            </div>
                            <div class="col-3">
                                <?php
                                if ($isAdmin === true) {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="dashboard">Dashboard</a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>