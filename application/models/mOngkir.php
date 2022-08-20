<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mOngkir extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('kecamatan', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('kecamatan');
        return $this->db->get()->result();
    }
    public function update($id, $data)
    {
        $this->db->where('id_kecamatan', $id);
        $this->db->update('kecamatan', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_kecamatan', $id);
        $this->db->delete('kecamatan');
    }
}

/* End of file mOngkir.php */
