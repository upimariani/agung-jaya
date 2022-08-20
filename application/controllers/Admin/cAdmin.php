<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAdmin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAdmin');
	}
	public function index()
	{
		$data = array(
			'admin' => $this->mAdmin->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/DataAdmin/vAdmin', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function insertAdmin()
	{
		$data = array(
			'name_adm' => $this->input->post('nama'),
			'address_adm' => $this->input->post('alamat'),
			'no_phoneadm' => $this->input->post('no_hp'),
			'useradm' => $this->input->post('username'),
			'passadm' => $this->input->post('password')
		);
		$this->mAdmin->insert($data);
		$this->session->set_flashdata('success', 'Data Admin Berhasil Ditambahkan!');
		redirect('Admin/cAdmin', 'refresh');
	}
	public function updateAdmin($id)
	{
		$data = array(
			'name_adm' => $this->input->post('nama'),
			'address_adm' => $this->input->post('alamat'),
			'no_phoneadm' => $this->input->post('no_hp'),
			'useradm' => $this->input->post('username'),
			'passadm' => $this->input->post('password')
		);
		$this->mAdmin->update($id, $data);
		$this->session->set_flashdata('success', 'Data Admin Berhasil Diperbaharui!');
		redirect('Admin/cAdmin', 'refresh');
	}
	public function delete($id)
	{
		$this->mAdmin->delete($id);
		$this->session->set_flashdata('success', 'Data Admin Berhasil Dihapus!');
		redirect('Admin/cAdmin', 'refresh');
	}
}

/* End of file cAdmin.php */
