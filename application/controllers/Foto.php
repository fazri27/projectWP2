<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Foto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_foto');
        $this->load->model('m_katalog');
        $this->load->library('form_validation');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Gambar Sepatu.id',
            'brand' => 'Sepatu.id',
            'gambarkatalog' => $this->m_foto->get_all_data(),
            'isi' => 'view_admin_manajemen/foto_katalog/v_foto',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

    // Add a new item
    public function add($id_katalog)
    {
        // validasi tambah katalog
        $this->form_validation->set_rules(
            'ket',
            'Keterangan',
            'required',
            [
                'required' => '%s harus di isi!',
            ]
        );

        // validasi berjalan

        if ($this->form_validation->run() == TRUE) {
            // upload gambar
            $config['upload_path'] = './assets/gambarkatalog/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Gambar Sepatu',
                    'brand' => 'Sepatu.id',
                    'gambar' => $this->m_foto->get_gambar($id_katalog),
                    'katalog' => $this->m_katalog->get_data($id_katalog),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'view_admin_manajemen/foto_katalog/v_add',
                );
                $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('layout/v_wrapper_admin', $data, FALSE);
            } else {
                $upload_data = array('uploads'  => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambarkatalog/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_katalog'    => $id_katalog,
                    'ket'           =>  $this->input->post('ket'),
                    'gambar'        => $upload_data['uploads']['file_name']
                );
                $this->m_foto->add($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Pesan!</h5>
                Gambar Berhasil di Tambahkan!</div>');
                redirect('foto/add/' . $id_katalog);
            }
        }
        $data = array(
            'title' => 'Tambah Gambar Sepatu',
            'brand' => '5 Cloth',
            'gambar' => $this->m_foto->get_gambar($id_katalog),
            'katalog' => $this->m_katalog->get_data($id_katalog),
            'isi' => 'view_admin_manajemen/foto_katalog/v_add',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

    //Update one item
    public function update($id = NULL)
    {
    }

    //Delete one item
    public function delete($id_katalog, $id_gambar)
    {
        // hapus gambar di dalam folder start
        $gambar =  $this->m_foto->get_data($id_gambar);
        if ($gambar->gambar != "") {
            unlink('./assets/gambarkatalog/' . $gambar->gambar);
        }

        // hapus gambar di dalam folder end
        $data = array('id_gambar' => $id_gambar);
        $this->m_foto->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Pesan!</h5>
                Gambar Berhasil di Hapus!</div>');
        redirect('foto/add/' . $id_katalog);
    }
}

/* End of file Gambarkatalog.php */
