<!-- Page Add Section Begin -->
<section class="page-add">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="page-breadcrumb">
					<h2>Detail Produk<span>.</span></h2>
					<a href="#">Home</a>
					<a href="#">Produk</a>
					<a class="active" href="#">Detail Produk</a>
				</div>
			</div>
			<div class="col-lg-8">
				<img src="img/add.jpg" alt="">
			</div>
		</div>
	</div>
</section>
<!-- Page Add Section End -->

<!-- Product Page Section Beign -->
<section class="product-page">
	<div class="container">
		<div class="product-control">
			<a href="#">Previous</a>
			<a href="#">Next</a>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="product-slider owl-carousel">
					<div class="product-img">
						<figure>
							<img src="<?= base_url('asset/foto-produk/' . $detail->gambar) ?>" alt="">

						</figure>
					</div>
				</div>

			</div>
			<div class="col-lg-6">
				<form action="<?= base_url('Pelanggan/cHome/add') ?>" method="POST">
					<input type="hidden" name="id_produk" value="<?= $detail->id_produk ?>">
					<div class="product-content">
						<h2><?= $detail->name_prod ?></h2>
						<div class="pc-meta">
							<h5>Rp. <?= number_format($detail->price_prod - ($detail->disc / 100 * $detail->price_prod)) ?></h5>

						</div>
						<ul class="tags">
							<li><span>Stok :</span> <?= $detail->stok_prod ?></li>
							<li><span>Keterangan :</span> <?= $detail->ket_prod ?></li>
							<li><span>Produk Terjual :</span> <?php if ($qty) {
																	echo $qty->qty;
																} else {
																	echo '0';
																}
																?></li>
						</ul>
						<div class="product-quantity">
							<div class="pro-qty">
								<input type="text" name="qty" value="1">
							</div>
						</div>
						<button type="submit" class="primary-btn pc-btn">Add to cart</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- Product Page Section End -->

<!-- Related Product Section Begin -->
<section class="related-product spad">
	<div class="container">

	</div>
</section>
<!-- Related Product Section End -->