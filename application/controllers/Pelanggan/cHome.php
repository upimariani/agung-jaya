<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mHome');
        $this->load->model('mKeranjang');
    }


    public function index()
    {
        $data = array(
            'produk' => $this->mHome->select_produk(),
            'cart' => $this->mKeranjang->selectCart()
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header', $data);
        $this->load->view('Pelanggan/vHome', $data);
        $this->load->view('Pelanggan/Layout/foooter');
    }
    public function add()
    {
        $this->protect->protect();
        $cek = $this->input->post('id_produk');
        $produk_cek = $this->mKeranjang->cek_cart($cek);
        if ($produk_cek) {
            $data = array(
                'qty_cart' => $produk_cek->qty_cart + 1
            );
            $this->mKeranjang->updateCart($produk_cek->id_cart, $data);
        } else {
            $data = array(
                'id_produk' => $this->input->post('id_produk'),
                'id_cust' => $this->session->userdata('id'),
                'qty_cart' => '1'
            );
            $this->mKeranjang->insertCart($data);
        }

        redirect('Pelanggan/cHome');
    }
}

/* End of file cHome.php */
