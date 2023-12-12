<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Autentifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email',
            [
                'required' => 'Email Harus diisi!!',
                'valid_email' => 'Email Tidak valid!!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Harus diisi'
            ]
        );

        if ($this->form_validation->run() == false) {

            $data = array(
                'title' => 'Login User',
                'brand' => 'Sepatu.id',
            );
            $this->load->view('auth/template/auth_header', $data,);
            $this->load->view('auth/v_login', $data,);
            $this->load->view('auth/template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // user ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('dashboard');
                } else {
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                password anda salah!</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Error!</h5>
            Email anda belum terdaftar!</div>');
            redirect('autentifikasi');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus di isi!!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus di isi!!',
            'valid_email' => 'Email tidak valid!!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password harus di isi!!',
            'min_length' => 'Password terlalu pendek!!',
            'matches' => 'Password tidak sama!!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Registrasi',
                'brand' => 'Sepatu.id',
            );
            $this->load->view('auth/template/auth_header', $data,);
            $this->load->view('auth/v_register', $data,);
            $this->load->view('auth/template/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'user.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'tanggal_input' => time()
            ];
            $this->ModelUser->simpanData($data); //menggunakan model

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Pesan!</h5>
            Selamat!! akun member anda sudah dibuat. Silahkan Login Akun anda</div>');
            redirect('autentifikasi');
        }
    }

    // logout
    public function logout()
    {


        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
        Anda sudah Logout! Terima kasih.</div>');
        redirect('home');
    }
}

/* End of file Auth.php */
