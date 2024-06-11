<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <?= $this->session->flashdata('message'); ?>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">User</li>
                    </ol>
                </nav><br>
                <h4 class="card-title">System User Data</h4>
                <div class="col-0 align-self-right">
                    <div class="customize-input float-right">
                        <a href="<?= base_url('c_user/view_add') ?>" type="button" class="btn btn-primary btn-rounded"><i class="fas fa-plus"></i> Add New User</a>

                    </div>
                </div><br><br><br>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                                <!-- <th style="width: 200px;">Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($queryAllUser as $row) {
                            ?>
                                <tr class="text-center">
                                    <!-- <td><?php echo date('D, d M Y - h:m', strtotime($row->dt_report_datetime)) ?> </td> -->
                                    <td><?= $no++; ?></td>
                                    <td><?php echo $row->user_username ?></td>
                                    <td><?php echo $row->user_name ?></td>
                                    <td><?php echo $row->user_email ?></td>
                                    <td>
                                        <?php if ($row->user_role == 1) { ?>
                                            <h4><span class="badge badge-pill badge-secondary">Administrator</span></h4>
                                        <?php } else if ($row->user_role == 2) { ?>
                                            <h4><span class="badge badge-pill badge-primary">Instructor</span></h4>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($row->user_statusactivated == 0) { ?>
                                            <h5><i class="fas fa-times-circle" style="color: red;"></i><b style="color: red;">
                                                    Not
                                                    Active</h5>
                                        <?php } else if ($row->user_statusactivated == 1) { ?>
                                            <h5><i class="fas fa-check-circle" style="color: green;"></i><b style="color: green;">
                                                    Active</h5>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('c_user/update/' . $row->user_id) ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit" title="Edit"></i></a>
                                        <button class="btn btn-circle btn-danger btn-sm" data-toggle="modal" data-target="#top-modal<?= $row->user_id ?>"><i class="fa fa-trash" title="Delete"></i></button>

                                        <!-- <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#top-modal">Top Modal</button> -->
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Top modal content -->
<?php foreach ($queryAllUser as $row) { ?>
    <div id="top-modal<?= $row->user_id ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topModalLabel">Delete user <b><?= $row->user_name ?></b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this data?</h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('c_user/delete/' . $row->user_id) ?>" class="btn btn-primary">Delete</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>