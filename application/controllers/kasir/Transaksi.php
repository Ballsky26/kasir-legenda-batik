<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('jabatan') != 'Kasir') {
			redirect(base_url('login'));
		}
		check_login();
		$this->load->model('M_transaksi');
    }

	
	public function index()
	{
		$data['produk'] = $this->M_transaksi->data_produk();
		$data['pilih'] = $this->M_transaksi->pilih();
		$data['transaksi'] = $this->M_transaksi->data_transaksi();
		$data['kode'] = $this->M_transaksi->kode_terakhir();
		$data['total_jumlah'] = $this->M_transaksi->total_jumlah();
		$data['total'] = $this->M_transaksi->total_transaksi();
		$data['user'] = $this->M_user->DataUser();
		$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('kasir/layout/header', $data);
		$this->load->view('kasir/transaksi/index', $data);
		$this->load->view('kasir/layout/footer');
	}
	public function add()
	{
		$this->M_transaksi->proses_add();
		redirect(base_url('kasir/transaksi'));
	}
	public function delete()
	{
		$id = $this->input->post('id');
		if ($this->M_transaksi->proses_delete($id) > 0) 
		{			
			redirect(base_url('kasir/transaksi'));
		}else {
			echo "gagal";			
		}
	}
	public function total()
	{
		$this->M_transaksi->proses_total();
		redirect(base_url('kasir/struk'));
	}
}