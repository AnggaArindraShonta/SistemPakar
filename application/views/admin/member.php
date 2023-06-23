<?php  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Member
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Member</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?= $this->session->flashdata('message') ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Status Aktif</th>
                                    <th class="text-center">Status Premium</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($member as $data) {

                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?= $data['username']; ?></td>
                                        <td class="text-center"><?= $data['email']; ?></td>
                                        <td><?= ($data['status_aktif'] == "Y") ? "Aktif" : "Tidak Aktif"; ?></td>
                                        <td><?= ($data['premium'] == "Y") ? "Ya" : "Tidak"; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <div class="text-center">
                                                    <a href="<?= site_url('admin/ubah_statusaktif/' . $data['id_member']); ?>" class="btn-sm btn-warning">Ubah Status Aktif</a>
                                                    <a href="<?= site_url('admin/ubah_statuspremium/' . $data['id_member']); ?>" class="btn-sm btn-warning">Ubah Status Premium</a>
                                                    <a href="<?= site_url('admin/delete/' . $data['id_member']); ?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger" class="fa fa-trash">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->