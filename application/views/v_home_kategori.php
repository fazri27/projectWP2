<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="justify-content-center mb-5">

            <h2 class="text-center">Kategori - <b><?= $heading; ?></b></h2>
        </div>
        <div class="row d-flex align-items-stretch">
            <?php
            foreach ($katalog as $key => $value) { ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <?php
                    echo form_open('belanja/add');
                    echo form_hidden('id', $value->id_katalog);
                    echo form_hidden('qty', 1);
                    echo form_hidden('price', $value->harga);
                    echo form_hidden('name', $value->nama_katalog);
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>
                    <div class="card">
                        <div class="card-header text-muted border-bottom-0"><span class="badge badge-danger text-md">
                                <?= $value->nama_kategori; ?></span>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class=""><b><?= $value->nama_katalog; ?></b></h3>
                                </div>
                                <div class="col-12 text-center">
                                    <img src="<?= base_url('/assets/gambarkatalog/' . $value->gambar); ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="text-left">
                                        <h5 class="text-sm mt-1"><span class="badge badge-secondary text-md">IDR <?= number_format($value->harga, 0); ?></span></h5>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-right">
                                        <a href="<?= base_url('home/detail/' . $value->id_katalog); ?>" class="btn btn-sm bg-teal">
                                            <i class="fas fa-arrow-circle-right mr-1"></i> Detail
                                        </a>
                                        <button class="btn btn-sm btn-primary mx-auto swalDefaultSuccess">
                                            <i class="fas fa-shopping-bag mr-1"> </i> Add To Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>

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