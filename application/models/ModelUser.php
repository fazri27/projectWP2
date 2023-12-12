<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }
    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        // $this->db->join('user_role', 'user_role.role_id = user.role_id', 'left');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }
    public function get_data($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }

    public function update($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('user', $data);
    }
}
