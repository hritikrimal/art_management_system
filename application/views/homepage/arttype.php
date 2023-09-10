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
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/aboutpage.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            /* padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px; */
        }

        h1 {
            font-size: 24px;
            margin: 0;
            padding: 0;
        }

        .card {
            margin-top: 2%;
        }

        .image-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .image-card {
            width: calc(33.33% - 10px);
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        .image-card img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        h2 {
            font-size: 18px;
            margin: 0;
            padding: 10px;
            background-color: darkgray;
            color: #fff;
            text-align: center;
        }

        .edit-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin: 0;
            padding: 10px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="image-cards">
            <?php foreach ($images as $image) : ?>
                <?php
                // Get the EndDate and EndTime from the current image
                $endDate = strtotime($image->EndDate);
                $endTime = strtotime($image->EndTime);

                // Get the current date and time
                $currentDateTime = time();

                // Compare the EndDate and EndTime with the current date and time
                if ($endDate > $currentDateTime || ($endDate == $currentDateTime && $endTime >= $currentDateTime)) {
                ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?= $image->Image; ?>" alt="<?= $image->Title; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $image->Title; ?></h5>
                            <button class="btn btn-primary edit-button" id="edit" value="<?= $image->ID; ?>">Buy</button>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?= $image->Image; ?>" alt="<?= $image->Title; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $image->Title; ?></h5>
                            <button class="btn btn-primary edit-button" id="edit" value="<?= $image->ID; ?>" disabled>Expired</button>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>



    <script>
        $(document).on("click", "#edit", function() {

            // alert("edit");
            var edit_id = $(this).attr('value');
            alert(edit_id);
            // $.ajax({
            //     url: "<?php echo base_url() . 'Dash_artproduct/edit'; ?>",
            //     type: 'post',
            //     dataType: 'json',
            //     data: {
            //         edit_id: edit_id
            //     },
            //     success: function(data) {
            //         // console.log(data);
            //         var imagePath = (data[0].Image);
            //         // var trimmedImagePath = imagePath.replace("uploads/", "");
            //         // console.log(trimmedImagePath);

            //         $("#e_artmodal_id").val(data[0].ID);
            //         $("#e_artTitle").val(data[0].Title);
            //         // $("#e_artImage").val(data[0].Image);
            //         $("#e_artImageText").val(imagePath);

            //         $("#e_artClassification").val(data[0].Classification);
            //         $("#e_artSize").val(data[0].Size);
            //         $("#e_artArtist").val(data[0].Artist_id);
            //         $("#e_arttype").val(data[0].ArtType_id);
            //         $("#e_artmedium").val(data[0].ArtMedium_id);
            //         $("#e_artDimension").val(data[0].Dimension);
            //         $("#e_artPrice").val(data[0].Price);
            //         $("#e_artProduce").val(data[0].ArtProduce);
            //         $("#e_startDate").val(data[0].StartDate);
            //         $("#e_startTime").val(data[0].StartTime);
            //         $("#e_endDate").val(data[0].EndDate);
            //         $("#e_endTime").val(data[0].EndTime);
            //         $("#e_artDescription").val(data[0].Description);
            //         $('#editartproductModal1').modal('show');
            //     },
            // });
        });
    </script>



</body>

</html>