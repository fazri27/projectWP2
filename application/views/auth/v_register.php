<div class="register-box">
    <div class="register-logo">
        <img src="<?= base_url(); ?>assets/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <br>
        <p class="text-primary"><b><?= $brand; ?> | Daftar</b></p>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Daftar Member</p>

            <form method="post" action="<?= base_url('autentifikasi/register'); ?>">
                <div class="form-grup mb-3">
                    <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-grup mb-3">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-grup mb-3">
                    <input type="password" name="password1" class="form-control" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-grup mb-3">
                    <input type="password" name="password2" class="form-control" placeholder="Konfirmasi password">
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block swalDefaultSuccess">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <hr>
            <p class="text-center">
                <a href="<?= base_url('autentifikasi'); ?>" class="text-center">Sudah Punya Akun?</a>
            </p>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->