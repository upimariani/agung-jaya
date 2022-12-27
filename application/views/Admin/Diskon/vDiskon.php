<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Diskon Produk</h1>

				</div>

				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Diskon</li>
					</ol>
				</div>

			</div>

		</div><!-- /.container-fluid -->
		<a href="<?= base_url('Admin/cDiskon/createDiskon') ?>" class="btn btn-app">
			<i class="fas fa-plus"></i> Tambah Diskon
		</a>
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
							<h3 class="card-title">Informasi Diskon</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Produk</th>
										<th>Nama Diskon</th>
										<th>Besar Diskon</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Selesai</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($diskon as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->name_prod ?></td>
											<td><?= $value->name_disc ?></td>
											<td><?= $value->disc ?> %</td>
											<td><?= $value->tgl_start ?></td>
											<td><?= $value->tgl_end ?></td>
											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cDiskon/edit/' . $value->id_disc) ?>" class="btn btn-warning">Edit</a>
													<a href="<?= base_url('Admin/cDiskon/delete/' . $value->id_produk) ?>" class="btn btn-danger">Hapus</a>
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
										<th>Nama Produk</th>
										<th>Nama Diskon</th>
										<th>Besar Diskon</th>
										<th>Tanggal Selesai</th>
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
