<?php

class MasterPetugas extends CI_Controller
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
		if ($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'petugas') {
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
			$this->load->view('admin/_partials/header_master_petugas.php');
			$this->load->view("admin/view_petugas_master.php", $data);
			$this->load->view('admin/_partials/footer.php');
		} else {
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}


	public function Tambah()
	{
		$tahun = $this->input->post('tahun');
		$nominal = $this->input->post('nominal');

		$data = [
			'tahun' => $tahun,
			'nominal' => $nominal
		];

		$this->spp_model->AddData($data);
		redirect('admin/MasterPetugas');
	}

	public function Edit($id)
	{
		$tahun = $this->input->post('tahun');
		$nominal = $this->input->post('nominal');

		$data = [
			'tahun' => $tahun,
			'nominal' => $nominal
		];

		$this->spp_model->UpdateData($id, $data);
		redirect('admin/MasterPetugas');
	}
	public function Delete($id)
	{
		$this->spp_model->DeleteData($id);
		redirect(base_url('admin/MasterPetugas'));
	}
}
