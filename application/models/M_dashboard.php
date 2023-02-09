<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model 
{
    public function count_produk()
	{
		$query = $this->db->get('produk');
        return $query->num_rows();
	}
    public function count_produk_habis()
	{
        $hasil = $this->db->select('*')->from('produk')->where(['stok'=>0])->get()->num_rows();
        return $hasil;
	}
    public function count_produk_ada()
	{
        $hasil = $this->db->select('*')->from('produk')->where('stok'.'>'. 0)->get()->num_rows();
        return $hasil;
	}
    public function count_user()
	{
		$query = $this->db->get('user');
        return $query->num_rows();
	}
        public function transaksi_harian()
	{
        $hasil = $this->db->select('*')->from('total')->where('tanggal',date('d-m-Y'))->get()->num_rows();
        return $hasil;
	}
        public function transaksi_bulan()
	{
        if (date('d-m-Y') == date('28-m-Y')) 
        {
            $hasil = $this->db->select('*')->from('total')->where('tanggal BETWEEN "'. date('1-m-Y'). '" and "'. date('28-m-Y',).'"')->get()->num_rows();
            return $hasil;
        }else if (date('d-m-Y') == date('29-m-Y')) 
        {
            $hasil = $this->db->select('*')->from('total')->where('tanggal BETWEEN "'. date('1-m-Y'). '" and "'. date('29-m-Y',).'"')->get()->num_rows();
            return $hasil;
        }else if (date('d-m-Y') == date('30-m-Y')) 
        {
            $hasil = $this->db->select('*')->from('total')->where('tanggal BETWEEN "'. date('1-m-Y'). '" and "'. date('30-m-Y',).'"')->get()->num_rows();
            return $hasil;
        }else if (date('d-m-Y') == date('31-m-Y')) 
        {
            $hasil = $this->db->select('*')->from('total')->where('tanggal BETWEEN "'. date('1-m-Y'). '" and "'. date('31-m-Y',).'"')->get()->num_rows();
            return $hasil;
        }else
        {
            $hasil = $this->db->select('*')->from('total')->where('tanggal BETWEEN "'. date('0-m-Y'). '" and "'. date('30-m-Y',).'"')->get()->num_rows();
            return $hasil;
        }
	}
}
?>