<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1">overview</h2>


					</div>
				</div>
			</div>
			<div class="row m-t-25">
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c1">
						<div class="overview__inner">
							<div class="overview-box clearfix">
								<div class="icon">
									<i class="zmdi zmdi-account-o"></i>
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
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c2">
						<div class="overview__inner">
							<div class="overview-box clearfix">
								<div class="icon">
									<i class="zmdi zmdi-account-o"></i>
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
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c3">
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
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<h2 class="title-1 m-b-25">Akun Terdaftar</h2>
					<div class="table-responsive table--no-card m-b-40">
						<table class="table table-borderless table-striped table-earning">
							<thead>
								<tr>
									<th>No</th>
									<th>Username</th>
									<th>Level</th>
									<th>Aksi</th>

								</tr>
							</thead>
							<tbody>


								<?php
								$count = 0;
								foreach ($data_login as $login) :
									$count = $count + 1; ?>


									<tr>

										<td><?= $count; ?></td>
										<td><?= $login->username; ?></td>
										<td><?= $login->level; ?></td>
										<td><button class="btn btn-warning">Edit</button> <button class="btn btn-danger">Hapus</button></td>


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
