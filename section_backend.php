<?php
session_start();
include "./config/class.php";
$sec_back = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST['create_section'])) {

        if (($_POST['page_content'] != "")) {

            $page_contant = $_POST['page_content'];


            foreach ($page_contant as $key => $values) {


                $qry = "INSERT INTO `front_sections`( `section_id`,`client_id`, `section_seq`) VALUES ('$values','$_SESSION[active_user]','0')";
                $result = $sec_back->data_insert($qry);
            }

            if ($result != 0) {

                echo "<script>alert('section Updated');
                window.location.href='./front_home';
                </script>";
            } else {
                echo "fail";
            }
        }
    }

    //section new event 


    if (isset($_POST['add_new_event'])) {

        print_r($_POST);
        if ($_POST['text'] != "" && $_POST['heading_text'] != '') {

            $text = $_POST['text'];
            $heading_text = $_POST['heading_text'];
            $richtext = $_POST['richtext'];
            $richtext = urlencode($richtext);
            $client_id = $_SESSION['active_user'];





            $qry_event = "INSERT INTO `grt_section_events`(`section_id`, `section_client`, `section_text`, `section_heading`, `section_richtext`, `section_sequence`) VALUES ('2','$client_id',
            '$text','$heading_text','$richtext','0')";

            $qry_res = $sec_back->data_insert($qry_event);


            if ($qry_res != 0) {

                echo "<script>alert('added')
                window.location.href='./section_event_details.';
                </script>";
            }
        }
    }
}


// Get Request Handle
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['del_section'])) {
        $del_id = $_GET['del_section'];

        $qry_delete_menu = "DELETE FROM `front_sections` WHERE id=$del_id";
        $result = $sec_back->data_delete($qry_delete_menu);


        if ($result != 0) {
            echo "<script>
            window.location.href='./front_home';
            </script>";
        } else {

            echo "<script>
            alert('fail');
            window.location.href='./front_home';
            </script>";
        }
    }
}
