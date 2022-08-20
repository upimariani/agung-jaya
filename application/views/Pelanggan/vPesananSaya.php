<!-- Page Add Section Begin -->
<section class="page-add cart-page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Pesanan Saya<span>.</span></h2>
                    <a href="#">Home</a>
                    <a href="#">Dresses</a>
                    <a class="active" href="#">Night Dresses</a>
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
    <form action="<?= base_url('pelanggan/cKeranjang/updateCart') ?>" method="POST">
        <div class="container">
            <div class="cart-table">
                <table>
                    <thead>
                        <tr>
                            <th class="product-h">Id Transaksi</th>
                            <th class="product-h">Status Order</th>
                            <th>Tanggal Order</th>
                            <th class="quan">Total Bayar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pesanan as $key => $value) {
                        ?>
                            <tr>
                                <td class="product-col">
                                    <div class="p-title">
                                        <h5><?= $value->id_order ?></h5>
                                    </div>
                                </td>
                                <td><?php
                                    if ($value->status_order == '0') {
                                        echo '<span class="badge badge-danger">Belum Bayar</span>';
                                    } else if ($value->status_order == '1') {
                                        echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                    } else if ($value->status_order == '2') {
                                        echo '<span class="badge badge-info">Diproses</span>';
                                    } else if ($value->status_order == '3') {
                                        echo '<span class="badge badge-primary">Sedang Dikirim</span>';
                                    } else if ($value->status_order == '4') {
                                        echo '<span class="badge badge-success">Selesai</span>';
                                    }
                                    ?>
                                </td>
                                <td class="price-col"><?= $value->tgl_order ?></td>

                                <td class="total">Rp. <?= number_format($value->total_order) ?></td>
                                <td class="product-close"><a href="<?= base_url('pelanggan/cPesananSaya/detail_order/' . $value->id_order) ?>" class="site-btn update-btn">...</a></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
<!-- Cart Page Section End -->