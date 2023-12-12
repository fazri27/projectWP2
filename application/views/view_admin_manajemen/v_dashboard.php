<!-- ./col -->
<div class="col-md-12 d-flex justify-content-around">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $total_katalog; ?></h3>

        <p>Sepatu</p>
      </div>
      <div class="icon">
        <i class="fas fa-tshirt"></i>
      </div>
      <a href="<?= base_url('katalog'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= $total_user; ?></h3>

        <p>Users</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="<?= base_url('user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= $total_kategori; ?></h3>

        <p>Kategori</p>
      </div>
      <div class="icon">
        <i class="fas fa-list"></i>
      </div>
      <a href="<?= base_url('kategori'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<!-- ./col -->

<div class="container">
  <div class="col-md-12 mt-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pesanan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">

        <table class="table table-head-fixed text-nowrap">
          <thead class="text-center">
            <tr>
              <th>#</th>
              <th style="width: 20px">Sepatu</th>
              <th style="width: 10px">Qty</th>
              <th>Harga</th>
              <th>Total</th>
              <th style="width: 150px">Tanggal</th>
              <th style="width: 180px">Status</th>
              <th style="width: 100px">Aksi</th>
            </tr>
          </thead>
          <?php $no = 1;
          foreach ($pesanan as $key => $value) { ?>
            <tbody>
              <td class="text-center"><?= $no++; ?></td>
              <td><?= $value->nama_katalog ?></td>
              <td><?= $value->qty ?></td>
              <td class="text-break"><?= $value->harga ?></td>
              <td><?= $value->total ?></td>
              <td><?= date('D, M Y', $value->tgl_transaksi) ?></td>
              <?php
              echo form_open('dashboard/update/' .  $value->rowid);
              ?>
              <td class="text-center">
                <select name="status" id="" class="form-control">
                  <option <?php if ($value->status == 'Bayar') {
                            echo 'selected';
                          } ?>>Bayar</option>
                  <option <?php if ($value->status == 'Belum Bayar') {
                            echo 'selected';
                          } ?>>Belum Bayar</option>
                </select>
              </td>
              <td>
                <button class="btn btn-primary"><i class="fas fa-undo-alt"></i> Update</button>
              </td>
              <?php
              echo form_close();
              ?>
            </tbody>
          <?php } ?>
        </table>
        <?php
        echo form_close();
        ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>