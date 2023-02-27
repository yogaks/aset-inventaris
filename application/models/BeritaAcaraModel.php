<?php defined('BASEPATH') or exit('No direct script access allowed');



class BeritaAcaraModel extends CI_Model {
    private $_berita_acara_aset = "berita_acara_aset";


    public function rules()
    {

        return [


        ];
    }

    public function getBA() {
        return $this->db->query("SELECT * FROM berita_acara_aset WHERE status_request = 0 ")->result();
    }

    public function getByBAUsername($username) {
        return $this->db->query("SELECT * FROM berita_acara_aset WHERE user_nik = '$username' AND status_request = 0 ")->result();
    }

    public function getLaporan() {
        return $this->db->query("SELECT * FROM berita_acara_aset WHERE status_request <> 0 ")->result();
    }

    public function getByLaporanUsername($username) {
        return $this->db->query("SELECT * FROM berita_acara_aset WHERE user_nik = '$username' AND status_request <> 0 ")->result();
    }

    public function saveFromRequest() {
        $post = $this->input->post();
        $nik = $this->session->userdata('username');
        $query = $this->db->query("SELECT * FROM users WHERE username = '$nik' ")->result();
        foreach($query as $user) {
            $nama = $user->name;
        }

        $this->ba_id                 = $post['ba_id'];
        $this->user_nik              = $nik;
        $this->user_nama             = $nama;
        $this->status_request        = 0;

        return $this->db->insert($this->_berita_acara_aset, $this);
    }

    public function updateFromRequest() {
        $post = $this->input->post();

        if($post['status'] == 2) {
            $this->date_approval         = date('Y-m-d H:i:s');
        }
        $this->status_request        = $post['status'];

        return $this->db->update($this->_berita_acara_aset, $this, array('ba_id' => $post['ba_id'] ));
    }

}