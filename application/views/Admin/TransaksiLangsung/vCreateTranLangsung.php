<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Langsung</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi Langsung</li>
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
                            <h3 class="card-title">Masukkan Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open('Admin/cTransaksiLangsung/add_to_cart'); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Produk</label>
                                <select id="produk" class="form-control" name="produk" required>
                                    <option value="">---Pilih Produk---</option>
                                    <?php
                                    foreach ($produk as $key => $value) {
                                    ?>
                                        <option data-nama="<?= $value->name_prod ?>" data-harga="<?= $value->price_prod ?>" data-stok="<?= $value->stok_prod ?>" value="<?= $value->id_produk ?>"><?= $value->name_prod ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>

                            </div>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <input type="text" name="nama" class="nama form-control" id="exampleInputEmail1" placeholder="Enter Nama Produk" readonly>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga Produk</label>
                                <input type="text" name="harga" class="harga form-control" id="exampleInputEmail1" placeholder="Enter Harga Produk" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stok Sebelumnya</label>
                                <input type="number" name="stok" class="stok form-control" id="exampleInputEmail1" placeholder="Enter Stok Sebelumnya" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantity</label>
                                <input type="text" name="qty" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Add To Cart</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Keranjang Transaksi Langsung</h3>
                            <br>
                            <form action="<?= base_url('Admin/cTransaksiLangsung/selesai') ?>" method="POST">
                                <?php
                                $id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
                                ?>
                                <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                                <button type="submit" class="btn btn-warning">Selesai</button>

                            </form>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($this->cart->contents() as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td>Rp. <?= number_format($value['price'])  ?></td>
                                            <td><?= $value['qty'] ?></td>
                                            <td>Rp. <?= number_format($value['qty'] * $value['price'])  ?></td>
                                            <td class="text-center"><a href="<?= base_url('Admin/cTransaksiLangsung/cart_delete/' . $value['rowid']) ?>"><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <h5>Total</h5>
                                        </td>
                                        <td>Rp. <?= number_format($this->cart->total())  ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->