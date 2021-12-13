<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _API_User extends CI_Controller {

	public function getall()
	{
		$this->load->model('Akun');
		$get = $this->Akun->get();
		$message = empty($get) ? 'Data kosong' : 'Berhasil mengambil semua data user';
		$data['data'] = [
			'error' => empty($get) ? true : false,
			'message' => $message,
			'data' => $get
		];
		$this->load->view('response', $data);
	}

	public function getby($by = null, $value = null)
	{
		$this->load->model('Akun');
		$get = $this->Akun->get($by, $value);
		$message = empty($get) ? 'Data kosong' : 'Berhasil mengambil semua data user';
		$data['data'] = [
			'error' => empty($get) ? true : false,
			'message' => $message,
			'data' => $get
		];
		$this->load->view('response', $data);
	}
}
