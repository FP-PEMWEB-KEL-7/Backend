<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Model {
	public function get($by = null, $value = null)
	{
		// select specific column
		$this->db->select('id, email, name');
		$this->db->from('akun');
		if ($by != null && $value != null) {
			$this->db->where($by, $value);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function add($data)
	{
		if (
			!is_array($data)
			&& !isset($data['email'])
			&& !isset($data['name'])
			&& !isset($data['password'])
		) {
			return false;
		}

		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
		return $this->db->insert('akun', $data);
	}
}
