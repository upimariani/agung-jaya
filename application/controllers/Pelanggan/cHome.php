<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHome');
		$this->load->model('mKeranjang');
	}


	public function index()
	{
		$tgl = date('Y-m-d', strtotime($this->session->userdata('tgl')));
		$birthDate = (new DateTime($tgl));
		$today = new DateTime("today");

		$y = $today->diff($birthDate)->y;
		$m = $today->diff($birthDate)->m;
		$d = $today->diff($birthDate)->d;
		$data = array(
			'produk' => $this->mHome->select_produk(),
			'cart' => $this->mKeranjang->selectCart(),
			'best' => $this->mHome->best_produk(),
			'old' => $y,
			'umur' => $this->mHome->produk_umur($y)
		);
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/Layout/header', $data);
		$this->load->view('Pelanggan/vHome', $data);
		$this->load->view('Pelanggan/Layout/foooter');
	}
	public function add()
	{
		$this->protect->protect();
		$cek = $this->input->post('id_produk');
		$produk_cek = $this->mKeranjang->cek_cart($cek);
		if ($produk_cek) {
			$data = array(
				'qty_cart' => $produk_cek->qty_cart + 1
			);
			$this->mKeranjang->updateCart($produk_cek->id_cart, $data);
		} else {
			$data = array(
				'id_produk' => $this->input->post('id_produk'),
				'id_cust' => $this->session->userdata('id'),
				'qty_cart' => $this->input->post('qty')
			);
			$this->mKeranjang->insertCart($data);
		}

		redirect('Pelanggan/cHome');
	}
	public function detail_produk($id)
	{
		$data = array(
			'detail' => $this->mHome->detail_produk($id),
			'cart' => $this->mKeranjang->selectCart(),
			'qty' => $this->mHome->qty_terjual($id)

		);
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/Layout/header', $data);
		$this->load->view('Pelanggan/vDetailProduk', $data);
		$this->load->view('Pelanggan/Layout/foooter');
	}

	//profil pelanggan
	public function profil_pelanggan()
	{
		$id = $this->session->userdata('id');
		$data = array(
			'cart' => $this->mKeranjang->selectCart(),
			'profil' => $this->mHome->profil($id)

		);
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/Layout/header', $data);
		$this->load->view('Pelanggan/vprofil', $data);
		$this->load->view('Pelanggan/Layout/foooter');
	}
	public function daftar_member($id)
	{
		$data = array(
			'member' => '1'
		);
		$this->db->where('id_cust', $id);
		$this->db->update('pelanggan', $data);
		redirect('Pelanggan/cHome/profil_pelanggan');
	}
}

/* End of file cHome.php */
