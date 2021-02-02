<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Check jika tidak ada user id
		check_not_login();
		check_admin();

		$this->load->model('user_m');
		$this->load->model('jabatan_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$data['row'] = $this->user_m->get_data_user();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{
		$data = array(
            'title' => 'Add User',
            'jabatan' => $this->jabatan_m->get_data(),
            'user' => $this->user_m->get_data_user(),
           
        );
         $this->template->load('template','user/user_form_add', $data);
	}

	public function edit($id_user)
	{
		$data = array(
            'title' => 'Edit Arsip',
            'jabatan' => $this->jabatan_m->get_data(),
            'row' => $this->user_m->detail_data($id_user),
           
        );
         $this->template->load('template','user/user_form_edit', $data);	
	}
	

	public function prosesAdd()
	{

		$this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Password Confrimation', 'required|matches[password]',
			array('matches' => '%s tidak sesuai dengan password')
		);
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, Silahkan isi.');
		$this->form_validation->set_message('min_length', '%s minimal 5 Character.');
		$this->form_validation->set_message('is_unique', '%s sudah dipakai, silahkan ganti.');
		
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($this->form_validation->run() == false){
			$this->template->load('template', 'user/user_form_add');
		}else{
				$post = $this->input->post(null, TRUE);
				$this->user_m->add($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='".site_url('user')."'</script>";
		}	
	}


	public function prosesEdit()
	{
		$this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules('passconf', 'Password Confrimation', 'matches[password]',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Password Confrimation', 'matches[password]',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, Silahkan isi.');
		$this->form_validation->set_message('min_length', '%s minimal 5 Character.');
		$this->form_validation->set_message('is_unique', '%s sudah dipakai, silahkan ganti.');
		
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($this->form_validation->run() == false){
			$query = $this->user_m->get_data_user();
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);	
			}else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('user')."'</script>";
			}
		}else{
				$post = $this->input->post(null, TRUE);
				$this->user_m->edit($post);
				if($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='".site_url('user')."'</script>";
		}	
	}



	// public function add()
	// {
	// 	$this->form_validation->set_rules('fullname', 'Fullname', 'required');
	// 	$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
	// 	$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
	// 	$this->form_validation->set_rules('passconf', 'Password Confrimation', 'required|matches[password]',
	// 		array('matches' => '%s tidak sesuai dengan password')
	// 	);
	// 	$this->form_validation->set_rules('level', 'Level', 'required');

	// 	$this->form_validation->set_message('required', '%s masih kosong, Silahkan isi.');
	// 	$this->form_validation->set_message('min_length', '%s minimal 5 Character.');
	// 	$this->form_validation->set_message('is_unique', '%s sudah dipakai, silahkan ganti.');
		
	// 	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

	// 	if($this->form_validation->run() == false){
	// 		$this->template->load('template', 'user/user_form_add');
	// 	}else{
	// 			$post = $this->input->post(null, TRUE);
	// 			$this->user_m->add($post);
	// 			if ($this->db->affected_rows() > 0) {
	// 				echo "<script>alert('Data berhasil disimpan');</script>";
	// 			}
	// 			echo "<script>window.location='".site_url('user')."'</script>";
	// 	}
	// }	

	public function del()
	{
		$id = $this->input->post('user_id');
		$this->user_m->del($id);

		if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil dihapus');</script>";
				}
				echo "<script>window.location='".site_url('user')."'</script>";

	}

	// public function edit($id)
	// {
		
	// 	$this->form_validation->set_rules('fullname', 'Fullname', 'required');
	// 	$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
	// 	if ($this->input->post('password')) {
	// 		$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
	// 		$this->form_validation->set_rules('passconf', 'Password Confrimation', 'matches[password]',
	// 			array('matches' => '%s tidak sesuai dengan password')
	// 		);
	// 	}
	// 	if ($this->input->post('passconf')) {
	// 		$this->form_validation->set_rules('passconf', 'Password Confrimation', 'matches[password]',
	// 			array('matches' => '%s tidak sesuai dengan password')
	// 		);
	// 	}
	// 	$this->form_validation->set_rules('level', 'Level', 'required');

	// 	$this->form_validation->set_message('required', '%s masih kosong, Silahkan isi.');
	// 	$this->form_validation->set_message('min_length', '%s minimal 5 Character.');
	// 	$this->form_validation->set_message('is_unique', '%s sudah dipakai, silahkan ganti.');
		
	// 	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

	// 	if($this->form_validation->run() == false){
	// 		$query = $this->user_m->get_nama($id);
	// 		if ($query->num_rows() > 0) {
	// 			$data['row'] = $query->row();
	// 			$this->template->load('template', 'user/user_form_edit', $data);	
	// 		}else {
	// 			echo "<script>alert('Data tidak ditemukan');";
	// 			echo "window.location='".site_url('user')."'</script>";
	// 		}
	// 	}else{
	// 			$post = $this->input->post(null, TRUE);
	// 			$this->user_m->edit($post);
	// 			if($this->db->affected_rows() > 0) {
	// 				echo "<script>alert('Data berhasil disimpan');</script>";
	// 			}
	// 			echo "<script>window.location='".site_url('user')."'</script>";
	// 	}
	// }	

	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '%s ini sudah dipakai, silahkan ganti.');
			return FALSE;
		}else{
			return TRUE;
		}
	}

}
