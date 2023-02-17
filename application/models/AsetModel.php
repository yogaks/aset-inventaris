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

        return $this->db->insert($this->_aset, $this);
    }

    public function update() {
        $post = $this->input->post();

        $this->as_nama      = $post['as_nama'];
        $this->as_jenis     = $post['as_jenis'];
        $this->as_jml       = $post['as_jml'];
        $this->as_sat       = $post['as_sat'];

        return $this->db->update($this->_aset, $this, array('as_id' => $post['as_id']));
    }

    public function delete($id) {
        return $this->db->delete($this->_aset, array('as_id' => $id));
    }
}