<?php
include "./header.php";
$front_home_obj = new Db_functions();


$qry = "SELECT sh.section_title, sh.section_seq,fs.created_date,fs.id,fs.client_id FROM `section_home` sh INNER JOIN `front_sections` fs ON sh.id= fs.section_id WHERE fs.client_id =$_SESSION[active_user] ";

$result = $front_home_obj->data_fetch($qry);


?>


<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Customize Store</h6>
                <a href="./manage_front" class="btn btn-primary btn-sm">
                    <i class=" fa fa-plus"></i> Manage
                </a>
            </div>
            <div class="table-responsive">
                <table style="Overflow-x:scroll;" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Section Name</th>
                            <th>Sequence </th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>




                        <?php

                        if ($result != 0) {

                            $sno = 0;
                            foreach ($result as $key => $value) {
                                $sno++;
                        ?>


                                <tr>
                                    <td><a href="#"><?= $sno; ?></a></td>
                                    <td><?= $value['section_title'] ?></td>
                                    <td><?= $value['section_seq'] ?></td>

                                    <td><?= $value['created_date'] ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#sec_front<?php $value['id'] ?>">Delete</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="sec_front<?php $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a href="./section_backend.php?del_section=<?= $value['id'] ?>" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->


                                    </td>
                                </tr>

                        <?php  }
                        } else {
                            echo "Please Add An Section";
                        }
                        ?>





                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>

<?php

include "./footer.php";
?>