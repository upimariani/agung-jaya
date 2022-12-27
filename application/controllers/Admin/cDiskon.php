<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDiskon extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDiskon');
	}


	public function index()
	{
		$data = array(
			'diskon' => $this->mDiskon->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Diskon/vDiskon', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createDiskon()
	{
		$this->form_validation->set_rules('produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('nama', 'Nama Diskon', 'required');
		$this->form_validation->set_rules('besar', 'Besar Diskon Produk', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Selesai', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'produk' => $this->mDiskon->produk()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Diskon/vCreateDiskon', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$id_produk = $this->input->post('produk');
			$data = array(
				'name_disc' => $this->input->post('nama'),
				'disc' => $this->input->post('besar'),
				'tgl_end' => $this->input->post('tgl'),
				'tgl_start' => $this->input->post('tgl_mulai')
			);
			$this->mDiskon->insertDiskon($id_produk, $data);
			$this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan !!!');
			redirect('Admin/cDiskon');
		}
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Diskon', 'required');
		$this->form_validation->set_rules('besar', 'Besar Diskon Produk', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Selesai', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'diskon' => $this->mDiskon->edit($id)
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Diskon/vUpdateDiskon', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$id_produk = $this->input->post('id_produk');
			$data = array(
				'name_disc' => $this->input->post('nama'),
				'disc' => $this->input->post('besar'),
				'tgl_end' => $this->input->post('tgl'),
				'tgl_start' => $this->input->post('tgl_mulai')
			);
			$this->mDiskon->insertDiskon($id_produk, $data);
			$this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan !!!');
			redirect('Admin/cDiskon');
		}
	}
	public function delete($id)
	{
		$data = array(
			'name_disc' => '0',
			'disc' => '0',
			'tgl_end' => '0',
			'tgl_start' => '0'
		);
		$this->mDiskon->insertDiskon($id, $data);
		$this->session->set_flashdata('success', 'Data Diskon Berhasil Dihapus !!!');
		redirect('Admin/cDiskon');
	}
}

/* End of file cDiskon.php */
