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
        <div class="text-center"><button class="btn px-5 mb-5 w-100" id="register">Register Here </button></div>
    </form>

    <!-- register model -->
    <!-- Modal -->
    <div class="modal fade" id="userregister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registers_user">
                        <input type="hidden" id="modal_id" value="">

                        <div class="mb-2">
                            <label for="exampleInputFirstName1" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" aria-describedby="exampleInputFirstName1">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputLastName1" class="form-label"> Last Name</label>
                            <input type="text" class="form-control" id="lastname" aria-describedby="exampleInputLastName1">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" aria-describedby="exampleInputEmail">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" aria-describedby="exampleInputAddress">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwords" aria-describedby="exampleInputPassword">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputRepassword" class="form-label">Retype Password</label>
                            <input type="password" class="form-control" id="repassword" aria-describedby="exampleInputRepassword">
                        </div>

                    </form>
                    <div class="modal-footer">

                        <button type="button" id="reghere" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- <script src="assets/js/loginpage.js"></script> -->
        <script>
            $(document).on("click", "#register", function(e) {
                e.preventDefault();
                $("#userregister").modal("show");
            });

            $(document).on("click", "#reghere", function(e) {
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var email = $("#email").val();
                var address = $("#address").val();
                var password = $("#passwords").val();
                var repassword = $("#repassword").val();

                if (firstname == "") {
                    alert("First Name is required");
                    return false;
                }
                if (lastname == "") {
                    alert("Last Name is required");
                    return false;
                }
                if (email == "") {
                    alert("Email is required");
                    return false;
                }
                if (address == "") {
                    alert("Address is required");
                    return false;
                }
                if (password == "") { // Remove the extra space here
                    alert("Password is required");
                    return false;
                }
                if (repassword == "") { // Remove the extra space here
                    alert("Confirm Password is required");
                    return false;
                }

                // Check if passwords match
                if (password !== repassword) {
                    alert("Passwords do not match");
                    return false;
                }

            });
        </script>

</body>

</html>