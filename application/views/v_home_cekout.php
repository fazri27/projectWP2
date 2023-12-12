<!-- Main content -->
<div class="invoice p-3 mb-3">
  <!-- Table row -->
  <?php
  echo form_open('belanja/proses_cekout');
  ?>
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Qty</th>
            <th>Harga</th>
            <th>Katalog</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->cart->contents() as $items) : ?>
            <?php echo form_hidden($items['rowid']); ?>
            <tr>
              <th scope="row"><?= $items['qty']; ?></th>
              <td><?= number_format($items['price'], 0); ?></td>
              <td><?= $items['name']; ?></td>
              <td><?= number_format($items['subtotal'], 0); ?></td>
            </tr>
        </tbody>
      <?php endforeach; ?>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
    <!-- accepted payments column -->
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-4">
          <!-- text input -->
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Isi Nama" name="nama_pemesan">
          </div>
        </div>
        <div class="col-sm-4">
          <!-- text input -->
          <div class="form-group">
            <label>No. Hp</label>
            <input type="text" class="form-control" placeholder="Isi No. Hp" name="no_hp">
          </div>
        </div>
        <div class="col-sm-4">
          <!-- text input -->
          <div class="form-group">
            <label>Metode Kirim</label>
            <select class="form-control" name="jasa_pengirim">
              <option value="" disabled selected>--Metode Pengiriman--</option>
              <option value="Ambil di Toko">Ambil di Toko</option>
              <option value="Antar Kurir">Antar Kurir</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Provinsi</label>
            <input type="text" class="form-control" placeholder="Isi Provinsi" name="provinsi">
          </div>
        </div>
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label id="pembayaran">Metode Pembayaran</label>
            <select class="form-control" name="pembayaran">
              <option value="" disabled selected>--Pilihan Pembayaran--</option>
              <option value="BCA">BCA : 3991-1923-06 (Ferdi Al Fazri)</option>
              <option value="BNI">BNI : 6780-9726-09 (Ferdi Al Fazri)</option>
              <option value="MANDIRI">MANDIRI : 139-00-2789436-2 (Ferdi Al Fazri)</option>
              <option value="BRI">BRI : 5847-01-0926-41-37-4 (Ferdi Al Fazri)</option>
              <option value="DANA">DANA : 0831-5285-6502 (Ferdi Al Fazri)</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <!-- textarea -->
          <div class="form-group">
            <label>Alamat Lengkap</label>
            <textarea class="form-control" rows="3" placeholder="Isi Alamat Lengkap" name="alamat"></textarea>
          </div>
        </div>
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Kota</label>
            <input type="text" class="form-control" placeholder="Isi Provinsi" name="Kota">
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-5">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <?php
            $totalBayar = $this->cart->total();
            if ($totalBayar >= 1200000) {
              $diskon = $totalBayar * 0.05;
              $totalBayar -= $diskon;
              echo '<th>Discount: </th>';
              echo '<td><b>10%</b></td>';
            }
            ?>
            <th>Total Bayar: </th>
            <td><b><?= $this->cart->format_number($totalBayar, 0); ?></b></td>
            <td><button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Proses Check Out
              </button></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <?php
  echo form_close();
  ?>
  <!-- /.row -->
  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-12">
      <a href="<?= base_url('belanja'); ?>" class="btn btn-primary"><i class="fas fa-reply"> </i> Kembali Ke Keranjang</a>

    </div>
  </div>
</div>
<!-- /.invoice -->