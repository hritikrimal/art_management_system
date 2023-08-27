<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">

    <!-- Load jQuery first -->
    <script src="<?php echo base_url('assets/bootstrap/jquery/jquery-3.6.4.min.js'); ?>"></script>

    <!-- Then load Popper.js -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Your other script tags -->
    <style>
        body {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <button type="button" class="btn btn-primary" id="createartist">
                    Add Artist
                </button>
                <hr />
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile Number</th>
                            <th scope="col">Registration Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="addartistModal" tabindex="-1" aria-labelledby="addartistModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Artist</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="firstform">
                                <input type="hidden" id="modal_id" value="">

                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label"> Name</label>
                                    <input type="text" class="form-control" id="Name" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control option" name="Email" id="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputphonenumber1" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control phonenumber" name="phonenumber1" id="phonenumber1">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="addartist">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- for edit -->
        <div class="modal fade" id="editartistModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Artist</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="firstform">
                            <input type="hidden" id="emodal_id" value="">

                            <div class="mb-3">
                                <label for="exampleInputQuestion1" class="form-label"> Name</label>
                                <input type="text" class="form-control" id="a_Name" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputOption1" class="form-label">Email</label>
                                <input type="text" class="form-control option" name="a_Email" id="a_Email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputOption2" class="form-label">Phone Number</label>
                                <input type="text" class="form-control option" name="a_PhoneNumber" id="a_PhoneNumber">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        // show model
        $(document).on("click", "#createartist", function(e) {
            e.preventDefault();
            $("#addartistModal").modal("show");
        });
        //insert into database
        $(document).on("click", "#addartist", function(e) {
            var Name = $("#Name").val();
            // alert(question);
            var Email = $("#Email").val();
            var Phonenumber = $("#phonenumber1").val();

            if (Name == "") {
                alert("Name is required");
                return;
            }
            if (Email == "") {
                alert("Email is required");
                return;
            }
            if (Phonenumber == "") {
                alert("Phone number is required");
                return;
            }


            $.ajax({
                url: "<?php echo base_url() . 'Dash_artist/insertartist' ?> ",
                dataType: "json",
                type: "post",
                data: {
                    Name: Name,
                    Email: Email,
                    Phonenumber: Phonenumber

                },
                success: function(response) {
                    if (response.success) {
                        // console.log(response);
                        $("#firstform")[0].reset();
                        $("#addartistModal").modal("hide");
                        fetch();
                    } else {

                    }
                },

            });
        });
        // fetch data from database
        function fetch() {
            $.ajax({
                url: "<?php echo base_url() . 'Dash_artist/fetch' ?>",
                dataType: "json",
                type: "get",
                success: function(response) {
                    // console.log(response);
                    var tbody = "";
                    var i = "1";
                    for (var key in response) {
                        tbody += "<tr>";
                        tbody += "<td>" + i++ + "</td>";
                        tbody += "<td>" + response[key]['Name'] + "</td>";
                        tbody += "<td>" + response[key]['Email'] + "</td>";
                        tbody += "<td>" + response[key]['PhoneNumber'] + "</td>";
                        tbody += "<td>" + response[key]['CreationDate'] + "</td>";
                        tbody += `<td>
                        <div class="d-flex ">
                    	<a href="#" id="edit" class="btn btn-primary btn-sm m-1"  value="${response[key]['ID']}">Edit</a>
                    	<a href="#" id="del"  class="btn btn-danger btn-sm m-1" value="${response[key]['ID']}">Delete</a>
                        </div>
                		</td>`;
                        tbody += "<tr>";
                    }
                    $("#tbody").html(tbody);

                }

            });
        }
        fetch();

        // for deletee artist 
        $(document).on("click", "#del", function() {
            // alert("delete");
            if (!confirm("Do you want to delete")) {
                return false;
            } else {
                var del_id = $(this).attr('value');
                // alert(del_id);

                $.ajax({
                    url: "<?php echo base_url() . 'Dash_artist/del'; ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        del_id: del_id
                    },
                    success: function(response) {
                        // $("#alertmodal").modal("show");
                        // $("#alertmodal .modal-body").html(response["delete"]);
                        fetch();
                    },
                });
            }
        });
        //edit artist
        $(document).on("click", "#edit", function() {
            // alert("edit");

            var edit_id = $(this).attr('value');
            // alert(edit_id);
            $.ajax({
                url: "<?php echo base_url() . 'Dash_artist/edit'; ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    edit_id: edit_id
                },
                success: function(data) {
                    console.log(data);
                    // console.log(data[0].question);

                    $("#emodal_id").val(data[0].ID);
                    $("#a_Name").val(data[0].Name);
                    $("#a_Email").val(data[0].Email);
                    $("#a_PhoneNumber").val(data[0].PhoneNumber);
                    $('#editartistModal1').modal('show');
                },
            });
        });

        //update the artist
        $(document).on("click", "#update", function() {
            var id = $("#emodal_id").val();
            var Name = $("#a_Name").val();
            // alert(id);
            var Email = $("#a_Email").val();
            var Phonenumber = $("#a_PhoneNumber").val();
            // alert(Name);
            // alert(Email);
            // alert(Phonenumber);
            if (Name == "") {
                alert("Name is required");
                return;
            }
            if (Email == "") {
                alert("Email is required");
                return;
            }
            if (Phonenumber == "") {
                alert("Phone number is required");
                return;
            }


            // alert(upoptiom3);
            $.ajax({
                url: "<?php echo base_url() . 'Dash_artist/update_artist' ?>",
                dataType: "json",
                type: "post",
                data: {
                    id: id,
                    Name: Name,
                    Email: Email,
                    Phonenumber: Phonenumber
                },
                success: function(response) {
                    // console.log(response);
                    fetch();
                    $('#editartistModal1').modal('hide');


                },

            });
        });
    </script>
</body>

</html>