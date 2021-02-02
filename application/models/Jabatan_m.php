<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_m extends CI_Model {

	public function get_data($id = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_jabatan');
		if ($id != null) {
			$this->db->where('id_jabatan', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_jabatan');
		$this->db->order_by('id_jabatan', 'desc');
		return $this->db->get()->result();
	}

	public function add($post)
	{
		$params['nama_jabatan'] = $post['nama_jabatan'];
		$this->db->insert('tbl_jabatan', $params);
	}

	public function del($id)
	{
		$this->db->where('id_jabatan', $id);
		$this->db->delete('tbl_jabatan');
	}


	public function edit($post)
	{
		$params['nama_jabatan'] = $post['nama_jabatan'];
		$this->db->where('id_jabatan', $post['id_jabatan']);
		$this->db->update('tbl_jabatan', $params);
	}









}