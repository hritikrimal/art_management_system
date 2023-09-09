<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Load jQuery first -->
    <script src="<?php echo base_url('assets/bootstrap/jquery/jquery-3.6.4.min.js'); ?>"></script>

    <!-- Then load Popper.js -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Your other script tags -->


    <!-- <style>
        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .modal-title {
            font-size: 24px;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            background-color: #f8f9fa;
            border-top: none;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .form-label {
            font-weight: bold;
        }

        /* Additional styling for form elements if needed */
        .form-control {
            border-radius: 5px;
        }

        .form-select {
            border-radius: 5px;
        }

        textarea.form-control {
            resize: vertical;
            /* Allow vertical resizing of textarea */
        }
    </style> -->

    <style>
        body {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <button type="button" class="btn btn-primary" id="create_product">
                        Add Art
                    </button>
                    <hr />
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Size</th>
                                <th scope="col">Price</th>
                                <th scope="col">Art Produce</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="modal fade" id="artModal" tabindex="-1" aria-labelledby="artModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Art Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form" class="row g-3">
                                    <input type="hidden" id="artmodal_id" value="">

                                    <div class="col-md-4">
                                        <label for="artTitle" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="artTitle">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="artImage" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="artImage">
                                    </div>
                                    <!-- TODO: -->

                                    <div class="col-md-4">
                                        <label for="artClassification" class="form-label">Classification</label>
                                        <select class="form-select" id="artClassification">
                                            <option selected disabled>Choose Classification of Art</option>
                                            <option value="landscape">Landscape</option>
                                            <option value="seascape">Seascape</option>
                                            <option value="portrait">Portrait</option>
                                            <option value="figure">Figure</option>
                                            <option value="still life">Still Life</option>
                                            <option value="nude">Nude</option>
                                            <option value="animal">Animal</option>
                                            <option value="abstract">Abstract</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="artSize" class="form-label">Size</label>
                                        <select class="form-select" id="artSize">
                                            <option selected disabled>Choose Size of Art</option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="artArtist" class="form-label">Artist</label>
                                        <select class="form-select" id="artArtist" name="artist_id">
                                            <option selected disabled>Choose Artist</option>
                                        </select>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            var dropdown = $("#artArtist");

                                            // Fetch artist names and IDs from the controller method
                                            $.get("<?php echo base_url('Dash_artproduct/getArtistNames'); ?>", function(data) {
                                                var artists = JSON.parse(data);

                                                // Add a hidden, disabled placeholder option
                                                dropdown.append($("<option>").attr("disabled", true).attr("hidden", true));

                                                // Populate dropdown with fetched artist names and their IDs as values
                                                $.each(artists, function(index, artist) {
                                                    dropdown.append($("<option>").attr("value", artist.ID).text(artist.Name));
                                                });
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label for="arttype" class="form-label">Art Type</label>
                                        <select class="form-select" id="arttype" name="art_type">
                                            <option selected disabled>Choose Art Type</option>
                                        </select>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            // Fetch art types from the controller method
                                            $.get("<?php echo base_url('Dash_artproduct/getArtTypes'); ?>", function(data) {
                                                var artTypes = JSON.parse(data);

                                                var dropdown = $("#arttype");
                                                // dropdown.empty();

                                                // Add a hidden, disabled placeholder option
                                                dropdown.append($("<option>").attr("disabled", true).attr("hidden", true).text("Choose Art Type"));

                                                // Populate dropdown with fetched art types
                                                $.each(artTypes, function(index, artType) {
                                                    dropdown.append($("<option>").attr("value", artType.ID).text(artType.ArtType));
                                                });
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label for="artmedium" class="form-label">Art Medium</label>
                                        <select class="form-select" id="artmedium" name="art_medium">
                                            <option selected disabled>Choose Art Medium</option>
                                        </select>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            // Fetch art mediums from the controller method
                                            $.get("<?php echo base_url('Dash_artproduct/getArtMediums'); ?>", function(data) {
                                                var artMediums = JSON.parse(data);

                                                var dropdown = $("#artmedium");
                                                // dropdown.empty();

                                                // Add a hidden, disabled placeholder option
                                                dropdown.append($("<option>").attr("disabled", true).attr("hidden", true).text("Choose Art Medium"));

                                                // Populate dropdown with fetched art mediums
                                                $.each(artMediums, function(index, artMedium) {
                                                    dropdown.append($("<option>").attr("value", artMedium.ID).text(artMedium.ArtMedium));
                                                });
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label for="artDimension" class="form-label">Dimension</label>
                                        <input type="text" class="form-control" id="artDimension" name="dimension">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="artPrice" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="artPrice" name="price">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="artProduce" class="form-label">Art Produce Date</label>
                                        <input type="date" class="form-control" id="artProduce" name="art_produce_date">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="startDate" name="start_date">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="startTime" class="form-label">Start Time</label>
                                        <input type="time" class="form-control" id="startTime" name="start_time">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="endDate" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="endDate" name="end_date">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="endTime" class="form-label">End Time</label>
                                        <input type="time" class="form-control" id="endTime" name="end_time">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="artDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="artDescription" name="description" rows="4"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="addArtProduct">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- edit model -->
                <div class="modal fade" id="editartproductModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="forms" class="row g-3">
                                    <input type="hidden" id="e_artmodal_id" value="">

                                    <div class="col-md-4">
                                        <label for="artTitle" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="e_artTitle">
                                    </div>

                                    <!-- <div class="col-md-4">
                                        
                                        <label for="artImage" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="e_artImage">
                                    </div> -->
                                    <div class="col-md-4">
                                        <label for="artImage" class="form-label">Image</label>
                                        <input type="hidden" class="form-control" id="e_artImageText" readonly>
                                        <input type="file" name="e_artImage" class="form-control" id="e_artImage">
                                    </div>
                                    <!-- TODO: -->

                                    <div class="col-md-4">
                                        <label for="artClassification" class="form-label">Classification</label>
                                        <select class="form-select" id="e_artClassification">
                                            <option selected disabled value="">Choose Classification of Art</option>
                                            <option value="landscape">Landscape</option>
                                            <option value="seascape">Seascape</option>
                                            <option value="portrait">Portrait</option>
                                            <option value="figure">Figure</option>
                                            <option value="still life">Still Life</option>
                                            <option value="nude">Nude</option>
                                            <option value="animal">Animal</option>
                                            <option value="abstract">Abstract</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="artSize" class="form-label">Size</label>
                                        <select class="form-select" id="e_artSize">
                                            <option selected disabled>Choose Size of Art</option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="artArtist" class="form-label">Artist</label>
                                        <select class="form-select" id="e_artArtist" name="e_artist_id">
                                            <option selected disabled>Choose Artist</option>
                                        </select>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            var dropdown = $("#e_artArtist");

                                            // Fetch artist names and IDs from the controller method
                                            $.get("<?php echo base_url('Dash_artproduct/getArtistNames'); ?>", function(data) {
                                                var artists = JSON.parse(data);

                                                // Add a hidden, disabled placeholder option
                                                dropdown.append($("<option>").attr("disabled", true).attr("hidden", true).text("Choose Art Type"));

                                                // Populate dropdown with fetched artist names and their IDs as values
                                                $.each(artists, function(index, artist) {
                                                    dropdown.append($("<option>").attr("value", artist.ID).text(artist.Name));
                                                });
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label for="arttype" class="form-label">Art Type</label>
                                        <select class="form-select" id="e_arttype" name="e_art_type">
                                            <option selected disabled>Choose Art Type</option>
                                        </select>
                                    </div>

                                    <script>
                                        $(document).ready(function() {

                                            // Fetch art types from the controller method
                                            $.get("<?php echo base_url('Dash_artproduct/getArtTypes'); ?>", function(data) {
                                                var artTypes = JSON.parse(data);

                                                var dropdown = $("#e_arttype");
                                                // dropdown.empty();

                                                // Add a hidden, disabled placeholder option
                                                dropdown.append($("<option>").attr("disabled", true).attr("hidden", true).text("Choose Art Type"));

                                                // Populate dropdown with fetched art types
                                                $.each(artTypes, function(index, artType) {
                                                    dropdown.append($("<option>").attr("value", artType.ID).text(artType.ArtType));
                                                });
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label for="artmedium" class="form-label">Art Medium</label>
                                        <select class="form-select" id="e_artmedium" name="e_art_medium">
                                            <option selected disabled>Choose Art Medium</option>
                                        </select>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            // Fetch art mediums from the controller method
                                            $.get("<?php echo base_url('Dash_artproduct/getArtMediums'); ?>", function(data) {
                                                var artMediums = JSON.parse(data);

                                                var dropdown = $("#e_artmedium");
                                                // dropdown.empty();

                                                // Add a hidden, disabled placeholder option
                                                dropdown.append($("<option>").attr("disabled", true).attr("hidden", true).text("Choose Art Medium"));

                                                // Populate dropdown with fetched art mediums
                                                $.each(artMediums, function(index, artMedium) {
                                                    dropdown.append($("<option>").attr("value", artMedium.ID).text(artMedium.ArtMedium));
                                                });
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label for="artDimension" class="form-label">Dimension</label>
                                        <input type="text" class="form-control" id="e_artDimension" name="e_dimension">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="artPrice" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="e_artPrice" name="e_price">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="artProduce" class="form-label">Art Produce Date</label>
                                        <input type="date" class="form-control" id="e_artProduce" name="e_art_produce_date">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="e_startDate" name="e_start_date">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="startTime" class="form-label">Start Time</label>
                                        <input type="time" class="form-control" id="e_startTime" name="e_start_time">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="endDate" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="e_endDate" name="e_end_date">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="endTime" class="form-label">End Time</label>
                                        <input type="time" class="form-control" id="e_endTime" name="e_end_time">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="artDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="e_artDescription" name="e_description" rows="4"></textarea>
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
        </div>
    </body>
    <script>
        // show model
        $(document).on("click", "#create_product", function(e) {
            e.preventDefault();
            $("#artModal").modal("show");
        });

        //insert into database

        $(document).ready(function() {
            $("#addArtProduct").click(function() {
                // Get form data

                var title = $("#artTitle").val();
                var image = $("#artImage")[0].files[0];
                var Classification = $("#artClassification").val();
                var Size = $("#artSize").val();
                var Artist = $("#artArtist").val();
                var ArtType = $("#arttype").val();
                var ArtMedium = $("#artmedium").val();
                var Dimension = $("#artDimension").val();
                var Price = $("#artPrice").val();
                var ProduceDate = $("#artProduce").val();
                var StartDate = $("#startDate").val();
                var StartTime = $("#startTime").val();
                var EndDate = $("#endDate").val();
                var EndTime = $("#endTime").val();
                var Description = $("#artDescription").val();

                if (title == "") {
                    alert("Title is required");
                    return;
                }
                if (image == undefined) {
                    alert("Image is required");
                    return;
                }
                if (Classification == "") {
                    alert("Classification is required");
                    return;
                }
                if (Size == "") {
                    alert("Size is required");
                    return;
                }
                if (Artist == "") {
                    alert("Artist is required");
                    return;
                }
                if (ArtMedium == "") {
                    alert("ArtMedium is required");
                    return;
                }
                if (ArtType == "") {
                    alert("ArtType is required");
                    return;
                }
                if (Dimension == "") {
                    alert("Dimension is required");
                    return;
                }
                if (Price == "") {
                    alert("Price is required");
                    return;
                }
                if (ProduceDate == "") {
                    alert("ProduceDate is required");
                    return;
                }
                if (StartDate == "") {
                    alert("StartDate is required");
                    return;
                }
                if (StartTime == "") {
                    alert("StartTime is required");
                    return;
                }
                if (EndDate == "") {
                    alert("EndDate is required");
                    return;
                }
                if (EndTime == "") {
                    alert("EndTime is required");
                    return;
                }
                if (Description == "") {
                    alert("Description is required");
                    return;
                }
                // Create FormData object to send file
                var formData = new FormData();
                formData.append('title', title);
                formData.append('image', image);
                formData.append('Classification', Classification);
                formData.append('Size', Size);
                formData.append('Artist', Artist);
                formData.append('ArtType', ArtType);
                formData.append('ArtMedium', ArtMedium);
                formData.append('Dimension', Dimension);
                formData.append('Price', Price);
                formData.append('ProduceDate', ProduceDate);
                formData.append('StartDate', StartDate);
                formData.append('StartTime', StartTime);
                formData.append('EndDate', EndDate);
                formData.append('EndTime', EndTime);
                formData.append('Description', Description);

                // AJAX request
                $.ajax({
                    url: 'Dash_artproduct/store_art',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $("#artModal").modal("hide");
                        $("#form")[0].reset();
                        fetch();


                        // Handle success response
                        // console.log(response);

                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log(error);

                    }
                });
            });
            // fetch data from database
            function fetch() {
                $.ajax({
                    url: "<?php echo base_url() . 'Dash_artproduct/fetch' ?>",
                    dataType: "json",
                    type: "get",
                    success: function(response) {
                        var tbody = "";
                        var i = "1";
                        var currentDateTime = new Date(); // Get current date and time

                        for (var key in response) {
                            var endDate = new Date(response[key]['EndDate'] + ' ' + response[key]['EndTime']);

                            tbody += "<tr>";
                            tbody += "<td>" + i++ + "</td>";
                            tbody += "<td><img src='" + response[key]['Image'] + "' height='100px' width='100px'></td>";
                            tbody += "<td>" + response[key]['Title'] + "</td>";
                            tbody += "<td>" + response[key]['Size'] + "</td>";
                            tbody += "<td>" + response[key]['Price'] + "</td>";
                            tbody += "<td>" + response[key]['ArtProduce'] + "</td>";

                            // Compare endDate with current date and time
                            if (endDate > currentDateTime) {
                                tbody += "<td>Active</td>";
                            } else {
                                tbody += "<td>Expired</td>";
                            }

                            tbody += `<td>
                    <div class="d-flex">
                        <a href="#" id="edit" class="btn btn-primary btn-sm m-1" value="${response[key]['ID']}">Edit</a>
                        <a href="#" id="del" class="btn btn-danger btn-sm m-1" value="${response[key]['ID']}">Delete</a>
                    </div>
                </td>`;
                            tbody += "</tr>";
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
                        url: "<?php echo base_url() . 'Dash_artproduct/del'; ?>",
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
                    url: "<?php echo base_url() . 'Dash_artproduct/edit'; ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        edit_id: edit_id
                    },
                    success: function(data) {
                        // console.log(data);
                        var imagePath = (data[0].Image);
                        // var trimmedImagePath = imagePath.replace("uploads/", "");
                        // console.log(trimmedImagePath);

                        $("#e_artmodal_id").val(data[0].ID);
                        $("#e_artTitle").val(data[0].Title);
                        // $("#e_artImage").val(data[0].Image);
                        $("#e_artImageText").val(imagePath);

                        $("#e_artClassification").val(data[0].Classification);
                        $("#e_artSize").val(data[0].Size);
                        $("#e_artArtist").val(data[0].Artist_id);
                        $("#e_arttype").val(data[0].ArtType_id);
                        $("#e_artmedium").val(data[0].ArtMedium_id);
                        $("#e_artDimension").val(data[0].Dimension);
                        $("#e_artPrice").val(data[0].Price);
                        $("#e_artProduce").val(data[0].ArtProduce);
                        $("#e_startDate").val(data[0].StartDate);
                        $("#e_startTime").val(data[0].StartTime);
                        $("#e_endDate").val(data[0].EndDate);
                        $("#e_endTime").val(data[0].EndTime);
                        $("#e_artDescription").val(data[0].Description);
                        $('#editartproductModal1').modal('show');
                    },
                });
            });
            $(document).on("click", "#update", function() {

                var id = $("#e_artmodal_id").val();
                var title = $("#e_artTitle").val();
                var new_image = $("#e_artImage")[0].files[0];
                var old_image = $("#e_artImageText").val();
                // alert(new_image);
                // alert(old_image);
                var Classification = $("#e_artClassification").val();
                var Size = $("#e_artSize").val();
                var Artist = $("#e_artArtist").val();
                var ArtType = $("#e_arttype").val();
                var ArtMedium = $("#e_artmedium").val();
                var Dimension = $("#e_artDimension").val();
                var Price = $("#e_artPrice").val();
                var ProduceDate = $("#e_artProduce").val();
                var StartDate = $("#e_startDate").val();
                var StartTime = $("#e_startTime").val();
                var EndDate = $("#e_endDate").val();
                var EndTime = $("#e_endTime").val();
                var Description = $("#e_artDescription").val();

                var formData = new FormData();
                formData.append('id', id);
                formData.append('title', title);
                formData.append('new_image', new_image);
                formData.append('old_image', old_image);
                formData.append('Classification', Classification);
                formData.append('Size', Size);
                formData.append('Artist', Artist);
                formData.append('ArtType', ArtType);
                formData.append('ArtMedium', ArtMedium);
                formData.append('Dimension', Dimension);
                formData.append('Price', Price);
                formData.append('ProduceDate', ProduceDate);
                formData.append('StartDate', StartDate);
                formData.append('StartTime', StartTime);
                formData.append('EndDate', EndDate);
                formData.append('EndTime', EndTime);
                formData.append('Description', Description);
                $.ajax({
                    url: "<?php echo base_url() . 'Dash_artproduct/update_art_product' ?>",
                    dataType: "json",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        $('#editartproductModal1').modal('hide');
                        fetch();



                    },

                });
            });
        });
    </script>

</html>