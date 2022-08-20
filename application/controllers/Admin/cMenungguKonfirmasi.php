<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cMenungguKonfirmasi extends CI_Controller
{

    public function index()
    {
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Transaksi/vKonfirmasi');
        $this->load->view('Admin/Layout/footer');
    }
}

/* End of file cMenungguKonfirmasi.php */
