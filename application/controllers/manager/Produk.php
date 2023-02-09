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
		$this->load->model('M_produk');
		
    }
	public function index()
	{	
		$data['produk'] = $this->M_produk->data_produk();
		$data['habis'] = $this->M_produk->produk_habis();
		$data['kode'] = $this->M_produk->create_produk();
		$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('manager/layout/header', $data);
		$this->load->view('manager/produk/index', $data);
		$this->load->view('manager/layout/footer');
	}
	//add produk
	public function add()
	{
		//Foto
		$config['upload_path']          = './assets/img/produk/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 6000;
		$this->load->library('upload', $config);
		//foto profil
		if (  $this->upload->do_upload('foto_produk'))
		{
			$foto_produk = $this->upload->data('file_name');
			$this->M_produk->proses_add($foto_produk);	
		}
		else
		{
			$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert" >Hanya dapat mengupload tipe foto jpg dan png!</div>');
					redirect(base_url('manager/produk'));
		}	
	}
	//Edit produk
	public function edit()
	{
		$id = $this->input->post('id');
		$stok = $this->input->post('stok');
		$harga = $this->input->post('harga');

		if ($this->M_produk->proses_edit($id,$stok,$harga) == false)
		{
			$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert" >Produk berhasil diupdate!</div>');
				redirect(base_url('manager/produk'));
		}else 
		{
			$this->session->set_flashdata('message', 
				'<div class="alert alert-danger" role="alert" >Produk gagal diupdate!</div>');
				redirect(base_url('manager/produk'));	
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');
		$foto_lama = $this->M_produk->getDataById($id);
		unlink('assets/img/produk/'. $foto_lama['foto_produk']);
		if ($this->M_produk->proses_delete($id) > 0) 
		{
			$this->session->set_flashdata
			('message', '<div class="alert alert-danger" role="alert">Produk berhasil dihapus!</div>');
			redirect(base_url('manager/produk'));
		}else {
			$this->session->set_flashdata
			('message', '<div class="alert alert-danger" role="alert">Produk gagal dihapus!</div>');
			redirect(base_url('manager/produk'));
		}
	}
}
?>