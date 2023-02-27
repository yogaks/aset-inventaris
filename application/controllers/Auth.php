<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()

	{

		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('userModel');
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
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login2');
		} else {
			$this->login();
		}
	}

	private function login() {
        $post = $this->input->post();

        $username = $post['username'];
        $password = $post['password'];

        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
						'id' => $user['id'],
						'name' => $user['name'],
						'username' => $user['username'],
						'position' => $user['position'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					redirect('dashboard-utama');

                } else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
					redirect('');
				}
            } else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Inactive</div>');
				redirect('');
			}
        } else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Not Registered</div>');
			redirect('');
		}
	}

    public function registration() {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'NIK', 'required|trim|is_unique[users.username]', [
            'is_unique' => 'NIK Already Registered'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirmPassword]');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|trim|min_length[8]|matches[password]', [
            'matches' => 'Password Not Match',
            'min_length' => 'Password Minimum 8 Characters'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/registration');
        } else {
            $this->userModel->addUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add User Successed </div>');
            redirect('registration');
        }
    }

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successed Logout </div>');
		redirect('');
	}
}
