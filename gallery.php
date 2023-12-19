<?php
include "./header.php";

$gallery_data = new Db_functions();
$qry = "SELECT * FROM `grt_section_gallery` WHERE image_client_id=$_SESSION[active_user]";
$qry_res = $gallery_data->data_fetch($qry);
?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                <a class="btn btn-primary btn-sm" href="./gallery_add">
                    <i class=" fa fa-plus"></i> Add Images
                </a>
            </div>
            <div class="table-responsive">
                <table style="Overflow-x:scroll;" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>

                            <th>Menu Sequence</th>
                            <th>Date</th>



                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if ($qry_res != 0) {


                            $sno = 0;
                            foreach ($qry_res as $key => $values) {
                                $sno++; ?>
                                <tr>
                                    <td><a href="#"><?= $sno ?></a></td>
                                    <td><img src="./assets/images/uploads/<?= $values['image_name'] ?>" alt="" height="50px" width="50px"></td>
                                    <td>Image</td>
                                    <td>
                                        <a target="_blank" class="badge badge-primary" href="./assets/images/uploads/<?= $values['image_name'] ?>">View image</a>
                                    </td>

                                    <td><?= $values['image_sequence'] ?></td>
                                    <td><?= $values['created_date'] ?></td>


                                    <td><a href=" ./menu_update?menu_id=51" class="btn btn-sm   btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#img_del<?= $values['id'] ?>">Delete</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="img_del<?= $values['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are You Sure !</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span class="text-danger"> You won't be able to revert this !</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="./gallery_backend.php?img_del=<?= $values['id'] ?>" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->


                                    </td>
                                </tr>
                        <?php }
                        } else {
                            echo "NO Images Found";
                        }
                        ?>







                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>



<?php
include "./footer.php";
?>