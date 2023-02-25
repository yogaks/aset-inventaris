<?php defined('BASEPATH') or exit('No direct script access allowed');



class AsetTeknisiModel extends CI_Model {
    private $_aset_teknisi = "aset_teknisi";


    public function rules()
    {

        return [


        ];
    }

    public function getAll() {
        return $this->db->get($this->_aset_teknisi)->result();
    }

    public function getByUsername($username) {
        return $this->db->query("SELECT * FROM aset_teknisi WHERE created_by = '$username' ")->result();
    }

    public function save() {
        $post = $this->input->post();

        $this->as_nama      = $post['as_nama'];
        $this->as_jenis     = $post['as_jenis'];
        $this->as_kode      = strtoupper($post['as_kode']);
        $this->as_jml       = $post['as_jml'];
        $this->as_sat       = $post['as_sat'];
        $this->created_by   = $this->session->userdata('username');

        return $this->db->insert($this->_aset, $this);
    }

    public function update() {
        $post = $this->input->post();

        $this->kondisi      = $post['kondisi'];
        $this->keterangan   = $post['keterangan'];
        $this->updated_by   = $this->session->userdata('username');

        return $this->db->update($this->_aset_teknisi, $this, array('id' => $post['id']));
    }

    public function saveFromRequest() {
        $post = $this->input->post();

        $this->ba_id        = $post['ba_id'];
        $this->kode         = strtoupper($post['kode_aset']);
        $this->jenis        = $post['jenis_aset'];
        $this->jumlah       = $post['jml_aset'];
        $this->satuan       = $post['sat_aset'];
        $this->created_by   = $post['created_by'];

        return $this->db->insert($this->_aset_teknisi, $this);
    }

    public function delete($id) {
        return $this->db->delete($this->_aset_teknisi, array('id' => $id));
    }
}