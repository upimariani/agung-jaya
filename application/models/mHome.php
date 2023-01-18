<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
	public function select_produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
		return $this->db->get()->result();
	}
	public function best_produk()
	{
		return $this->db->query("SELECT SUM(qty) as qty, produk_order.id_produk, name_prod, price_prod, stok_prod, gambar, disc  FROM `produk_order` JOIN produk ON produk_order.id_produk=produk.id_produk JOIN diskon ON diskon.id_produk=produk.id_produk GROUP BY produk_order.id_produk ORDER BY qty DESC LIMIT 4;")->result();
	}
	public function detail_produk($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
		$this->db->where('produk.id_produk', $id);
		return $this->db->get()->row();
	}
	public function qty_terjual($id)
	{
		return $this->db->query("SELECT SUM(qty) as qty, name_prod,produk.id_produk FROM `produk_order` JOIN produk ON produk_order.id_produk=produk.id_produk WHERE produk.id_produk='" . $id . "' GROUP BY produk_order.id_produk ORDER BY qty DESC")->row();
	}
	public function profil($id)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_cust', $id);
		return $this->db->get()->row();
	}

	public function produk_umur($umur)
	{
		return $this->db->query("SELECT * FROM `produk` JOIN diskon ON diskon.id_produk=produk.id_produk  WHERE target_awal<=" . $umur . " AND target_akhir>=" . $umur . ";")->result();
	}
}

/* End of file mHome.php */
