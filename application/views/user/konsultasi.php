<title>Data Penyakit</title>

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
						<form method="post" action="<?php echo base_url() ?>user/diagnosa">
							<table id="tabelKonsultasi" class="table table-bordered table-striped" style="width: 100%">
								<thead>
									<tr>
										<th>Kode Gejala</th>
										<th>Gejala</th>
										<th>Ya</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($gejala as $data) {
									?>
										<tr>
											<td><?= $data['kode_gejala']; ?></td>
											<td><?= $data['gejala']; ?></td>
											<td><input type='checkbox' value="<?= $data['kode_gejala']; ?>" name="kode_gejala[]" /></td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Kode Gejala</th>
										<th>Gejala</th>
										<th>Ya</th>
									</tr>
								</tfoot>
							</table>
							<button type="submit" name="submit" class="btn btn-lg btn-success px-6" role="button">Submit</button>
						</form>
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