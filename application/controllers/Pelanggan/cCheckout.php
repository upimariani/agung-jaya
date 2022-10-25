<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCheckout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKeranjang');
        $this->load->model('mCheckout');
    }

    public function index()
    {
        $this->form_validation->set_rules('ongkir', 'Kecamatan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Detail', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->protect->protect();
            $data = array(
                'cart' => $this->mKeranjang->selectCart(),
                'kecamatan' => $this->mCheckout->kecamatan()
            );
            $this->load->view('Pelanggan/Layout/head');
            $this->load->view('Pelanggan/Layout/header', $data);
            $this->load->view('Pelanggan/vCheckout', $data);
            $this->load->view('Pelanggan/Layout/foooter');
        } else {
            $cart = $this->mKeranjang->selectCart();
            // $tot = 0;
            // foreach ($cart['cart'] as $key => $value) {
            //     $tot += $value->qty_cart * ($value->price_prod - ($value->disc / 100 * $value->price_prod));
            // }
            // if ($tot <= 100000) {
            //     $this->session->set_flashdata('error', 'Belanja Minimal Rp. 100.000');
            //     redirect('Pelanggan/cCheckout');
            // } else {


            $data_transaksi = array(
                'id_order' => $this->input->post('id_transaksi'),
                'id_cust' => $this->session->userdata('id'),
                'tgl_order' => date('Y-m-d'),
                'total_order' => $this->input->post('total')
            );
            $this->mCheckout->insertTransaksi($data_transaksi);

            //detail pesanan

            foreach ($cart['cart'] as $key => $value) {
                $rincian = array(
                    'id_produk' => $value->id_produk,
                    'id_order' => $this->input->post('id_transaksi'),
                    'qty' => $value->qty_cart
                );
                $this->mCheckout->insertPesanan($rincian);
            }

            //menghapus keranjang
            foreach ($cart['cart'] as $key => $value) {
                $this->db->where('id_cart', $value->id_cart);
                $this->db->delete('keranjang');
            }

            foreach ($cart['cart'] as $key => $value) {
                $stok = array(
                    'stok_prod' => $value->stok_prod - $value->qty_cart
                );
                $this->db->where('id_produk', $value->id_produk);
                $this->db->update('produk', $stok);
            }




            //data pengiriman
            $pengiriman = array(
                'id_order' => $this->input->post('id_transaksi'),
                'id_kecamatan' => $this->input->post('ongkir'),
                'alamat' => $this->input->post('alamat')
            );
            $this->mCheckout->insertPengiriman($pengiriman);
            redirect('pelanggan/cPesananSaya');
        }
    }
}

/* End of file cCheckout.php */
