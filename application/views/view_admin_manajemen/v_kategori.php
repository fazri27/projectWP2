<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>

            <!-- add -->

            <div class="card-tools">
                <button data-toggle="modal" data-target="#add" class="btn btn-primary sm"><i class="far fa-plus-square text-lg"></i></button>
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
                        <th>Kategori</th>
                        <th style="width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $key => $value) { ?>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $value->nama_kategori ?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm mr-1" data-toggle="modal" data-target="#update<?= $value->id_kategori ?>"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_kategori ?>"><i class="fas fa-trash-alt"></i></button>
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


<!-- modal add kategori start-->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kategori</h3>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kategori/add');
                    ?>

                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
                    </div>


                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-primary">save</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<!-- modal add kategori end -->


<!-- modal update kategori start -->
<?php
foreach ($kategori as $key => $value) { ?>
    <div class="modal fade" id="update<?= $value->id_kategori ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Kategori</h3>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo form_open('kategori/update/' .  $value->id_kategori);
                        ?>

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?= $value->nama_kategori ?>">
                        </div>


                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- modal update kategori end -->

<!-- modal delete kategori start -->
<?php
foreach ($kategori as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_kategori ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Hapus Kategori</h3>
                    </div>
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title text-center">Anda Yakin ingin menghapus Kategori
                            <strong><?= $value->nama_kategori; ?></strong>
                        </h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <a href="<?= base_url('kategori/delete/' . $value->id_kategori); ?>" class="btn btn-primary">Delete</a>
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