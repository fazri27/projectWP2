<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_katalog extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('katalog');
        $this->db->join('kategori', 'kategori.id_kategori = katalog.id_kategori', 'left');
        $this->db->order_by('id_katalog', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_katalog)
    {
        $this->db->select('*');
        $this->db->from('katalog');
        $this->db->join('kategori', 'kategori.id_kategori = katalog.id_kategori', 'left');
        $this->db->where('id_katalog', $id_katalog);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('katalog', $data);
    }

    public function update($data)
    {
        $this->db->where('id_katalog', $data['id_katalog']);
        $this->db->update('katalog', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_katalog', $data['id_katalog']);
        $this->db->delete('katalog', $data);
    }
}

/* End of file M_katalog.php */
