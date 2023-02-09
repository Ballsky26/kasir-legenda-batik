<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model 
{
    //Menampilkan data produk
    public function data_produk()
    {
        $hasil = $this->db->select('*')->from('produk')->where('stok'.'>'. 0);
        $query = $hasil->order_by('id', 'DESC')->get()->result_array();
        return $query;
    }
    //Menampilkan data transaksi
    public function data_transaksi()
    {   
        $kode_transaksi = create_kodetransaksi();
        $hasil = $this->db->select('*')->from('transaksi')->order_by('id', 'ASC')->where('kode_transaksi',$kode_transaksi )->get()->result_array();
        return $hasil;
    }

    public function transaksi()
    {   
        $kode_terakhir = $this->db->select('*')->from('transaksi')->order_by('id', 'DESC')->limit(1)->get()->row_array();
        $hasil = $this->db->select('*')->from('transaksi')->order_by('id', 'DESC')->where('kode_transaksi',$kode_terakhir['kode_transaksi'] )->get()->result_array();
        return $hasil;
    }
    //Total Jumlah
    public function total_jumlah(){
        $kode_terakhir = $this->db->select('*')->from('transaksi')->order_by('id', 'DESC')->limit(1)->get()->row_array();
        $hasil = $this->db->select('*')->from('transaksi')->order_by('id', 'DESC')->where('kode_transaksi',$kode_terakhir['kode_transaksi'] )->get()->result_array();
        $total_jumlah = 0;
        foreach ($hasil as $h) {
            $total_jumlah += $h['jumlah'];
        }
        return $total_jumlah;
    }
    //Total Harga
    public function total_transaksi(){
        $kode_terakhir = $this->db->select('*')->from('transaksi')->order_by('id', 'DESC')->limit(1)->get()->row_array();
        $hasil = $this->db->select('*')->from('transaksi')->order_by('id', 'DESC')->where('kode_transaksi',$kode_terakhir['kode_transaksi'] )->get()->result_array();
        $total = 0;
        foreach ($hasil as $h) {
            $total += $h['sub_total'];
        }
        return $total;
    }

    public function proses_add()
    {
        $data = 
        [
            "kode_transaksi" => $this->input->post('kode_transaksi'),
            "id_produk" => $this->input->post('id_produk'),
            "nama_produk" => $this->input->post('nama_produk'),            
            "size" => $this->input->post('size'),
            "jumlah" => $this->input->post('jumlah'),
            "harga" => $this->input->post('harga'),
            "sub_total" => $this->input->post('sub_total'),
            "tanggal" => date('d-m-Y'),                         
        ];
        
        $this->db->insert('transaksi', $data);
        
    }
    public function pilih()
    {   
        $kode = $this->input->post('kode_produk'); 
        $cek_kode = $this->db->select('*')->from('produk')->where('kode_produk', $kode)->get()->result_array();      
        if ($cek_kode) {
            $hasil = $this->db->select('*')->from('produk')->where('kode_produk',$kode )->get()->result_array();
            return $hasil;
        }else if ($cek_kode != $kode){
            $this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Kode produk yang anda masukan tidak terdaftar!</div>');
						redirect(base_url('kasir/transaksi'));
        }
    }   
    public function proses_delete($id)
    {
        $this->db->delete('transaksi', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function kode_terakhir()
    {
        $kode_terakhir = $this->db->select('*')->from('transaksi')->order_by('id', 'DESC')->limit(1)->get()->row_array();
        return $kode_terakhir;  
    }
    public function proses_total()
    {
        $data = 
        [
            "username" => $this->input->post('username'),
            "kode_transaksi" => $this->input->post('kode_transaksi'),            
            "jumlahT" => $this->input->post('jumlahT'),            
            "sub_total" => $this->input->post('sub_total'),
            "tanggal" => date('d-m-Y'),                        
        ];
        
        $this->db->insert('total', $data);
        
    }
}
?>