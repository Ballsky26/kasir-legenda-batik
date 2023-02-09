<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
    }

	public function index()
	{
		$data['bulan'] = $this->M_dashboard->transaksi_bulan();
		$data['hari'] = $this->M_dashboard->transaksi_harian();
		$data['total_produk'] = $this->M_dashboard->count_produk();
		$data['total_produk_habis'] = $this->M_dashboard->count_produk_habis();
		$data['total_produk_ada'] = $this->M_dashboard->count_produk_ada();
		$data['total_user'] = $this->M_dashboard->count_user();
		$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('kasir/layout/header', $data);
		$this->load->view('kasir/dashboard/index',$data);
		$this->load->view('kasir/layout/footer');
	}
}