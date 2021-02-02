<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function login ($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}

	public function get_nama($id = null)
	{
		$this->db->select('*');
		$this->db->from('user');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_data_user()	
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = user.id_jabatan','left');
		$this->db->order_by('user_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail_data($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = user.id_jabatan','left');
		$this->db->where('user_id', $id_user);
		$query = $this->db->get()->row();
		return $query;
	}

	

	public function add($post)
	{
		$params['name'] = $post['fullname'];
		$params['username'] = $post['username'];
		$params['id_jabatan'] = $post['id_jabatan'];
		$params['password'] = sha1($post['password']);
		$params['address'] = $post['address'] != "" ? $post['address'] : null;
		$params['level'] = $post['level'];
		$this->db->insert('user', $params);
	}

	public function del($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('user');
	}

	public function edit($post)
	{
		$params['name'] = $post['fullname'];
		$params['id_jabatan'] = $post['id_jabatan'];
		$params['username'] = $post['username'];
		if (!empty($post['password'])) {
			$params['password'] = sha1($post['password']);	
		}
		
		$params['address'] = $post['address'] != "" ? $post['address'] : null;
		$params['level'] = $post['level'];
		$this->db->where('user_id', $post['user_id']);
		$this->db->update('user', $params);
	}
}