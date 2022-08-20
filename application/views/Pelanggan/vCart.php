<!-- Page Add Section Begin -->
<section class="page-add cart-page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Cart<span>.</span></h2>
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
                            <th class="product-h">Product</th>
                            <th>Price</th>
                            <th class="quan">Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($cart['cart'] as $key => $value) {
                        ?>
                            <tr>
                                <td class="product-col">
                                    <img src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="">
                                    <div class="p-title">
                                        <h5><?= $value->name_prod ?></h5>
                                    </div>
                                </td>
                                <td class="price-col">Rp. <?= number_format($value->price_prod - ($value->disc / 100 * $value->price_prod)) ?></td>
                                <td class="quantity-col">
                                    <div class="pro-qty">
                                        <input type="text" name="qty<?= $i++ ?>" value="<?= $value->qty_cart ?>">
                                    </div>
                                </td>
                                <td class="total">Rp. <?= number_format($value->qty_cart * ($value->price_prod - ($value->disc / 100 * $value->price_prod))) ?></td>
                                <td class="product-close"><a href="<?= base_url('pelanggan/cKeranjang/deleteCart/' . $value->id_cart) ?>" class="site-btn update-btn">x</a></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="coupon-input">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                        <a href="<?= base_url('pelanggan/cCheckout') ?>" class="site-btn clear-btn">Checkout</a>
                        <button type="submit" class="site-btn update-btn">Update Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Cart Page Section End -->