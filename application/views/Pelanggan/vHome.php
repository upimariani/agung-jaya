<!-- Hero Slider Begin -->
<section class="hero-slider">
    <div class="hero-items owl-carousel">
        <div class="single-slider-item set-bg" data-setbg="<?= base_url('asset/violet-master/') ?>img/1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Toko</h1>
                        <h2>Agung Jaya Plastik</h2>
                        <a href="#" class="primary-btn">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Slider End -->

<!-- Features Section Begin -->
<section class="features-section spad">
    <div class="features-ads">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-features-ads first">
                        <img src="<?= base_url('asset/violet-master/') ?>img/icons/f-delivery.png" alt="">
                        <h4>Shipping</h4>
                        <p>Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal
                            esuada aliquet libero viverra cursus. </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-features-ads second">
                        <img src="<?= base_url('asset/violet-master/') ?>img/icons/coin.png" alt="">
                        <h4>100% Money back </h4>
                        <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                            aliquet libero viverra cursus. </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-features-ads">
                        <img src="<?= base_url('asset/violet-master/') ?>img/icons/chat.png" alt="">
                        <h4>Online support 24/7</h4>
                        <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                            aliquet libero viverra cursus. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features Section End -->

<!-- Latest Product Begin -->
<section class="latest-products spad">
    <div class="container">
        <div class="col-lg-12 mb-3 text-center">
            <div class="section-title">
                <h2>Products</h2>
            </div>
        </div>
        <div class="row" id="product-list">

            <?php
            foreach ($produk as $key => $value) {
            ?>
                <div class="col-lg-3 col-sm-6">
                    <form action="<?= base_url('Pelanggan/cHome/add') ?>" method="POST">
                        <input type="hidden" name="id_produk" value="<?= $value->id_produk ?>">
                        <div class="single-product-item">
                            <figure>
                                <a href="#"><img style="width: 150px; height: 320px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt=""></a>
                                <?php
                                if ($value->disc != 0) {
                                ?>
                                    <div class="p-status">Sale! <?= $value->disc ?> %</div>
                                <?php
                                }
                                ?>

                            </figure>
                            <div class="product-text">
                                <h6><?= $value->name_prod ?></h6>
                                <p>Rp. <?= number_format($value->price_prod - ($value->disc / 100 * $value->price_prod)) ?>
                                    <?php
                                    if ($value->disc != 0) {
                                    ?>
                                        <del>Rp. <?= number_format($value->price_prod) ?></del>
                                    <?php
                                    }
                                    ?>
                                </p>
                                <button type="submit" class="primary-btn look-btn"> <img src="<?= base_url('asset/violet-master/') ?>img/icons/bag.png" alt=""></button>
                            </div>
                        </div>
                    </form>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Latest Product End -->

<!-- Lookbok Section Begin -->
<section class="lookbok-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 offset-lg-1">
                <div class="lookbok-left">
                    <div class="section-title">
                        <h2>2022 <br />#foodandhealty</h2>
                    </div>
                    <p>Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vestibulum malesuada
                        aliquet libero viverra cursus. Aliquam erat volutpat. Morbi id dictum quam, ut commodo
                        lorem. In at nisi nec arcu porttitor aliquet vitae at dui. Sed sollicitudin nulla non leo
                        viverra scelerisque. Phasellus facilisis lobortis metus, sit amet viverra lectus finibus ac.
                        Aenean non felis dapibus, placerat libero auctor, ornare ante. Morbi quis ex eleifend,
                        sodales nulla vitae, scelerisque ante. Nunc id vulputate dui. Suspendisse consectetur rutrum
                        metus nec scelerisque. s</p>
                    <a href="#" class="primary-btn look-btn">See More</a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="lookbok-pic">
                    <img src="<?= base_url('asset/violet-master/') ?>img/2.jpg" alt="">
                    <div class="pic-text">Food</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Lookbok Section End -->

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