<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKeranjang extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKeranjang');
    }

    public function index()
    {
        $this->protect->protect();
        $data = array(
            'cart' => $this->mKeranjang->selectCart()
        );
        $this->load->view('Pelanggan/Layout/head');
        $this->load->view('Pelanggan/Layout/header', $data);
        $this->load->view('Pelanggan/vCart', $data);
        $this->load->view('Pelanggan/Layout/foooter');
    }
    public function deleteCart($id)
    {
        $this->protect->protect();
        $this->mKeranjang->delete($id);
        redirect('pelanggan/cKeranjang');
    }
    public function updateCart()
    {
        $this->protect->protect();
        $cart = $this->mKeranjang->selectCart();
        $i = 1;
        foreach ($cart['cart'] as $key => $value) {
            $data = array(
                'qty_cart' => $this->input->post('qty' . $i++)
            );
            $this->db->where('id_cart', $value->id_cart);
            $this->db->update('keranjang', $data);
            // echo $data['qty_cart'];
            // echo $value->id_cart;
        }
        redirect('pelanggan/cKeranjang');
    }
}

/* End of file cKeranjang.php */
