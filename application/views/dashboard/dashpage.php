<style>
    /* Your custom CSS styles here */
    .container {
        margin-top: 20px;
    }

    .info-box {
        padding: 60px;
        border-radius: 5px;
        margin-bottom: 20px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        background-color: white;
    }

    .info-box:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
    }

    .info-box .count {
        font-size: 36px;
        font-weight: bold;
    }

    .info-box .title {
        font-size: 16px;
        text-transform: uppercase;
        margin-top: 5px;
    }

    /* Override Bootstrap default background color */
    body {
        background-color: #f5f5f5;
    }
</style>
</head>

<body>
    <div class="container mt-3">
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box green-bg">
                            <?php $query = mysqli_query($con, "Select * from tblartist");
                            $artcount = mysqli_num_rows($query);
                            ?>
                            <i class="fa fa-user"></i>
                            <div class="count"><?php echo 5; ?></div>
                            <div class="title"> <a class="dropdown-item">Total Artist</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <?php $query1 = mysqli_query($con, "Select * from tblenquiry where Status='' || Status is null");
                            $uenqcount = mysqli_num_rows($query1);
                            ?>
                            <i class="fa fa-file"></i>
                            <div class="count"><?php echo 10; ?></div>
                            <div class="title"> <a class="dropdown-item">Total Order</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <?php $query1 = mysqli_query($con, "Select * from tblenquiry where Status='Answer'");
                            $aenqcount = mysqli_num_rows($query1);
                            ?>
                            <i class="fa fa-file"></i>
                            <div class="count"><?php echo 10; ?></div>
                            <div class="title"> <a class="dropdown-item">Total User</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->


                    <!--/.col-->


                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <?php $query2 = mysqli_query($con, "Select * from tblarttype");
                            $artcount = mysqli_num_rows($query2);
                            ?>
                            <i class="fa fa-file"></i>
                            <div class="count"><?php echo 10 ?></div>
                            <div class="title"> <a class="dropdown-item">Total Art Type</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <?php $query1 = mysqli_query($con, "Select * from tblartmedium");
                            $amcount = mysqli_num_rows($query1);
                            ?>
                            <i class="fa fa-file"></i>
                            <div class="count"><?php echo 10 ?></div>
                            <div class="title"> <a class="dropdown-item">Total Art Medium</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <?php $query2 = mysqli_query($con, "Select * from tblartproduct");
                            $apcount = mysqli_num_rows($query2);
                            ?>
                            <i class="fa fa-file"></i>
                            <div class="count"><?php echo 10 ?></div>
                            <div class="title"> <a class="dropdown-item">Total Art Product</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->


                </div>


            </section>

        </section>
    </div>
</body>

</html>