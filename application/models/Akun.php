<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Model {
	public function get($by = null, $value = null, $logged_in = false)
	{
		if ($logged_in) {
			$this->db->select('id, email, name, password');
		} else {
			$this->db->select('id, email, name');
		}

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
			|| empty($data)
			|| empty($data['email'])
			|| empty($data['name'])
			|| empty($data['password'])
		) {
			return false;
		}

		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
		return $this->db->insert('akun', $data);
	}
}
