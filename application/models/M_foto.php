<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_foto extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('katalog.*,COUNT(tbl_gambar.id_katalog) as total_gambar');
        $this->db->from('katalog');
        $this->db->join('tbl_gambar', 'tbl_gambar.id_katalog = katalog.id_katalog', 'left');
        $this->db->group_by('katalog.id_katalog');
        $this->db->order_by('katalog.id_katalog', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->get()->row();
    }

    public function get_gambar($id_katalog)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_katalog', $id_katalog);
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_gambar', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('tbl_gambar', $data);
    }
}
