<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _API_Artikel extends CI_Controller {

	public function get_by_author($author = null)
	{
		if (empty($author)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Author tidak boleh kosong',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$this->load->model('Artikel');
		$artikel = $this->Artikel->get_by_author($author);
		if (empty($artikel)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Penulis tidak punya artikel',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$data['data'] = [
			'error' => false,
			'message' => 'Berhasil ambil artikel',
			'data' => $artikel
		];
		$this->load->view('response', $data);
	}

	public function get_by_id($id = null)
	{
		if (empty($id)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Artikel id tidak boleh kosong',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$this->load->model('Artikel');
		$artikel = $this->Artikel->get_by_id($id);
		if (empty($artikel)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Artikel tidak ditemukan',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$data['data'] = [
			'error' => false,
			'message' => 'Berhasil ambil artikel',
			'data' => $artikel
		];
		$this->load->view('response', $data);
	}

	public function get_all()
	{
		$this->load->model('Artikel');
		$artikel = $this->Artikel->get_all();
		if (empty($artikel)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Belum ada artikel',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$data['data'] = [
			'error' => false,
			'message' => 'Berhasil ambil artikel',
			'data' => $artikel
		];
		$this->load->view('response', $data);
	}

	public function create()
	{
		if (!$this->session->userdata('logged_in')){
			$data['data'] = [
				'error' => true,
				'message' => 'Anda belum login',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		if (!$this->session->userdata('user')){
			$data['data'] = [
				'error' => true,
				'message' => 'Anda tidak punya akses',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$this->load->model('Artikel');
		$user = $this->session->userdata('user');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$author = $user->id;

		if (empty($title) || empty($content)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Title dan content tidak boleh kosong',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$insert = array(
			'title' => $title,
			'content' => $content,
			'author' => $author
		);
		$add = $this->Artikel->add($insert);

		$data['data'] = [
			'error' => $add,
			'message' => $add ? 'Berhasil membuat artikel' : 'Gagal membuat artikel',
			'data' => null
		];
		$this->load->view('response', $data);
	}

	public function update($id = null)
	{
		if (!$this->session->userdata('logged_in')){
			$data['data'] = [
				'error' => true,
				'message' => 'Anda belum login',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		if (!$this->session->userdata('user')){
			$data['data'] = [
				'error' => true,
				'message' => 'Anda tidak punya akses',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		if (empty($id)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Artikel id tidak boleh kosong',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$this->load->model('Artikel');
		$user = $this->session->userdata('user');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$author = $user->id;
		$artikel = $this->Artikel->get_by_id($id);

		if (empty($title) && empty($content)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Data tidak boleh kosong',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		if (empty($artikel)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Artikel tidak ditemukan',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		if ($artikel[0]->author_id != $author) {
			$data['data'] = [
				'error' => true,
				'message' => 'Anda tidak punya akses',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$update = array(
			'title' => empty($title) ? $artikel[0]->title : $title,
			'content' => empty($content) ? $artikel[0]->content : $content
		);
		$update = $this->Artikel->update($id, $update);

		$data['data'] = [
			'error' => $update,
			'message' => $update ? 'Berhasil mengubah artikel' : 'Gagal mengubah artikel',
			'data' => null
		];
		$this->load->view('response', $data);
	}

	public function delete($id = null)
	{
		if (!$this->session->userdata('logged_in')){
			$data['data'] = [
				'error' => true,
				'message' => 'Anda belum login',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		if (!$this->session->userdata('user')){
			$data['data'] = [
				'error' => true,
				'message' => 'Anda tidak punya akses',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		if (empty($id)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Artikel id tidak boleh kosong',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$this->load->model('Artikel');
		$user = $this->session->userdata('user');
		$author = $user->id;
		$artikel = $this->Artikel->get_by_id($id);

		if (empty($artikel)) {
			$data['data'] = [
				'error' => true,
				'message' => 'Artikel tidak ditemukan',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		if ($artikel[0]->author_id != $author) {
			$data['data'] = [
				'error' => true,
				'message' => 'Anda tidak punya akses',
				'data' => null
			];

			return $this->load->view('response', $data);
		}

		$remove = $this->Artikel->remove($id);

		$data['data'] = [
			'error' => $remove,
			'message' => $remove ? 'Berhasil menghapus artikel' : 'Gagal menghapus artikel',
			'data' => null
		];
		$this->load->view('response', $data);
	}
}

?>
