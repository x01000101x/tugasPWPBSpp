<?php

class Keahlian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['petugas_model', 'pembayaran_model', 'siswa_model', 'login_model', 'kelas_model', 'spp_model', 'kompetensi_keahlian_model']);
		$this->load->library('form_validation');
		$this->load->helper('rupiah_helper');
	}

	public function index()
	{
		if ($this->session->userdata('akses') == 'admin') {
			// $get = $this->login_model->GetDataLogin();
			// $data = array('data_login' => $get);


			$data["data_login"] = $this->login_model->GetDataLogin();
			$data["petugas"] = $this->petugas_model->getAll();
			$data["petugas"] = $this->petugas_model->getAll();
			$data["pembayaran"] = $this->pembayaran_model->getAll();
			$data["jumlah_bayar"] = $this->pembayaran_model->total();
			$data["siswa"] = $this->siswa_model->graph();
			$data["total_kelas"] = $this->kelas_model->showNum();
			$data["total_spp"] = $this->spp_model->showNum();
			$data["total_keahlian"] = $this->kompetensi_keahlian_model->showNum();
			$data["data_spp"] = $this->spp_model->getDataSpp();
			$data["data_kelas"] = $this->kelas_model->getDataKelas();
			$data["joinan"] = $this->kelas_model->getJoin();
			$data["data_keahlian"] = $this->kompetensi_keahlian_model->getDataKeahlian();
			$this->load->view('admin/_partials/header_master.php');
			$this->load->view("admin/keahlian_view.php", $data);
			$this->load->view('admin/_partials/footer.php');
		} else {
			$this->load->view('403');
		}
	}


	public function Tambah()
	{
		$nama_kk = $this->input->post('nama_kk');

		$data = [
			'nama_kk' => $nama_kk,

		];

		$this->kompetensi_keahlian_model->AddData($data);
		redirect('admin/Keahlian');
	}

	public function Edit($id)
	{
		$nama_kk = $this->input->post('nama_kk');

		$data = [
			'nama_kk' => $nama_kk,
		];

		$this->kompetensi_keahlian_model->UpdateData($id, $data);
		redirect('admin/Keahlian');
	}
	public function Delete($id)
	{
		$this->kompetensi_keahlian_model->DeleteData($id);
		redirect(base_url('admin/Keahlian'));
	}
}
