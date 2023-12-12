<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <?= $this->session->flashdata('error'); ?>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>Nama Sepatu</th>
                        <th>Cover</th>
                        <th style="width: 160px">Jumlah Gambar</th>
                        <th style="width: 200px">Aksi</th>
                    </tr>
                <tbody>
                    <?php $no = 1;
                    foreach ($gambarkatalog as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $value->nama_katalog; ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/gambarkatalog/' . $value->gambar); ?>" width="100px" alt="gambar katalog"></td>
                            <td class="text-center text-xl"><span class="badge badge-primary"><?= $value->total_gambar; ?></span></td>
                            <td class="text-center">
                                <a href="<?= base_url('foto/add/' . $value->id_katalog); ?>" class="btn btn-success"><i class="fas fa-plus"></i> add gambar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                </thead>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- table katalog end -->