<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
		$this->load->model('Akun');
		$data['data'] = $this->Akun->get();
		$this->load->view('response', $data);
	}
}
