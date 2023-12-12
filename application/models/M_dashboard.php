<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function total_katalog()
    {
        return $this->db->get('katalog')->num_rows();
    }

    public function total_user()
    {
        return $this->db->get('user')->num_rows();
    }
    public function total_kategori()
    {
        return $this->db->get('kategori')->num_rows();
    }

    public function update($id_transaksi = null)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'nama_kategori' => ($this->input->post('nama_kategori'))
        );
        $this->m_kategori->update($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Pesan!</h5>
        Data Berhasil di Edit!</div>');
        redirect('kategori');
    }
}

/* End of file M_admin.php */
