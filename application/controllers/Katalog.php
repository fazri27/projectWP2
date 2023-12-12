<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_katalog');
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Sepatu.id',
            'brand' => 'Sepatu.id',
            'katalog' => $this->m_katalog->get_all_data(),
            'isi' => 'view_admin_manajemen/katalog/v_katalog',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        // validasi tambah katalog
        $this->form_validation->set_rules(
            'nama_katalog',
            'Nama katalog',
            'required',
            [
                'required' => '%s harus di isi!',
            ]
        );

        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            [
                'required' => '%s harus di isi!',
            ]
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            [
                'required' => '%s harus di isi!',
            ]
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            [
                'required' => '%s harus di isi!',
            ]
        );

        // validasi berjalan

        if ($this->form_validation->run() == TRUE) {
            // upload gambar
            $config['upload_path'] = './assets/katalog/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Sepatu.id',
                    'brand' => 'Sepatu.id',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'view_admin_manajemen/katalog/v_add',
                );
                $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('layout/v_wrapper_admin', $data, FALSE);
            } else {
                $upload_data = array('uploads'  => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/katalog/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_katalog'   =>  $this->input->post('nama_katalog'),
                    'id_kategori'   =>  $this->input->post('id_kategori'),
                    'harga'   =>  $this->input->post('harga'),
                    'deskripsi'   =>  $this->input->post('deskripsi'),
                    'gambar'    => $upload_data['uploads']['file_name']
                );
                $this->m_katalog->add($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Pesan!</h5>
                Katalog Berhasil di Tambahkan!</div>');
                redirect('katalog');
            }
        }
        $data = array(
            'title' => 'Sepatu.id',
            'brand' => 'Sepatu.id',
            'kategori' => $this->m_kategori->get_all_data(),
            // 'error_upload' => $this->upload->display_errors(),
            'isi' => 'view_admin_manajemen/katalog/v_add',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

    //Update one item
    public function update($id_katalog)
    {
        $this->form_validation->set_rules(
            'nama_katalog',
            'Nama sepatu',
            'required',
            [
                'required' => '%s harus di isi!',
            ]
        );

        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            [
                'required' => '%s harus di isi!',
            ]
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            [
                'required' => '%s harus di isi!',
            ]
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            [
                'required' => '%s harus di isi!',
            ]
        );

        // validasi berjalan

        if ($this->form_validation->run() == TRUE) {
            // upload gambar
            $config['upload_path'] = './assets/katalog/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Katalog',
                    'brand' => '5 Cloth',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'katalog' => $this->m_katalog->get_data($id_katalog),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'view_admin_manajemen/katalog/v_add'
                );
                $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('layout/v_wrapper_admin', $data, FALSE);
            } else {
                // hapus gambar di dalam folder start
                $katalog =  $this->m_katalog->get_data($id_katalog);
                if ($katalog->gambar != "") {
                    unlink('./assets/katalog/' . $katalog->gambar);
                }

                // hapus gambar di dalam folder end

                // configurasi upload gambar start
                $upload_data = array('uploads'  => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/katalog/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // configurasi upload gambar end
                $data = array(
                    'id_katalog' => $id_katalog,
                    'nama_katalog'   =>  $this->input->post('nama_katalog'),
                    'id_kategori'   =>  $this->input->post('id_kategori'),
                    'harga'   =>  $this->input->post('harga'),
                    'deskripsi'   =>  $this->input->post('deskripsi'),
                    'gambar'    => $upload_data['uploads']['file_name']
                );
                $this->m_katalog->update($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Pesan!</h5>
                Katalog Berhasil di Tambahkan!</div>');
                redirect('katalog');
            }
            $data = array(
                'id_katalog' => $id_katalog,
                'nama_katalog'   =>  $this->input->post('nama_katalog'),
                'id_kategori'   =>  $this->input->post('id_kategori'),
                'harga'   =>  $this->input->post('harga'),
                'deskripsi'   =>  $this->input->post('deskripsi')
            );
            $this->m_katalog->update($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Pesan!</h5>
            Katalog Berhasil di Tambahkan!</div>');
            redirect('katalog');
        }
        $data = array(
            'title' => 'Edit sepatu',
            'brand' => 'Sepatu.id',
            'kategori' => $this->m_kategori->get_all_data(),
            'katalog' => $this->m_katalog->get_data($id_katalog),
            'isi' => 'view_admin_manajemen/katalog/v_update',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

    //Delete one item
    public function delete($id_katalog = NULL)
    {
        // hapus gambar di dalam folder start
        $katalog =  $this->m_katalog->get_data($id_katalog);
        if ($katalog->gambar != "") {
            unlink('./assets/gambarkatalog/' . $katalog->gambar);
        }

        // hapus gambar di dalam folder end
        $data = array('id_katalog' => $id_katalog);
        $this->m_katalog->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
        Data Berhasil di Hapus!</div>');
        redirect('katalog');
    }
}


/* End of file Katalog.php */
