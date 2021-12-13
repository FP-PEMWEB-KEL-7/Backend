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
}
