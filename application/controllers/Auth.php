<?php 

	class Auth extends CI_Controller{
		public function _rules(){
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
		}


		public function ganti_password(){
			$this->load->view('login_header');
			$this->load->view('ganti_password');

		}

		public function ganti_password_aksi(){
			$pass_baru		= $this->input->post('pass_baru');
			$ulang_pass		= $this->input->post('ulang_pass');

			$this->form_validation->set_rules('pass_baru','Password baru','required');
			$this->form_validation->set_rules('ulang_pass','Ulangi Password','required|matches[pass_baru]');

			if($this->form_validation->run() == FALSE){
				$this->load->view('auth_header');
				$this->load->view('ganti_password');
	
			}else{
				$data = array( 'password' => md5($pass_baru));
				$id   = array( 'id_customer' => $this->session->userdata('id_customer'));

				$this->rental_model->update_password($id, $data, 'customer');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Password berhasil diupdate, silakan login!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				redirect('login');
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('login');
		}
	}
