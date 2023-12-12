<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('m_dashboard');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'brand' => 'Sepatu.id',
            'total_katalog' => $this->m_dashboard->total_katalog(),
            'total_user' => $this->m_dashboard->total_user(),
            'total_kategori' => $this->m_dashboard->total_kategori(),
            'pesanan' => $this->m_cekout->pesanan(),
            'isi' => 'view_admin_manajemen/v_dashboard',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

    function update($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'status' => $this->input->post('status')
        );
        $this->m_cekout->update($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
        Data Berhasil di Udate!</div>');
        redirect('dashboard');
    }
}
