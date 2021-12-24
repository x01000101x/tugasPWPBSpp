<?php

class Murid extends CI_Controller
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
			$data["data_siswa"] = $this->siswa_model->getDataSiswa();
			$data["summer"] = $this->siswa_model->sumAll();
			$data["summer_pembayaran"] = $this->pembayaran_model->sumAll();
			$data["minus_pembayaran"] = $this->pembayaran_model->Minus();
			$this->load->view('admin/_partials/header.php');
			$this->load->view("admin/murid_view.php", $data);
			$this->load->view('admin/_partials/footer.php');
		} else {
			$this->load->view('403');
		}
	}


	public function Tambah()
	{
		$nisn = $this->input->post('nisn');
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$id_kelas = $this->input->post('id_kelas');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$id_spp = $this->input->post('id_spp');
		$id_login = $this->input->post('id_login');



		$data = [
			'nisn' => $nisn,
			'nis' => $nis,
			'nama' => $nama,
			'id_kelas' => $id_kelas,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'id_spp' => $id_spp,
			'id_login' => $id_login


		];

		$this->siswa_model->AddData($data);
		redirect('admin/Murid');
	}

	public function Edit($id)
	{
		$nisn = $this->input->post('nisn');
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$id_kelas = $this->input->post('id_kelas');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$id_spp = $this->input->post('id_spp');
		$id_login = $this->input->post('id_login');

		$data = [
			'nisn' => $nisn,
			'nis' => $nis,
			'nama' => $nama,
			'id_kelas' => $id_kelas,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'id_spp' => $id_spp,
			'id_login' => $id_login
		];

		$this->siswa_model->UpdateData($id, $data);
		redirect('admin/Murid');
	}
	public function Delete($id)
	{
		$this->siswa_model->DeleteData($id);
		redirect(base_url('admin/Murid'));
	}
}
