<!-- Page Add Section Begin -->
<section class="page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Checkout<span>.</span></h2>
                </div>
            </div>
            <div class="col-lg-8">
                <img src="img/add.jpg" alt="">
            </div>

        </div>
    </div>
</section>
<!-- Page Add Section End -->

<!-- Cart Total Page Begin -->
<section class="cart-total-page spad">
    <div class="container">
        <form action="<?= base_url('pelanggan/cCheckout') ?>" method="POST" class="checkout-form">
            <?php
            $id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
            ?>
            <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
            <input type="hidden" name="total" class="tot">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Your Information</h3>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="in-name">Nama</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" value="<?= $this->session->userdata('nama') ?>" placeholder="First Name" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="in-name">Kecamatan*</p>
                        </div>
                        <div class="col-lg-10">
                            <select id="ongkir" name="ongkir" class="cart-select country-usa">
                                <?php
                                $subtotal = 0;
                                $total = 0;
                                foreach ($cart['cart'] as $key => $value) {
                                    $subtotal = $value->qty_cart * ($value->price_prod - ($value->disc / 100 * $value->price_prod));
                                    $total += $subtotal;
                                }
                                ?>

                                <option value="">Pilih Kecamatan</option>
                                <?php
                                foreach ($kecamatan as $key => $value) {
                                ?>
                                    <option data-tot="<?= $total + $value->ongkir  ?>" data-subtotal="Rp. <?= number_format($total)  ?>" data-total="Rp. <?= number_format($total + $value->ongkir)  ?>" data-ongkir="Rp. <?= number_format($value->ongkir)  ?>" value="<?= $value->id_kecamatan ?>"><?= $value->nama_kecamatan ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="in-name">Alamat Lengkap*</p>
                        </div>
                        <div class="col-lg-10">
                            <input name="alamat" type="text">
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="order-table">
                        <div class="cart-item">
                            <span>Subtotal</span>
                            <p class="subtotal"></p>
                        </div>
                        <div class="cart-item">
                            <span>Shipping</span>
                            <p class="ongkir"></p>
                        </div>
                        <div class="cart-total">
                            <span>Total</span>
                            <p class="total"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="payment-method">

                        <button type="submit">Place your order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Cart Total Page End -->