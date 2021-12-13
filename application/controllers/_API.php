<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _API extends CI_Controller {

	public function login()
	{
		if ($this->session->userdata('logged_in')){
			$data['data'] = [
				'error' => true,
				'message' => 'Sudah login',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$this->load->model('Akun');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$user = $this->Akun->get('email', $email);

		if (empty($user)) {
			$data['data'] = [
				'error' => true,
				'message' => 'User tidak terdaftar',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		if (!password_verify($password, $user->password)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Password salah',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$this->session->set_userdata('logged_in', true);
		$this->session->set_userdata('user', $user);

		$data['data'] = [
			'error' => false,
			'message' => 'Login berhasil',
			'data' => $user
		];
		$this->load->view('response', $data);
	}

	public function register()
	{
		if ($this->session->userdata('logged_in')){
			$data['data'] = [
				'error' => true,
				'message' => 'Mohon logout terlebih dahulu',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

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
		$this->load->view('response', $data);
	}

	public function logout()
	{
		if (!$this->session->userdata('logged_in')){
			$data['data'] = [
				'error' => true,
				'message' => 'Anda belum login',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$this->session->set_userdata('logged_in', false);

		$data['data'] = [
			'error' => false,
			'message' => 'Logout berhasil',
			'data' => null
		];
		$this->load->view('response', $data);
	}

}

?>
