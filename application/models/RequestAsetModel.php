<?php defined('BASEPATH') or exit('No direct script access allowed');



class RequestAsetModel extends CI_Model {
    private $_request_aset = "request_pengadaan_aset";


    public function rules()
    {

        return [


        ];
    }

    public function getAll() {
        return $this->db->get($this->_request_aset)->result();
    }

    public function getByUsername($username) {
        return $this->db->query("SELECT * FROM request_pengadaan_aset WHERE created_by = '$username' ")->result();
    }

    public function getByBaId($ba_id) {
        return $this->db->query("SELECT * FROM request_pengadaan_aset WHERE ba_id = '$ba_id' ")->result();
    }

    public function save() {
        $post = $this->input->post();

        $this->ba_id        = $post['ba_id'];
        $this->kode_aset    = strtoupper($post['kode_aset']);
        $this->jenis_aset   = $post['jenis_aset'];
        $this->jml_aset     = $post['jml_aset'];
        $this->sat_aset     = $post['sat_aset'];
        $this->status       = 0;
        $this->keterangan   = $post['keterangan'];
        $this->created_by   = $this->session->userdata('username');

        return $this->db->insert($this->_request_aset, $this);
    }

    public function update() {
        $post = $this->input->post();

        $this->kode_aset    = strtoupper($post['kode_aset']);
        $this->jenis_aset   = $post['jenis_aset'];
        $this->jml_aset     = $post['jml_aset'];
        $this->sat_aset     = $post['sat_aset'];
        $this->app          = $post['app'];
        $this->status       = $post['status'];
        $this->keterangan   = $post['keterangan'];
        $this->updated_by   = $this->session->userdata('username');

        return $this->db->update($this->_request_aset, $this, array('id_req' => $post['id_req']));
    }

    public function delete($id) {
        return $this->db->delete($this->_request_aset, array('id_req' => $id));
    }
}