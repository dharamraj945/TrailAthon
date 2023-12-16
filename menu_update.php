<?php
include "./header.php";
$menu_update_obj = new Db_functions();

if (isset($_GET['menu_id'])) {
    $menu_id = $_GET['menu_id'];
} else {
    echo "Parmetor Error !";
}


$qry_fetch_menus = "SELECT * FROM `section_menu` WHERE id=$menu_id";
$result = $menu_update_obj->data_fetch($qry_fetch_menus);

$result = $result[0];
print_r($result);

?>
<div class="row">
    <div class="col-lg-6">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">
                <form action="./menus_backend.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input value="<?= $result['menu_name'] ?>" name="new_menu_name" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Menu Name">

                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Menu Type</label>

                        <select name="new_menu_type" class="form-control mb-3" required="">
                            <option disabled value="">SELECT </option>
                            <option <?= $result['menu_type'] == 0 ? "selected" : "" ?> value="">Header Menu</option>
                            <option <?= $result['menu_type'] == 1 ? "selected" : "" ?> value="">Footer Menu </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Menu Type</label>

                        <select name="new_menu_status" class="form-control mb-3" required="">
                            <option disabled value="">SELECT </option>

                            <option <?= $result['menu_type'] == 0 ? "selected" : "" ?> value="">Active</option>
                            <option <?= $result['menu_type'] == 1 ? "selected" : "" ?> value="">Draft </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Menu handler</label>
                        <input value="<?= $result['menu_handler'] ?>" name="new_menu_action" required="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Menu Handler" required>

                    </div>


            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Menu Action</label>

                    <select id="new_menu_action" name="menu_action_type" class="form-control mb-3" required>
                        <option value="" selected disabled>SELECT</option>
                        <option value="0">Assign Page</option>
                        <option value="1">Custom Url</option>
                    </select>
                </div>


                <div id="result_ajax" class="form-group">


                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Sequence </label>
                    <input name="new_menu_sequence" required="" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                </div>

            </div>
            <button type="submit" name="update_menu" class="btn btn-primary">Updae</button>

        </div>
        </form>
    </div>

</div>

<script>
    $(document).ready(function() {

        $('#new_menu_action').change(function() {

            var selectedval = $(this).val();
            ajax_call_type(selectedval)
            // Make an AJAX call to the server

            function ajax_call_type(action_type) {

                $.ajax({
                    url: './menus_backend.php', // URL to the PHP file
                    type: 'POST', // HTTP method
                    dataType: 'html', // Data type expected from the server
                    data: {
                        data_menu_type: selectedval
                    }, // Data to send to the server

                    success: function(response) {
                        // Handle the successful response from the server
                        $('#result_ajax').html(response);

                    },

                    error: function(error) {
                        // Handle errors
                        console.log('Error:', error);
                    }
                });

            }


        })

    })
</script>
<?php
include "./footer.php";
?>