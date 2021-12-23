<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi_keahlian_model extends CI_Model
{
	private $_table = "kompetensi_keahlian";

	public $id_kk;
	public $nama_kk;

	public function getDataKeahlian()
	{
		$this->db->select("*");
		$this->db->from('kompetensi_keahlian');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAll()
	{
		$query = $this->db->get('kompetensi_keahlian');
		return $query->result();
	}

	public function showNum()
	{
		$this->db->where("id_kk >=", 0);
		$query = $this->db->get("kompetensi_keahlian");
		return $query->num_rows();
	}

	public function AddData($data)
	{
		$this->db->insert('kompetensi_keahlian', $data);
	}

	public function UpdateData($id, $data)
	{
		$this->db->where('id_kk', $id);
		$this->db->update('kompetensi_keahlian', $data);
	}
	public function DeleteData($id)
	{
		$this->db->where('id_kk', $id);
		$this->db->delete('kompetensi_keahlian');
	}

	//trash

	function get_kk()
	{

		$result = $this->db->get('kompetensi_keahlian');

		$kk[''] = 'Pilih Kompetensi Keahlian';
		//$kk = array();
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				// tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
				$kk[$row->id_kk] = $row->nama_kk;
			}
		}
		return $kk;
	}

	function get_kkById()
	{

		$result = $this->db->get('kompetensi_keahlian');

		$kk[''] = 'Pilih Kompetensi Keahlian';
		$kk = array();
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				// tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
				$kk[$row->id_kk] = $row->nama_kk;
			}
		}
		return $kk;
	}
}
