<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKategori');
	}

	public function index()
	{
		$data = array(
			'kategori' => $this->mKategori->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Kategori/vKategori', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function insertKategori()
	{
		$data = array(
			'name_category' => $this->input->post('kategori')
		);
		$this->mKategori->insert($data);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Disimpan!');
		redirect('Admin/cKategori');
	}
	public function updateKategori($id)
	{
		$data = array(
			'name_category' => $this->input->post('kategori')
		);
		$this->mKategori->updateKategori($id, $data);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Diperbaharui!');
		redirect('Admin/cKategori');
	}
	public function delete($id)
	{
		$this->mKategori->delete($id);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
		redirect('Admin/cKategori');
	}
}

/* End of file cKategori.php */
