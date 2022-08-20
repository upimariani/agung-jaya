<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKategori extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get()->result();
    }
    public function updateKategori($id, $data)
    {
        $this->db->where('id_category', $id);
        $this->db->update('kategori', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_category', $id);
        $this->db->delete('kategori');
    }
}

/* End of file mkategori.php */
