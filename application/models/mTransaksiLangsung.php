<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksiLangsung extends CI_Model
{
    public function transaksaksilangsung()
    {
        $this->db->select('*');
        $this->db->from('my_order');
        $this->db->where('type_order=2');

        return $this->db->get()->result();
    }
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        return $this->db->get()->result();
    }
    public function insert_my_order($data)
    {
        $this->db->insert('my_order', $data);
    }
    public function insert_produk_order($data)
    {
        $this->db->insert('produk_order', $data);
    }
    public function update_stok($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    public function detail($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `my_order` WHERE id_order='" . $id . "'")->row();
        $data['produk'] = $this->db->query("SELECT * FROM `my_order` JOIN produk_order ON my_order.id_order=produk_order.id_order JOIN produk ON produk_order.id_produk=produk.id_produk JOIN diskon ON diskon.id_produk=produk.id_produk WHERE my_order.id_order='" . $id . "'")->result();
        return $data;
    }
}

/* End of file mTransaksiLangsung.php */
