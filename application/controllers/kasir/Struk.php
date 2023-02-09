<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struk extends CI_Controller {

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
		$data['kode_terakhir'] = $this->M_transaksi->kode_terakhir();
        $data['produk'] = $this->M_transaksi->data_produk();
		$data['transaksi'] = $this->M_transaksi->transaksi();
		$data['total'] = $this->M_transaksi->total_transaksi();
		$data['user'] = $this->M_user->DataUser();
		$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('kasir/layout/header', $data);
		$this->load->view('kasir/struk/index', $data);
		$this->load->view('kasir/layout/footer');
	}

	public function print()
	{
		$data['kode_terakhir'] = $this->M_transaksi->kode_terakhir();
		$data['transaksi'] = $this->M_transaksi->transaksi();
		$data['total'] = $this->M_transaksi->total_transaksi();
		$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('print_struk.php', $data);
	}
}
?>