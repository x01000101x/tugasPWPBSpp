<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1">Menu</h2>

					</div>
				</div>
			</div>
			<div class="row m-t-25">
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c1">
						<a href="">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-file"></i>
									</div>
									<div class="text">
										<h2><?= $total_spp; ?></h2>
										<span>SPP</span>
									</div>
								</div>
								<div class="overview-chart">
									<!-- <canvas id="widgetChart1"></canvas> -->
								</div>
							</div>
					</div>
					</a>
				</div>


				</a>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<h2 class="title-1 m-b-25">SPP</h2> <!-- Button trigger modal -->
					<div class="text-right">

						<button type="button" class="btn btn-primary" name="tambah" data-toggle="modal" data-target="#tambahmodal">
							Tambah data
						</button><br><br>

					</div>
					<div class="table-responsive table--no-card m-b-40">
						<table class="table table-borderless table-striped table-earning">
							<thead>
								<tr>
									<th>No</th>
									<th>Periode</th>
									<th>Nominal</th>
									<th>Aksi</th>

								</tr>
							</thead>
							<tbody>

								<?php
								$count = 0;
								foreach ($data_spp as $spp) :
									$count = $count + 1; ?>


									<tr>

										<td><?= $count; ?></td>
										<td><?= $spp->tahun; ?></td>
										<td><?= rupiah($spp->nominal); ?></td>
										<td>
											<!-- Button trigger modal edit-->

											<button type="button" class="btn btn-warning" name="edit" data-toggle="modal" data-target="#editmodal<?= $spp->id_spp; ?>">
												Edit
											</button>
											<!-- Button trigger modal hapus -->
											<button type="button" name="hapus" class="btn btn-danger" data-toggle="modal" data-target="#hapusmodal<?= $spp->id_spp; ?>">
												Hapus
											</button>
										</td>


									</tr>
								<?php endforeach; ?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="tambahmodal" name="tambahmodal" tabindex="-1" aria-labelledby="tambahmodal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahmodal">Tambah data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/MasterPetugas/Tambah') ?>" method="POST">
					<div class="form-group">
						<label for="exampleFormControlInput1">periode</label>
						<input type="text" name="tahun" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Periode contoh : (2021/2022)" required>
					</div>
					<div class="form-group">
						<label for="tambah">nominal</label>
						<input type="number" name="nominal" class="form-control" id="edit" placeholder="Masukkan nominal..." required>
					</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal Edit -->
<?php foreach ($data_spp as $spp) : ?>
	<div class="modal fade" id="editmodal<?= $spp->id_spp; ?>" name="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editmodal">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/MasterPetugas/Edit/') . $spp->id_spp ?>" method="POST">

						<div class="form-group">
							<label for="tahun">periode</label>
							<input type="text" class="form-control" id="tahun" name="tahun" value="<?= $spp->tahun ?>">
						</div>
						<div class="form-group">
							<label for="nominal">nominal</label>
							<input type="text" class="form-control" id="nominal" name="nominal" value="<?= $spp->nominal ?>">
						</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>

				</form>

			</div>
		</div>
	</div>
<?php endforeach;
?>



<!-- Modal Hapus -->
<?php foreach ($data_spp as $spp) : ?>

	<div class="modal fade" name="hapusmodal" id="hapusmodal<?= $spp->id_spp; ?>" tabindex="-1" aria-labelledby="hapusmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 style="color: red;" class="modal-title" id="hapusmodal">!!WARNING!!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/MasterPetugas/Delete/') . $spp->id_spp ?>" method="POST">
						<h5 style="color: black;">Apakah Anda yakin akan menghapus periode <?= $spp->tahun; ?> (<?= rupiah($spp->nominal); ?>)?</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
