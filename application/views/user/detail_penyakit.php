<title>Detail Penyakit</title>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">

<!-- Main content -->
<section class="content" style="margin-left: 50px; margin-right: 50px;">
  <div class="row">
    <div class="col-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Penyakit Tanaman Padi</h3>
          <hr>
          <h4><b><?php echo $penyakit; ?></b></h4>
          <h4>Gejala</h4>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="tabelPenyakit" class="table table-bordered table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gejala</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($gejala as $no => $data) { ?>
                  <tr>
                    <td><?= $no + 1 ?></td>
                    <td><?= $data['gejala']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Gejala</th>
                </tr>
              </tfoot>
            </table>
            <hr>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Solusi Penyakit</b></label>
              <div class="col-sm-10">
                <?php echo $solusi; ?>
              </div>
            </div>
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
    $('#tabelPenyakit').DataTable();
  });
</script>