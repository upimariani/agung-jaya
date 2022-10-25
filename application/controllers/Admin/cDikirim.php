<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDikirim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksi');
    }

    public function index()
    {
        $data = array(
            'transaksi' => $this->mTransaksi->transaksi()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Transaksi/vDikirim', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function kirim($id)
    {
        $data = array(
            'status_order' => '3'
        );
        $this->mTransaksi->updateStatus($id, $data);
        $this->session->set_flashdata('success', 'Data Transaksi Berhasil Dikirim!!!');
        redirect('Admin/cDikirim');
    }
}

/* End of file cDikirim.php */
