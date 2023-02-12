<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
    private $_users = "users";
    
    public function rules() {

        return[

            ['field' => 'id',

            'label' => 'Id',

            'rules' => '']



        ];

    }

    public function addUser() {
        $post = $this->input->post();
        
        $this->name         = strtoupper($post['name']);
        $this->username     = $post['username'];
        $this->password     = password_hash($post['password'], PASSWORD_DEFAULT);
        $this->position     = strtoupper($post['position']);
        $this->role_id      = $post['roleId'];
        $this->is_active    = 1;

        return $this->db->insert($this->_users, $this);
    }


    public function delete($id)
    {
        return $this->db->delete($this->_user, array("id" => $id));
    }

    
    public function deleteUser($id)
    {
        return $this->db->delete($this->_user, array("username" => $id));
    }


    public function getById($id) {

        return $this->db->get_where($this->_user, ["id" => $id])->row();

    }

    public function saveUser() {

        $post = $this->input->post();

        $this->name         = $post["nama"];

        $this->username     = $post["nik"];

        $this->password     = "$2y$10$0yCG9Nfq3eaMZJ5kqbfbT.khkmdyUU5rHMAWx9oX1g.L2VDEXgoGa";
        
        $this->area         = $post["sto"];

        $this->sektor       = $post["sektor"];

        $this->jabatan      = "TEKNISI";

        $this->role_id      = "5";

        $this->is_active    = "1";

        return $this->db->insert($this->_user, $this);

    }

    public function updateArea() {

        $post = $this->input->post();

        $this->username     = $post["nik"];
        
        $this->area         = $post["sto"];

        $this->sektor       = $post["sektor"];

        return $this->db->update($this->_user, $this, array('username' => $post["nik"]));

    }

    public function update() {

        $post = $this->input->post();

        $this->id           = $post["id"];

        $this->name         = $post["name"];

        $this->email        = $post["email"];
        
        $this->area         = $post["area"];

        $this->sektor       = $post["sektor"];

        $this->role_id      = $post["role_id"];

        $this->is_active    = $post["is_active"];

        return $this->db->update($this->_user, $this, array('id' => $post["id"]));

    }


    public function save() {

        $post = $this->input->post();

        $this->id = $post["id"];
        $this->email = $post["email"];
        $this->password = password_hash($post["password2"], PASSWORD_DEFAULT);

        return $this->db->update($this->_user, $this, array('id' => $post["id"]));
    }

    public function cek_old() {
        $old = password_hash($this->input->post('password'));    
        $this->db->where('password',$old);
        $query = $this->db->get('user');
            return $query->result();
    }

    public function update_reset_key($email, $reset_key){
        $this->db->where('email', $email);
        $data = array('reset_password' => $reset_key);
        $this->db->update('user', $data);

        if($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function reset_password() {

        $post = $this->input->post();

        $this->password = password_hash($post["confirm_password"], PASSWORD_DEFAULT);
        $this->reset_password = random_string('alnum', 50);

        $this->db->update($this->_user, $this, array('reset_password' => $post["reset_key"]));

        return ($this->db->affected_rows() > 0 ) ? TRUE:FALSE;
    }

    public function check_reset_key($reset_key){
        $this->db->where('reset_password', $reset_key);
        $this->db->from('user');

        return $this->db->count_all_results();
        
    }

}