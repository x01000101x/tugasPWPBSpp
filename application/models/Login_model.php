<?php
class Login_model extends CI_Model
{
	public function GetDataLogin()
	{
		$this->db->select('*');
		$this->db->from('login');
		$query = $this->db->get();
		return $query->result();
	}

	function cek_user($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('login', 1);
		return $result;
	}

	public function AddData($data)
	{
		$this->db->insert('login', $data);
	}

	public function UpdateData($id, $data)
	{
		$this->db->where('id_login', $id);
		$this->db->update('login', $data);
	}

	public function DeleteData($id)
	{
		$this->db->where('id_login', $id);
		$this->db->delete('login');
	}
}
