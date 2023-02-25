<?php defined('BASEPATH') or exit('No direct script access allowed');



class AsetModel extends CI_Model {
    private $_aset = "aset";


    public function rules()
    {

        return [


        ];
    }

    public function getAll() {
        return $this->db->get($this->_aset)->result();
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

        $this->as_nama      = $post['as_nama'];
        $this->as_jenis     = $post['as_jenis'];
        $this->as_jml       = $post['as_jml'];
        $this->as_sat       = $post['as_sat'];
        $this->updated_by   = $this->session->userdata('username');

        return $this->db->update($this->_aset, $this, array('as_id' => $post['as_id']));
    }

    public function updateFromRequest() {
        $post = $this->input->post();
        $kode = $post['kode_aset'];
        $query = $this->db->query("SELECT * FROM aset WHERE as_kode = '$kode' ")->result();
        foreach($query as $aset) {
            $jumlah = $aset->as_jml;
        }

        if($query && $jumlah >= $post['jml_aset']) {
            $this->as_jml       = $jumlah - $post['jml_aset'];
            $this->updated_by   = $this->session->userdata('username');
    
            return $this->db->update($this->_aset, $this, array('as_kode' => $kode));
        }
    }

    public function delete($id) {
        return $this->db->delete($this->_aset, array('as_id' => $id));
    }
}