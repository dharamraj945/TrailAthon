<?php include "./header.php";

$obj_fetch_section = new Db_functions();
?>


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