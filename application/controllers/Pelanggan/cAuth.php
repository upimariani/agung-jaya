<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAuth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLogin');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/Layout/head');
            $this->load->view('Pelanggan/vLogin');
            $this->load->view('Pelanggan/Layout/foooter');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $cek = $this->mLogin->login_pelanggan($username, $password);
            if ($cek) {
                $id_pelanggan = $cek->id_cust;
                $nama = $cek->name_cust;
                $array = array(
                    'id' => $id_pelanggan,
                    'nama' => $nama
                );

                $this->session->set_userdata($array);

                redirect('Pelanggan/cHome');
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Anda Salah!!!');
                redirect('Pelanggan/cAuth');
            }
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp Pelanggan', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin Pelanggan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Pelanggan', 'required');
        $this->form_validation->set_rules('username', 'Username Pelanggan', 'required');
        $this->form_validation->set_rules('password', 'Password Pelanggan', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/Layout/head');
            $this->load->view('Pelanggan/vRegister');
            $this->load->view('Pelanggan/Layout/foooter');
        } else {
            $data = array(
                'name_cust' => $this->input->post('nama'),
                'address_cust' => $this->input->post('alamat'),
                'no_phone' => $this->input->post('no_hp'),
                'jk' => $this->input->post('jk'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->db->insert('pelanggan', $data);
            $this->session->set_flashdata('error', 'Anda Berhasil Register');
            redirect('Pelanggan/cAuth');
        }
    }


    public function logout()
    {

        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('error', 'Anda Berhasil Logout!!!');
        redirect('Pelanggan/cAuth');
    }
}

/* End of file cAuth.php */
