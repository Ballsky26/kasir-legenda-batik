<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produkK extends CI_Model 
{
    //Menampilkan data produk
    public function data_produk()
    {
        return $this->db->select('*')->from('produk')->order_by('id', 'ASC')->get()->result_array();
    }
    public function getDataById($id)
    {
        return $this->db->get_where('produk', ['id' => $id])->row_array();
    }
    //Menampilkan data produk habis
    public function produk_habis()
    {
        $hasil = $this->db->select('*')->from('produk')->where(['stok'=>0])->order_by('id', 'DESC')->get()->result_array();
        return $hasil;
    }

    //kode produk
    public function create_produk()
    {
        $this->db->select('RIGHT(produk.kode_produk,2) as kode_produk', FALSE);
        $this->db->order_by('kode_produk','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('produk');
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kode = intval($data->kode_produk) + 1; 
            }
            else{      
                $kode = 1;  
            }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
        $kodetampil = "KS".$batas;
        return $kodetampil;  
    }
    //add produk
    public function proses_add($foto_produk)
    {
        $nama_produk = $this->input->post('nama_produk');
        $size = $this->input->post('size');
        $cek_namaProduk = $this->db->select('*')->from('produk')->where('nama_produk', $nama_produk)->get()->result_array();
        $cek_size = $this->db->select('*')->from('produk')->where('size', $size)->get()->result_array();
        
        if ($cek_namaProduk && $cek_size)
		{
			$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Produk sudah ada!</div>');
						redirect(base_url('kasir/produk'));
		}
        $data = 
        [
            "kode_produk" => $this->input->post('kode_produk'),
            "foto_produk" => $foto_produk,
            "merk" => $this->input->post('merk'),
            "nama_produk" => $this->input->post('nama_produk'),
            "size" => $this->input->post('size'),
            "stok" => $this->input->post('stok'),
            "harga" => $this->input->post('harga'),
            "tanggal" => date('d-m-Y'),
            "terjual" => 0,
        ];

        $add = $this->db->insert('produk', $data);
        if ($add > 0) {
            $this->session->set_flashdata
			('message', '<div class="alert alert-success" role="alert" >Produk baru berhasil ditambahkan!</div>');
			redirect(base_url('kasir/produk'));
        }else 
		{
            // echo $this->$add->error_string();
            $this->session->set_flashdata
			('message', '<div class="alert alert-danger" role="alert" >Produk baru gagal ditambahkan!</div>');
			redirect(base_url('kasir/produk'));
        }
    }
    //edit produk
    public function proses_edit($id,$stok,$harga)
    {
        $this->db->set('stok', $stok);
        $this->db->set('harga', $harga);
        $this->db->where('id',$id);
		$this->db->update('produk');
    }
    public function proses_delete($id)
    {
        $this->db->delete('produk', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>