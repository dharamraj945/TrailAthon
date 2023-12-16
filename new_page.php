<?php include "./header.php";

$obj_fetch_section = new Db_functions();
?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">
                <form action="./page_backend.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Page Title</label>
                        <input name="Page_title" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Title">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"></label>

                        <select required name="page_content[]" class="form-control mb-3 js-example-basic-single" multiple="multiple">
                            <option disabled="" value="-1">Select Category</option>

                            <?php
                            $qry = "SELECT * FROM `section_content` WHERE content_status=0";
                            $qry_fire =  $obj_fetch_section->data_fetch($qry);
                            foreach ($qry_fire as $key => $option_data) { ?>

                                <option value="<?= $option_data['sno'] ?>"><?= $option_data['content_title'] ?></option>


                            <?php }

                            ?>

                        </select>


                    </div>
                    <div class="button">

                        <button name="add_page" class="btn btn-primary" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
<script>
    $('.js-example-basic-single').select2({
        placeholder: 'Select an option'
    });
</script>
<?php include "./footer.php" ?>