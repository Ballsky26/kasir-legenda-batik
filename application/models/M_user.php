<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
    //Menampilkan data user
    public function datauser()
    {
        return $this->db->select('*')->from('user')->order_by('id', 'DESC')->get()->result_array();
    } 
    
    //Memanggil id
    public function getDataById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
    //Add user
    public function proses_adduser()
    {
		//Validasi
		$username = $this->input->post('username');
		$nama = $this->input->post('nama_user');
		$pass = $this->input->post('pass');
		$pass_confirm = $this->input->post('pass_confirm');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');

		if ($this->db->select('*')->from('user')->where('username', $username)->get()->result_array())
		{
			$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Username sudah dipakai!</div>');
						redirect(base_url('manager/user'));
		}
		if ($this->db->select('*')->from('user')->where('nama_user', $nama)->get()->result_array()) 
		{
			$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert" >Nama sudah dipakai!</div>');
					redirect(base_url('manager/user'));	
		}
		if (strlen($pass) < 5)
		{	
			$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert" >Password tidak boleh kurang dari 6!</div>');
					redirect(base_url('manager/user'));	
		}
		if ($pass != $pass_confirm)
		{
			$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert" >Password dan Pasword konfirmasi tidak sama!</div>');
					redirect(base_url('manager/user'));
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{	
			$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert" >Email tidak valid!</div>');
					redirect(base_url('manager/user'));	
		}
		if ($this->db->select('*')->from('user')->where('email', $email)->get()->result_array())
		{	
			$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert" >Email sudah dipakai!</div>');
					redirect(base_url('manager/user'));	
		}
		if (strlen($no_hp) < 10 || strlen($no_hp) > 14 )
		{	
			$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert" >No. Hp tidak valid!</div>');
					redirect(base_url('manager/user'));	
		}
		if ($this->db->select('*')->from('user')->where('no_hp', $no_hp)->get()->result_array())
		{	
			$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert" >No. Hp sudah dipakai!</div>');
					redirect(base_url('manager/user'));	
		}
		else 
		{
			
			//Foto
			$config['upload_path']          = './assets/img/user/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 6000;
			$this->load->library('upload', $config);
			//foto profil
			if (  $this->upload->do_upload('foto_profil'))
			{
				$foto_profil = $this->upload->data('file_name');	
			}
			else
			{
				$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Hanya dapat mengupload tipe foto jpg dan png!</div>');
						redirect(base_url('manager/user'));
			}
			// foto ktp
			if (  $this->upload->do_upload('foto_ktp'))
			{
				$foto_ktp =  $this->upload->data('file_name');										
						
			}
			else
			{
				$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert" >Hanya dapat mengupload tipe foto jpg dan png!</div>');
						redirect(base_url('manager/user'));
			}
		
			$data = 
					[						
						"foto_profil" => $foto_profil,
						"username" => $this->input->post('username'),
						"nama_user" => $this->input->post('nama_user'),
						"pass" => password_hash($this->input->post('pass'), PASSWORD_DEFAULT) ,
						"jenis_kelamin" => $this->input->post('jenis_kelamin'),
						"email" => $this->input->post('email'),
						"no_hp" => $this->input->post('no_hp'),
						"foto_ktp" => $foto_ktp,
						"jabatan" => $this->input->post('jabatan'),
						"created_at" => date('Y-m-d H:i:s'),
					];
	
			$this->db->insert('user', $data);	
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert" >User baru berhasil ditambahkan!</div>');
			redirect(base_url('manager/user'));
		}
    }
	//Detail user
	// public function proses_detailuser($id)
	// {
	// 	$this->db->select('user', ['id' => $id]);
	// 	return $this->db->affected_rows();
	// }
    //Delete data user
    public function proses_deleteuser($id)
    {
        $this->db->delete('user', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>