<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Model {
	public function get_by_author($author = null)
	{
		$this->db->select('artikel.id as id, artikel.title as title, artikel.content as content, artikel.author as author_id, artikel.createdAt as createdAt, akun.name as author_name, akun.email as author_email');
		$this->db->join('akun', 'akun.id = artikel.author');
		$this->db->from('artikel');
		$this->db->where('artikel.author', $author);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id = null)
	{
		$this->db->select('artikel.id as id, artikel.title as title, artikel.content as content, artikel.author as author_id, artikel.createdAt as createdAt, akun.name as author_name, akun.email as author_email');
		$this->db->join('akun', 'akun.id = artikel.author');
		$this->db->from('artikel');
		$this->db->where('artikel.id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all()
	{
		$this->db->select('artikel.id as id, artikel.title as title, artikel.content as content, artikel.author as author_id, artikel.createdAt as createdAt, akun.name as author_name, akun.email as author_email');
		$this->db->join('akun', 'akun.id = artikel.author');
		$this->db->from('artikel');
		$query = $this->db->get();
		return $query->result();
	}

	public function add($data = null)
	{
		if (
			!is_array($data)
			|| empty($data)
			|| empty($data['title'])
			|| empty($data['content'])
			|| empty($data['author'])
		) {
			return false;
		}

		$data = array(
			'title' => $data['title'],
			'content' => $data['content'],
			'author' => $data['author']
		);
		return $this->db->insert('artikel', $data);
	}

	public function remove($id = null)
	{
		$this->db->from('artikel');
		$this->db->where('id', $id);
		return $this->db->delete();
	}

	public function update($id = null, $data = null)
	{
		if (
			!is_array($data)
			|| empty($data)
			|| (empty($data['title']) && empty($data['content']))
			|| empty($id)
		) {
			return false;
		}

		$artikel = $this->get_by_id($id);
		if (empty($artikel)) {
			return false;
		}

		$data = array(
			'title' => empty($data['title']) ? $artikel[0]->title : $data['title'],
			'content' => empty($data['content']) ? $artikel[0]->content : $data['content']
		);
		$this->db->where('id', $id);
		return $this->db->update('artikel', $data);
	}
}
