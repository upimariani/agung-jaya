<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDiskon extends CI_Model
{
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->where('disc = 0');
        return $this->db->get()->result();
    }
    public function insertDiskon($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('diskon', $data);
    }

    public function select()
    {
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('produk', 'diskon.id_produk = produk.id_produk', 'left');
        $this->db->where('disc != 0');
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('produk', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->where('id_disc', $id);
        return $this->db->get()->row();
    }
}

/* End of file mDiskon.php */
