<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">

    <!-- script for js and jquery -->
    <script src="<?php echo base_url('assets/bootstrap/jquery/jquery-3.6.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- css for this page  -->
    <link rel="stylesheet" type="text/css" href="assets/css/adminlogin.css">



</head>

<body>
    <form class="login">
        <h2>Welcome!</h2>
        <p>Please log in</p>

        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Insert username">


        <input type="password" class="form-control" id="password" placeholder="password">

        <div class="text-center"><button type="submit" class="btn btn-primary px-5 mb-5 w-100" id="log">Login</button></div>


    </form>
    <script src="assets/js/loginpage.js"></script>
</body>

</html>