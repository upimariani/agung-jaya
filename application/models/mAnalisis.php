<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function lap()
	{
		$data['analisis_jk'] = $this->db->query("SELECT COUNT(pelanggan.id_cust) as jml_cust, jk, member FROM `my_order` JOIN pelanggan ON my_order.id_cust=pelanggan.id_cust WHERE member='1' GROUP BY jk")->result();
		$data['analisis_alamat'] = $this->db->query("SELECT COUNT(alamat) as jml_alamat, nama_kecamatan FROM my_order JOIN pengiriman ON my_order.id_order=pengiriman.id_order JOIN kecamatan ON pengiriman.id_kecamatan=kecamatan.id_kecamatan GROUP BY pengiriman.id_kecamatan")->result();
		return $data;
	}


	public function lap_harian_transaksi($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('my_order');
		$this->db->join('pelanggan', 'my_order.id_cust = pelanggan.id_cust', 'left');
		$this->db->where('status_order=4');

		$this->db->where('DAY(tgl_order)', $tanggal);
		$this->db->where('MONTH(tgl_order)', $bulan);
		$this->db->where('YEAR(tgl_order)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_bulanan_transaksi($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('my_order');
		$this->db->join('pelanggan', 'my_order.id_cust = pelanggan.id_cust', 'left');
		$this->db->where('status_order=4');

		$this->db->where('MONTH(tgl_order)', $bulan);
		$this->db->where('YEAR(tgl_order)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_tahunan_transaksi($tahun)
	{
		$this->db->select('*');
		$this->db->from('my_order');
		$this->db->join('pelanggan', 'my_order.id_cust = pelanggan.id_cust', 'left');
		$this->db->where('status_order=4');


		$this->db->where('YEAR(tgl_order)', $tahun);
		return $this->db->get()->result();
	}
	public function produk_terjual()
	{
		return $this->db->query("SELECT SUM(qty) as qty, name_prod FROM `produk_order` JOIN produk ON produk_order.id_produk=produk.id_produk GROUP BY produk_order.id_produk ORDER BY qty DESC")->result();
	}
	public function analisis_member()
	{
		return $this->db->query("SELECT COUNT(id_cust) as qty_member,  IF(member='0', 'Non Member', 'Member') as nm_member FROM `pelanggan` GROUP BY member")->result();
	}
}

/* End of file mAnalisis.php */
