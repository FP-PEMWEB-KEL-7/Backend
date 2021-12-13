<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _404 extends CI_Controller {

	public function invalid()
	{
		$data['data'] = [
			'error' => true,
			'message' => 'Belum ada API yang dibuat atau API tidak valid',
			'data' => null
		];
		$this->load->view('response', $data);
	}
	
}

?>
