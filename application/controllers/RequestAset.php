<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RequestAset extends CI_Controller {
    public function __construct()

	{

		parent::__construct();

		is_logged_in();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('userModel');
		$this->load->model('asetModel');
		$this->load->model('requestAsetModel');
		$this->load->model('asetTeknisiModel');
		$this->load->model('beritaAcaraModel');

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
			$data['requestAset'] = $this->requestAsetModel->getByUsername($username);
		} else {
			$data['requestAset'] = $this->requestAsetModel->getAll();
		}

		$this->load->view('request_aset/request_aset', $data);
	}

	public function addRequestAset() {
		$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'required');
		$this->form_validation->set_rules('jml_aset', 'Jumlah', 'required|numeric', [
			'numeric' => 'Masukkan Angka'
		]);

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Request Aset</div>');
			redirect('requestAset');
		}else{
			$this->requestAsetModel->save();
			$this->beritaAcaraModel->saveFromRequest();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Request Aset</div>');
			redirect('requestAset');
		}
	}

	public function updateRequestAset() {
		$this->form_validation->set_rules('jml_aset', 'Jumlah', 'required|numeric', [
			'numeric' => 'Masukkan Angka'
		]);

		$post = $this->input->post();

		if($this->form_validation->run()) {
			if($post["app"] == 2 && $post["status"] == 2) {
				if($this->asetModel->updateFromRequest()) {
					$this->requestAsetModel->update();
					$this->asetTeknisiModel->saveFromRequest();
					$this->beritaAcaraModel->updateFromRequest();
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengupdate Data Request Aset</div>');
					redirect('requestAset');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengupdate Pastikan Kode Terdaftar Didata Aset dan Jumlah Request Tidak Melebihi Stok</div>');
					redirect('requestAset');
				}
			} else {
				$this->requestAsetModel->update();
				$this->beritaAcaraModel->updateFromRequest();
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengupdate Data Request Aset</div>');
				redirect('requestAset');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengupdate Data Request Aset</div>');
			redirect('requestAset');
		}
	}

	public function deleteRequestAset($id) {
		if(!isset($id)) show_404();

		if($this->requestAsetModel->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Request Aset</div>');
			redirect('requestAset');
		}
	}
}
