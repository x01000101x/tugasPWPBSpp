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
										<!-- <img style="height: 60px;" src="https://lh3.googleusercontent.com/proxy/mrafnVhBXPJvzzY2aqnZr_aKvoFNKPybEcdZ8bARTDNFBoqisoR8PuaZgvcfp3r-beMAZ9l0J_lbXOTTKlmdxfNJRhhAYuXqycqsznyunTxBC9RkzxKwiuGE"> -->

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
						</a>
					</div>
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
					<h2 class="title-1 m-b-25">Siswa SMKN 4</h2> <!-- Button trigger modal -->
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
									<th>NISN</th>
									<th>NIS</th>
									<th>Nama</th>
									<th>Kelas</th>
									<th>Alamat</th>
									<th>No telepon</th>
									<th>Tunggakan SPP</th>
									<th>Nama Akun</th>
									<th>Aksi</th>

								</tr>
							</thead>
							<tbody>


								<?php
								$count = 0;
								foreach ($data_siswa as $siswa) :
									$count = $count + 1; ?>


									<tr>

										<td><?= $count; ?></td>
										<td><?= $siswa->nisn; ?></td>
										<td><?= $siswa->nis; ?></td>
										<td><?= $siswa->nama; ?></td>
										<td><?php $this->db->select('nama_kelas');
											$this->db->from('kelas');
											$this->db->where('id_kelas =', $siswa->id_kelas);
											// $this->db->join('kelas', 'kelas.id_kk = kompetensi_siswa.id_kk');
											$query = $this->db->get();
											// print_r($query->result());
											$jnck = $query->result_array();
											foreach ($jnck as $asw) {
												echo $asw['nama_kelas'];
											} ?></td>
										<td><?= $siswa->alamat; ?></td>
										<td><?= $siswa->no_telp; ?></td>
										<td><?php $this->db->select('nominal');
											$this->db->from('spp');
											$this->db->where('id_spp =', $siswa->id_spp);
											// $this->db->join('kelas', 'kelas.id_kk = kompetensi_keahlian.id_kk');
											$query = $this->db->get();
											// print_r($query->result());
											$jnck = $query->result_array();
											foreach ($jnck as $asw) {
												echo rupiah($asw['nominal']);
											} ?></td>
										<td><?php $this->db->select('username');
											$this->db->from('login');
											$this->db->where('id_login =', $siswa->id_login);
											// $this->db->join('kelas', 'kelas.id_kk = kompetensi_keahlian.id_kk');
											$query = $this->db->get();
											// print_r($query->result());
											$jnck = $query->result_array();
											foreach ($jnck as $asw) {
												echo $asw['username'];
											} ?></td>

										<td>
											<!-- Button trigger modal edit-->

											<button type="button" class="btn btn-warning" name="edit" data-toggle="modal" data-target="#editmodal<?= $siswa->nisn; ?>">
												Edit
											</button>
											<!-- Button trigger modal hapus -->
											<button type="button" name="hapus" class="btn btn-danger" data-toggle="modal" data-target="#hapusmodal<?= $siswa->nisn; ?>">
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
				<form action="<?= base_url('admin/Murid/Tambah') ?>" method="POST">
					<div class="form-group">
						<label for="exampleFormControlInput1">NISN</label>
						<input type="text" name="nisn" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nisn..." required>
					</div>
					<div class="form-group">
						<label for="nis">NIS</label>
						<input type="text" name="nis" class="form-control" id="nis" placeholder="Masukkan nis..." required>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama..." required>
					</div>
					<div class="form-group">
						<label for="kelas">Kelas</label>
						<select class="form-control" name="id_kelas" id="id_kelas" required>
							<?php foreach ($data_kelas as $kelas) : ?>
								<option value="<?= intval($kelas->id_kelas) ?>">

									<?php
									$this->db->select('nama_kelas');
									$this->db->from('kelas');
									$this->db->where('id_kelas =', $kelas->id_kelas);
									// $this->db->join('kelas', 'kelas.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['nama_kelas'];
									}



									?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat..." required>
					</div>
					<div class="form-group">
						<label for="no_telp">Nomor Telepon</label>
						<input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Masukkan nomor telp..." required>
					</div>
					<div class="form-group">
						<label for="spp">Periode SPP</label>
						<select class="form-control" name="id_spp" id="id_spp" required>
							<?php foreach ($data_spp as $spp) : ?>
								<option value="<?= intval($spp->id_spp) ?>">

									<?php
									$this->db->select('tahun');
									$this->db->from('spp');
									$this->db->where('id_spp =', $spp->id_spp);
									// $this->db->join('spp', 'spp.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['tahun'];
									}



									?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="login">Akun</label>
						<select class="form-control" name="id_login" id="id_login" required>
							<?php foreach ($data_login as $login) : ?>
								<option value="<?= intval($login->id_login) ?>">

									<?php
									$this->db->select('username');
									$this->db->from('login');
									$this->db->where('id_login =', $login->id_login);
									// $this->db->join('login', 'login.id_kk = kompetensi_siswa.id_kk');
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



<!-- Modal Edit -->
<?php foreach ($data_siswa as $siswa) : ?>
	<div class="modal fade" id="editmodal<?= $siswa->nisn; ?>" name="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editmodal">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/Murid/Edit/') . $siswa->nisn ?>" method="POST">

						<div class="form-group">
							<label for="nisn">NISN</label>
							<input type="text" class="form-control" id="nisn" name="nisn" value="<?= $siswa->nisn ?>">
						</div>
						<div class="form-group">
							<label for="nis">NIS</label>
							<input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa->nis ?>">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa->nama ?>">
						</div>
						<div class="form-group">
							<label for="kelas">Kelas</label>
							<select class="form-control" name="id_kelas" id="id_kelas" required>
								<option selected value="<?= intval($siswa->id_kelas) ?>">

									<?php
									$this->db->select('nama_kelas');
									$this->db->from('kelas');
									$this->db->where('id_kelas =', $siswa->id_kelas);
									// $this->db->join('kelas', 'kelas.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['nama_kelas'];
									}

									?></option>
								<?php foreach ($data_kelas as $kelas) : ?>
									<option value="<?= intval($kelas->id_kelas) ?>">

										<?php
										$this->db->select('nama_kelas');
										$this->db->from('kelas');
										$this->db->where('id_kelas =', $kelas->id_kelas);
										// $this->db->join('kelas', 'kelas.id_kk = kompetensi_siswa.id_kk');
										$query = $this->db->get();
										// print_r($query->result());
										$jnck = $query->result_array();
										foreach ($jnck as $asw) {
											echo $asw['nama_kelas'];
										}

										?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa->alamat ?>">
						</div>
						<div class="form-group">
							<label for="no_telp">Nomor Telepon</label>
							<input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $siswa->no_telp ?>">
						</div>
						<div class="form-group">
							<label for="spp">Periode SPP</label>
							<select class="form-control" name="id_spp" id="id_spp" required>
								<option selected value="<?= intval($siswa->id_spp) ?>">

									<?php
									$this->db->select('tahun');
									$this->db->from('spp');
									$this->db->where('id_spp =', $siswa->id_spp);
									// $this->db->join('spp', 'spp.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['tahun'];
									}



									?></option>
								<?php foreach ($data_spp as $spp) : ?>
									<option value="<?= intval($spp->id_spp) ?>">

										<?php
										$this->db->select('tahun');
										$this->db->from('spp');
										$this->db->where('id_spp =', $spp->id_spp);
										// $this->db->join('spp', 'spp.id_kk = kompetensi_siswa.id_kk');
										$query = $this->db->get();
										// print_r($query->result());
										$jnck = $query->result_array();
										foreach ($jnck as $asw) {
											echo $asw['tahun'];
										}



										?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="login">Akun</label>
							<select class="form-control" name="id_login" id="id_login" required>
								<option selected value="<?= intval($siswa->id_login) ?>">
									<?php
									$this->db->select('username');
									$this->db->from('login');
									$this->db->where('id_login =', $siswa->id_login);
									// $this->db->join('login', 'login.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$abc = $query->row();
									// foreach ($abc as $aaa) {
									echo $abc->username;
									// var_dump($aaa['username']);
									// }



									?></option>
								<?php foreach ($data_login as $login) : ?>

									<option value="<?= intval($login->id_login) ?>">

										<?php
										$this->db->select('username');
										$this->db->from('login');
										$this->db->where('id_login =', $login->id_login);
										// $this->db->join('login', 'login.id_kk = kompetensi_siswa.id_kk');
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
<?php endforeach;
?>



<!-- Modal Hapus -->
<?php foreach ($data_siswa as $siswa) : ?>

	<div class="modal fade" name="hapusmodal" id="hapusmodal<?= $siswa->nisn; ?>" tabindex="-1" aria-labelledby="hapusmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 style="color: red;" class="modal-title" id="hapusmodal">!!WARNING!!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/Murid/Delete/') . $siswa->nisn ?>" method="POST">
						<h5 style="color: black;">Apakah Anda yakin akan menghapus siswa dengan NISN <?= $siswa->nisn; ?> (<?= $siswa->nama; ?>)?</h5>
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
