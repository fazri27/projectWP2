<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('katalog');
        $this->db->join('kategori', 'kategori.id_kategori = katalog.id_kategori', 'left');
        $this->db->order_by('id_katalog', 'desc');
        return $this->db->get()->result();
    }
    public function get_all_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }


    public function get_all_data_byKategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('katalog');
        $this->db->join('kategori', 'kategori.id_kategori = katalog.id_kategori', 'left');
        $this->db->where('katalog.id_kategori', $id_kategori);
        $this->db->order_by('id_katalog', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_katalog)
    {
        $this->db->select('*');
        $this->db->from('katalog');
        $this->db->join('kategori', 'kategori.id_kategori = katalog.id_kategori', 'left');
        $this->db->where('id_katalog', $id_katalog);
        return $this->db->get()->row();
    }

    public function detail_gambar($id_katalog)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_katalog', $id_katalog);
        return $this->db->get()->result();
    }
}
