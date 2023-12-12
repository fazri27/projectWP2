<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                <div class="col-12">
                    <img src="<?= base_url('assets/katalog/' . $detail_katalog->gambar); ?>" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="<?= base_url('assets/katalog/' . $detail_katalog->gambar); ?>" alt="Product Image"></div>
                    <?php
                    foreach ($detail_gambar as $key => $value) { ?>
                        <div class="product-image-thumb"><img src="<?= base_url('assets/gambarkatalog/' . $value->gambar); ?>" alt="Product Image"></div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="text-xl ml-1"><span class="badge badge-danger mt-2"><strong><?= $detail_katalog->nama_kategori; ?></strong></span></h5>
                    </div>
                    <div class="col-6 col-sm-6">
                        <h2 class="mt-1"><strong><?= $detail_katalog->nama_katalog; ?></strong></h2>
                    </div>
                </div>
                <hr>
                <p><?= $detail_katalog->deskripsi; ?></p>
                <hr>
                <div class=" px-3 my-auto">
                    <h3 class="mb-0 text-xl">
                        <span class="badge badge-secondary my-auto">IDR <?= number_format($detail_katalog->harga, 0); ?>,00</span>
                    </h3>
                    <hr>
                </div>
                <?php
                echo form_open('belanja/add');
                echo form_hidden('id', $detail_katalog->id_katalog);
                echo form_hidden('price', $detail_katalog->harga);
                echo form_hidden('name', $detail_katalog->nama_katalog);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="number" name="qty" value="1" min="1" class="form-control">
                        </div>
                        <div class="col-sm-8">
                            <button class="btn btn-primary swalDefaultSuccess">
                                <i class="fas fa-shopping-bag fa-lg mr-2"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <?php
                form_close();
                ?>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>template/dist/js/demo.js"></script>

<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Katalog berhasil di tambahkan ke Keranjang'
            })
        });
    });
</script>