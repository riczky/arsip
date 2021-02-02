<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_m extends CI_Model {

	public function get_data($id = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		if ($id != null) {
			$this->db->where('id_kategori', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->order_by('id_kategori', 'desc');
		return $this->db->get()->result();
	}

	public function add($post)
	{
		$params['nama_kategori'] = $post['nama_kategori'];
		$this->db->insert('tbl_kategori', $params);
	}

	public function del($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('tbl_kategori');
	}


	public function edit($post)
	{
		$params['nama_kategori'] = $post['nama_kategori'];
		$this->db->where('id_kategori', $post['id_kategori']);
		$this->db->update('tbl_kategori', $params);
	}


	public function get_all_data_arsip_kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_arsip', 'tbl_arsip.id_kategori = tbl_kategori.id_kategori','left');
		// $this->db->join('user', 'user = tbl_kategori.id_kategori','left');
		$this->db->where('tbl_arsip.id_kategori', $id_kategori);
		return $this->db->get();		
	}


	public function kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->get()->row();
	}






}