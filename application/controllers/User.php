<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('ModelUser');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'User',
            'brand' => 'Sepatu.id',
            'member' => $this->ModelUser->get_all_data(),
            'isi' => 'view_admin_manajemen/v_user',
        );
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // $data['user_role'] = $this->ModelUser->dataRole(['role' => $this->session->userdata('role')])->row_array();
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

    //Update one item
    public function update($id_user)
    {
        $data = array(
            'id_user' => $id_user,
            'nama' => ($this->input->post('nama')),
            'email' => ($this->input->post('email')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role_id')
        );
        $this->ModelUser->update($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
        Data Berhasil di Edit!</div>');
        redirect('user');
    }

    //Delete one item
    public function delete($id_user = NULL)
    {
        $data = array('id_user' => $id_user);
        $this->ModelUser->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Pesan!</h5>
            Data Berhasil di Hapus!</div>');
        redirect('user');
    }
}

/* End of file User.php */
