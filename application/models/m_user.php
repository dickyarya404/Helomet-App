<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_user extends CI_Model
{
    function getAllUser()
    {
        $this->db->select('user_id, user_username, user_name, user_email, user_role, user_statusactivated');
        $this->db->from('tb_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function update($data)
    {
        $this->db->where('user_id',$data['user_id']);
        $this->db->update('tb_user',$data);
    }

    public function get_data($user_id)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('user_id',$user_id);
        return $this->db->get()->row();
    }

    public function delete($data)
    {
        $this->db->where('user_id',$data['user_id']);
        $this->db->delete('tb_user',$data);
    }

    
}
