<div class="container">
	<div class="col-md-12 mt-4">
		<div class="card card-primary card-outline">
			<!-- /.card-header -->
			<div class="card-body">
				<?= $this->session->flashdata('pesan'); ?>
				<?= $this->session->flashdata('error'); ?>
				<table class="table table-bordered">
					<thead class="text-center">
						<tr>
							<th style="width: 10px">#</th>
							<th>Sepatu</th>
							<th>Qty</th>
							<th>Harga</th>
							<th style="width: 100px">Total</th>
							<th style="width: 150px">Tanggal</th>
							<th style="width: 100px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($pesanan as $key => $value) { ?>
							<td class="text-center"><?= $no++; ?></td>
							<td><?= $value->nama_katalog ?></td>
							<td><?= $value->qty ?></td>
							<td class="text-break"><?= $value->harga ?></td>
							<td><?= date('D, M Y', $value->tgl_transaksi) ?></td>
							<td class="text-center">
								<button class="btn btn-warning btn-sm mr-1" data-toggle="modal" data-target="#update"><i class="fas fa-edit"></i></button>
							</td>
					</tbody>
				<?php } ?>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>