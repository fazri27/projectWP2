<!-- table katalog start -->
<div class="col-md-12">
	<div class="card card-primary card-outline">
		<div class="card-header">
			<div class="row">
				<div class="col-5 d-flex justify-content-around">
					<a href="<?= base_url('laporan/cetak_laporan_user'); ?>" class="btn btn-primary my-2"><i class="fas fa-print"></i> Print</a>
					<a href="<?= base_url('laporan/laporan_user_pdf'); ?>" class="btn btn-warning my-2"><i class="far fa-file-pdf"></i> Download Pdf</a>
					<a href="<?= base_url('laporan/export_excel_user'); ?>" class="btn btn-success my-2"><i class="far fa-file-excel"></i> Export ke Excel</a>
				</div>
			</div>
		</div>
		<!-- /.card-header -->

		<div class="card-body">
			<?= $this->session->flashdata('pesan'); ?>
			<?= $this->session->flashdata('error'); ?>
			<table class="table table-bordered">
				<thead class="text-center">
					<tr>
						<th style="width: 10px">#</th>
						<th>Nama</th>
						<th>Email</th>
						<th style="width: 100px">Role</th>
						<th style="width: 150px">Member Sejak</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($member as $key => $value) { ?>
						<td class="text-center"><?= $no++; ?></td>
						<td><?= $value->nama ?></td>
						<td><?= $value->email ?></td>
						<td class="text-center"><?php
																		if ($value->role_id == 1) {
																			echo '<span class="badge bg-primary">Admin</span>';
																		} else {
																			echo '<span class="badge bg-success">Member</span>';
																		}
																		?></td>
						<td><?= date('D, M Y', $value->tanggal_input) ?></td>
				</tbody>
			<?php } ?>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
<!-- table katalog end -->