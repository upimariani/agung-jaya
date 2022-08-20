<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
    public function select_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mHome.php */
