<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPesananSaya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKeranjang');
        $this->load->model('mPesananSaya');
    }
    public function index()
    {
        $data = array(
            'cart' => $this->mKeranjang->selectCart(),
            'pesanan' => $this->mPesananSaya->pesananSaya()
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header', $data);
        $this->load->view('Pelanggan/vPesananSaya', $data);
        $this->load->view('Pelanggan/Layout/foooter');
    }
    public function detail_order($id)
    {
        $data = array(
            'cart' => $this->mKeranjang->selectCart(),
            'detail' => $this->mPesananSaya->transaksi($id)
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header', $data);
        $this->load->view('Pelanggan/vDetailPesanan', $data);
        $this->load->view('Pelanggan/Layout/foooter');
    }
    public function bayar($id)
    {
        $config['upload_path']          = './asset/bukti-pembayaran';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti')) {
            $data = array(
                'error' => $this->upload->display_errors(),
                'cart' => $this->mKeranjang->selectCart(),
                'detail' => $this->mPesananSaya->transaksi($id)
            );
            $this->load->view('Pelanggan/Layout/head');
            $this->load->view('Pelanggan/Layout/header', $data);
            $this->load->view('Pelanggan/vDetailPesanan', $data);
            $this->load->view('Pelanggan/Layout/foooter');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'status_order' => '1',
                'bukti_pembayaran' => $upload_data['file_name']
            );
            $this->mPesananSaya->bayar($id, $data);

            redirect('Pelanggan/cPesananSaya');
        }
    }
}

/* End of file cPesananSaya.php */
