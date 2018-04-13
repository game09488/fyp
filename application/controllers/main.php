<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function login(){		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');		
			if($this->form_validation->run()){
				$username = $this->input->post('username');
				$password = $this->input->post('password');				
				$this->db->select('*');
				$this->db->from('admin');
				$this->db->where(array('admin_username' => $username, 'admin_password' => $password));
				$query = $this->db->get();				
				$user = $query->row();
				
				$this->db->select('lecturer_full_name');
				$this->db->from('lecturer');
				$this->db->where(array('lecturer_username' => $username, 'lecturer_password' => $password));
				$query1 = $this->db->get();				
				$user1 = $query1->row();
				
				
				if($user->admin_name){					
					$this->session->set_flashdata("success","Login Successful");				
					$_SESSION['user_logged'] = TRUE;
					$_SESSION['admin_name'] = $user->admin_name;
					redirect(base_url()."admin/p_admin","refresh");
				}else if($user1->lecturer_full_name){
					$this->session->set_flashdata("success","Login Successful");				
					$_SESSION['user_logged'] = TRUE;
					$_SESSION['lecturer_full_name'] = $user1->lecturer_full_name;				
					redirect(base_url()."lecturer/p_lecturer","refresh");
				}else{
					$this->session->set_flashdata("error","Invalid user,please try again");
					redirect(base_url()."main/login","refresh");
				}
			}			
		$this->load->view('login');
	}
	
	public function logout(){
		$this->session->unset_userdata('admin_name'); 
		$this->session->unset_userdata('lecturer_full_name');
		redirect(base_url()."main/login","refresh");
	}
	public function close(){
		$this->session->unset_userdata('admin_name'); 
		$this->session->unset_userdata('lecturer_full_name');		
		echo  "<script type='text/javascript'>";
		echo "window.close();";
		echo "</script>";
	}	
}
