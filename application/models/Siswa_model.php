<?php defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
	private $_table = "siswa";

	public $nisn;
	public $nis;
	public $nama;
	public $id_kelas;
	public $alamat;
	public $no_telp;
	public $id_spp;
	public $password;

	public function rules()
	{
		return [
			[
				'field' => 'nisn',
				'label' => 'NISN',
				'rules' => 'numeric'
			],

			[
				'field' => 'nis',
				'label' => 'NIS',
				'rules' => 'numeric'
			],

			[
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required'
			],

			[
				'field' => 'id_kelas',
				'label' => 'Kelas',
				'rules' => 'required'
			],

			[
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required'
			],

			[
				'field' => 'no_telp',
				'label' => 'No. Telpon',
				'rules' => 'numeric'
			],

			[
				'field' => 'id_spp',
				'label' => 'Tahun SPP',
				'rules' => 'required'
			],

			[
				'field' => 'password',
				'label' => 'Kata Sandi',
				'rules' => 'required'
			],
		];
	}


	public function getDataSiswa()
	{
		$this->db->select("*");
		$this->db->from('siswa');
		$query = $this->db->get();
		return $query->result();
	}

	public function AddData($data)
	{
		$this->db->insert('siswa', $data);
	}

	public function UpdateData($id, $data)
	{
		$this->db->where('nisn', $id);
		$this->db->update('siswa', $data);
	}
	public function DeleteData($id)
	{
		$this->db->where('nisn', $id);
		$this->db->delete('siswa');
	}

	//trash


	public function getAll()
	{
		//return $this->db->get($this->_table)->result();
		$this->db->select('siswa.nisn,siswa.nis,siswa.nama,kelas.nama_kelas,siswa.alamat,siswa.no_telp,spp.tahun,siswa.image');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
		$this->db->join('spp', 'siswa.id_spp=spp.id_spp');
		$query = $this->db->get();
		return $query->result();
	}

	public function countAll()
	{
		$this->db->where('nisn >=', 0);
		$query = $this->db->get('siswa');
		echo $query->num_rows();
	}

	public function sumAll()
	{
		// $this->db->query('SELECT SUM(u.nominal) FROM siswa s INNER JOIN spp u ON u.id_spp = s.id_spp');
		// $query = $this->db->get();


		$this->db->select('SUM(spp.nominal)');
		$this->db->from('spp');
		$this->db->join('siswa', 'siswa.id_spp = spp.id_spp');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function getSiswa()
	{
		return $this->db->get($this->_table)->result();
	}

	public function graph()
	{
		$data = $this->db->query('SELECT * from siswa');
		return $data->result();
	}

	public function getById($nisn)
	{
		return $this->db->get_where($this->_table, ["nisn" => $nisn])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->nisn = $post["nisn"];
		$this->nis = $post["nis"];
		$this->nama = $post["nama"];
		$this->id_kelas = $post["id_kelas"];
		$this->alamat = $post["alamat"];
		$this->no_telp = $post["no_telp"];
		$this->id_spp = $post["id_spp"];
		$this->password = md5($post["password"]);
		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->nisn = $post["nisn"];
		$this->nis = $post["nis"];
		$this->nama = $post["nama"];
		$this->id_kelas = $post["id_kelas"];
		$this->alamat = $post["alamat"];
		$this->no_telp = $post["no_telp"];
		$this->id_spp = $post["id_spp"];
		$this->password = md5($post["password"]);
		$this->db->update($this->_table, $this, array('nisn' => $post['nisn']));
	}

	public function delete($nisn)
	{
		return $this->db->delete($this->_table, array("nisn" => $nisn));
	}
}
