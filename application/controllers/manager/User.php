<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

		// $this->load->library('form_validation');

        if ($this->session->userdata('jabatan') != 'Manager') 
		{
			redirect(base_url('login'));
		}
		check_login();

		
    }

	
	public function index()
	{
		// Menampilkan table user
		$data['user'] = $this->M_user->datauser();
		// end menampilkan table user

		$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('manager/layout/header', $data);
		$this->load->view('manager/user/index', $data);
		$this->load->view('manager/layout/footer');		
	}

	// Add User
	public function adduser()
	{	
		$this->M_user->proses_adduser();
	}
	//Delete user
	public function deleteuser()
	{
		$id = $this->input->post('id');
		$foto_lama = $this->M_user->getDataById($id);
		unlink('assets/img/user/'. $foto_lama['foto_profil']);
		unlink('assets/img/user/'. $foto_lama['foto_ktp']);
		if ($this->M_user->proses_deleteuser($id) > 0) 
		{
			$this->session->set_flashdata
			('message', '<div class="alert alert-danger" role="alert">User berhasil dihapus!</div>');
			redirect(base_url('manager/user'));
		}else {
			$this->session->set_flashdata
			('message', '<div class="alert alert-danger" role="alert">User gagal dihapus!</div>');
			redirect(base_url('manager/user'));
		}
	}
}