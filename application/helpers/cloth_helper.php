<?php
function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        Akses ditolak! silahkan login</div>');
        redirect('autentifikasi');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}
