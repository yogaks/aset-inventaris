<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeritaAcara extends CI_Controller {
    public function __construct()

	{

		parent::__construct();

		is_logged_in();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('userModel');
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
			$data['beritaAcara'] = $this->beritaAcaraModel->getByBAUsername($username);
		} else {
            $data['beritaAcara'] = $this->beritaAcaraModel->getBA();
        }

		$this->load->view('berita_acara/berita_acara', $data);
	}

	public function laporan() {
		$role_id = $this->session->userdata('role_id');
		$username = $this->session->userdata('username');
        
		if($role_id == 3) {
			$data['laporan'] = $this->beritaAcaraModel->getByLaporanUsername($username);
		} else {
            $data['laporan'] = $this->beritaAcaraModel->getLaporan();
        }

		$this->load->view('berita_acara/laporan', $data);
	}

}
