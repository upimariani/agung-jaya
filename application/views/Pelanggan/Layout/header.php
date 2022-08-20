<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Search model -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.html"><img src="<?= base_url('asset/violet-master/') ?>img/logo.png" alt=""></a>
                </div>
                <div class="header-right">
                    <img src="<?= base_url('asset/violet-master/') ?>img/icons/search.png" alt="" class="search-trigger">
                    <img src="<?= base_url('asset/violet-master/') ?>img/icons/man.png" alt="">
                    <a href="<?= base_url('Pelanggan/cKeranjang') ?>">
                        <img src="<?= base_url('asset/violet-master/') ?>img/icons/bag.png" alt="">
                        <span><?= $cart['jml']->jml ?></span>
                    </a>
                </div>
                <div class="user-access">
                    <a href="#">Register</a>
                    <a href="#" class="in">Sign in</a>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a class="active" href="<?= base_url('Pelanggan/cHome') ?>">Home</a></li>
                        <li><a href="<?= base_url('Pelanggan/cAbout')  ?>">About</a></li>
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
                        <p>Selamat Datang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->
    <!-- Header End -->