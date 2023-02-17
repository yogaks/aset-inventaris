<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {
    public function __construct()

	{

		parent::__construct();

		is_logged_in();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('userModel');
		$this->load->model('asetModel');

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
        $data['aset'] = $this->asetModel->getAll();
		$this->load->view('aset/aset', $data);
	}

	public function addAset() {
		$this->form_validation->set_rules('as_kode', 'Kode Aset', 'required|is_unique[aset.as_kode]', [
			'is_unique' => 'Kode SUdah Ada'
		]);
		$this->form_validation->set_rules('as_jml', 'Jumlah', 'required|numeric', [
			'numeric' => 'Masukkan Angka'
		]);

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Aset</div>');
			redirect('aset');
		}else{
			$this->asetModel->save();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Aset</div>');
			redirect('aset');
		}
	}

	public function updateAset() {
		$this->form_validation->set_rules('as_jml', 'Jumlah', 'required|numeric', [
			'numeric' => 'Masukkan Angka'
		]);

		if($this->form_validation->run()) {
			$this->asetModel->update();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengupdate Data Aset</div>');
			redirect('aset');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengupdate Data Aset</div>');
			redirect('aset');
		}
	}

	public function deleteAset($id) {
		if(!isset($id)) show_404();

		if($this->asetModel->delete($id)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Aset</div>');
			redirect('aset');
		}
	}
}
