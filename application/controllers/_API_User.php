<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _API_User extends CI_Controller {

	public function index()
	{
		$this->load->model('Akun');
		$data['data'] = [
			'error' => false,
			'message' => 'Berhasil mengambil semua data user',
			'data' => $this->Akun->get()
		];
		$this->load->view('response', $data);
	}
}
