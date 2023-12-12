<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

  public function bunga()
  {
    $data = array(
      'title' => 'Data Laporan katalog',
      'brand' => 'Sneaker.id',
      'katalog' => $this->m_katalog->get_all_data(),
      'isi' => 'view_admin_manajemen/laporan/bunga/v_bunga',
    );
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('layout/v_wrapper_admin', $data, FALSE);
  }
  public function cetak_laporan_bunga()
  {
    $data = array(
      'bunga' => $this->m_katalog->get_all_data(),
    );
    $this->load->view('view_admin_manajemen/laporan/bunga/print_laporan_bunga', $data, FALSE);
  }
  public function laporan_bunga_pdf()
  {
    $this->load->library('Dompdf_gen');

    $data = array(
      'bunga' => $this->m_katalog->get_all_data(),
    );
    $this->load->view('view_admin_manajemen/laporan/bunga/pdf_laporan_bunga', $data);


    $paper = 'A4';
    $orien = 'landscape';
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper, $orien);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream('Laporan Data bunga.pdf');
  }

  public function export_excel_bunga()
  {
    $data = array(
      'title' => 'Laporan bunga',
      'bunga' => $this->m_katalog->get_all_data(),
    );

    $this->load->view('view_admin_manajemen/laporan/bunga/excel_laporan_bunga', $data);
  }

  public function user()
  {
    $data = array(
      'title' => 'Data Laporan User',
      'brand' => 'Aa Florist',
      'member' => $this->ModelUser->get_all_data(),
      'isi' => 'view_admin_manajemen/laporan/user/v_user',
    );
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('layout/v_wrapper_admin', $data, FALSE);
  }


  public function cetak_laporan_user()
  {
    $data = array(
      'member' => $this->ModelUser->get_all_data(),
    );
    $this->load->view('view_admin_manajemen/laporan/user/print_laporan_user', $data, FALSE);
  }
  public function laporan_user_pdf()
  {
    $this->load->library('Dompdf_gen');

    $data = array(
      'member' => $this->ModelUser->get_all_data(),
    );
    $this->load->view('view_admin_manajemen/laporan/user/pdf_laporan_user', $data);


    $paper = 'A4';
    $orien = 'landscape';
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper, $orien);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream('Laporan Data user.pdf');
  }

  public function export_excel_user()
  {
    $data = array(
      'title' => 'Laporan user',
      'member' => $this->ModelUser->get_all_data(),
    );

    $this->load->view('view_admin_manajemen/laporan/user/excel_laporan_user', $data);
  }

  public function pesanan()
  {
    $data = array(
      'title' => 'Data Laporan pesanan',
      'brand' => 'Aa Florist',
      'pesanan' => $this->m_cekout->pesanan(),
      'isi' => 'view_admin_manajemen/laporan/pesanan/v_pesanan',
    );
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('layout/v_wrapper_admin', $data, FALSE);
  }
  public function cetak_laporan_pesanan()
  {
    $data = array(
      'pesanan' => $this->m_cekout->pesanan(),
    );
    $this->load->view('view_admin_manajemen/laporan/pesanan/print_laporan_pesanan', $data, FALSE);
  }
  public function laporan_pesanan_pdf()
  {
    $this->load->library('Dompdf_gen');

    $data = array(
      'pesanan' => $this->m_cekout->pesanan(),
    );
    $this->load->view('view_admin_manajemen/laporan/pesanan/pdf_laporan_pesanan', $data);


    $paper = 'A4';
    $orien = 'landscape';
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper, $orien);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream('Laporan Data pesanan.pdf');
  }

  public function export_excel_pesanan()
  {
    $data = array(
      'title' => 'Laporan pesanan',
      'pesanan' => $this->m_cekout->pesanan(),
    );

    $this->load->view('view_admin_manajemen/laporan/pesanan/excel_laporan_pesanan', $data);
  }
}

/* End of file Laporan.php */
