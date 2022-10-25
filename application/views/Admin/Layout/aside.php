<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Agung Jaya</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('asset/AdminLTE/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Admin</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

				<li class="nav-header">Kelola Data Master </li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cAdmin') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cAdmin') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon far fa-user-circle"></i>
						<p>
							Admin
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cKategori') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKategori') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Kategori
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cProduk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cProduk') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-barcode"></i>
						<p>
							Produk
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cDiskon') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDiskon') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-tag"></i>
						<p>
							Diskon
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cOngkir') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cOngkir') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-bus-alt"></i>
						<p>
							Ongkos Kirim
						</p>
					</a>
				</li>
				<li class="nav-header">TRANSAKSI </li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cPesananMasuk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPesananMasuk') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon far fa-circle text-danger"></i>
						<p class="text">Pesanan Masuk</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cMenungguKonfirmasi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cMenungguKonfirmasi') {
																								echo 'active';
																							}  ?>">
						<i class="nav-icon far fa-circle text-warning"></i>
						<p>Konfirmasi</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cKemas') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKemas') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>Proses Kemas</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cDikirim') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDikirim') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon far fa-circle text-primary"></i>
						<p>Sedang Dikirim</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cSelesai') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cSelesai') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon far fa-circle text-default"></i>
						<p>Selesai</p>
					</a>
				</li>
				<li class="nav-header">TRANSAKSI LANGSUNG</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cTransaksiLangsung') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cTransaksiLangsung') {
																								echo 'active';
																							}  ?>">
						<i class="nav-icon fas fa-shopping-cart"></i>
						<p>
							Transaksi
						</p>
					</a>
				</li>
				<li class="nav-header">ANALISIS </li>
				<li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cAnalisis') {
														echo 'menu-open';
													}  ?>">
					<a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cAnalisis') {
													echo 'active';
												}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Laporan Analisis
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('Admin/cAnalisis/analisis_jk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cAnalisis' && $this->uri->segment(3) == 'analisis_jk') {
																											echo 'active';
																										}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Jenis Kelamin Pelanggan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/cAnalisis/analisis_alamat') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cAnalisis' && $this->uri->segment(3) == 'analisis_alamat') {
																												echo 'active';
																											}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Alamat Pengiriman</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/cAnalisis/analisis_penjualan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cAnalisis' && $this->uri->segment(3) == 'analisis_penjualan') {
																												echo 'active';
																											}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Penjualan</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-header">LOGOUT </li>
				<li class="nav-item">
					<a href="<?= base_url('cLogin/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p class="text">LogOut</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>