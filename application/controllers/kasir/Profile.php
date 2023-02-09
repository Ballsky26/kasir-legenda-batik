<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('kasir/layout/header',$data);
		$this->load->view('kasir/profile/index', $data);
		$this->load->view('kasir/layout/footer');
	}
	public function editprofil()
	{	
		//Validasi
		$this->form_validation->set_rules('nama_user', 'Nama', 'required|trim', array(
            'required' => 'Nama tidak boleh kosong!'));
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Email yang anda masukkan tidak valid!']);
            // 'is_unique' => 'Email yang anda masukkan sudah terdaftar!']);
		$this->form_validation->set_rules('no_hp', 'No. Hp', 'required|trim|min_length[10]|max_length[13]',[
            'required' => 'Email tidak boleh kosong!',
            'min_length' => 'No. Hp tidak valid!',
			'max_length' => 'No. Hp tidak valid!']);
		// $this->form_validation->set_rules('pass_old', 'Password Lama', 'trim');
		// $this->form_validation->set_rules('pass_new', 'Password Baru', 'trim|matches[pass_confirm]');
		// $this->form_validation->set_rules('pass_confirm', 'Password Konfirmasi', 'trim|matches[pass_new]');

		if ($this->form_validation->run() == false) 
		{
			// echo $this->form_validation->error_string();
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert" >Data pegawai gagal diupdate!</div>');
			$data['profil'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('kasir/layout/header',$data);
			$this->load->view('kasir/profile/index', $data);
			$this->load->view('kasir/layout/footer');

		}else 
		{
			$id = $this->input->post('id');
			$nama_user = $this->input->post('nama_user');
			$email = $this->input->post('email');
			$no_hp = $this->input->post('no_hp');
			$old_foto_profil = $this->input->post('old_foto_profil');
			
			//Password
			$pass_old = $this->input->post('pass_old');		
			$pass_old_db = $this->input->post('pass_old_db');		
			$pass_new = $this->input->post('pass_new');	
			$pass_confirm = $this->input->post('pass_confirm');
			
			if ($pass_old != '' || $pass_new !='' || $pass_confirm != '') 
			{	
				if ($pass_new != '') 
				{					
					if (!password_verify($pass_old, $pass_old_db)) 
					{
						$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Password lama yang anda masukan salah!</div>');
						redirect(base_url('kasir/profile'));	
					}else 
					{
						if ($pass_old == $pass_new) {
							$this->session->set_flashdata('message', 
							'<div class="alert alert-danger" role="alert" >Password baru tidak boleh sama dengan password lama!</div>');
							redirect(base_url('kasir/profile'));
						}else 
						{
							if ($pass_new != $pass_confirm) 
							{
								$this->session->set_flashdata('message', 
								'<div class="alert alert-danger" role="alert" >Password baru dan Password kofirmasi tidak sama!</div>');
								redirect(base_url('kasir/profile'));	
							}else 
							{
								$pass_new_hash = password_hash($pass_new, PASSWORD_DEFAULT);
								$this->db->set('pass', $pass_new_hash);

								//Foto
								$upload_foto = $_FILES['foto_profil']['name'];					
								if ($upload_foto) 
								{
									$config['upload_path']          = './assets/img/user/';
									$config['allowed_types']        = 'jpg|png';
									$config['max_size']             = 6000;
									$this->load->library('upload', $config);
									
									if ($this->upload->do_upload('foto_profil'))
									{
										//foto lama
										unlink(FCPATH . './assets/img/user/' . $old_foto_profil );
										//foto baru
										$new_foto_profil = $this->upload->data('file_name');
										$this->db->set('foto_profil', $new_foto_profil);
									}else
									{
										$this->session->set_flashdata('message', 
										'<div class="alert alert-danger" role="alert" >Hanya dapat mengupload tipe foto jpg dan png!</div>');
										redirect(base_url('kasir/profile'));			
									}
								}
					
								$this->db->set('nama_user', $nama_user);
								$this->db->set('email', $email);
								$this->db->set('no_hp', $no_hp);			
								$this->db->where('id',$id);
								$this->db->update('user');
						
								$this->session->set_flashdata('message', 
								'<div class="alert alert-success" role="alert" >Data pegawai berhasil diupdate!</div>');
								redirect(base_url('kasir/profile'));					
							}
						}
					}
				}else 
				{
					$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Password baru tidak boleh kosong!</div>');
						redirect(base_url('kasir/profile'));
				}		
				
			}else
			{			
				//Foto
				$upload_foto = $_FILES['foto_profil']['name'];	
				if ($upload_foto) 
				{
					$config['upload_path']          = './assets/img/user/';
					$config['allowed_types']        = 'jpg|png';
					$config['max_size']             = 6000;
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('foto_profil'))
					{
						//foto lama
						unlink(FCPATH . './assets/img/user/' . $old_foto_profil );
						//foto baru
						$new_foto_profil = $this->upload->data('file_name');
						$this->db->set('foto_profil', $new_foto_profil);
					}else
					{
						$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Hanya dapat mengupload tipe foto jpg dan png!</div>');
						redirect(base_url('kasir/profile'));			
					}
				}
	
				$this->db->set('nama_user', $nama_user);
				$this->db->set('email', $email);
				$this->db->set('no_hp', $no_hp);			
				$this->db->where('id',$id);
				$this->db->update('user');
		
				$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert" >Data pegawai berhasil diupdate!</div>');
				redirect(base_url('kasir/profile'));
			}
		}
	} 
}