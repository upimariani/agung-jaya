<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDetailTransaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksi');
    }

    public function detail($id)
    {
        $data = array(
            'detail' => $this->mTransaksi->detailtransaksi($id)
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Transaksi/vDetailTransaksi', $data);
        $this->load->view('Admin/Layout/footer');
    }
}

/* End of file cDetailTransaksi.php */
