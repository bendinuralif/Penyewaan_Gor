<?php
	
	class Data_venue extends CI_Controller{
		public function index(){

			$data['venue'] = $this->rental_model->get_data('venue')->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/data_venue', $data);
			$this->load->view('templates_customer/footer');
		}

		public function detail_venue($id){

			$data['detail'] = $this->rental_model->ambil_id_venue($id);
			$data['rental'] = $this->db->query("SELECT * FROM customer cs, venue mb WHERE mb.nama_rental = cs.nama_rental AND mb.id_venue = '$id'")->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/detail_venue', $data);
			$this->load->view('templates_customer/footer');
		}
	}
?>