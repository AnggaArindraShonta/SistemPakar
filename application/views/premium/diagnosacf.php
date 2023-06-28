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
                        <h4>Perkalian Bobot User dan Bobot Pakar</h4>
                        <table id="tabelPerkalian" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Gejala</th>
                                    <th>Gejala</th>
                                    <th>Bobot User</th>
                                    <th>Bobot Pakar</th>
                                    <th>Perkalian</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $nomor = 1;
                                foreach ($cfEe as $no => $data) { ?>
                                    <tr>
                                        <td><?= $nomor; ?></td>
                                        <td><?= $data['kode_gejalacf'] ?></td>
                                        <td><?= $data['gejalacf'][0] ?></td>
                                        <td><?= $data['bobot_user'] ?></td>
                                        <td><?= $data['bobot_pakar'] ?></td>
                                        <td><?= $data['cfbobot'] ?></td>
                                    </tr>
                                <?php $nomor++;
                                } ?>
                            </tbody>
                        </table>

                        <h4>Perkalian Nilai Minimum dengan CF Aturan</h4>
                        <table id="tabelPerkalianMinimum" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nilai Minimum</th>
                                    <th>CF Aturan</th>
                                    <th>Perkalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1;
                                foreach ($cfHe as $no => $data) { ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $data['nilai_min'] ?></td>
                                        <td><?= $data['cfaturan'] ?></td>
                                        <td><?= $data['cfhipotesis'] ?></td>
                                    </tr>
                                <?php $nomor++;
                                } ?>
                            </tbody>
                        </table>

                        <h4>Hasil Diagnosa</h4>
                        <table id="tabelHasil" class="table table-bordered table-striped" style="width: 100%">
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
                                <?php $nomor = 1;
                                foreach ($Hipotesis as $no => $data) { ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $data['kode_penyakitcf'] ?></td>
                                        <td><?= $data['penyakitcf'][0] ?></td>
                                        <td><?= $data['cf_persen'] ?>%</td>
                                        <td>
                                            <a href="<?= base_url() ?>member/detail_penyakitcf/<?= $data['kode_penyakitcf'] ?>" class="fa-hover col-xl-3 col-lg-4 col-md-6 col-12"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php $nomor++;
                                } ?>
                            </tbody>
                        </table>
                        <a href="<?php echo base_url() ?>member/konsultasicf" class="btn btn-primary btn-lg"><span class="fa fa-arrow-left"></span> Konsultasi Lagi</a>
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
        $('#tabelPerkalian').DataTable();
        $('#tabelPerkalianMinimum').DataTable();
        $('#tabelHasil').DataTable();
    });
</script>