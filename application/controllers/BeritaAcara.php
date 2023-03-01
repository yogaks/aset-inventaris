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
		$this->load->model('requestAsetModel');

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
            $data['beritaAcara'] = $this->beritaAcaraModel->getAll();
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

	public function createPdfBA($ba_id) {
		if(!$ba_id) show_404();
		$this->load->library('cetak_pdf');
        
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'BERITA ACARA ASET',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
		
        $pdf->SetFont('Arial','B',10);
        $ba = $this->beritaAcaraModel->getBaByBaId($ba_id);
        foreach ($ba as $data){
			$nik = $data->user_nik;
			$nama = $data->user_nama;
			$req = $data->date_request;
			$app = $data->date_approval;
			if($data->status_request == 0 ) {
				$sts = "Input";
			} elseif($data->status_request == 1 ) {
				$sts = "Pending";
			} elseif($data->status_request == 2 ) {
				$sts = "Closed";
			}
        }
        $pdf->Cell(30,6,'BA ID',0,0,'L');
        $pdf->Cell(0,6,': '.$ba_id,0,1,'L');
        $pdf->Cell(30,6,'Nama',0,0,'L');
        $pdf->Cell(0,6,': '.$nama,0,1,'L');
        $pdf->Cell(30,6,'Nik',0,0,'L');
        $pdf->Cell(0,6,': '.$nik,0,1,'L');
        $pdf->Cell(30,6,'Date Request',0,0,'L');
        $pdf->Cell(0,6,': '.$req,0,1,'L');
        $pdf->Cell(30,6,'Date Approval',0,0,'L');
        $pdf->Cell(0,6,': '.$app,0,1,'L');
        $pdf->Cell(30,6,'Status Request',0,0,'L');
        $pdf->Cell(0,6,': '.$sts,0,1,'L');

        $pdf->Cell(10,7,'',0,1);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(15,6,'Kode',1,0,'C');
        $pdf->Cell(30,6,'Jenis',1,0,'C');
        $pdf->Cell(20,6,'Jumlah',1,0,'C');
        $pdf->Cell(20,6,'Satuan',1,0,'C');
        $pdf->Cell(0,6,'Keteraangan',1,1,'C');

        $pdf->SetFont('Arial','',10);
        $req = $this->requestAsetModel->getByBaId($ba_id);
        $no=1;
        foreach ($req as $data){
            $pdf->Cell(8,6,$no,1,0,'C');
            $pdf->Cell(15,6,$data->kode_aset,1,0,'C');
            $pdf->Cell(30,6,$data->jenis_aset,1,0,'C');
            $pdf->Cell(20,6,$data->jml_aset,1,0,'C');
            $pdf->Cell(20,6,$data->sat_aset,1,0,'C');
            $pdf->Cell(0,6,$data->keterangan,1,1,'C');
            $no++;
        }

        $pdf->Cell(10,15,'',0,1);
		
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,6,'Yogyakarta, '.date('d-m-Y'),0,1,'R');
		$pdf->Cell(10,15,'',0,1);
        $pdf->Cell(0,6,$nama,0,1,'R');
        $pdf->Cell(0,6,'NIK. '.$nik,0,1,'R');
        $pdf->Output();
	}

}
