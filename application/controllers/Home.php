<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'brand' => 'Sepatu.id',
            'katalog' => $this->m_home->get_all_data(),
            'isi' => 'v_home',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_user', $data, FALSE);
    }

    public function detail($id_barang)
    {
        $data = array(
            'title' => 'Home',
            'brand' => 'Sepatu.id',
            'detail_gambar' => $this->m_home->detail_gambar($id_barang),
            'detail_katalog' => $this->m_home->detail($id_barang),
            'isi' => 'v_home_detail',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_user', $data, FALSE);
    }
    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'title' => 'Kategori  :  ' . $kategori->nama_kategori,
            'brand' => 'Sepatu.id',
            'heading' => $kategori->nama_kategori,
            'katalog' => $this->m_home->get_all_data_byKategori($id_kategori),
            'isi' => 'v_home_kategori',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_user', $data, FALSE);
    }
}

/* End of file Home.php */
