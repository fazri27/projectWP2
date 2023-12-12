<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?> :<span class="ml-2"><?= $katalog->nama_katalog; ?></span></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php

            // error upload gambar
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Error!' . $error_upload . '</h5></div>';
            }
            //form tambah gambar katalog start
            echo form_open_multipart('foto/add/' . $katalog->id_katalog);
            ?>

            <!-- text input -->
            <?= $this->session->flashdata('pesan'); ?>
            <div class="form-group">
                <label>Keterangan</label>
                <input name="ket" class="form-control" placeholder="Keterangan" value="<?= set_value('ket'); ?>">
                <?= form_error('ket', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>Pilih Gambar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="preview_gambar" name="gambar" required>
                                <label for="preview_gambar" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ml-2">
                        <button type="submit" class="btn btn-primary mr-3">Save</button>
                        <a href="<?= base_url('foto'); ?>" class="btn btn-success">Close</a>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <div class="card" style="max-width: 170px;">
                            <img src="<?= base_url('assets/katalog/nopoto.png'); ?>" id="gambar_load" alt="gambar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo form_close()
        ?>
        <!-- form tambah gambar katalog end -->
    </div>
</div>

<!-- Gamabar-gambar katalog start -->
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Rincian Gambar</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="widgets.html" data-source-selector="#card-refresh-content"><i class="fas fa-sync-alt"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <!-- mengambil data foto -->
                <?php
                foreach ($gambar as $key => $value) { ?>
                    <div class="col-sm-5 mx-auto card " id="card-refresh-content">
                        <div class="card-title">
                            <span class="badge badge-secondary"><?= $value->ket; ?></span>
                        </div>
                        <img src="<?= base_url('assets/gambarkatalog/' . $value->gambar); ?>" class="img-fluid mb-2" />
                        <div class="card">
                            <button href="<?= base_url('foto/delete'); ?>" class="btn btn-outline-danger btn-block btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>">Delete</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Gamabar-gambar katalog end -->

<!-- modal delete kategori start -->
<?php
foreach ($gambar as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_gambar ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Hapus Gambar</h3>
                    </div>
                    <div class="modal-header">
                        <h4 class="modal-title text-center text-break">Anda yakin ingin Menghapus
                            <strong><?= $value->ket; ?> !</strong>
                        </h4>
                    </div>
                    <div class="card align-items-center">
                        <div class="card" style="width: 18rem;">
                            <div class="card-title ml-1">
                                <span class="badge badge-secondary"><?= $value->ket; ?></span>
                            </div>
                            <img src="<?= base_url('assets/gambarkatalog/' . $value->gambar); ?>" class="card-img">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-around">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <a href="<?= base_url('foto/delete/' . $value->id_katalog . '/' . $value->id_gambar); ?>" class="btn btn-primary">Delete</a>
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