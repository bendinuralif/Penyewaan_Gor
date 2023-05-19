<?php
	
	class Dashboard extends CI_Controller{
		public function index(){

			// $data['venue'] = $this->rental_model->get_data('venue')->result();
			$data['venue'] = $this->db->query("SELECT * FROM venue mb, type tp WHERE mb.kode_type=tp.kode_type")->result();

			$data['rental'] = $this->db->query("SELECT nama_rental FROM customer WHERE nama_rental != ''")->result();

			$data['type'] = $this->rental_model->get_data('type')->result();
			$data['total_venue'] = $this->db->query("SELECT * FROM venue WHERE status = '1'")->num_rows()-1;
			$data['total_customer'] = $this->db->query("SELECT * FROM customer WHERE role_id = '2'")->num_rows()-1;
			$data['total_rental'] = $this->db->query("SELECT * FROM customer WHERE role_id = '3'")->num_rows()-1;

			$this->load->view('templates_customer/header');
			$this->load->view('customer/dashboard', $data);
			$this->load->view('templates_customer/footer');
		}

		public function detail_venue($id){

			$data['detail'] = $this->rental_model->ambil_id_venue($id);
			$this->load->view('templates_customer/header');
			$this->load->view('customer/detail_venue', $data);
			$this->load->view('templates_customer/footer');
		}
	}
?>