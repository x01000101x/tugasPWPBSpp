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
						<a href="<?= base_url('admin/Murid') ?>">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-account-o"></i>
										<!-- <img style="height: 60px;" src="https://64.media.tumblr.com/10670d091bbf0eb283bf7b7209859a89/tumblr_pqyopeeRtB1u6w1edo1_400.gifv" alt=""> -->
									</div>
									<div class="text">
										<h2><?php $this->db->where('nisn >=', 0);
											$query = $this->db->get('siswa');
											echo $query->num_rows(); ?></h2>
										<span>Siswa</span>
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
						<a href="<?= base_url('admin/PetugasSpp') ?>">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-account-o"></i>
										<!-- <img style="height: 60px;" src="https://i.gifer.com/Dtf.gif"> -->
									</div>
									<div class="text">
										<h2>
											<h2><?php $this->db->where('id_petugas >=', 0);
												$query = $this->db->get('petugas');
												echo $query->num_rows(); ?></h2>
										</h2>
										<span>Petugas</span>
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
						<a href="<?= base_url('admin/PembayaranSpp') ?>">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-money"></i>
									</div>
									<div class="text">
										<h2><?php
											// $sql = "SELECT SUM(u.nominal) FROM siswa s INNER JOIN spp u ON u.id_spp = s.id_spp";
											// $query = $this->db->query($sql);
											// print_r($query); 

											// $query = $this->db->query("SELECT SUM(u.nominal) FROM siswa s INNER JOIN spp u ON u.id_spp = s.id_spp")->row()->nominal;
											// echo $query;

											foreach ($minus_pembayaran as $key => $val) {
												echo rupiah($val["SUM(spp.nominal - pembayaran.jumlah_bayar)"]);
											}



											?></h2>
										<span>Total Tunggakan SPP</span>
									</div>
								</div>
								<div class="overview-chart">
									<!-- <canvas id="widgetChart3"></canvas> -->
								</div>
							</div>
					</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c4">
						<a href="<?= base_url('admin/PembayaranSpp') ?>">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-money"></i>


									</div>
									<div class="text">
										<h2> <?php
												foreach ($summer_pembayaran as $key => $value) {
													echo rupiah($value["SUM(jumlah_bayar)"]);
												}

												// var_dump($summer_pembayaran);
												?></h2>
										<span>Total SPP Terbayar</span>
									</div>
								</div>
								<div class="overview-chart">
									<!-- <canvas id="widgetChart4"></canvas> -->
								</div>
							</div>
					</div>
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<h2 class="title-1 m-b-25">Petugas SMKN 4</h2> <!-- Button trigger modal -->
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
									<th>Nama</th>
									<th>Akun</th>
									<th>Aksi</th>

								</tr>
							</thead>
							<tbody>


								<?php
								$count = 0;
								foreach ($data_petugas as $petugas) :
									$count = $count + 1; ?>


									<tr>

										<td><?= $count; ?></td>
										<td><?= $petugas->nama_petugas; ?></td>
										<td><?php $this->db->select('username');
											$this->db->from('login');
											$this->db->where('id_login =', $petugas->id_login);
											// $this->db->join('login', 'kelas.id_kk = kompetensi_siswa.id_kk');
											$query = $this->db->get();
											// print_r($query->result());
											$jnck = $query->result_array();
											foreach ($jnck as $asw) {
												echo $asw['username'];
											} ?></td>
										<td>
											<!-- Button trigger modal edit-->

											<button type="button" class="btn btn-warning" name="edit" data-toggle="modal" data-target="#editmodal<?= $petugas->id_petugas; ?>">
												Edit
											</button>
											<!-- Button trigger modal hapus -->
											<button type="button" name="hapus" class="btn btn-danger" data-toggle="modal" data-target="#hapusmodal<?= $petugas->id_petugas; ?>">
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
<?php foreach ($data_petugas as $petugas) : ?>
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
					<form action="<?= base_url('admin/PetugasSpp/Tambah') ?>" method="POST">
						<div class="form-group">
							<label for="exampleFormControlInput1">Nama Petugas</label>
							<input type="text" name="nama_petugas" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama petugas..." required>
						</div>
						<div class="form-group">
							<label for="petugas">Akun</label>
							<select class="form-control" name="id_login" id="id_login" required>
								<?php foreach ($data_login as $login) : ?>
									<option value="<?= intval($login->id_login) ?>">

										<?php
										$this->db->select('username');
										$this->db->from('login');
										$this->db->where('id_login =', $login->id_login);
										// $this->db->join('spp', 'spp.id_kk = kompetensi_siswa.id_kk');
										$query = $this->db->get();
										// print_r($query->result());
										$jnck = $query->result_array();
										foreach ($jnck as $asw) {
											echo $asw['username'];
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


<?php endforeach; ?>
<!-- Modal Edit -->
<?php foreach ($data_petugas as $petugas) : ?>
	<div class="modal fade" id="editmodal<?= $petugas->id_petugas; ?>" name="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editmodal">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/PetugasSpp/Edit/') . $petugas->id_petugas ?>" method="POST">

						<div class="form-group">
							<label for="nama_petugas">Nama Petugas</label>
							<input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $petugas->nama_petugas ?>">
						</div>
						<div class="form-group">
							<label for="petugas">Akun</label>
							<select class="form-control" name="id_login" id="id_login" required>
								<option selected value="<?= intval($petugas->id_login) ?>">

									<?php
									$this->db->select('username');
									$this->db->from('login');
									$this->db->where('id_login =', $petugas->id_login);
									// $this->db->join('spp', 'spp.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['username'];
									}



									?></option>
								<?php foreach ($data_login as $login) : ?>
									<option value="<?= intval($login->id_login) ?>">

										<?php
										$this->db->select('username');
										$this->db->from('login');
										$this->db->where('id_login =', $login->id_login);
										// $this->db->join('spp', 'spp.id_kk = kompetensi_siswa.id_kk');
										$query = $this->db->get();
										// print_r($query->result());
										$jnck = $query->result_array();
										foreach ($jnck as $asw) {
											echo $asw['username'];
										}



										?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>
<?php endforeach;
?>



<!-- Modal Hapus -->
<?php foreach ($data_petugas as $petugas) : ?>

	<div class="modal fade" name="hapusmodal" id="hapusmodal<?= $petugas->id_petugas; ?>" tabindex="-1" aria-labelledby="hapusmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 style="color: red;" class="modal-title" id="hapusmodal">!!WARNING!!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/PetugasSpp/Delete/') . $petugas->id_petugas ?>" method="POST">
						<h5 style="color: black;">Apakah Anda yakin akan menghapus petugas dengan nama = <?= $petugas->nama_petugas; ?>?</h5>
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
