<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function _construct(){
		if(isset($_SESSION['user_logged'])){		
			$this->session->set-flashdata("error","Please login before browsing this page.");
			redirect(base_url()."main/login","refresh");
		}
	}	
	public function p_admin(){
		$this->load->view('p_admin');
	}
	
	//Course Management Functions
	public function p_admin_cm(){
		$this->load->model("Admin_model");
		$data["fetch_attendance"] = $this->Admin_model->fetch_attendance();		
		$this->load->view('p_admin_cm',$data);
	}
	public function insert_course(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("course_name","Course Name",'required');
		$this->form_validation->set_rules("course_lecturer","Course Lecturer",'required');
		$this->form_validation->set_rules("course_week","Course Duration",'required');
		$this->form_validation->set_rules("course_duration","Course Duration",'required');
		$this->form_validation->set_rules("course_intake","Course Intake",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(
				"course_name" => $this->input->post("course_name"),
				"course_lecturer" => $this->input->post("course_lecturer"),
				"course_week" => $this->input->post("course_week"),
				"course_duration" => $this->input->post("course_duration"),
				"course_intake" => $this->input->post("course_intake"),
				"course_status" => $this->input->post("course_status"),
			);			
				$this->Admin_model->insert_course($data);				
				redirect(base_url()."admin/course_inserted");		
		}else{
			redirect(base_url()."admin/fail_insert_course");
		}	
	}
	public function course_inserted(){
		$this->p_admin_cm();
	}
	public function fail_insert_course(){
		$this->p_admin_cm();
	}
	public function delete_course(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_course($id);
		redirect(base_url()."admin/course_deleted");
	}
	public function course_deleted(){
		$this->p_admin_cm();
	}	
	public function update_course($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_course($id)){
				$this->session->set_flashdata('success','Update Successfully');
				redirect(base_url()."admin/p_admin_cm");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."admin/p_admin_cm");
			}
		}
		$data['course'] = $this->Admin_model->getCourse($id);
		$this->load->view('u_course',$data);
	}	
	//End of Course Management Functions
	
	//Student Records Functions
	public function p_admin_sr(){
		$this->load->model("Admin_model");
		$data["fetch_student"] = $this->Admin_model->fetch_student();		
		$this->load->view('p_admin_sr',$data);
	}
	public function insert_student(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("student_tp","Student TP",'required');
		$this->form_validation->set_rules("student_full_name","Student Name",'required');
		$this->form_validation->set_rules("student_intake","Student Intake",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(		
				"student_id" => $this->input->post("student_id"),
				"student_tp" => $this->input->post("student_tp"),
				"student_full_name" => $this->input->post("student_full_name"),
				"student_intake" => $this->input->post("student_intake"),
			);			
				$this->Admin_model->insert_student($data);
				redirect(base_url()."admin/student_inserted");		
		}else{
			redirect(base_url()."admin/fail_insert_student");
		}	
	}
	public function student_inserted(){
		$this->p_admin_sr();
	}
	public function fail_insert_student(){
		$this->p_admin_sr();
	}
	public function delete_student(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_student($id);
		redirect(base_url()."admin/student_deleted");
	}
	public function student_deleted(){
		$this->p_admin_sr();
	}	
	public function update_student($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_student($id)){
				$this->session->set_flashdata('success','Update Successfully');
				redirect(base_url()."admin/p_admin_sr");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."admin/p_admin_sr");
			}
		}
		$data['student'] = $this->Admin_model->getStudent($id);
		$this->load->view('u_student',$data);
	}	
	//End of Student Records Functions
	
	//Lecturer Records Functions
	public function p_admin_lr(){
		$this->load->model("Admin_model");
		$data["fetch_lecturer"] = $this->Admin_model->fetch_lecturer();		
		$this->load->view('p_admin_lr',$data);
	}
	public function insert_lecturer(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("lecturer_username","Lecturer Username",'required');
		$this->form_validation->set_rules("lecturer_full_name","Lecturer Name",'required');
		$this->form_validation->set_rules("lecturer_password","Lecturer Password",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(
				"lecturer_username" => $this->input->post("lecturer_username"),
				"lecturer_full_name" => $this->input->post("lecturer_full_name"),
				"lecturer_password" => $this->input->post("lecturer_password"),
			);			
				$this->Admin_model->insert_lecturer($data);
				redirect(base_url()."admin/lecturer_inserted");		
		}else{
			redirect(base_url()."admin/fail_insert_lecturer");
		}	
	}
	public function lecturer_inserted(){
		$this->p_admin_lr();
	}
	public function fail_insert_lecturer(){
		$this->p_admin_lr();
	}
	public function delete_lecturer(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_lecturer($id);
		redirect(base_url()."admin/lecturer_deleted");
	}
	public function lecturer_deleted(){
		$this->p_admin_lr();
	}	
	public function update_lecturer($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_lecturer($id)){
				$this->session->set_flashdata('success','Update Successfully');
				redirect(base_url()."admin/p_admin_lr");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."admin/p_admin_lr");
			}
		}
		$data['lecturer'] = $this->Admin_model->getLecturer($id);
		$this->load->view('u_lecturer',$data);
	}	
	//End of Lecturer Records Functions
	
	//Admin Functions
	public function p_admin_am(){
		$this->load->model("Admin_model");
		$data["fetch_admin"] = $this->Admin_model->fetch_admin();			
		$this->load->view('p_admin_am',$data);
	}
	public function insert_admin(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("admin_username","Admin Username",'required');
		$this->form_validation->set_rules("admin_name","Admin Name",'required');
		$this->form_validation->set_rules("admin_password","Admin Password",'required');
		if($this->form_validation->run()){
			$this->load->model("Admin_model");
			$data = array(
				"admin_username" => $this->input->post("admin_username"),
				"admin_name" => $this->input->post("admin_name"),
				"admin_password" => $this->input->post("admin_password"),
			);			
				$this->Admin_model->insert_admin($data);
				redirect(base_url()."admin/admin_inserted");		
		}else{
			redirect(base_url()."admin/fail_insert_admin");
		}	
	}
	public function admin_inserted(){
		$this->p_admin_am();
	}
	public function fail_insert_admin(){
		$this->p_admin_am();
	}
	public function delete_admin(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_admin($id);
		redirect(base_url()."admin/admin_deleted");
	}
	public function admin_deleted(){
		$this->p_admin_am();
	}		
	public function update_admin($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_admin($id)){
				$this->session->set_flashdata('success','Update Successfully');
				redirect(base_url()."admin/p_admin_am");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."admin/p_admin_am");
			}
		}
		$data['admin'] = $this->Admin_model->getAdmin($id);
		$this->load->view('u_admin',$data);
	}	
	//End of Admin Functions
	
	public function delete_attendance(){
		$id = $this->uri->segment(3);
		$this->load->model("Admin_model");
		$this->Admin_model->delete_attendance($id);
		redirect(base_url()."admin/attendance_deleted");
	}
	public function attendance_deleted(){
		$this->p_admin_cm();
	}
	public function update_attendance($id){
		$this->load->model('Admin_model');
		if(isset($_POST['update'])){
			if($this->Admin_model->update_attendance($id)){
				$this->session->set_flashdata('success','Update Successfully');
				redirect(base_url()."admin/p_admin_cm");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."admin/p_admin_cm");
			}
		}
		$data['attendance'] = $this->Admin_model->getAttendance($id);
		$this->load->view('u_attendance',$data);
	}	
}