<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class akun extends CI_Model {

	public function get($id = null)
	{
		if ($id != null) {
			$this->db->where('id', $id);
			$query = $this->db->get('akun');
			return $query->row();
		}
		$query = $this->db->get('akun');
		return $query->result();
	}
}
