<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1">Selamat Datang, <?php

															$fag = $this->session->userdata('siswa');
															echo $fag['username'];
															?></h2>

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
									</div>
									<div class="text">
										<h2><?php
											$this->db->select('c.nominal, d.jumlah_bayar');
											$this->db->from('login a');
											$this->db->join('siswa b', 'b.id_login=a.id_login',);
											$this->db->join('spp c', 'c.id_spp=b.id_spp');
											$this->db->join('pembayaran d', 'd.nisn=b.nisn');
											$this->db->where('a.username', $fag['username']);
											$query = $this->db->get();
											$anj = $query->result_array();
											foreach ($anj as $val) {
												// print_r($val['jumlah_bayar']);
												$math = intval($val['nominal']) - intval($val['jumlah_bayar']);
												echo rupiah($math);
											}
											?></h2>
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

			</div>

			<div class="row">
				<div class="col-lg-12">
					<h2 class="title-1 m-b-25">Akun Terdaftar</h2> <!-- Button trigger modal -->
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
												if (intval($asw['nominal']) - $pembayaran->jumlah_bayar != "0") {
													echo '<button type="button" class="btn btn-danger">' . rupiah(intval($asw['nominal']) - $pembayaran->jumlah_bayar) . '</button>';
												} else {
													echo '<button type="button" class="btn btn-success">Lunas</button>';
												}
											} ?></td>

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
