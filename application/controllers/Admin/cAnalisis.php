<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAnalisis');
    }


    public function analisis_penjualan()
    {
        $data = array(
            'analisis' => $this->mAnalisis->lap()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Analisis/vPenjualan', $data);
        $this->load->view('Admin/Layout/footer', $data);
    }
    public function analisis_jk()
    {
        $data = array(
            'analisis' => $this->mAnalisis->lap()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Analisis/vAnalisisJk', $data);
        $this->load->view('Admin/Layout/footer', $data);
    }
    public function analisis_alamat()
    {
        $data = array(
            'analisis' => $this->mAnalisis->lap()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Analisis/vAnalisisAlamat', $data);
        $this->load->view('Admin/Layout/footer', $data);
    }



    //laporan transaksi
    public function lap_harian_transaksi()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mAnalisis->lap_harian_transaksi($tanggal, $bulan, $tahun)
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Analisis/harian', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function lap_bulanan_transaksi()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mAnalisis->lap_bulanan_transaksi($bulan, $tahun)
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Analisis/bulanan', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function lap_tahunan_transaksi()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
            'laporan' => $this->mAnalisis->lap_tahunan_transaksi($tahun)
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Analisis/tahunan', $data);
        $this->load->view('Admin/Layout/footer');
    }
}

/* End of file cAnalisis.php */
