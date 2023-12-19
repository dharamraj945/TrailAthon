<?php
include "./header.php";
$obj_frontPage = new Db_functions();

$qry = "SELECT * FROM `section_home` sh INNER JOIN grt_client_sections cs on sh.id = cs.section_id AND  cs.section_status=0 and cs.client_id= $_SESSION[active_user]";

echo $qry;
?>

<?php

$show_added_section = "SELECT * FROM `front_sections` ";
$result_qry = $obj_frontPage->data_fetch($show_added_section);

if ($result_qry != 0) {;
}

?>
<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">
                <form action="./section_backend.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <h2>Manage Homepage</h2>


                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"></label>

                        <select required name="page_content[]" class="form-control mb-3 js-example-basic-single" multiple="multiple">
                            <option disabled="" value="-1">Select Category</option>

                            <?php

                            $qry_fire =  $obj_frontPage->data_fetch($qry);


                            foreach ($qry_fire as $key => $option_data) { ?>

                                <option <?php  ?> value="<?= $option_data['id'] ?>"><?= $option_data['section_title'] ?></option>


                            <?php }

                            ?>

                        </select>


                    </div>
                    <div class="button">

                        <button name="create_section" class="btn btn-primary" type="submit">Add HomePage</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<script>
    $('.js-example-basic-single').select2({
        placeholder: 'Select an Section'
    });
</script>
<?php
include "./footer.php";
?>