<div class="login-box">
    <div class="login-logo">
        <img src="<?= base_url(); ?>assets/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="40%">
        <br>
        <p class="text-primary"><b><?= $brand; ?> | Login</b></p>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login Untuk Berbelanja</p>
            <?= $this->session->flashdata('pesan'); ?>
            <?= $this->session->flashdata('error'); ?>

            <form class="user" method="post" action="<?= base_url('autentifikasi'); ?>">
                <div class="form-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <!-- /.col -->
                </div>
                <hr>
                <!-- /.social-auth-links -->
                <p class="text-center">
                    <a href="<?= base_url('autentifikasi/register'); ?>" class="text-center">Daftar Member</a>
                </p>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->