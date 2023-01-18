<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Masukkan Data Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open_multipart('Admin/cProduk/edit/' . $produk->id_produk); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori Produk</label>
                                <select class="form-control" name="kategori">
                                    <option value="">---Pilih Kategori Produk---</option>
                                    <?php
                                    foreach ($kategori as $key => $value) {
                                    ?>
                                        <option value="<?= $value->id_category ?>" <?php if ($value->id_category == $produk->id_category) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $value->name_category ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <input type="text" name="nama" value="<?= $produk->name_prod ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama Produk">
                                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan Produk</label>
                                <input type="text" name="keterangan" value="<?= $produk->ket_prod ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Keterangan">
                                <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga Produk</label>
                                <input type="number" name="harga" value="<?= $produk->price_prod ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Harga">
                                <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stok Produk</label>
                                <input type="text" name="stok" value="<?= $produk->stok_prod ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Stok">
                                <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gambar Produk</label><br>
                                <img style="width: 120px;" src="<?= base_url('Asset/foto-produk/' . $produk->gambar) ?>">
                                <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Enter Gambar">
                            </div>
                            <hr>
                            <h5>Analisis Profiling Pelanggan Berdasarkan Umur</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Range Awal Umur</label>
                                        <input type="number" value="<?= $produk->target_awal ?>" name="awal" class="form-control" id="exampleInputEmail1" placeholder="Enter Range Awal" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Range Akhir Umur</label>
                                        <input type="number" value="<?= $produk->target_akhir ?>" name="akhir" class="form-control" id="exampleInputEmail1" placeholder="Enter Range Akhir" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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