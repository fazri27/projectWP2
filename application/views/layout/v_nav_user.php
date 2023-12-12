<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
	<div class="container">
		<a href="#" class="navbar-brand">
			<img src="<?= base_url(); ?>assets/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light"><b><?= $brand; ?></b></span>
		</a>
		<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse order-3" id="navbarCollapse">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?= base_url('home'); ?>" class="nav-link active">Home</a>
				</li>
				<?php $kategori = $this->m_home->get_all_data_kategori(); ?>
				<li class="nav-item dropdown">
					<a href="#" id="dropdownSubMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
					<ul class="dropdown-menu border-0 shadow">
						<?php foreach ($kategori  as $key => $value) { ?>
							<li><a href="<?= base_url('home/kategori/' . $value->id_kategori); ?>" class="dropdown-item"><?= $value->nama_kategori; ?></a>
								<div class="dropdown-divider"></div>
							</li>

						<?php } ?>
					</ul>
				</li>
			</ul>
		</div>
		<!-- Right navbar links -->
		<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
			<!-- profil -->
			<?php if ($this->session->userdata('email') == '') { ?>
				<div class="wrapper">
					<a type="button" href="<?= base_url('autentifikasi'); ?>" class="btn btn-info rounded-pill  mr-2">Login</a>
					<a type="button" href="<?= base_url('autentifikasi/register'); ?>" class="btn btn-outline-info rounded-pill">Register</a>
				</div>
			<?php } else { ?>
				<!-- profil start-->
				<li class="nav-item dropdown">
					<a class="nav-link text-dark" data-toggle="dropdown" href="#">
						<span class="brand-text font-weight-light text-black mx-1"><b><strong>Hi,<?= $user['nama']; ?></strong></b></span>
						<img src="<?= base_url('assets/profil/') . $user['image']; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					</a>
					<div class="dropdown-menu dropdown-menu-sm text-center dropdown-menu-right">
						<a href="<?= base_url('autentifikasi/logout'); ?>" class="dropdown-item">
							<i class="fas fa-power-off fa-fw mr-2"></i>Logout
						</a>
					</div>
				</li>
				<!-- profil end-->
			<?php } ?>
			<?php
			$keranjang = $this->cart->contents();
			$jml_item = 0;
			foreach ($keranjang as $key => $value) {
				$jml_item = $jml_item + $value['qty'];
			}
			?>
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="fas fa-shopping-bag text-lg"></i>
					<span class="badge badge-danger navbar-badge text-xs"><?= $jml_item; ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<?php if (empty($keranjang)) { ?>
						<a href="#" class="dropdown-item">
							<p>Keranjang Belanja Kosong</p>
						</a>
						<?php } else {
						// <!-- cart katalog Start -->
						foreach ($keranjang as $key => $value) {
							$katalog = $this->m_home->detail($value['id']);
						?>
							<a href="#" class="dropdown-item">
								<div class="media">
									<img src="<?= base_url('assets/katalog/' . $katalog->gambar); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
									<div class="media-body">
										<h3 class="dropdown-item-title"><?= $value['name']; ?></h3>
										<p class="text-sm"><?= $value['qty']; ?> x IDR <?= $this->cart->format_number($value['price'], 0); ?></p>
										<p class="text-sm text-muted"><i class="fa fa-calculator"></i> IDR <?= $this->cart->format_number($value['subtotal'], 0); ?></p>
									</div>
								</div>
								<!-- cart katalog End -->
							</a>
							<div class="dropdown-divider"></div>
						<?php } ?>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<div class="media">
								<div class="media-body">
									<tr>
										<td colspan="2"> </td>
										<td class="right"><strong>Total : </strong></td>
										<td class="right">IDR <?php echo $this->cart->format_number($this->cart->total()); ?></td>
									</tr>
								</div>
							</div>
							<!-- cart katalog End -->
						</a>
						<div class="dropdown-divider"></div>
						<div class="row my-2 mx-auto">
							<div class="col-sm-6">
								<a href="<?= base_url('belanja'); ?>" class="btn btn-sm btn-primary rounded-pill ml-1">Detail Keranjang</a>
							</div>
							<div class="col-sm-6 mx-auto">
								<a href="<?= base_url('belanja/cekout'); ?>" class="btn btn-sm btn-success rounded-pill ml-4">Check Out</a>
							</div>
						</div>
					<?php } ?>

				</div>
			</li>
		</ul>
	</div>
</nav>
<!-- /.navbar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#"><?= $brand; ?></a></li>
						<li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<div class="content">
		<div class="container-fluid">