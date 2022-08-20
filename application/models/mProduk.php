<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProduk extends CI_Model
{
    public function insertProduk($data)
    {
        $this->db->insert('produk', $data);
    }
    public function insertDiskon($data)
    {
        $this->db->insert('diskon', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_category = kategori.id_category', 'left');
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_category = kategori.id_category', 'left');
        $this->db->where('id_produk', $id);
        return $this->db->get()->row();
    }
    public function updateProduk($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }
    public function deleteDiskon($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('diskon');
    }
}

/* End of file mProduk.php */
