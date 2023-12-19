<?php
include "./header.php";
?>

<link rel="stylesheet" href="./css/dropzone.css">

<div class="row">

    <div class="card col-lg-12">


        <div class="mx-2 my-2 text-primary">

            <h1>Upload Image Gallary</h1>
        </div>

        <form id="dropzone" class="dropzone"></form>
        <div id="result_alert" class="  d-none flex-column  justify-content-center align-items-center bg-success text-white my-2">
            <h3>Image Uploaded</h3>
            <a class="text-white" href="./gallery">Go Back</a>
        </div>
        <button id="upload_btn" class="btn btn-primary">Upload</button>
    </div>

</div>

<script src="./js/dropzone.js"></script>

<script>
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#dropzone", {

        url: "./gallery_upload.php",
        parallelUploads: 10,
        uploadMultiple: true,
        acceptedFiles: '.jpg,.png,.jpeg',
        autoProcessQueue: false,
        success: (file, response) => {
            if (response == "true") {

                $("#result_alert").addClass("d-flex");
                $("#upload_btn").hide();

            } else {

            }
        }
    })

    $("#upload_btn").click(function() {

        myDropzone.processQueue();
    })
</script>
<?php
include "./footer.php";
?>