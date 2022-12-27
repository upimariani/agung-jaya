<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Diskon</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Diskon</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-6">
					<!-- general form elements -->
					<div class="card card-warning">
						<div class="card-header">
							<h3 class="card-title">Masukkan Data Diskon</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?php echo form_open_multipart('Admin/cDiskon/createDiskon'); ?>
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Produk</label>
								<select class="form-control" name="produk">
									<option value="">---Pilih Produk---</option>
									<?php
									foreach ($produk as $key => $value) {
									?>
										<option value="<?= $value->id_produk ?>"><?= $value->name_prod ?></option>
									<?php
									}
									?>
								</select>
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Diskon</label>
								<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama Produk">
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Besar Diskon Produk</label>
								<input type="text" name="besar" class="form-control" id="exampleInputEmail1" placeholder="Enter Keterangan">
								<?= form_error('besar', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tanggal Mulai Diskon</label>
								<input type="date" name="tgl_mulai" value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Harga">
								<?= form_error('tgl', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tanggal Selesai Diskon</label>
								<input type="date" name="tgl" class="form-control" id="exampleInputEmail1" placeholder="Enter Harga">
								<?= form_error('tgl', '<small class="text-danger">', '</small>') ?>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (right) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->