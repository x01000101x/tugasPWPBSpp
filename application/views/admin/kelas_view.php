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
						<a href="<?= base_url('admin/Master') ?>">
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
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c2">
						<a href="">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-home"></i>
									</div>
									<div class="text">

										<h2><?= $total_kelas; ?></h2>

										<span>Total Kelas</span>
									</div>
								</div>
								<div class="overview-chart">
									<!-- <canvas id="widgetChart2"></canvas> -->
								</div>
							</div>
					</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c3">
						<a href="<?= base_url('admin/Keahlian') ?>">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-laptop"></i>
									</div>
									<div class="text">
										<h2><?= $total_keahlian ?></h2>
										<span>Kompetensi Keahlian</span>
									</div>
								</div>
								<div class="overview-chart">
									<!-- <canvas id="widgetChart3"></canvas> -->
								</div>
							</div>
					</div>
				</div>
				</a>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<h2 class="title-1 m-b-25">List Kelas</h2> <!-- Button trigger modal -->
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
									<th>Kelas</th>
									<th>Kompetensi Keahlian</th>
									<th>Aksi</th>

								</tr>
							</thead>
							<tbody>

								<?php
								$count = 0;
								foreach ($data_kelas as $kelas) :
									$count = $count + 1; ?>


									<tr>

										<td><?= $count; ?></td>
										<td><?= $kelas->nama_kelas; ?></td>
										<td><?php $kelas->id_kk;
											$this->db->select('nama_kk');
											$this->db->from('kompetensi_keahlian');
											$this->db->where('id_kk =', $kelas->id_kk);
											// $this->db->join('kelas', 'kelas.id_kk = kompetensi_keahlian.id_kk');
											$query = $this->db->get();
											// print_r($query->result());
											$jnck = $query->result_array();
											foreach ($jnck as $asw) {
												echo $asw['nama_kk'];
											}


											?></td>
										<td>
											<!-- Button trigger modal edit-->

											<button type="button" class="btn btn-warning" name="edit" data-toggle="modal" data-target="#editmodal<?= $kelas->id_kelas; ?>">
												Edit
											</button>
											<!-- Button trigger modal hapus -->
											<button type="button" name="hapus" class="btn btn-danger" data-toggle="modal" data-target="#hapusmodal<?= $kelas->id_kelas; ?>">
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
				<h5 class="modal-title" id="tambahmodal">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/KelasController/Tambah') ?>" method="POST">
					<div class="form-group">
						<label for="exampleFormControlInput1">Kelas</label>
						<input type="text" name="nama_kelas" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Kelas contoh : (12 RPL 2)" required>
					</div>
					<div class="form-group">
						<label for="tambah">Kompetensi Keahlian</label>
						<select class="form-control" name="id_kk" id="exampleFormControlSelect1" required>
							<?php foreach ($data_keahlian as $keahlian) : ?>
								<option value="<?= intval($keahlian->id_kk) ?>">

									<?php
									$this->db->select('nama_kk');
									$this->db->from('kompetensi_keahlian');
									$this->db->where('id_kk =', $keahlian->id_kk);
									// $this->db->join('kelas', 'kelas.id_kk = kompetensi_keahlian.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['nama_kk'];
									}



									?></option>
							<?php endforeach; ?>
						</select>
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
<?php foreach ($data_kelas as $kelas) : ?>
	<div class="modal fade" id="editmodal<?= $kelas->id_kelas; ?>" name="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editmodal">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/KelasController/Edit/') . $kelas->id_kelas ?>" method="POST">

						<div class="form-group">
							<label for="nama_kelas">Kelas</label>
							<input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $kelas->nama_kelas ?>">
						</div>
						<div class="form-group">
							<label for="id_kk">id_kk</label>
							<select class="form-control" name="id_kk" id="exampleFormControlSelect1" required>
								<option value="<?= intval($kelas->id_kk) ?>">

									<?php
									$this->db->select('nama_kk');
									$this->db->from('kompetensi_keahlian');
									$this->db->where('id_kk =', $kelas->id_kk);
									// $this->db->join('kelas', 'kelas.id_kk = kompetensi_keahlian.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['nama_kk'];
									}



									?></option>
								<?php foreach ($data_keahlian as $keahlian) : ?>
									<option value="<?= intval($keahlian->id_kk) ?>">

										<?php
										$this->db->select('nama_kk');
										$this->db->from('kompetensi_keahlian');
										$this->db->where('id_kk =', $keahlian->id_kk);
										// $this->db->join('kelas', 'kelas.id_kk = kompetensi_keahlian.id_kk');
										$query = $this->db->get();
										// print_r($query->result());
										$jnck = $query->result_array();
										foreach ($jnck as $asw) {
											echo $asw['nama_kk'];
										}



										?></option>
								<?php endforeach; ?>
							</select>
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
<?php foreach ($data_kelas as $kelas) : ?>

	<div class="modal fade" name="hapusmodal" id="hapusmodal<?= $kelas->id_kelas; ?>" tabindex="-1" aria-labelledby="hapusmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 style="color: red;" class="modal-title" id="hapusmodal">!!WARNING!!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/KelasController/Delete/') . $kelas->id_kelas ?>" method="POST">
						<h5 style="color: black;">Apakah Anda yakin akan menghapus kelas <?= $kelas->nama_kelas; ?>?</h5>
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
