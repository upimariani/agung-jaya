<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mPesananSaya extends CI_Model
{
    public function pesananSaya()
    {
        $this->db->select('*');
        $this->db->from('my_order');
        return $this->db->get()->result();
    }
    public function transaksi($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `my_order` JOIN pengiriman ON my_order.id_order=pengiriman.id_order JOIN pelanggan ON pelanggan.id_cust=my_order.id_cust JOIN kecamatan ON kecamatan.id_kecamatan = pengiriman.id_kecamatan WHERE my_order.id_order='" . $id . "'")->row();
        $data['pesanan'] = $this->db->query("SELECT * FROM produk_order JOIN my_order ON produk_order.id_order=produk_order.id_order JOIN produk ON produk.id_produk=produk_order.id_produk JOIN diskon ON diskon.id_produk=produk.id_produk WHERE my_order.id_order='" . $id . "'")->result();
        return $data;
    }
    public function bayar($id, $data)
    {
        $this->db->where('id_order', $id);
        $this->db->update('my_order', $data);
    }
}

/* End of file mPesananSaya.php */
