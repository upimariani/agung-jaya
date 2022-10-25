<!-- Page Add Section Begin -->
<section class="page-add cart-page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Detail Pesanan<span>.</span></h2>
                    <a href="#">Home</a>
                    <a class="active" href="#">Detail Pesanan</a>
                </div>
            </div>
            <div class="col-lg-8">
                <img src="img/add.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Page Add Section End -->

<!-- Cart Page Section Begin -->
<div class="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2><?= $detail['transaksi']->id_order ?><span>.</span></h2>
                    <p>Tanggal Order. <?= $detail['transaksi']->tgl_order ?></p>
                    <p>Pengiriman : <?= $detail['transaksi']->alamat ?>, <?= $detail['transaksi']->nama_kecamatan ?></p>

                </div>
            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <?php
                if ($detail['transaksi']->status_order == '0') {
                ?>
                    <?php echo form_open_multipart('Pelanggan/cPesananSaya/bayar/' . $detail['transaksi']->id_order); ?>
                    <p class="text-right">Transfer Bank BRI No.Rek 0123-4322-1234</p>
                    <p class="text-right">Masukkan Bukti Pembayaran Anda</p>
                    <input type="file" name="bukti" class="form-control">
                    <button type="submit" class="btn btn-success mt-3">Upload</button>
                    </form>
                <?php
                }
                ?>

            </div>
        </div>
        <div class="cart-table">
            <table>
                <thead>
                    <tr>
                        <th class="product-h">Nama Produk</th>
                        <th class="product-h">Harga</th>
                        <th>Quantity</th>
                        <th class="quan">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($detail['pesanan'] as $key => $value) {
                    ?>
                        <tr>
                            <td class="product-col">
                                <div class="p-title">
                                    <h5><?= $value->name_prod ?></h5>
                                </div>
                            </td>
                            <td>Rp. <?= number_format($value->price_prod - ($value->disc / 100 * $value->price_prod)) ?>
                            </td>
                            <td class="price-col"><?= $value->qty ?> <?= $value->ket_prod ?></td>

                            <td class="total">Rp. <?= number_format($value->qty * ($value->price_prod - ($value->disc / 100 * $value->price_prod))) ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    if ($detail['transaksi']->status_order != 0) {
                    ?>
                        <h4 class="mb-4">Bukti Pembayaran</h4>
                        <img style="width: 350px;" src="<?= base_url('asset/bukti-pembayaran/' . $detail['transaksi']->bukti_pembayaran) ?>">
                    <?php
                    }
                    ?>

                </div>
                <div class="col-lg-4">
                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td>Rp. <?= number_format($detail['transaksi']->total_order - $detail['transaksi']->ongkir) ?></td>
                        </tr>
                        <tr>
                            <td>Ongkir</td>
                            <td>Rp. <?= number_format($detail['transaksi']->ongkir) ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Rp. <?= number_format($detail['transaksi']->total_order) ?></td>
                        </tr>
                    </table>
                    <?php
                    if ($detail['transaksi']->status_order == '3') {
                    ?>
                        <div class="row">
                            <div class="col-lg-12 mt-5">
                                <a class="site-btn clear-btn" href="<?= base_url('Pelanggan/cPesananSaya/pesananDiterima/' . $detail['transaksi']->id_order) ?>">Pesanan Diterima</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page Section End -->

<!-- Logo Section Begin -->
<div class="logo-section spad">
    <div class="logo-items owl-carousel">
        <div class="logo-item">
            <img src="img/logos/logo-1.png" alt="">
        </div>
        <div class="logo-item">
            <img src="img/logos/logo-2.png" alt="">
        </div>
        <div class="logo-item">
            <img src="img/logos/logo-3.png" alt="">
        </div>
        <div class="logo-item">
            <img src="img/logos/logo-4.png" alt="">
        </div>
        <div class="logo-item">
            <img src="img/logos/logo-5.png" alt="">
        </div>
    </div>
</div>
<!-- Logo Section End -->