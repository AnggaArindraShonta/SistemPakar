<title>Data Penyakit CF</title>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">

<!-- Main content -->
<section class="content" style="margin-left: 50px; margin-right: 50px;">
	<div class="row">
		<div class="col-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Konsultasi</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<form method="post" action="<?php echo base_url() ?>member/diagnosa">
							<table id="tabelKonsultasi" class="table table-bordered table-striped" style="width: 100%">
								<thead>
									<tr>
										<th>Kode Gejala</th>
										<th>Gejala</th>
										<th>Kondisi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($gejalacf as $data) { ?>
										<tr>
											<td><?= $data['kode_gejalacf']; ?></td>
											<td><?= $data['gejalacf']; ?></td>
											<td>
												<select id="<?= $data['kode_gejalacf']; ?>" name="kondisi[<?= $data['kode_gejalacf']; ?>]" onchange="changeColor(this)">
													<option value="">Pilih</option>
													<option value="0.00">Tidak</option>
													<option value="0.20">Tidak Tahu</option>
													<option value="0.40">Sedikit Yakin</option>
													<option value="0.60">Cukup Yakin</option>
													<option value="0.80">Yakin</option>
													<option value="1.00">Sangat Yakin</option>
												</select>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Kode Gejala</th>
										<th>Gejala</th>
										<th>Kondisi</th>
									</tr>
								</tfoot>
							</table>
							<button type="submit" name="submit" class="btn btn-lg btn-success px-6" role="button">Submit</button>
						</form>

						<script>
							function changeColor(select) {
								var selectedValue = select.value;

								if (selectedValue === "0.00") {
									select.style.backgroundColor = "#FFAE00";
								} else if (selectedValue === "0.20") {
									select.style.backgroundColor = "#FF9000";
								} else if (selectedValue === "0.40") {
									select.style.backgroundColor = "#FF6E00";
								} else if (selectedValue === "0.60") {
									select.style.backgroundColor = "#FF4800";
								} else if (selectedValue === "0.80") {
									select.style.backgroundColor = "#FF2200";
								} else if (selectedValue === "1.00") {
									select.style.backgroundColor = "#FF0000";
								} else {
									select.style.backgroundColor = "";
								}
							}
						</script>



					</div>
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

<!-- fungsi datatable -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tabelKonsultasi').DataTable();
	});
</script>