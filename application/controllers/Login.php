<?php

class Login extends CI_Controller
{
	public function index()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_header');
			$this->load->view('form_login');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$cek = $this->rental_model->cek_login($username, $password);

			if ($cek == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Username atau password salah!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>');
				redirect('login');
			} else {
				$this->session->set_userdata('username', $cek->username);
				$this->session->set_userdata('id_customer', $cek->id_customer);
				$this->session->set_userdata('role_id', $cek->role_id);
				$this->session->set_userdata('nama_rental', $cek->nama_rental);
				$this->session->set_userdata('nama', $cek->nama);
				switch ($cek->role_id) {
					case 1:
						redirect('admin/dashboard');
						break;
					case 2:
						redirect('customer/dashboard');
						break;
					case 3:
						redirect('rental/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
	}
}
