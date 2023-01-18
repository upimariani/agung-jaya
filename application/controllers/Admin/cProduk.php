<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProduk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProduk');
		$this->load->model('mKategori');
	}


	public function index()
	{
		$data = array(
			'produk' => $this->mProduk->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Produk/vProduk', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function insertProduk()
	{
		$this->form_validation->set_rules('kategori', 'Kategori Produk', 'required');
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');
		$this->form_validation->set_rules('awal', 'Range Awal Umur', 'required');
		$this->form_validation->set_rules('akhir', 'Range Akhir Umur', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'kategori' => $this->mKategori->select()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Produk/vCreateProduk', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 5000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$error = array(
					'error' => $this->upload->display_errors(),
					'kategori' => $this->mKategori->select()
				);
				$this->load->view('Admin/Layout/head');
				$this->load->view('Admin/Layout/aside');
				$this->load->view('Admin/Produk/vCreateProduk', $error);
				$this->load->view('Admin/Layout/footer');
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'id_produk' => $this->input->post('id_produk'),
					'id_category' => $this->input->post('kategori'),
					'name_prod' => $this->input->post('nama'),
					'ket_prod' => $this->input->post('keterangan'),
					'price_prod' => $this->input->post('harga'),
					'stok_prod' => $this->input->post('stok'),
					'gambar' => $upload_data['file_name'],
					'target_awal' => $this->input->post('awal'),
					'target_akhir' => $this->input->post('akhir'),

				);
				$this->mProduk->insertProduk($data);

				$diskon = array(
					'id_produk' => $this->input->post('id_produk')
				);
				$this->mProduk->insertDiskon($diskon);

				$this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan!');
				redirect('Admin/cProduk');
			}
		}
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('kategori', 'Kategori Produk', 'required');
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');
		$this->form_validation->set_rules('awal', 'Range Awal Umur', 'required');
		$this->form_validation->set_rules('akhir', 'Range Akhir Umur', 'required');


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 5000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'kategori' => $this->mKategori->select(),
					'produk' => $this->mProduk->edit($id)
				);
				$this->load->view('Admin/Layout/head');
				$this->load->view('Admin/Layout/aside');
				$this->load->view('Admin/Produk/vUpdateProduk', $data);
				$this->load->view('Admin/Layout/footer');
			} else {
				$produk = $this->mProduk->select();
				if ($produk->gambar !== "") {
					unlink('./asset/foto-produk/' . $produk->gambar);
				}
				$upload_data =  $this->upload->data();
				$data = array(
					'id_category' => $this->input->post('kategori'),
					'name_prod' => $this->input->post('nama'),
					'ket_prod' => $this->input->post('keterangan'),
					'price_prod' => $this->input->post('harga'),
					'stok_prod' => $this->input->post('stok'),
					'gambar' => $upload_data['file_name'],
					'target_awal' => $this->input->post('awal'),
					'target_akhir' => $this->input->post('akhir'),
				);
				$this->mProduk->updateProduk($id, $data);
				$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
				redirect('Admin/cProduk');
			} //tanpa ganti gambar
			$data = array(
				'id_category' => $this->input->post('kategori'),
				'name_prod' => $this->input->post('nama'),
				'ket_prod' => $this->input->post('keterangan'),
				'price_prod' => $this->input->post('harga'),
				'stok_prod' => $this->input->post('stok')
			);
			$this->mProduk->updateProduk($id, $data);
			$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
			redirect('Admin/cProduk');
		}
		$data = array(
			'kategori' => $this->mKategori->select(),
			'produk' => $this->mProduk->edit($id)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Produk/vUpdateProduk', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function delete($id)
	{
		$this->mProduk->delete($id);
		$this->mProduk->deleteDiskon($id);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus !!!');
		redirect('Admin/cProduk');
	}
}

/* End of file cProduk.php */
