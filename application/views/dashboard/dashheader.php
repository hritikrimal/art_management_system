<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">

    <!-- Load jQuery first -->
    <script src="<?php echo base_url('assets/bootstrap/jquery/jquery-3.6.4.min.js'); ?>"></script>

    <!-- Then load Popper.js -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Your other script tags -->


    <link rel="stylesheet" type="text/css" href="assets/css/welcomepage.css">


</head>

<body>


    <div class="container mt-2">

        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 logo-head">
                            <a class="navbar-brand" href="<?php echo base_url('Dashboard') ?>">
                                <img src="assets/image/logo.png" height="45 alt=" art">
                            </a>

                        </div>
                    </div>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo base_url('Dash_user') ?>"><b>User</b></a>
                        <!-- <a class="nav-link" href="#" data-toggle="modal" data-target="#userModal"><b>User</b></a> -->

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo base_url('Dash_artist') ?>"><b>Artist</b></a>

                        <!-- <div class="dropdown-menu" aria-labelledby="artistDropdown">
                            <a class="dropdown-item" href="#">Add Artist</a>
                            <a class="dropdown-item" href="#">Manage Artist</a>
                        </div> -->
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link" href="<?php echo base_url('Dash_arttype') ?>"><b>Art Type</b></a>

                        <!-- <div class="dropdown-menu" aria-labelledby="artTypeDropdown">
                            <a class="dropdown-item" href="#">Add Type</a>
                            <a class="dropdown-item" href="#">Manage Type</a>
                        </div> -->
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link" href="<?php echo base_url('Dash_medium') ?>"><b>Medium of Art</b></a>

                        <!-- <div class="dropdown-menu" aria-labelledby="mediumDropdown">
                            <a class="dropdown-item" href="#">Add Medium</a>
                            <a class="dropdown-item" href="#">Manage Medium</a>
                        </div> -->
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link" href="<?php echo base_url('Dash_artproduct') ?>"><b>Art Products</b></a>

                        <!-- <div class="dropdown-menu" aria-labelledby="productsDropdown">
                            <a class="dropdown-item" href="#">Add Product</a>
                            <a class="dropdown-item" href="#">Manage Product</a>
                        </div> -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo base_url('Dash_artorder') ?>"><b>Order</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Dashboard/log') ?>"><b>Log Out</b></a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
    <hr class="my-1">

</body>

</html>