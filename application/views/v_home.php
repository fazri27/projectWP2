<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> -->
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		<!-- <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> -->
		<!-- <li data-target="#carouselExampleIndicators" data-slide-to="5"></li> -->
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" src="<?= base_url(); ?>assets/slider/slider1.jpeg">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?= base_url(); ?>assets/slider/slider2.jpeg">
		</div>
		<!-- <div class="carousel-item">
			<img class="d-block w-100" src="<?= base_url(); ?>assets/slider/slider3.jpg">
		</div> -->
		<!-- <div class="carousel-item">
			<img class="d-block w-100" src="<?= base_url(); ?>assets/slider/slider4.jpg">
		</div> -->
		<div class="carousel-item">
			<img class="d-block w-100" src="<?= base_url(); ?>assets/slider/slider5.jpeg">
		</div>
		<!-- <div class="carousel-item">
			<img class="d-block w-100" src="<?= base_url(); ?>assets/slider/slider6.jpg">
		</div> -->
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<!-- about us -->

<div class="align-items-center my-5">
	<div class="row">

		<div class="col-sm-6">
			<img src="<?= base_url('assets/a6.jpg'); ?>" class="ml-5" alt="" width="600px">
		</div>
		<?= $this->session->flashdata('pesan'); ?>
		<div class="col-sm-6 mt-1 d-block">
			<div class="callout callout-info mr-2">
				<h2><strong>About Us</strong></h2>
				<p class="text-break">Didirikan pada tahun 2015, kami adalah perusahaan kecil namun penuh semangat yang berdedikasi untuk melayani penggemar sepatu sneaker di seluruh Indonesia. Fokus utama kami adalah menawarkan produk dengan kualitas terbaik dengan harga terendah.
					dan kami menyediakan produk dengan kualitas terbaeek !! 
				</p>
				<span></span>
			</div>
		</div>
	</div>
</div>

<!-- about end -->
<div class="card card-solid">
	<div class="card-body pb-0">
		<div class="justify-content-center mb-5">
			<h2 class="text-center"><b>Pilihan Sepatu</b></h2>
		</div>
		<div class="row d-flex align-items-stretch">
			<?php
			foreach ($katalog as $key => $value) { ?>
				<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
					<?php
					echo form_open('belanja/add');
					echo form_hidden('id', $value->id_katalog);
					echo form_hidden('qty', 1);
					echo form_hidden('price', $value->harga);
					echo form_hidden('name', $value->nama_katalog);
					echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
					?>
					<div class="card">
						<div class="card-header text-muted border-bottom-0"><span class="badge badge-danger text-md">
								<?= $value->nama_kategori; ?></span>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-12">
									<h3 class=""><b><?= $value->nama_katalog; ?></b></h3>
								</div>
								<div class="col-12 text-center">
									<img src="<?= base_url('/assets/katalog/' . $value->gambar); ?>" alt="" class="img-fluid">
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-4">
									<div class="text-left">
										<h5 class="text-sm mt-1"><span class="badge badge-secondary text-md">IDR <?= number_format($value->harga, 0); ?></span></h5>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="text-right">
										<a href="<?= base_url('home/detail/' . $value->id_katalog); ?>" class="btn btn-sm bg-teal">
											<i class="fas fa-arrow-circle-right mr-1"></i> Detail
										</a>
										<button class="btn btn-sm btn-primary mx-auto swalDefaultSuccess">
											<i class="fas fa-shopping-bag mr-1"> </i> Add To Cart
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					echo form_close();
					?>
				</div>
			<?php }
			?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		$('.swalDefaultSuccess').click(function() {
			Toast.fire({
				icon: 'success',
				title: 'Katalog berhasil di tambahkan ke Keranjang'
			})
		});
	});
</script>