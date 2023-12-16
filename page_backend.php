<?php
require "./config/class.php";
$page_backend = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['add_page'])) {

        if ($_POST['Page_title'] != "" && $_POST['page_content'] != "") {

            $page_title = $_POST['Page_title'];
            $page_content = $_POST['page_content'];
            $assigned_section = implode(',', $page_content);


            $urlhandler = $page_backend->RemoveSpecialChar($page_title);

            //check halder existance
            $qry_check_handler = "SELECT * FROM `pages` WHERE page_handler='$urlhandler'";
            $handler_result = $page_backend->checkForUrlHandler($qry_check_handler);

            if ($handler_result == 0) {

                // insert data into page 
                $sql_page_create = "INSERT INTO `pages`(`page_title`, `page_handler`, `page_sequence`, `assign_sectiona`) VALUES ('$page_title','$urlhandler','0','$assigned_section')";
                $result = $page_backend->data_insert($sql_page_create);

                if ($result != 0) {

                    $lastid = $page_backend->LastId();


                    foreach ($page_content as $key => $value) {

                        $qry_assign = "INSERT INTO `assigned_section`( `page_id`, `section_id`) VALUES ('$lastid','$value')";
                        $assigned_section =  $page_backend->data_insert($qry_assign);
                    }
                    if ($assigned_section != 0) {
                        echo "<script>alert('section added');
                    window.location.href='./new_page';
                    </script>";
                    }
                }
            } else {
                echo "<script>alert('Handler Or Title Is Already Exist');
                    window.location.href='./new_page';
                    </script>";
            }
        }
    }
}
