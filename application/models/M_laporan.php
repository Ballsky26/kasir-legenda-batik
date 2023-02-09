<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model 
{
    public function laporan_cetak()
    {
         $tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
        if ($tgl_awal == '') 
        {
            return $this->db->select('*')->from('transaksi')->join('total','total.kode_transaksi = transaksi.kode_transaksi')->where('transaksi.tanggal',date('d-m-Y'))->order_by('transaksi.id', 'DESC')->get()->result_array();
            // $this->session->set_flashdata('message', 
			// 			'<div class="alert alert-danger" role="alert" >Kode produk yang anda masukan tidak terdaftar!</div>');
						
        }else
        {
            return $this->db->select('*')->from('transaksi')->join('total','total.kode_transaksi = transaksi.kode_transaksi')->where('transaksi.tanggal BETWEEN "'. date('d-m-Y', strtotime($tgl_awal)). '" and "'. date('d-m-Y', strtotime($tgl_akhir)).'"')->order_by('transaksi.id', 'DESC')->get()->result_array();
        }
    }
    public function laporan()
    {
        return $this->db->select('*')->from('transaksi')->join('total','total.kode_transaksi = transaksi.kode_transaksi')->where('transaksi.tanggal',date('d-m-Y'))->order_by('transaksi.id', 'DESC')->get()->result_array();
    }
    public function laporan_inputan()
    {
        $tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
        // if ($tgl_awal == '') 
        // {
        //     return $this->db->select('*')->from('transaksi')->join('total','total.kode_transaksi = transaksi.kode_transaksi')->where('transaksi.tanggal',date('d-m-Y'))->order_by('transaksi.id', 'DESC')->get()->result_array();
        //     // $this->session->set_flashdata('message', 
		// 	// 			'<div class="alert alert-danger" role="alert" >Kode produk yang anda masukan tidak terdaftar!</div>');
						
        // }else
        // {
        //     return $this->db->select('*')->from('transaksi')->join('total','total.kode_transaksi = transaksi.kode_transaksi')->where('transaksi.tanggal BETWEEN "'. date('d-m-Y', strtotime($tgl_awal)). '" and "'. date('d-m-Y', strtotime($tgl_akhir)).'"')->order_by('transaksi.id', 'DESC')->get()->result_array();
        // }
        if ((isset($_POST['btncari']))) {            
            if ($tgl_awal == '' && $tgl_akhir == '') {
                $this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Anda belom menginputkan tanggal!</div>');
                        redirect(base_url('manager/laporan/penjualan'));
            }else if($tgl_awal == ''){
                $this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Anda belom menginputkan tanggal awal!</div>');
                        redirect(base_url('manager/laporan/penjualan'));
            }else if($tgl_akhir == ''){
                $this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Anda belom menginputkan tanggal akhir!</div>');
                        redirect(base_url('manager/laporan/penjualan'));
            }else {
                return $this->db->select('*')->from('transaksi')->join('total','total.kode_transaksi = transaksi.kode_transaksi')->where('transaksi.tanggal BETWEEN "'. date('d-m-Y', strtotime($tgl_awal)). '" and "'. date('d-m-Y', strtotime($tgl_akhir)).'"')->order_by('transaksi.id', 'DESC')->get()->result_array();
                redirect(base_url('manager/laporan/penjualan'));
            }
        }
    }
    public function laporan_produk()
    {
        return $this->db->select('*')->from('produk')->order_by('terjual', 'DESC')->get()->result_array();
    }

}
?>