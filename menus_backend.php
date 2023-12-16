<?php
require "./config/session_manage.php";
require "./config/class.php";
$menu_obj = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_menu'])) {

        if ($_POST['menu_name'] != "" && $_POST['menu_type'] != "" && $_POST['menu_status'] != "" && $_POST['menu_action'] != "" && $_POST['menu_sequence'] != "") {


            $menu_name = $_POST['menu_name'];
            $menu_type = $_POST['menu_type'];
            $menu_status = $_POST['menu_status'];
            $menu_action = $_POST['menu_action'];
            $menu_sequence = $_POST['menu_sequence'];
            $menu_action_type = $_POST['menu_action_type'];

            $menu_handler =  $menu_obj->RemoveSpecialChar($menu_name);

            //insert Menu Data in Database

            //check for handler existance
            $is_exist_handler = "SELECT menu_handler FROM `section_menu` WHERE menu_handler= '$menu_handler'";
            $exist_result = $menu_obj->data_fetch($is_exist_handler);

            echo $exist_result;
            if ($exist_result != 0) {

                echo "<script>alert('Handler Aready Exist')
                    window.location.href='./menus';

                </script>";
                exit();
            }



            $qry = "INSERT INTO `section_menu`(`menu_name`, `menu_handler`, `menu_type`, `menu_action`, `menu_status`, `menu_seq`,`menu_action_type`) VALUES ('$menu_name','$menu_handler','$menu_type','$menu_action','$menu_status','$menu_sequence','$menu_action_type')";
            $result = $menu_obj->data_insert($qry);

            if ($result != 0) {
                echo "<script>alert('Menu Added')
                window.location.href='./menus';
                </script>";
            }
        }
    }


    if (isset($_POST['data_menu_type'])) {

        $menu_type = $_POST['data_menu_type'];
        // 0 for page 
        // 1 for custom url 

        if ($menu_type == 0) {


            $qry = "SELECT * FROM `pages` WHERE page_status=0";
            $qry_result = $menu_obj->data_fetch($qry);
            if ($qry_result != 0) {


                foreach ($qry_result as $key => $value) { ?>
                    <label>Select Page</label>

                    <select id="menu_action" name="menu_action" class="form-control mb-3" required="">
                        <option value="<?= $value['id'] ?>"><?= $value['page_title'] ?></option>

                    </select>



                <?php  }
            } else { ?>

                <label for="">No Page Found</label>
                <a href="./new_page">Add new Page</a>

            <?php }
        } elseif ($menu_type == 1) { ?>

            <label for="">Custom Url</label>
            <input value="" type="url" class="form-control" id="" placeholder="Url" name="menu_action" required>

<?php }
    }
}
