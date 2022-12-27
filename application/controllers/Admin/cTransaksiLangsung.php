<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiLangsung extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksiLangsung');
    }


    public function index()
    {
        $data = array(
            'transaksi' => $this->mTransaksiLangsung->transaksaksilangsung(),
            'member' => $this->mTransaksiLangsung->member()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/TransaksiLangsung/vTransaksiLangsung', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function detail_order($id)
    {
        $data = array(
            'detail' => $this->mTransaksiLangsung->detail($id)
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/TransaksiLangsung/vDetailTransaksiLangsung', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function add_member()
    {
        $data = array(
            'name_cust' => $this->input->post('nama'),
            'address_cust' => $this->input->post('alamat'),
            'no_phone' => $this->input->post('no_telepon'),
            'jk' => $this->input->post('jk'),
            'member' => '1'
        );
        $this->mTransaksiLangsung->add_member($data);
        $this->session->set_flashdata('success', 'Member Berhasil Ditambahkan!!!');

        $data = $this->db->query("SELECT MAX(id_cust) as id FROM pelanggan")->row();
        redirect('Admin/cTransaksiLangsung/create/' . $data->id);
    }
    public function show_member()
    {
        $id = $this->input->post('member');
        redirect('Admin/cTransaksiLangsung/create/' . $id);
    }
    public function create($id)
    {
        $data = array(
            'produk' => $this->mTransaksiLangsung->produk(),
            'id' => $id
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/TransaksiLangsung/vCreateTranLangsung', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function add_to_cart($id)
    {
        $data = array(
            'id' => $this->input->post('produk'),
            'name'  => $this->input->post('nama'),
            'price'  => $this->input->post('harga'),
            'qty'  => $this->input->post('qty'),
            'stok'  => $this->input->post('stok'),
        );
        $this->cart->insert($data);
        redirect('Admin/cTransaksiLangsung/create/' . $id);
    }
    public function cart_delete($id)
    {
        $this->cart->remove($id);
        redirect('Admin/cTransaksiLangsung/create');
    }
    public function selesai()
    {
        // $id_cust = $this->input->post('id_pelanggan');
        // var_dump($id_cust);
        $data_transaksi = array(
            'id_cust' => $this->input->post('id_pelanggan'),
            'id_order' => $this->input->post('id_transaksi'),
            'tgl_order' => date('Y-m-d'),
            'total_order' => $this->cart->total(),
            'type_order' => '2',
            'status_order' => '4'
        );
        $this->mTransaksiLangsung->insert_my_order($data_transaksi);


        foreach ($this->cart->contents() as $key => $value) {
            $data_detail_transaksi = array(
                'id_order' => $this->input->post('id_transaksi'),
                'id_produk' => $value['id'],
                'qty' => $value['qty']
            );
            $this->mTransaksiLangsung->insert_produk_order($data_detail_transaksi);

            //stok
            $su = 0;
            $ss = $value['stok'];
            $so = $value['qty'];
            $su = $ss - $so;

            $data_stok = array(
                'stok_prod' => $su
            );
            $this->mTransaksiLangsung->update_stok($value['id'], $data_stok);
        }
        $this->cart->destroy();
        redirect('Admin/cTransaksiLangsung');
    }
}

/* End of file cTransaksiLangsung.php */
