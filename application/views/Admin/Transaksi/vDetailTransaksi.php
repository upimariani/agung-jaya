<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> <?= $detail['transaksi']->id_order ?>
                                    <small class="float-right">Date: <?= date('Y-m-d') ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <h4><?= $detail['transaksi']->name_cust ?></h4>
                                <p>Tanggal Order. <?= $detail['transaksi']->tgl_order ?></p>
                                <p>Pengiriman : <?= $detail['transaksi']->alamat ?>, <?= $detail['transaksi']->nama_kecamatan ?></p>
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
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
                                                <td class="price-col"><?= $value->qty ?></td>

                                                <td class="total">Rp. <?= number_format($value->qty * ($value->price_prod - ($value->disc / 100 * $value->price_prod))) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">

                            </div>
                            <!-- /.col -->
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>Rp. <?= number_format($detail['transaksi']->total_order - $detail['transaksi']->ongkir) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>Rp. <?= number_format($detail['transaksi']->ongkir) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td><strong>Rp. <?= number_format($detail['transaksi']->total_order) ?></strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                                <?php
                                if ($detail['transaksi']->status_order == '1') {
                                ?>
                                    <a href="<?= base_url('Admin/cMenungguKonfirmasi/konfirmasi/' . $detail['transaksi']->id_order) ?>" class="btn btn-warning"><i class="fas fa-thumbs-up"></i> Konfirmasi</a>
                                <?php
                                } else if ($detail['transaksi']->status_order == '2') {
                                ?>
                                    <a href="<?= base_url('Admin/cDikirim/kirim/' . $detail['transaksi']->id_order) ?>" class="btn btn-info"><i class="fas fa-truck"></i> Kirim</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>