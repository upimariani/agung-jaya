<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSelesai extends CI_Controller
{

    public function index()
    {
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Transaksi/vSelesai');
        $this->load->view('Admin/Layout/footer');
    }
}

/* End of file cSelesai.php */
