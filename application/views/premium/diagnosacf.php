<title>Diagnosa Penyakit</title>

<!-- Main content -->
<section class="content" style="margin-left: 50px; margin-right: 50px;">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Hasil Diagnosa Penyakit Tanaman Padi</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tabelDiagnosa" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Penyakit</th>
                                    <th>Penyakit</th>
                                    <th>CF Persen</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penyakitcf as $no => $data) { ?>
                                    <tr>
                                        <td><?= $no + 1 ?></td>
                                        <td><?= $data['kode_penyakitcf'] ?></td>
                                        <td><?= $data['penyakitcf'] ?></td>
                                        <td><?= $data['hasil_cf_persen'] ?>%</td>
                                        <td>
                                            <a href="<?= base_url() ?>user/detail_penyakit/<?= $data['kode_penyakit'] ?>" class="fa-hover col-xl-3 col-lg-4 col-md-6 col-12"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="<?php echo base_url() ?>user/konsultasi" class="btn btn-primary btn-lg"><span class="fa fa-arrow-left"></span> Konsultasi Lagi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelDiagnosa').DataTable();
    });
</script>