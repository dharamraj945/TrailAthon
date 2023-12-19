<?php
include "./config/session_manage.php";
include "./config/class.php";
$gallery_bacend = new Db_functions();

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['img_del'])) {
        $delete_id = $_GET['img_del'];

        $qry_image_file = "SELECT * FROM `grt_section_gallery` WHERE id= $delete_id";
        $qry_image_file_result = $gallery_bacend->data_fetch($qry_image_file);
        $filename = '';
        if ($qry_image_file_result != 0) {

            foreach ($qry_image_file_result as $key => $value) {
                $filename = $value['image_name'];
            }
        }

        if ($filename != "") {

            $delete_file = "./assets/images/uploads/" . $filename;
            $is_del = unlink($delete_file);
            if ($is_del) {


                $qry = "DELETE FROM `grt_section_gallery` WHERE id=$delete_id";
                $qry_res = $gallery_bacend->data_delete($qry);

                if ($qry_res != 0) {
                    echo "<script>window.location.href='./gallery'</script>";
                } else {
                    echo "<script>alert('fail');</script>";
                }
            }
        }
    }
}
