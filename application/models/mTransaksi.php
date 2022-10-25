<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
    public function transaksi()
    {
        $data['pesanan_masuk'] = $this->db->query("SELECT * FROM `my_order` JOIN pelanggan ON my_order.id_cust=pelanggan.id_cust JOIN pengiriman ON my_order.id_order=pengiriman.id_order WHERE status_order='0'")->result();
        $data['menunggu_konfirmasi'] = $this->db->query("SELECT * FROM `my_order` JOIN pelanggan ON my_order.id_cust=pelanggan.id_cust JOIN pengiriman ON my_order.id_order=pengiriman.id_order WHERE status_order='1'")->result();
        $data['dikemas'] = $this->db->query("SELECT * FROM `my_order` JOIN pelanggan ON my_order.id_cust=pelanggan.id_cust JOIN pengiriman ON my_order.id_order=pengiriman.id_order WHERE status_order='2'")->result();
        $data['dikirim'] = $this->db->query("SELECT * FROM `my_order` JOIN pelanggan ON my_order.id_cust=pelanggan.id_cust JOIN pengiriman ON my_order.id_order=pengiriman.id_order WHERE status_order='3'")->result();
        $data['selesai'] = $this->db->query("SELECT * FROM `my_order` JOIN pelanggan ON my_order.id_cust=pelanggan.id_cust JOIN pengiriman ON my_order.id_order=pengiriman.id_order WHERE status_order='4'")->result();
        return $data;
    }
    public function detailTransaksi($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `my_order` JOIN pengiriman ON my_order.id_order=pengiriman.id_order JOIN pelanggan ON pelanggan.id_cust=my_order.id_cust JOIN kecamatan ON kecamatan.id_kecamatan = pengiriman.id_kecamatan WHERE my_order.id_order='" . $id . "'")->row();
        $data['pesanan'] = $this->db->query("SELECT * FROM produk_order JOIN my_order ON produk_order.id_order=my_order.id_order JOIN produk ON produk.id_produk=produk_order.id_produk JOIN diskon ON diskon.id_produk=produk.id_produk WHERE my_order.id_order='" . $id . "'")->result();
        return $data;
    }
    public function updateStatus($id, $data)
    {
        $this->db->where('id_order', $id);
        $this->db->update('my_order', $data);
    }
}

/* End of file mTransaksi.php */
