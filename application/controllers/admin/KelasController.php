<?php

class KelasController extends CI_Controller
{
	public $id;

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
			$data["data_kelas"] = $this->kelas_model->getDataKelas();
			$data["joinan"] = $this->kelas_model->getJoin();
			$data["data_keahlian"] = $this->kompetensi_keahlian_model->getDataKeahlian();
			$this->load->view('admin/_partials/header_master.php');
			$this->load->view("admin/kelas_view.php", $data);
			$this->load->view('admin/_partials/footer.php');
		} else {
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}


	public function Tambah()
	{
		$nama_kelas = $this->input->post('nama_kelas');
		$id_kk = $this->input->post('id_kk');

		$data = [
			'nama_kelas' => $nama_kelas,
			'id_kk' => $id_kk
		];

		$this->kelas_model->AddData($data);
		redirect('admin/KelasController');
	}

	public function Edit($id)
	{
		$nama_kelas = $this->input->post('nama_kelas');
		$id_kk = $this->input->post('id_kk');

		$data = [
			'nama_kelas' => $nama_kelas,
			'id_kk' => $id_kk
		];

		$this->kelas_model->UpdateData($id, $data);
		redirect('admin/KelasController');
	}
	public function Delete($id)
	{
		$this->kelas_model->DeleteData($id);
		redirect(base_url('admin/KelasController'));
	}
}
