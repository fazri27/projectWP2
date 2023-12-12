    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    	<!-- Left navbar links -->
    	<ul class="navbar-nav">
    		<li class="nav-item">
    			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    		</li>
    		<li class="nav-item d-none d-sm-inline-block">
    			<a href="<?= base_url('home'); ?>" class="nav-link">Home</a>
    		</li>
    	</ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    	<!-- Brand Logo -->
    	<a href="#" class="brand-link elevation-4">
    		<img src="<?= base_url(); ?>assets/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    		<span class="brand-text font-weight-light"><?= $brand; ?></span>
    	</a>
    	<!-- Sidebar -->
    	<div class="sidebar">
    		<!-- Sidebar user panel (optional) -->
    		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    			<div class="image">
    				<img src="<?= base_url('assets/profil/') . $user['image']; ?> " class="img-circle elevation-2" alt="User Image">
    			</div>
    			<div class="info">
    				<a href="#" class="d-block"><strong><?= $user['nama']; ?></strong></a>
    			</div>
    		</div>
    		<!-- Sidebar Menu -->
    		<nav class="mt-2">
    			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    				<!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    				<li class="nav-item">
    					<a href="<?= base_url('dashboard'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard')
																					echo "active"; ?>">
    						<i class="nav-icon fas fa-tachometer-alt"></i>
    						<p>
    							Dashboard
    						</p>
    					</a>
    				</li>
    				<li class="nav-item">
    					<a href="<?= base_url('katalog'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'katalog')
																					echo "active"; ?>">
    						<i class="nav-icon fas fa-list-alt"></i>
    						<p>
    							Sepatu
    						</p>
    					</a>
    				</li>
    				<li class="nav-item">
    					<a href="<?= base_url('foto'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'foto')
																				echo "active"; ?>">
    						<i class="nav-icon far fa-images"></i>
    						<p>
    							Detail Sepatu
    						</p>
    					</a>
    				</li>
    				<li class="nav-item">
    					<a href="<?= base_url('kategori'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'kategori')
																					echo "active"; ?>">
    						<i class="nav-icon fas fa-list"></i>
    						<p>
    							Kategori
    						</p>
    					</a>
    				</li>
    				<li class="nav-item">
    					<a href="<?= base_url('user'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'user')
																				echo "active"; ?>">
    						<i class="nav-icon fas fa-users"></i>
    						<p>
    							User
    						</p>
    					</a>
    				</li>
    				<li class="nav-item has-treeview">
    					<a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'laporan')
														echo "active"; ?>">
    						<i class="nav-icon fas fa-copy"></i>
    						<p>
    							Data Laporan
    							<i class="fas fa-angle-left right"></i>
    						</p>
    					</a>
    					<ul class="nav nav-treeview">
    						<li class="nav-item">
    							<a href="<?= base_url('laporan/bunga'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'bunga')
																								echo "active"; ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Laporan Data Sepatu</p>
    							</a>
    						<li class="nav-item">
    							<a href="<?= base_url('laporan/user'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'user')
																								echo "active"; ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Laporan Data User</p>
    							</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?= base_url('laporan/pesanan'); ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pesanan')
																									echo "active"; ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Laporan Data pesanan</p>
    							</a>
    						</li>
    					</ul>
    				</li>

    				<li class="nav-item">
    					<a href="<?= base_url('autentifikasi/logout'); ?>" class="nav-link" data-toggle="modal" data-target="#modal-sm">
    						<i class="nav-icon fas fa-power-off"></i>
    						<p>
    							Log Out
    						</p>
    					</a>
    				</li>
    			</ul>
    		</nav>
    		<!-- /.sidebar-menu -->
    	</div>
    	<!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    	<!-- Content Header (Page header) -->
    	<div class="content-header">
    		<div class="container-fluid">
    			<div class="row mb-2">
    				<div class="col-sm-6">
    					<h1 class="m-0 text-dark"><b><?= $title; ?></b></h1>
    				</div><!-- /.col -->
    				<div class="col-sm-6">
    					<ol class="breadcrumb float-sm-right">
    						<li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
    						<li class="breadcrumb-item active"><?= $title; ?></li>
    					</ol>
    				</div><!-- /.col -->
    			</div><!-- /.row -->
    		</div><!-- /.container-fluid -->
    	</div>
    	<!-- /.content-header -->
    	<!-- Main content -->
    	<div class="content">
    		<div class="container-fluid">
    			<div class="row">



    				<div class="modal fade" id="modal-sm">
    					<div class="modal-dialog modal-sm">
    						<div class="modal-content">
    							<div class="modal-header justify-content-center">
    								<h4 class="modal-title ">Anda Yakin ingin logout?</h4>
    							</div>
    							<div class="modal-footer justify-content-center">
    								<a href="<?= base_url('autentifikasi/logout'); ?>" class="btn btn-primary">Ya</a>
    							</div>
    						</div>
    						<!-- /.modal-content -->
    					</div>
    					<!-- /.modal-dialog -->
    				</div>
    				<!-- /.modal -->