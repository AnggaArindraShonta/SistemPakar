<?php  ?>

<?php  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Penyakit
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Penyakit</li>
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
              Tambah Penyakit
            </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <?= $this->session->flashdata('message') ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center" width="5%">No.</th>
                  <th class="text-center" width="15%">Kode</th>
                  <th class="text-center" width="15%">Penyakit</th>
                  <th class="text-center" width="50%">Solusi</th>
                  <th class="text-center" width="20%">Option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($penyakit as $data) {

                ?>
                  <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td class="text-center"><?= $data['kode_penyakit']; ?></td>
                    <td><?= $data['penyakit']; ?></td>
                    <td><?= $data['solusi']; ?></td>
                    <td class="text-center">
                      <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit-<?= $data['kode_penyakit']; ?>" title="Edit Penyakit"><span class="fa fa-edit"></span></a>
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?= $data['kode_penyakit']; ?>" title="Delete Penyakit"><span class="fa fa-trash"></span></a>
                    </td>
                  </tr>

                  <!-- Modal -->
                  <div class="modal fade" id="edit-<?= $data['kode_penyakit']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Penyakit</h4>
                        </div>

                        <form action="<?php echo base_url() ?>admin/edit_penyakit" method="POST">
                          <input type="hidden" name="kode_penyakit" value="<?= $data['kode_penyakit']; ?>">
                          <div class="modal-body">

                            <div class="form-group">
                              <label for="email">Penyakit</label>
                              <input type="text" name="penyakit" class="form-control" id="email" value="<?= $data['penyakit']; ?>">
                            </div>


                            <div class="form-group">
                              <label for="email">Solusi</label>
                              <textarea class="form-control" name="solusi" id="solusi" aria-describedby="catatan_pembelian" placeholder="Solusi" required="required"><?= $data['solusi']  ?></textarea>
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
                  <div class="modal fade" id="delete-<?= $data['kode_penyakit']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Hapus Penyakit</h4>
                        </div>

                        <form action="<?php echo base_url() ?>admin/delete_penyakit" method="POST">
                          <div class="modal-body">
                            <h5>Apakah Kamu Yakin Akan Menghapus Data Ini?</h5>
                            <input type="hidden" name="kode_penyakit" value="<?= $data['kode_penyakit']; ?>">
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
        <h4 class="modal-title">Tambah Penyakit</h4>
      </div>

      <form action="<?php echo base_url() ?>admin/add_penyakit" method="POST">
        <div class="modal-body">

          <div class="form-group">
            <label for="email">Penyakit</label>
            <input type="text" name="penyakit" class="form-control" id="email" placeholder="Nama Penyakit">
          </div>

          <div class="form-group">
            <label for="email">Solusi</label>
            <textarea class="form-control" name="solusi" id="solusi" aria-describedby="catatan_pembelian" placeholder="Solusi" required="required"></textarea>
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