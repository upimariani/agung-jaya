<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLogin extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(
            array(
                'useradm' => $username,
                'passadm' => $password
            )
        );
        return $this->db->get()->row();
    }

    //pelanggan
    public function login_pelanggan($username, $password)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where(
            array(
                'username' => $username,
                'password' => $password
            )
        );
        return $this->db->get()->row();
    }
}

/* End of file mLogin.php */
