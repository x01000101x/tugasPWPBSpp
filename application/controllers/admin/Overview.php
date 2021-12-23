<?php

class Overview extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['petugas_model', 'pembayaran_model', 'siswa_model', 'login_model']);
		$this->load->library('form_validation');
		$this->load->helper('rupiah_helper');
	}

	public function index()
	{
		if ($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'petugas') {
			// $get = $this->login_model->GetDataLogin();
			// $data = array('data_login' => $get);
			$data["data_login"] = $this->login_model->GetDataLogin();
			$data["petugas"] = $this->petugas_model->getAll();
			$data["petugas"] = $this->petugas_model->getAll();
			$data["pembayaran"] = $this->pembayaran_model->getAll();
			$data["jumlah_bayar"] = $this->pembayaran_model->total();
			$data["siswa"] = $this->siswa_model->graph();
			$data["summer"] = $this->siswa_model->sumAll();
			$data["summer_pembayaran"] = $this->pembayaran_model->sumAll();
			$data["minus_pembayaran"] = $this->pembayaran_model->Minus();
			$this->load->view('admin/_partials/header');
			$this->load->view('admin/overview_view', $data);
			$this->load->view('admin/_partials/footer');
		} else {
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}
	public function getdata()
	{
		// $this->output->enable_profiler(TRUE);

		// $data['query'] = $this->siswa_model->sumAll();

		// $this->load->view('admin/overview_view', $data);
	}
	public function Tambah()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$data = [
			'username' => $username,
			'password' => $password,
			'level' => $level
		];

		$this->login_model->AddData($data);
		redirect(base_url('admin'));

		// var_dump($data);
	}

	public function Edit($id)
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$data = [
			'username' => $username,
			'password' => $password,
			'level' => $level
		];

		$this->login_model->UpdateData($id, $data);
		redirect(base_url('admin'));
	}
	public function Delete($id)
	{
		$this->login_model->DeleteData($id);
		redirect(base_url('admin'));
	}
}
