<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsetTeknisi extends CI_Controller {
    public function __construct()

	{

		parent::__construct();

		is_logged_in();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('userModel');
		$this->load->model('asetTeknisiModel');

	}

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
	public function index() {
		$role_id = $this->session->userdata('role_id');
		$username = $this->session->userdata('username');
        
		if($role_id == 3) {
			$data['asetTeknisi'] = $this->asetTeknisiModel->getByUsername($username);
		} else {
			$data['asetTeknisi'] = $this->asetTeknisiModel->getAll();
		}
		
		$this->load->view('aset_teknisi/aset_teknisi', $data);
	}

	public function updateAsetTeknisi() {
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

		if($this->form_validation->run()) {
			$this->asetTeknisiModel->update();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengupdate Data Aset</div>');
			redirect('asetTeknisi');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengupdate Data Aset</div>');
			redirect('asetTeknisi');
		}
	}

}
