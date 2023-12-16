<?php
include "./header.php";
?>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Content</h6>
                <a class="btn btn-primary btn-sm" href="./new_page">
                    <i class=" fa fa-plus"></i> Add new
                </a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Title</th>
                            <th>Desreption</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><a href="#">
                                    1 </a></td>
                            <td>
                                New Content </td>
                            <td>
                                <p>To Create A New Section In your Shopify Store F... </p>
                            </td>
                            <td>
                                2023-12-13 18:04:28 </td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td><a href="" class="btn btn-sm btn-primary">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>









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