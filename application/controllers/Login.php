
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function auth()
	{
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$cek_user = $this->login_model->cek_user($username, $password);
		if ($cek_user->num_rows() > 0) {
			$data = $cek_user->row_array();
			$username = $data['username'];
			$level = $data['level'];
			$sesdata = array(
				'username' => $username,
				'level' => $level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			if ($level == 'admin') {
				$this->session->set_userdata('akses', 'admin');
				$this->session->set_flashdata('msg', 'Berhasil');
				redirect('admin/overview');
			} elseif ($level == 'petugas') {
				$this->session->set_userdata('akses', 'petugas');
				$this->session->set_flashdata('msg', 'Berhasil');
				redirect('admin/PetugasIndex');
			} elseif ($level == 'siswa') {
				$where = array(
					'username' => $username,
					'password' => $password
				);
				$cek = $this->login_model->cek_murid("login", $where);
				$rows = $cek->num_rows();
				if ($rows > 0) {
					$cek = $cek->row_array();
					$data_session = array(
						'username' => $cek['username']
					);
				}
				$this->session->set_userdata('siswa', $data_session);
				$this->session->set_userdata('akses', 'siswa');
				$this->session->set_flashdata('msg', 'Berhasil');
				redirect('admin/User');
			}
		}
		// elseif ($cek_user->num_rows() < 1) {
		// 	$this->session->set_flashdata('msg', 'Username or Password is Wrong');
		// 	redirect('login');
		// } 
		else {
			$this->session->set_flashdata('msg', '<div class="p-3 mb-2 bg-danger text-white">Username atau Password salah</div>
			');
			redirect('login');
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		$url = base_url('');
		$this->session->set_flashdata('message', 'Berhasil');
		redirect($url);
	}
}
