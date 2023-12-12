<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_cekout');
  }

  public function index()
  {
    if (empty($this->cart->contents())) {
      redirect('home');
    }
    $data = array(
      'title' => 'Keranjang',
      'brand' => 'Sepatu.id',
      'isi' => 'v_home_keranjang',
    );
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('layout/v_wrapper_user', $data, FALSE);
  }

  public function add()
  {

    $redirect_page = $this->input->post('redirect_page');
    $data = array(
      'id'      => $this->input->post('id'),
      'qty'     => $this->input->post('qty'),
      'price'   => $this->input->post('price'),
      'name'    => $this->input->post('name'),
    );

    $this->cart->insert($data);

    redirect($redirect_page, 'search');
  }

  public function update()
  {
    $i = 1;
    foreach ($this->cart->contents() as $items) {
      $data = array(
        'rowid' => $items['rowid'],
        'qty'   => $this->input->post($i . '[qty]'),
      );
      $this->cart->update($data);
      $i++;
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
        Keranjang Berhasil di Update!</div>');
    redirect('belanja');
  }

  public function delete($rowid)
  {
    $this->cart->remove($rowid);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Pesan!</h5>
                Katalog Berhasil di Hapus dari Keranjang!</div>');
    redirect('belanja');
  }

  public function clear()
  {
    $this->cart->destroy();
    redirect('belanja');
  }

  public function cekout()
  {
    if ($this->session->userdata('email') == '') {
      $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Error!</h5>
            Harap Login terlebih dahulu!</div>');
      redirect('autentifikasi');
    } else {
      $data = array(
        'title' => 'Check Out',
        'brand' => 'Sepatu.id',
        'isi' => 'v_home_cekout',

      );
      $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('layout/v_wrapper_user', $data, FALSE);
    }
  }

  public function proses_cekout()
  {
    // $transaksi = array(
    //   'nama_pemesan' => $this->input->post('nama_pemesan'),
    // );

    foreach ($this->cart->contents() as $items) {
      $data = array(
        'rowid' => $items['rowid'],
        'qty' => $items['qty'],
        'harga' => $items['price'],
        'nama_katalog' => $items['name'],
        'subtotal' => $items['subtotal'],
        // 'nama_pemesan' => $this->input->post('nama_pemesan'),
        // 'jasa_pengirim' => $this->input->post('jasa_pengirim'),
        // 'no_hp' => $this->input->post('no_hp'),
        // 'provinsi' => $this->input->post('provinsi'),
        // 'kota' => $this->input->post('kota'),
        // 'alamat' => $this->input->post('alamat'),
        'total' => $this->cart->total(),
        // 'pembayaran' =>  $this->input->post('pembayaran'),
        'tgl_transaksi' => time()
      );
      $this->m_cekout->simpanTransaksi($data);
      if ($data) {
        $this->cart->destroy();
      }
      redirect('belanja');
    }
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Pesan!</h5>
            Katalog Berhasil Di Check Out!</div>');
  }
}
