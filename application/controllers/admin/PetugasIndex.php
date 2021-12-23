<?php

class PetugasIndex extends CI_Controller
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
		if ($this->session->userdata('akses') == 'petugas') {
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
			$data["data_petugas"] = $this->petugas_model->getDataPetugas();
			$data["data_pembayaran"] = $this->pembayaran_model->getDataPembayaran();
			$data["summer"] = $this->siswa_model->sumAll();
			$data["summer_pembayaran"] = $this->pembayaran_model->sumAll();
			$data["minus_pembayaran"] = $this->pembayaran_model->Minus();
			$this->load->view('admin/_partials/header_petugas.php');
			$this->load->view("admin/view_petugas.php", $data);
			$this->load->view('admin/_partials/footer.php');
		} else {
			echo "Anda tidak berhak mengakses halaman ini";
		}
	}


	public function Tambah()
	{
		$id_petugas = $this->input->post('id_petugas');
		$nisn = $this->input->post('nisn');
		$tgl_bayar = $this->input->post('tgl_bayar');
		$bulan_dibayar = $this->input->post('bulan_dibayar');
		$tahun_dibayar = $this->input->post('tahun_dibayar');
		$id_spp = $this->input->post('id_spp');
		$jumlah_bayar = $this->input->post('jumlah_bayar');

		$data = [
			'id_petugas' => $id_petugas,
			'nisn' => $nisn,
			'tgl_bayar' => $tgl_bayar,
			'bulan_dibayar' => $bulan_dibayar,
			'tahun_dibayar' => $tahun_dibayar,
			'id_spp' => $id_spp,
			'jumlah_bayar' => $jumlah_bayar

		];

		$this->pembayaran_model->AddData($data);
		redirect('admin/PetugasIndex');
	}


	public function Edit($id)
	{
		$id_petugas = $this->input->post('id_petugas');
		$nisn = $this->input->post('nisn');
		$tgl_bayar = $this->input->post('tgl_bayar');
		$bulan_dibayar = $this->input->post('bulan_dibayar');
		$tahun_dibayar = $this->input->post('tahun_dibayar');
		$id_spp = $this->input->post('id_spp');
		$jumlah_bayar = $this->input->post('jumlah_bayar');

		$data = [
			'id_petugas' => $id_petugas,
			'nisn' => $nisn,
			'tgl_bayar' => $tgl_bayar,
			'bulan_dibayar' => $bulan_dibayar,
			'tahun_dibayar' => $tahun_dibayar,
			'id_spp' => $id_spp,
			'jumlah_bayar' => $jumlah_bayar
		];

		$this->pembayaran_model->UpdateData($id, $data);
		redirect('admin/PetugasIndex');
	}
	public function Delete($id)
	{
		$this->pembayaran_model->DeleteData($id);
		redirect(base_url('admin/PetugasIndex'));
	}
}
