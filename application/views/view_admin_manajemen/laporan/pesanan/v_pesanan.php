<!-- table katalog start -->
<div class="col-md-12">
	<div class="card card-primary card-outline">
		<div class="card-header">
			<div class="row">
				<div class="col-5 d-flex justify-content-around">
					<a href="<?= base_url('laporan/cetak_laporan_pesanan'); ?>" class="btn btn-primary my-2"><i class="fas fa-print"></i> Print</a>
					<a href="<?= base_url('laporan/laporan_pesanan_pdf'); ?>" class="btn btn-warning my-2"><i class="far fa-file-pdf"></i> Download Pdf</a>
					<a href="<?= base_url('laporan/export_excel_pesanan'); ?>" class="btn btn-success my-2"><i class="far fa-file-excel"></i> Export ke Excel</a>
				</div>
			</div>
		</div>
		<!-- /.card-header -->

		<div class="card-body">
			<?= $this->session->flashdata('pesan'); ?>
			<?= $this->session->flashdata('error'); ?>
			<table class="table table-head-fixed text-nowrap">
				<thead class="text-center">
					<tr>
						<th>#</th>
						<th style="width: 150px">Katalog</th>
						<th style="width: 10px">Qty</th>
						<th>Harga</th>
						<th>Total</th>
						<th>Tanggal</th>
						<th>Status</th>
					</tr>
				</thead>
				<?php $no = 1;
				foreach ($pesanan as $key => $value) { ?>
					<tbody>
						<td class="text-center"><?= $no++; ?></td>
						<td class="text-center"><?= $value->nama_katalog ?></td>
						<td class="text-center"><?= $value->qty ?></td>
						<td class="text-center"><?= $value->harga ?></td>
						<td class="text-center"><?= $value->total ?></td>
						<td class="text-center"><?= date('D, M Y', $value->tgl_transaksi) ?></td>
						<td class="text-center"><?php
												if ($value->status == 'Bayar') {
													echo '<span class="badge bg-success">Bayar</span>';
												} else {
													echo '<span class="badge bg-danger">Belum Bayar</span>';
												}
												?>
						</td>
					</tbody>
				<?php } ?>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
<!-- table katalog end -->