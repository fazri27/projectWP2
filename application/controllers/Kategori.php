<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }

    public function index()
    {
        $data = array(
            'title' => 'Kategori',
            'brand' => 'Sneaker.id',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'view_admin_manajemen/v_kategori',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

    // Add a new item
    public function add()
    {

        $data = array('nama_kategori' => $this->input->post('nama_kategori'));
        $this->m_kategori->add($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
        Kategori Berhasil di Tambahkan!</div>');
        redirect('kategori');
    }

    //Update one item
    public function update($id_kategori = null)
    {
        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => ($this->input->post('nama_kategori'))
        );
        $this->m_kategori->update($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
        Data Berhasil di Edit!</div>');
        redirect('kategori');
    }

    //Delete one item
    public function delete($id_kategori = NULL)
    {
        $data = array('id_kategori' => $id_kategori);
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
        Data Berhasil di Hapus!</div>');
        redirect('kategori');
    }
}

 /* End of file Kategori.php */
