<?php  ?>

<?php  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Basis Pengetahuan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Basis Pengetahuan</li>
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
              Tambah Basis Pengetahuan
            </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <?= $this->session->flashdata('message') ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Kode Penyakit</th>
                  <th class="text-center">Nama Penyakit</th>
                  <th class="text-center">Kode Gejala</th>
                  <th class="text-center">Nama Gejala</th>
                  <th class="text-center">Option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($basispengetahuan as $data) {

                ?>
                  <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td class="text-center"><?= $data['kode_penyakit']; ?></td>
                    <td><?= $data['penyakit']; ?></td>
                    <td class="text-center"><?= $data['kode_gejala']; ?></td>
                    <td><?= $data['gejala']; ?></td>
                    <td class="text-center">
                      <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit-<?= $data['id']; ?>" title="Edit Basis Pengetahuan"><span class="fa fa-edit"></span></a>
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?= $data['id']; ?>" title="Delete Basis Pengetahuan"><span class="fa fa-trash"></span></a>
                    </td>
                  </tr>

                  <!-- Modal -->
                  <div class="modal fade" id="edit-<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Basis Pengetahuan</h4>
                        </div>

                        <form action="<?php echo base_url() ?>admin/edit_basispengetahuan" method="POST">
                          <input type="hidden" name="id" value="<?= $data['id']; ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="kode_penyakit">Kode Penyakit</label>
                              <select name="kode_penyakit" id="kode_penyakit" class="selectpicker form-control">
                                <option value="" selected disabled>Pilih Penyakit</option>
                                <?php if (!empty($data_penyakit)) : ?>
                                  <?php foreach ($data_penyakit as $row) : ?>
                                    <option <?php if ($data['kode_penyakit'] == $row->kode_penyakit) {
                                              echo 'selected="selected"';
                                            } ?> value="<?= $row->kode_penyakit; ?>"><?= $row->kode_penyakit . ' - ' . $row->penyakit; ?></option>
                                  <?php endforeach ?>
                                <?php endif; ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="kode_gejala">Kode Gejala</label>
                              <select name="kode_gejala" id="kode_gejala" class="selectpicker form-control">
                                <option value="" selected disabled>Pilih Gejala</option>
                                <?php if (!empty($data_gejala)) : ?>
                                  <?php foreach ($data_gejala as $key) : ?>
                                    <option <?php if ($data['kode_gejala'] == $key->kode_gejala) {
                                              echo 'selected="selected"';
                                            } ?> value="<?php echo $key->kode_gejala ?>"><?php echo $key->kode_gejala . ' - ' . $key->gejala ?></option>
                                  <?php endforeach ?>
                                <?php endif; ?>
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
                  <div class="modal fade" id="delete-<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Delete Basis Pengetahuan</h4>
                        </div>

                        <form action="<?php echo base_url() ?>admin/delete_basispengetahuan" method="POST">
                          <div class="modal-body">
                            <h5>Are You Sure You Want To Delete This Data?</h5>
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
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
        <h4 class="modal-title">Add Basis Pengetahuan</h4>
      </div>

      <form action="<?php echo base_url('admin/add_basispengetahuan'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="kode_penyakit">Kode Penyakit</label>
            <select name="kode_penyakit" id="kode_penyakit" class="selectpicker form-control">
              <option value="" selected disabled>Pilih Penyakit</option>
              <?php foreach ($data_penyakit as $row) : ?>
                <option value="<?php echo $row->kode_penyakit; ?>"><?php echo $row->kode_penyakit . ' - ' . $row->penyakit; ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="kode_gejala">Kode Gejala</label>
            <select name="kode_gejala" id="kode_gejala" class="selectpicker form-control">
              <option value="" selected disabled>Pilih Gejala</option>
              <?php foreach ($data_gejala as $row) : ?>
                <option value="<?php echo $row->kode_gejala ?>"><?php echo $row->kode_gejala . ' - ' . $row->gejala; ?></option>
              <?php endforeach ?>
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