<?php


class Data_venue extends CI_Controller{
	public function index(){
		$this->rental_model->admin_login();
		$data['venue'] = $this->rental_model->get_data('venue')->result();
		$data['type'] = $this->rental_model->get_data('type')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/Data_venue',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_venue(){ 
		$this->rental_model->admin_login();
		$data['type'] = $this->rental_model->get_data('type')->result();
		$data['nama_rental'] = $this->db->query("SELECT nama_rental FROM customer WHERE role_id='3'")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_venue',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_venue_aksi(){
		
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->tambah_venue();
		}else{
			$nama_rental			= $this->input->post('nama_rental');
			$kode_type				= $this->input->post('kode_type');
			$merk					= $this->input->post('merk');
			$no_plat				= $this->input->post('no_plat');
			$warna					= $this->input->post('warna');
			$tahun					= $this->input->post('tahun');
			$status					= $this->input->post('status');
			$harga					= $this->input->post('harga');
			$denda					= $this->input->post('denda');
			$ac						= $this->input->post('ac');
			$supir					= $this->input->post('supir');
			$mp3_player				= $this->input->post('mp3_player');
			$central_lock			= $this->input->post('central_lock');
			$gambar					= $_FILES['gambar']['name'];


			if($gambar='0'){}else{
				$config['upload_path']		= './assets/upload';
				$config['allowed_types']	= 'jpg|jpeg|png|tiff|webp';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar Venue Gagal diupload!";
				}else{
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nama_rental'		=> $nama_rental,
				'kode_type'			=> $kode_type,
				'merk'				=> $merk,
				'no_plat'			=> $no_plat,
				'tahun'				=> $tahun,
				'warna'				=> $warna,
				'status'			=> $status,
				'harga'				=> $harga,
				'denda'				=> $denda,
				'ac'				=> $ac,
				'supir'				=> $supir,
				'mp3_player'		=> $mp3_player,
				'central_lock'		=> $central_lock,
				'gambar'			=> $gambar,
			);

			$this->rental_model->insert_data($data, 'venue');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Venue Berhasil Ditambahkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/data_venue');
		}
	}


	public function update_venue($id){
		$this->rental_model->admin_login();
		$where = array('id_venue' => $id);
		$data['venue'] = $this->db->query("SELECT * FROM venue mb, type tp WHERE mb.kode_type=tp.kode_type AND mb.id_venue='$id'")->result();
		$data['type'] = $this->rental_model->get_data('type')->result();
		$data['nama_rental'] = $this->db->query("SELECT nama_rental FROM customer WHERE role_id='3'")->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_venue',$data);
		$this->load->view('templates_admin/footer');

	}

	public function update_venue_aksi(){
		$this->rental_model->admin_login();
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->update_venue($this->input->post('id_venue'));
		}else{
			$id 					= $this->input->post('id_venue');
			$nama_rental			= $this->input->post('nama_rental');
			$kode_type				= $this->input->post('kode_type');
			$merk					= $this->input->post('merk');
			$no_plat				= $this->input->post('no_plat');
			$warna					= $this->input->post('warna');
			$tahun					= $this->input->post('tahun');
			$status					= $this->input->post('status');
			$harga					= $this->input->post('harga');
			$denda					= $this->input->post('denda');
			$ac						= $this->input->post('ac');
			$supir					= $this->input->post('supir');
			$mp3_player				= $this->input->post('mp3_player');
			$central_lock			= $this->input->post('central_lock');
			$gambar					= $_FILES['gambar']['name'];
			
			if($gambar){
				$config['upload_path']		= './assets/upload';
				$config['allowed_types']	= 'jpg|jpeg|png|tiff|webp';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')){
					$gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $gambar);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'nama_rental'		=> $nama_rental,
				'kode_type'			=> $kode_type,
				'merk'				=> $merk,
				'no_plat'			=> $no_plat,
				'tahun'				=> $tahun,
				'warna'				=> $warna,
				'status'			=> $status,
				'harga'				=> $harga,
				'denda'				=> $denda,
				'ac'				=> $ac,
				'supir'				=> $supir,
				'mp3_player'		=> $mp3_player,
				'central_lock'		=> $central_lock,
			);

			$where = array(
				'id_venue' => $id
			);

			$this->rental_model->update_data('venue', $data, $where);

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Venue Berhasil Diupdate
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/data_venue');
		}
	}

	public function _rules(){

		
		$this->form_validation->set_rules('nama_rental','Pemilik Rental','required');
		$this->form_validation->set_rules('kode_type','Type Venue','required');
		$this->form_validation->set_rules('merk','Merk','required');
		$this->form_validation->set_rules('no_plat','No Plat','required');
		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('warna','Warna','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('denda','Denda','required');
	}


	public function detail_venue($id){
		$this->rental_model->admin_login();

		$data['detail'] = $this->rental_model->ambil_id_venue($id);
		$data['type'] = $this->rental_model->get_data('type')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_venue',$data);
		$this->load->view('templates_admin/footer');

	}

	public function delete_venue($id){
		$this->rental_model->admin_login();

		$where = array('id_venue' => $id);
		$this->rental_model->delete_data($where,'venue');

		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Venue Berhasil Dihapus
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('admin/data_venue');
	}
}
?>