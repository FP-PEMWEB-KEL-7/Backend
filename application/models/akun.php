<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

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
