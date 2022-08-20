<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Admin</h1>

				</div>

				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Admin</li>
					</ol>
				</div>

			</div>

		</div>
		<button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-default">
			<i class="fas fa-plus"></i>
			Tambah Admin
		</button>
		<?php
		if ($this->session->userdata('success')) {
		?>
			<div class="callout callout-success">
				<h5>Sukses!</h5>
				<p><?= $this->session->userdata('success') ?></p>
			</div>
		<?php
		}
		?>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Admin</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Admin</th>
										<th>Alamat Admin</th>
										<th>No Hp Admin</th>
										<th class="text-center">Akun Admin</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($admin as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->name_adm ?></td>
											<td><?= $value->address_adm ?></td>
											<td><?= $value->no_phoneadm ?></td>
											<td class="text-center"><span class="badge badge-warning"><?= $value->useradm ?></span> | <span class="badge badge-success"><?= $value->passadm ?></span></td>
											<td class="text-center">
												<div class="btn-group">
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_admin ?>" class="btn btn-warning">Edit</button>
													<a href="<?= base_url('Admin/cAdmin/delete/' . $value->id_admin) ?>" class="btn btn-danger">Hapus</a>
												</div>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama Admin</th>
										<th>Alamat Admin</th>
										<th>No Hp Admin</th>
										<th class="text-center">Akun Admin</th>
										<th class="text-center">Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<form action="<?= base_url('Admin/cAdmin/insertAdmin') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Masukkan Data Admin</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Admin</label>
						<input type="text" name="nama" class="form-control" placeholder="Enter ..." required>
					</div>
					<div class="form-group">
						<label>Alamat Admin</label>
						<input type="text" name="alamat" class="form-control" placeholder="Enter ..." required>
					</div>
					<div class="form-group">
						<label>No Telepon Admin</label>
						<input type="text" name="no_hp" class="form-control" placeholder="Enter ..." required>
					</div>
					<div class="form-group">
						<label>Username Admin</label>
						<input type="text" name="username" class="form-control" placeholder="Enter ..." required>
					</div>
					<div class="form-group">
						<label>Password Admin</label>
						<input type="text" name="password" class="form-control" placeholder="Enter ..." required>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php
foreach ($admin as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_admin ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('Admin/cAdmin/updateAdmin/' . $value->id_admin) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Masukkan Data Admin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Admin</label>
							<input type="text" name="nama" value="<?= $value->name_adm ?>" class="form-control" placeholder="Enter ..." required>
						</div>
						<div class="form-group">
							<label>Alamat Admin</label>
							<input type="text" name="alamat" value="<?= $value->address_adm ?>" class="form-control" placeholder="Enter ..." required>
						</div>
						<div class="form-group">
							<label>No Telepon Admin</label>
							<input type="text" name="no_hp" value="<?= $value->no_phoneadm ?>" class="form-control" placeholder="Enter ..." required>
						</div>
						<div class="form-group">
							<label>Username Admin</label>
							<input type="text" name="username" value="<?= $value->useradm ?>" class="form-control" placeholder="Enter ..." required>
						</div>
						<div class="form-group">
							<label>Password Admin</label>
							<input type="text" name="password" value="<?= $value->passadm ?>" class="form-control" placeholder="Enter ..." required>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php
}
?>

<!-- /.modal -->