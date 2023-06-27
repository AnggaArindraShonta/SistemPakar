<?php  ?>

<?php  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Gejala CF
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Gejala CF</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            Tambah Gejala CF
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?= $this->session->flashdata('message') ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Kode Gejala</th>
                                    <th class="text-center">Gejala</th>
                                    <th class="text-center">Bobot Pakar</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($gejalacf as $data) {

                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
                                        <td class="text-center"><?= $data['kode_gejalacf']; ?></td>
                                        <td><?= $data['gejalacf']; ?></td>
                                        <td><?= $data['bobot_pakar']; ?></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit-<?= $data['kode_gejalacf']; ?>" title="Edit gejala"><span class="fa fa-edit"></span></a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?= $data['kode_gejalacf']; ?>" title="Delete gejala"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit-<?= $data['kode_gejalacf']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Gejala CF</h4>
                                                </div>

                                                <form action="<?php echo base_url() ?>admin/edit_gejalacf" method="POST">
                                                    <input type="hidden" name="kode_gejalacf" value="<?= $data['kode_gejalacf']; ?>">
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="email">Gejala</label>
                                                            <input type="text" name="gejalacf" class="form-control" id="gejalacf" value="<?= $data['gejalacf']; ?>">
                                                            <label for="bobot_pakar">Bobot Pakar</label>
                                                            <select name="bobot_pakar" class="form-control" id="bobot_pakar" value="<?= $data['bobot_pakar']; ?>">
                                                                <option value="">Pilih</option>
                                                                <option value="0.00">0.00</option>
                                                                <option value="0.20">0.20</option>
                                                                <option value="0.40">0.40</option>
                                                                <option value="0.60">0.60</option>
                                                                <option value="0.80">0.80</option>
                                                                <option value="1.00">1.00</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal -->
                                    <div class="modal fade" id="delete-<?= $data['kode_gejalacf']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Hapus Gejala CF</h4>
                                                </div>

                                                <form action="<?php echo base_url() ?>admin/delete_gejalacf" method="POST">
                                                    <div class="modal-body">
                                                        <h5>Apakah Kamu Yakin Akan Menghapus Data Ini?</h5>
                                                        <input type="hidden" name="kode_gejalacf" value="<?= $data['kode_gejalacf']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


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

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Gejala CF</h4>
            </div>

            <form action="<?php echo base_url() ?>admin/add_gejalacf" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="email">Gejala</label>
                        <input type="text" name="gejalacf" class="form-control" id="gejalacf">
                        <label for="email">Bobot Pakar</label>
                        <select name="bobot_pakar" class="form-control" id="bobot_pakar">
                            <option value="">Pilih</option>
                            <option value="0.00">0.00</option>
                            <option value="0.20">0.20</option>
                            <option value="0.40">0.40</option>
                            <option value="0.60">0.60</option>
                            <option value="0.80">0.80</option>
                            <option value="1.00">1.00</option>
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>