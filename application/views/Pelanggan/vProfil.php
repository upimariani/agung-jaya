<!-- Page Add Section Begin -->
<section class="page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Profil Pelanggan<span>.</span></h2>
                </div>
            </div>
            <div class="col-lg-8">
                <img src="img/add.jpg" alt="">
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
                <form action="<?= base_url('Pelanggan/cHome/daftar_member/' . $profil->id_cust) ?>" method="POST" class="contact-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="nama" value="<?= $profil->name_cust ?>" placeholder="Nama Lengkap">
                        </div>
                        <div class="col-lg-6">
                            <input type="number" name="no_hp" value="<?= $profil->no_phone ?>" placeholder="No Telepon">
                        </div>
                        <div class="col-lg-12">
                            <input type="text" name="alamat" value="<?= $profil->address_cust ?>" placeholder="Alamat">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="username" value="<?= $profil->username ?>" placeholder="Username">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="password" value="<?= $profil->password ?>" placeholder="Password">
                        </div>
                        <div class="col-lg-12">
                            <select class="form-control">
                                <option value="Perempuan" <?php if ($profil->jk == 'Perempuan') {
                                                                echo 'selected';
                                                            } ?>>Perempuan</option>
                                <option value="Laki - Laki" <?php if ($profil->jk == 'Laki - Laki') {
                                                                echo 'selected';
                                                            } ?>>Laki - Laki</option>
                            </select>
                        </div>
                        <div class="col-lg-12 text-right mt-3">
                            <?php
                            if ($profil->member == '0') {
                            ?>
                                <button type="submit">Daftar Member</button>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="contact-widget">
                    <div class="cw-item">
                        <?php
                        if ($profil->member == '0') {
                        ?>
                            <h5>Non Member</h5>
                            <ul>
                                <li>Anda Belum Melakukan pendaftaran Member</li>
                                <li class="text-danger">Silahkan Klik Daftar member!!</li>
                            </ul>
                        <?php
                        } else {
                        ?>
                            <h5>Member</h5>
                            <ul>
                                <li>Anda Sudah terdaftar sebagai Member</li>
                                <li class="text-danger"><?= $profil->create_member ?></li>
                            </ul>
                        <?php
                        }
                        ?>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Contact Section End -->