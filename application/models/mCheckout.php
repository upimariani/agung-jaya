<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mCheckout extends CI_Model
{
    public function kecamatan()
    {
        $this->db->select('*');
        $this->db->from('kecamatan');
        return $this->db->get()->result();
    }
    public function insertTransaksi($data)
    {
        $this->db->insert('my_order', $data);
    }
    public function insertPesanan($data)
    {
        $this->db->insert('produk_order', $data);
    }
    public function insertPengiriman($data)
    {
        $this->db->insert('pengiriman', $data);
    }
}

/* End of file mCheckout.php */
