<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cOngkir extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mOngkir');
	}

	public function index()
	{
		$data = array(
			'ongkir' => $this->mOngkir->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Ongkir/vOngkir', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function insertOngkir()
	{
		$data = array(
			'nama_kecamatan' => $this->input->post('nama'),
			'ongkir' => $this->input->post('ongkir')
		);
		$this->mOngkir->insert($data);
		$this->session->set_flashdata('success', 'Data Ongkir Berhasil Ditambahkan!!!');
		redirect('Admin/cOngkir');
	}
	public function update($id)
	{
		$data = array(
			'nama_kecamatan' => $this->input->post('nama'),
			'ongkir' => $this->input->post('ongkir')
		);
		$this->mOngkir->update($id, $data);
		$this->session->set_flashdata('success', 'Data Ongkir Berhasil Diperbaharui!!!');
		redirect('Admin/cOngkir');
	}
	public function delete($id)
	{
		$this->mOngkir->delete($id);
		$this->session->set_flashdata('success', 'Data Ongkir Berhasil Dihapus!!!');
		redirect('Admin/cOngkir');
	}
}

/* End of file cOngkir.php */
