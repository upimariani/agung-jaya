<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Kategori Produk</h1>

				</div>

				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Kategori</li>
					</ol>
				</div>

			</div>

		</div><!-- /.container-fluid -->
		<button data-toggle="modal" data-target="#modal-default" class="btn btn-app">
			<i class="fas fa-plus"></i> Tambah Kategori
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
							<h3 class="card-title">Informasi Supplier</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Kategori</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($kategori as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->name_category ?></td>
											<td class="text-center">
												<div class="btn-group">
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_category ?>" class="btn btn-warning">Edit</button>
													<a href="<?= base_url('Admin/cKategori/delete/' . $value->id_category) ?>" class="btn btn-danger">Hapus</a>
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
										<th>Nama Kategori</th>
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
		<form action="<?= base_url('Admin/cKategori/insertKategori') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Masukkan Data Kategori Produk</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Kategori</label>
						<input type="text" name="kategori" class="form-control" placeholder="Enter ..." required>
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
foreach ($kategori as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_category ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('Admin/cKategori/updateKategori/' . $value->id_category) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Data Kategori Produk</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Kategori</label>
							<input type="text" value="<?= $value->name_category ?>" name="kategori" class="form-control" placeholder="Enter ..." required>
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
}
?>