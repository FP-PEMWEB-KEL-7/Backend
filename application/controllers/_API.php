<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _API extends CI_Controller {

	public function invalid()
	{
		$data['data'] = [
			'error' => true,
			'message' => 'Belum ada API yang dibuat atau API tidak valid',
			'data' => null
		];
		$this->load->view('response', $data);
	}

	public function register()
	{
		$this->load->model('Akun');
		$user = [
			'password' => $this->input->post('password'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email')
		];
		$add = $this->Akun->add($user);

		$data['data'] = [
			'error' => $add,
			'message' => $add ? 'Berhasil mendaftar' : 'Gagal mendaftar',
			'data' => null
		];
	}
}

?>
