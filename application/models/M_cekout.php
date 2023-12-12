<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cekout extends CI_Model
{
    public function simpanTransaksi($data = NULL)
    {
        $this->db->insert('transaksi', $data);
    }

    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->order_by('id_transaksi', 'ascd');
        return $this->db->get()->result();
    }
    public function update($data)
    {
        $this->db->where('rowid', $data['rowid']);
        $this->db->update('transaksi', $data);
    }
}

/* End of file M_cekout.php */
