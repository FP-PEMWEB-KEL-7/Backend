<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Model {
	public function get($id = null)
	{
		// select specific column
		$this->db->select('id, email, name');
		$this->db->from('akun');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query->result();
	}
}
