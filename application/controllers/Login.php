<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
		is_logged_in(); //Memanggil function dari Helper

		$this->load->view('login/index');
	}
	private function _validasiInput()
    {
        $form = [
            [
                'label' => 'Username',
                'field' => 'username',
                'rules' => 'required'
            ],
            [
                'label' => 'Password',
                'field' => 'pass',
                'rules' => 'required'
            ]
        ];

        $this->form_validation->set_rules($form);
        return $this->form_validation->run();
    }
	public function auth()
    {
        if ($this->_validasiInput()) 
		{
            # code...
            $username = $this->input->post('username');
            $password = $this->input->post('pass');

            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            if ($user) 
			{
                if ($user['is_active'] == '1') 
				{
                    if (password_verify($password, $user['pass'])) 
					{
                        $data = [
                            'username' => $user['username'],
                            'nama_user' => $user['nama_user'],                            
                            'pass' => $user['pass'],                                                      
                            'jabatan' => $user['jabatan']
                            
                        ];

                        $this->session->set_userdata($data);

                        if ($user['jabatan'] == 'Manager') 
						{
                            redirect(base_url('manager/dashboard'));
                        } elseif ($user['jabatan'] == 'Kasir')
                        {
                            redirect(base_url('kasir/dashboard'));
                        }else 
							{
                            	$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Gagal!</strong> Akun tidak terdaftar.</div>');
                            	redirect(base_url('login'));
                        	}
                    } else 
						{
                        	$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Username atau Password salah.</div>');
                        	redirect(base_url('login'));
                    	}
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Akun anda telah di non-aktifkan.</div>');
                    redirect(base_url('login'));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Username atau Password salah.</div>');
                redirect(base_url('login'));
            }
        } else 
			{
            	$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Mohon untuk mengisi inputan dibawah ini!.</div>');
            	redirect(base_url('login'));
        	}
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('pass');
        $this->session->unset_userdata('jabatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil keluar.</div>');
        redirect(base_url('login'));
    }
}