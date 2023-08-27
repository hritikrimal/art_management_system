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
                <button type="button" class="btn btn-primary" id="create_arttype">
                    Add Art Type
                </button>
                <hr />
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Art Type</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="addarttypeModal" tabindex="-1" aria-labelledby="addarttypeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Art Type</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="firstform">
                                <input type="hidden" id="modal_id" value="">

                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label"> Art Type</label>
                                    <input type="text" class="form-control" id="arttype" aria-describedby="emailHelp">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="addarttype">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- for edit -->
        <div class="modal fade" id="editarttypeModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Art Type</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="firstform">
                            <input type="hidden" id="arttype_id" value="">

                            <div class="mb-3">
                                <label for="exampleInputQuestion1" class="form-label"> Art Type</label>
                                <input type="text" class="form-control" id="a_arttype" aria-describedby="emailHelp">
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
        $(document).on("click", "#create_arttype", function(e) {
            e.preventDefault();
            $("#addarttypeModal").modal("show");
        });
        //insert into database
        $(document).on("click", "#addarttype", function(e) {
            var ArtType = $("#arttype").val();
            // alert(question);


            if (ArtType == "") {
                alert("Art Type is required");
                return;
            }
            $.ajax({
                url: "<?php echo base_url() . 'Dash_arttype/insert_arttype' ?> ",
                dataType: "json",
                type: "post",
                data: {
                    ArtType: ArtType
                },
                success: function(response) {
                    if (response.success) {
                        // console.log(response);
                        $("#firstform")[0].reset();
                        $("#addarttypeModal").modal("hide");
                        fetch();
                    } else {

                    }
                },

            });
        });
        // fetch data from database
        function fetch() {
            $.ajax({
                url: "<?php echo base_url() . 'Dash_arttype/fetch' ?>",
                dataType: "json",
                type: "get",
                success: function(response) {
                    // console.log(response);
                    var tbody = "";
                    var i = "1";
                    for (var key in response) {
                        tbody += "<tr>";
                        tbody += "<td>" + i++ + "</td>";
                        tbody += "<td>" + response[key]['ArtType'] + "</td>";
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
                    url: "<?php echo base_url() . 'Dash_arttype/del'; ?>",
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
                url: "<?php echo base_url() . 'Dash_arttype/edit'; ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    edit_id: edit_id
                },
                success: function(data) {
                    console.log(data);
                    // console.log(data[0].question);

                    $("#arttype_id").val(data[0].ID);
                    $("#a_arttype").val(data[0].ArtType);
                    $('#editarttypeModal1').modal('show');
                },
            });
        });
        //update the artist
        $(document).on("click", "#update", function() {
            var id = $("#arttype_id").val();
            var ArtType = $("#a_arttype").val();
            // alert(id);

            if (ArtType == "") {
                alert("Art Type is required");
                return;
            }
            // alert(upoptiom3);
            $.ajax({
                url: "<?php echo base_url() . 'Dash_arttype/update_art_type' ?>",
                dataType: "json",
                type: "post",
                data: {
                    id: id,
                    ArtType: ArtType,
                },
                success: function(response) {
                    // console.log(response);
                    fetch();
                    $('#editarttypeModal1').modal('hide');


                },

            });
        });
    </script>
</body>

</html>