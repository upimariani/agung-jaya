<!-- Page Add Section Begin -->
<section class="page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-breadcrumb">
                    <h2>Register Akun Pelanggan<span>.</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Add Section End -->

<!-- Contact Section Begin -->
<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <form action="<?= base_url('Pelanggan/cAuth/register') ?>" method="POST" class="checkout-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_error('nama', '<p class="text-danger">', '</p>') ?>
                            <input type="text" name="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="col-lg-6">
                            <?= form_error('no_hp', '<p class="text-danger">', '</p>') ?>
                            <input type="text" name="no_hp" placeholder="No Telepon">
                        </div>

                        <div class="col-lg-12">
                            <?= form_error('jk', '<p class="text-danger">', '</p>') ?>
                            <select name="jk" class="cart-select">
                                <option value="">Jenis Kelamin</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                            </select> <?= form_error('alamat', '<p class="text-danger">', '</p>') ?>
                            <input type="text" name="alamat" placeholder="Alamat">
                        </div>
                        <div class="col-lg-12">
                            <?= form_error('date', '<p class="text-danger">', '</p>') ?>
                            <input type="date" class="form-control mb-3" name="date" placeholder="Tanggal Lahir">
                        </div>
                        <div class="col-lg-6">
                            <?= form_error('username', '<p class="text-danger">', '</p>') ?>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="col-lg-6">
                            <?= form_error('password', '<p class="text-danger">', '</p>') ?>
                            <input type="text" name="password" placeholder="Password">
                        </div>
                        <div class="payment-method">
                            <button type="submit">Register</button>
                            <p>Apakah Anda Sudah memiliki Akun? <a href="<?= base_url('Pelanggan/cAuth') ?>">Login Here!!!</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact Section End -->