<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Check jika tidak ada user id
		check_not_login();
		$this->load->model('jabatan_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->jabatan_m->get_data();
		$this->template->load('template', 'jabatan/jabatan_data', $data);		
	}


	public function add()
	{
		$this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'required');
		if($this->form_validation->run() == false){
			$this->template->load('template', 'jabatan/jabatan_data');
		}else{
			$post = $this->input->post(null, TRUE);
				$this->jabatan_m->add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data jabatan berhasil disimpan');
				}
				redirect('jabatan');
		}
	}


	public function edit($id)
	{
		$this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'required');
		
		if($this->form_validation->run() == false){
			$query = $this->jabatan_m->get_data($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'jabatan/jabatan_form_edit', $data);	
			}else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('jabatan')."'</script>";
			}
		}else{
				$post = $this->input->post(null, TRUE);
				$this->jabatan_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data jabatan berhasil diubah');
				}
				redirect('jabatan');
		}
	}



	public function del()
	{
		$id = $this->input->post('id_jabatan');
		$this->jabatan_m->del($id);

		if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('success', 'Data jabatan berhasil di Hapus!!');
				}
		redirect('jabatan');

	}
	
}
	