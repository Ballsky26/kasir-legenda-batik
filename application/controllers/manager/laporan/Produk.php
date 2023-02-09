<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
        if ($this->session->userdata('jabatan') != 'Manager') {
			redirect(base_url('login'));
		}
		check_login();
    }

	public function index()
	{
		$data['laporan_produk'] = $this->M_laporan->laporan_produk();

		$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('manager/layout/header', $data);
		$this->load->view('manager/laporan/produk/index',$data);
		$this->load->view('manager/layout/footer');
	}
	public function laporan()
	{
		$data['laporan_produk'] = $this->M_laporan->laporan_produk();

		$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('manager/laporan/produk/laporan',$data);
		
	}
}
?>