<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKeranjang extends CI_Model
{
    public function cek_cart($id)
    {
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->where('id_produk', $id);
        $this->db->where('id_cust', $this->session->userdata('id'));
        return $this->db->get()->row();
    }
    public function insertCart($data)
    {
        $this->db->insert('keranjang', $data);
    }
    public function updateCart($id, $data)
    {
        $this->db->where('id_cart', $id);
        $this->db->update('keranjang', $data);
    }

    public function selectCart()
    {
        if ($this->session->userdata('id') != '') {
            $data['jml'] = $this->db->query("SELECT SUM(qty_cart) as jml FROM `keranjang` WHERE id_cust=" . $this->session->userdata('id'))->row();
            $data['cart'] = $this->db->query("SELECT * FROM `keranjang` JOIN produk ON keranjang.id_produk=produk.id_produk JOIN diskon ON diskon.id_produk=produk.id_produk WHERE id_cust=" . $this->session->userdata('id'))->result();
            return $data;
        }
    }

    public function delete($id)
    {
        $this->db->where('id_cart', $id);
        $this->db->delete('keranjang');
    }
}

/* End of file mKeranjang.php */
