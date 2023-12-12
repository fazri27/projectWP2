<!-- tabel tambah katalog start -->
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ubah Katalog</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- form start -->
            <?php

            // error upload gambar
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Error!' . $error_upload . '</h5></div>';
            }
            echo form_open_multipart('katalog/update/' . $katalog->id_katalog);
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Nama Sepatu</label>
                        <input name="nama_katalog" class="form-control" placeholder="Nama Bunga" value="<?= $katalog->nama_katalog; ?>">
                        <?= form_error('nama_katalog', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class=" col-sm-6">
                    <div class="form-group">
                        <label>Kategori</label>

                        <select name="id_kategori" class="form-control">
                            <option value="<?= $katalog->id_kategori; ?>"><?= $katalog->nama_kategori; ?></option>
                            <?php
                            foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php
                            } ?>
                        </select>
                        <?= form_error('id_kategori', '<small class="text-danger">', '</small>'); ?>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" class="form-control" placeholder="Harga" value="<?= $katalog->harga; ?>">
                        <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi"><?= $katalog->deskripsi; ?></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-sm-7 mr-1">
                    <div class="form-group">
                        <label>Ganti Gambar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="preview_gambar" name="gambar">
                                <?= form_error('gambar', '<small class="text-danger">', '</small>'); ?>
                                <label for="preview_gambar" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4 m-auto">
                    <div class="form-group">
                        <div class="card" style="max-width: 250px;">
                            <img src="<?= base_url('assets/katalog/' . $katalog->gambar); ?>" id="gambar_load" alt="gambar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mr-3">Save</button>
                <a href="<?= base_url('katalog'); ?>" class="btn btn-success">Close</a>
            </div>
            <?php
            echo form_close();
            ?>
            <!-- form end -->
        </div>
    </div>
</div>
<!-- tabel tambah katalog end -->

<!-- preview gambar -->
<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>