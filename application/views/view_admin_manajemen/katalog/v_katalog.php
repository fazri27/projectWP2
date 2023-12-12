<!-- table katalog start -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>
            <!-- /.card-tools -->

            <div class="card-tools">
                <a href="<?= base_url('katalog/add'); ?>" class="text-white"><strong>Add </strong><i class="far fa-plus-square text-lg"></i></a>
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
                        <th style="width: 100px">Nama Sepatu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th style="width: 400px">Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($katalog as $key => $value) { ?>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $value->nama_katalog ?></td>
                        <td><?= $value->nama_kategori ?></td>
                        <td class="text-break">Rp.<?= number_format($value->harga, 0) ?></td>
                        <td class="text-break"><?= $value->deskripsi ?></td>
                        <td class="text-center"><img src="<?= base_url('assets/katalog/' . $value->gambar); ?>" width="160px" alt="gambar katalog"></td>
                        <td class="text-center">
                            <a href="<?= base_url('katalog/update/' . $value->id_katalog); ?>" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_katalog ?>"><i class="fas fa-trash-alt"></i></button>
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

<!-- modal delete kategori start -->
<?php
foreach ($katalog as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_katalog ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Hapus Sepatu</h3>
                    </div>
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title text-center">Anda Yakin ingin menghapus Sepatu
                            <strong><?= $value->nama_katalog; ?></strong>
                        </h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <a href="<?= base_url('katalog/delete/' . $value->id_katalog); ?>" class="btn btn-primary">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
<?php } ?>
<!-- /.modal -->
<!-- modal delete kategori end -->