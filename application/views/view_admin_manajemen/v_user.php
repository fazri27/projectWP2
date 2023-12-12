<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title"><?= $title; ?></h3>
			<!-- /.card-tools -->
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
						<th>Password</th>
						<th style="width: 100px">Role</th>
						<th style="width: 150px">Member Sejak</th>
						<th style="width: 100px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($member as $key => $value) { ?>
						<td class="text-center"><?= $no++; ?></td>
						<td><?= $value->nama ?></td>
						<td><?= $value->email ?></td>
						<td class="text-break"><?= $value->password ?></td>
						<td class="text-center"><?php
												if ($value->role_id == 1) {
													echo '<span class="badge bg-primary">Admin</span>';
												} else {
													echo '<span class="badge bg-success">Member</span>';
												}
												?></td>
						<td><?= date('D, M Y', $value->tanggal_input) ?></td>
						<td class="text-center">
							<button class="btn btn-warning btn-sm mr-1" data-toggle="modal" data-target="#update<?= $value->id_user ?>"><i class="fas fa-edit"></i></button>
							<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_user ?>"><i class="fas fa-trash-alt"></i></button>
						</td>
				</tbody>
			<?php } ?>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
<!-- /.col -->

<!-- modal edit -->
<?php
foreach ($member as $key => $value) { ?>
	<div class="modal fade" id="update<?= $value->id_user ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Edit User</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<div class="card-body">
						<?php
						echo form_open('user/update/' .  $value->id_user);
						?>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" value="<?= $value->nama ?>" class="form-control" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" value="<?= $value->email ?>" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<label>Role</label>
							<select name="role_id" class="form-control">
								<option value="1" <?php if ($value->role_id == 1) {
														echo 'selected';
													} ?>>Admin</option>
								<option value="2" <?php if ($value->role_id == 2) {
														echo 'selected';
													} ?>>Member</option>
							</select>
						</div>
					</div>
					<!-- /.card-body -->

					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
						<button type="submit" class="btn btn-primary">save</button>
					</div>
					<?php
					echo form_close();
					?>
				</div>
				<!-- /.card -->
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php } ?>
<!-- /.modal -->


<!-- modal delete -->
<?php
foreach ($member as $key => $value) { ?>
	<div class="modal fade" id="delete<?= $value->id_user ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Hapus User</h3>
					</div>
					<div class="modal-header justify-content-center">
						<h4 class="modal-title">Anda Yakin ingin menghapus data User
							<strong><?= $value->nama; ?></strong>
						</h4>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
						<a href="<?= base_url('user/delete/' . $value->id_user) ?>" class="btn btn-primary">delete</a>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</div>
<?php } ?>
<!-- /.modal -->