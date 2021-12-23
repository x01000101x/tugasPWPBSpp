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
										<td>
											<!-- Button trigger modal edit-->

											<button type="button" class="btn btn-warning" name="edit" data-toggle="modal" data-target="#editmodal<?= $login->id_login; ?>">
												Edit
											</button>
											<!-- Button trigger modal hapus -->
											<button type="button" name="hapus" class="btn btn-danger" data-toggle="modal" data-target="#hapusmodal<?= $login->id_login; ?>">
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
				<h5 class="modal-title" id="tambahmodal">Edit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/Overview/Tambah') ?>" method="POST">
					<div class="form-group">
						<label for="exampleFormControlInput1">Username</label>
						<input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username..." required>
					</div>
					<div class="form-group">
						<label for="edit">Password</label>
						<input type="password" name="password" class="form-control" id="edit" placeholder="Masukkan password..." required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Level</label>
						<select class="form-control" name="level" id="exampleFormControlSelect1" required>
							<option>admin</option>
							<option>petugas</option>
							<option>siswa</option>
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
<?php foreach ($data_login as $login) : ?>
	<div class="modal fade" id="editmodal<?= $login->id_login; ?>" name="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editmodal">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/Overview/Edit/') . $login->id_login ?>" method="POST">

						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" value="<?= $login->username ?>">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" class="form-control" id="password" name="password" value="<?= $login->password ?>">
						</div>
						<div class="form-group">
							<label for="level">Level</label>
							<select class="form-control" name="level" id="level">
								<option><?= $login->level ?></option>
								<option>admin</option>
								<option>petugas</option>
								<option>siswa</option>
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
<?php foreach ($data_login as $login) : ?>

	<div class="modal fade" name="hapusmodal" id="hapusmodal<?= $login->id_login; ?>" tabindex="-1" aria-labelledby="hapusmodal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 style="color: red;" class="modal-title" id="hapusmodal">!!WARNING!!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/Overview/Delete/') . $login->id_login ?>" method="POST">
						<h5 style="color: black;">Apakah Anda yakin akan menghapus akun <?= $login->username; ?> (<?= $login->level; ?>)?</h5>
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
