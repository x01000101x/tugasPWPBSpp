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

										foreach ($summer as $key => $val) {
											echo rupiah($val["SUM(spp.nominal)"]);
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
					<h2 class="title-1 m-b-25">Pembayaran SPP SMKN 4</h2> <!-- Button trigger modal -->
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
									<th>Petugas</th>
									<th>Nama / NISN</th>
									<th>Tanggal bayar</th>
									<th>Bulan</th>
									<th>Tahun</th>
									<th>SPP</th>
									<th>Jumlah bayar</th>
									<th>Tunggakan</th>
									<th>Aksi</th>

								</tr>
							</thead>
							<tbody>


								<?php
								$count = 0;
								foreach ($data_pembayaran as $pembayaran) :
									$count = $count + 1; ?>


									<tr>

										<td><?= $count; ?></td>
										<td><?php $this->db->select('nama_petugas');
											$this->db->from('petugas');
											$this->db->where('id_petugas =', $pembayaran->id_petugas);
											// $this->db->join('kelas', 'kelas.id_kk = kompetensi_siswa.id_kk');
											$query = $this->db->get();
											// print_r($query->result());
											$jnck = $query->result_array();
											foreach ($jnck as $asw) {
												echo $asw['nama_petugas'];
											} ?></td>
										<td>


											<?php
											$this->db->select('nama');
											$this->db->from('siswa');
											$this->db->where('nisn =', $pembayaran->nisn);
											// $this->db->join('nisn', 'nisn.id_kk = kompetensi_siswa.id_kk');
											$query = $this->db->get();
											// print_r($query->result());
											$jnck = $query->result_array();
											foreach ($jnck as $asw) {
												echo "<b>" . $asw['nama'] . "</b>" . "<br>" . $pembayaran->nisn;
											}

											?>

										</td>
										<td><?= $pembayaran->tgl_bayar; ?></td>
										<td><?= $pembayaran->bulan_dibayar; ?></td>
										<td><?= $pembayaran->tahun_dibayar; ?></td>
										<td><?php $this->db->select('nominal');
											$this->db->from('spp');
											$this->db->where('id_spp =', $pembayaran->id_spp);
											// $this->db->join('kelas', 'kelas.id_kk = kompetensi_pemba$pembayaran.id_kk');
											$query = $this->db->get();
											// print_r($query->result());
											$jnck = $query->result_array();
											foreach ($jnck as $asw) {
												echo rupiah($asw['nominal']);
											} ?></td>
										<td><?= rupiah($pembayaran->jumlah_bayar); ?></td>
										<td>
											<?php $this->db->select('nominal');
											$this->db->from('spp');
											$this->db->where('id_spp =', $pembayaran->id_spp);
											// $this->db->join('kelas', 'kelas.id_kk = kompetensi_pemba$pembayaran.id_kk');
											$query = $this->db->get();
											// print_r($query->result());
											$jnck = $query->result_array();
											foreach ($jnck as $asw) {
												echo rupiah(intval($asw['nominal']) - $pembayaran->jumlah_bayar);
											} ?></td>

										</td>


										<td>
											<!-- Button trigger modal edit-->

											<button type="button" class="btn btn-warning" name="edit" data-toggle="modal" data-target="#editmodal<?= $pembayaran->id_pembayaran; ?>">
												Edit
											</button>
											<!-- Button trigger modal hapus -->
											<button type="button" name="hapus" class="btn btn-danger" data-toggle="modal" data-target="#hapusmodal<?= $pembayaran->id_pembayaran; ?>">
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
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahmodal">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/PembayaranSpp/Tambah') ?>" method="POST">
					<div class="form-group">
						<label for="petugas">Petugas</label>
						<select class="form-control" name="id_petugas" id="id_petugas" required>
							<?php foreach ($data_petugas as $petugas) : ?>
								<option value="<?= intval($petugas->id_petugas) ?>">

									<?php
									$this->db->select('nama_petugas');
									$this->db->from('petugas');
									$this->db->where('id_petugas =', $petugas->id_petugas);
									// $this->db->join('petugas', 'petugas.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['nama_petugas'];
									}



									?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="nisn">NISN</label>
						<select class="form-control" name="nisn" id="nisn" required>
							<?php foreach ($data_siswa as $siswa) : ?>
								<option value="<?= intval($siswa->nisn) ?>">

									<?php
									$this->db->select('nisn, nama');
									$this->db->from('siswa');
									$this->db->where('nisn =', $siswa->nisn);
									// $this->db->join('nisn', 'nisn.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['nisn'] . " - " . $asw['nama'];
									}



									?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="tgl_bayar">Tanggal Bayar SPP</label>
						<input type="date" name="tgl_bayar" class="form-control" id="tgl_bayar" placeholder="Masukkan Tanggal..." required>
					</div>
					<div class="form-group">
						<label for="bulan_dibayar">Bulan Bayar SPP</label>
						<select class="form-control" name="bulan_dibayar" id="bulan_dibayar" required>

							<option>Januari</option>
							<option>Februari</option>
							<option>Maret</option>
							<option>April</option>
							<option>Mei</option>
							<option>Juni</option>
							<option>Juli</option>
							<option>Agustus</option>
							<option>September</option>
							<option>Oktober</option>
							<option>November</option>
							<option>Desember</option>


						</select>
					</div>
					<div class="form-group">
						<label for="tahun_dibayar">Tahun Bayar SPP</label>
						<input type="number" name="tahun_dibayar" value="2021" step="1" min="2000" max="2050" class="form-control" id="tahun_dibayar" placeholder="Masukkan Tahun..." required>
					</div>
					<div class="form-group">
						<label for="id_spp">SPP</label>
						<select class="form-control" name="id_spp" id="id_spp" required>
							<?php foreach ($data_spp as $spp) : ?>
								<option value="<?= intval($spp->id_spp) ?>">

									<?php
									$this->db->select('nominal');
									$this->db->from('spp');
									$this->db->where('id_spp =', $spp->id_spp);
									// $this->db->join('nisn', 'nisn.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['nominal'];
									}



									?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="jumlah_bayar">Jumlah bayar SPP</label>
						<input type="text" name="jumlah_bayar" class="form-control" id="jumlah_bayar" placeholder="Masukkan Jumlah Bayar..." required>
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
<?php foreach ($data_pembayaran as $pembayaran) : ?>
	<div class="modal fade" id="editmodal<?= $pembayaran->id_pembayaran; ?>" name="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editmodal">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/PembayaranSpp/Edit/') . $pembayaran->id_pembayaran ?>" method="POST">


						<div class="form-group">
							<label for="petugas">Petugas</label>
							<select class="form-control" name="id_petugas" id="id_petugas" required>
								<option selected value="<?= intval($pembayaran->id_petugas) ?>">

									<?php
									$this->db->select('nama_petugas');
									$this->db->from('petugas');
									$this->db->where('id_petugas =', $pembayaran->id_petugas);
									// $this->db->join('petugas', 'petugas.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['nama_petugas'];
									}



									?></option>
								<?php foreach ($data_petugas as $petugas) : ?>
									<option value="<?= intval($petugas->id_petugas) ?>">

										<?php
										$this->db->select('nama_petugas');
										$this->db->from('petugas');
										$this->db->where('id_petugas =', $petugas->id_petugas);
										// $this->db->join('petugas', 'petugas.id_kk = kompetensi_siswa.id_kk');
										$query = $this->db->get();
										// print_r($query->result());
										$jnck = $query->result_array();
										foreach ($jnck as $asw) {
											echo $asw['nama_petugas'];
										}



										?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="nisn">NISN/Nama</label>
							<select class="form-control" name="nisn" id="nisn" required>
								<option selected value="<?= intval($pembayaran->nisn) ?>">

									<?php
									$this->db->select('nisn, nama');
									$this->db->from('siswa');
									$this->db->where('nisn =', $pembayaran->nisn);
									// $this->db->join('nisn', 'nisn.id_kk = kompetensi_siswa.id_kk');
									$query = $this->db->get();
									// print_r($query->result());
									$jnck = $query->result_array();
									foreach ($jnck as $asw) {
										echo $asw['nisn'] . " - " . $asw['nama'];
									}



									?></option>
								<?php foreach ($data_siswa as $siswa) : ?>
									<option value="<?= intval($siswa->nisn) ?>">

										<?php
										$this->db->select('nisn, nama');
										$this->db->from('siswa');
										$this->db->where('nisn =', $siswa->nisn);
										// $this->db->join('nisn', 'nisn.id_kk = kompetensi_siswa.id_kk');
										$query = $this->db->get();
										// print_r($query->result());
										$jnck = $query->result_array();
										foreach ($jnck as $asw) {
											echo $asw['nisn'] . " - " . $asw['nama'];
										}



										?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label for="tgl_bayar">Tanggal Bayar SPP</label>
							<input type="date" name="tgl_bayar" class="form-control" id="tgl_bayar" value="<?= $pembayaran->tgl_bayar ?>" placeholder="Masukkan Tanggal..." required>
						</div>
						<div class="form-group">
							<label for="bulan_dibayar">Bulan Bayar SPP</label>
							<select class="form-control" name="bulan_dibayar" id="bulan_dibayar" value="<?= $pembayaran->bulan_dibayar ?>" required>

								<option>Januari</option>
								<option>Februari</option>
								<option>Maret</option>
								<option>April</option>
								<option>Mei</option>
								<option>Juni</option>
								<option>Juli</option>
								<option>Agustus</option>
								<option>September</option>
								<option>Oktober</option>
								<option>November</option>
								<option>Desember</option>


							</select>
						</div>
						<div class="form-group">
							<label for="tahun_dibayar">Tahun Bayar SPP</label>
							<input type="number" name="tahun_dibayar" value="2021" step="1" min="2000" max="2050" class="form-control" id="tahun_dibayar" placeholder="Masukkan Tahun..." required>
						</div>
						<div class="form-group">
							<label for="id_spp">SPP</label>
							<select class="form-control" name="id_spp" id="id_spp" required>
								<?php foreach ($data_spp as $spp) : ?>
									<option value="<?= intval($spp->id_spp) ?>">

										<?php
										$this->db->select('nominal');
										$this->db->from('spp');
										$this->db->where('id_spp =', $spp->id_spp);
										// $this->db->join('nisn', 'nisn.id_kk = kompetensi_siswa.id_kk');
										$query = $this->db->get();
										// print_r($query->result());
										$jnck = $query->result_array();
										foreach ($jnck as $asw) {
											echo $asw['nominal'];
										}



										?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="jumlah_bayar">Jumlah bayar SPP</label>
							<input type="text" name="jumlah_bayar" class="form-control" id="jumlah_bayar" placeholder="Masukkan Jumlah Bayar..." required>
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
