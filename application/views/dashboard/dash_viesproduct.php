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

                        // Handle success response
                        // console.log(response);

                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log(error);
                    }
                });
            });
        });
    </script>

</html>