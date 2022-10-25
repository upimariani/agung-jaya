<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKemas extends CI_Controller
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
        $this->load->view('Admin/Transaksi/vKemas', $data);
        $this->load->view('Admin/Layout/footer');
    }
}

/* End of file cKemas.php */
