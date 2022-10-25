<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <h3>AGUNG JAYA</h3>
                </div>
                <div class="header-right">
                    <?php
                    if ($this->session->userdata('id') != '') {
                        if ($cart['jml']->jml != 0) {
                    ?>
                            <img src="<?= base_url('asset/violet-master/') ?>img/icons/man.png" alt="">
                            <a href="<?= base_url('Pelanggan/cKeranjang') ?>">
                                <img src="<?= base_url('asset/violet-master/') ?>img/icons/bag.png" alt="">
                                <span><?= $cart['jml']->jml ?></span>
                            </a>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="user-access">
                    <?php
                    if ($this->session->userdata('id') == '') {
                    ?>
                        <a href="<?= base_url('Pelanggan/cAuth') ?>">Login</a>
                    <?php
                    } else {
                    ?>
                        <a href="<?= base_url('Pelanggan/cAuth/logout') ?>"> Logout</a>
                    <?php
                    }
                    ?>


                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a class="active" href="<?= base_url('Pelanggan/cHome') ?>">Home</a></li>
                        <!-- <li><a href="<?= base_url('Pelanggan/cAbout')  ?>">About</a></li> -->
                        <li><a href="<?= base_url('Pelanggan/cPesananSaya') ?>">Pesanan Saya</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Info Begin -->
    <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                        <img src="img/icons/delivery.png" alt="">
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="img/icons/voucher.png" alt="">
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                        <img src="img/icons/sales.png" alt="">
                        <?php
                        if ($this->session->userdata('id') != '') {
                        ?>
                            <p>Selamat Datang, <?= $this->session->userdata('nama') ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->
    <!-- Header End -->