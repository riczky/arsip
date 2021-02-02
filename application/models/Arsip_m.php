<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_m extends CI_Model {

	public function get_nama($id = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_arsip');
		if ($id != null) {
			$this->db->where('id_arsip', $id);
		}
		$query = $this->db->get();
		return $query;
	}


	public function get_data_arsip()	
	{
		$this->db->select('*');
		$this->db->from('tbl_arsip');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori','left');
		$this->db->join('user', 'user.user_id = tbl_arsip.id_user','left');
		$this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_arsip.id_jabatan','left');
		$this->db->order_by('id_arsip', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function del($id)
	{
		$this->db->where('id_arsip', $id);
		$this->db->delete('tbl_arsip');
	}


	public function detail_data($id_arsip)
	{
		$this->db->select('*');
		$this->db->from('tbl_arsip');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori','left');
		$this->db->where('id_arsip', $id_arsip);
		$query = $this->db->get()->row_array();
		return $query;
	}	

	public function update($data,$tabel)
	{
		$this->db->where('id_arsip', $this->input->post('id_arsip'));
        $this->db->update($tabel, $data);
	}
}