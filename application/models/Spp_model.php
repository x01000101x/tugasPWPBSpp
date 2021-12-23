<?php defined('BASEPATH') or exit('No direct script access allowed');

class Spp_model extends CI_Model
{
	private $_table = "spp";

	public $id_spp;
	public $tahun;
	public $nominal;

	public function rules()
	{
		return [
			[
				'field' => 'tahun',
				'label' => 'Tahun',
				'rules' => 'required'
			],

			[
				'field' => 'nominal',
				'label' => 'nominal',
				'rules' => 'numeric'
			],

		];
	}

	public function showNum()
	{
		$this->db->where('id_spp >=', 0);
		$query = $this->db->get('spp');
		return $query->num_rows();
	}

	public function getDataSpp()
	{
		$this->db->select('*');
		$this->db->from('spp');
		$query = $this->db->get();
		return $query->result();
	}

	public function AddData($data)
	{
		$this->db->insert('spp', $data);
	}

	public function UpdateData($id, $data)
	{
		$this->db->where('id_spp', $id);
		$this->db->update('spp', $data);
	}
	public function DeleteData($id)
	{
		$this->db->where('id_spp', $id);
		$this->db->delete('spp');
	}


	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_spp" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->tahun = $post["tahun"];
		$this->nominal = $post["nominal"];
		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_spp = $post["id"];
		$this->tahun = $post["tahun"];
		$this->nominal = $post["nominal"];
		$this->db->update($this->_table, $this, array('id_spp' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id_spp" => $id));
	}
}
