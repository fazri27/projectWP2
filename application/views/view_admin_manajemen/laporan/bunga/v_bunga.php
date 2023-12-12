<!-- table katalog start -->
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
      <div class="row">
        <div class="col-5 d-flex justify-content-around">
          <a href="<?= base_url('laporan/cetak_laporan_bunga'); ?>" class="btn btn-primary my-2"><i class="fas fa-print"></i> Print</a>
          <a href="<?= base_url('laporan/laporan_bunga_pdf'); ?>" class="btn btn-warning my-2"><i class="far fa-file-pdf"></i> Download Pdf</a>
          <a href="<?= base_url('laporan/export_excel_bunga'); ?>" class="btn btn-success my-2"><i class="far fa-file-excel"></i> Export ke Excel</a>
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
            <th>Nama Katalog</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th style="width: 400px">Deskripsi</th>
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
            <h3 class="card-title">Hapus sepatu</h3>
          </div>
          <div class="modal-header justify-content-center">
            <h4 class="modal-title text-center">Anda Yakin ingin menghapus sepatu
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