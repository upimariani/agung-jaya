<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cMenungguKonfirmasi extends CI_Controller
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
        $this->load->view('Admin/Transaksi/vKonfirmasi', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function konfirmasi($id)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->mTransaksi->updateStatus($id, $data);
        $this->session->set_flashdata('success', 'Data Transaksi Berhasil Dikonfirmasi!!!');
        redirect('Admin/cKemas');
    }
}

/* End of file cMenungguKonfirmasi.php */
