<?php  
 class Admin_model extends CI_Model  
 {  
	//Course Management Functions
	function insert_course($data){
		$this->db->insert("course",$data);
	}	
	function fetch_course(){
		$query = $this->db->get("course");
		return $query;
	}
	function delete_course($id){
		$this->db->where("course_id",$id);
		$this->db->delete("course");
	}
	function update_course($id){
		$data = array(
			"course_id" => $this->input->post("course_id"),
			"course_name" => $this->input->post("course_name"),
			"course_lecturer" => $this->input->post("course_lecturer"),
			"course_week" => $this->input->post("course_week"),
			"course_duration" => $this->input->post("course_duration"),
			"course_intake" => $this->input->post("course_intake"),
			"course_status" => $this->input->post("course_status"),
		);
		$this->db->where('course_id',$id);
		$this->db->update('course',$data);
		return $id;
	}	
	function getCourse($id){
		$this->db->select('*');
		$this->db->where('course_id', $id);
		$this->db->from('course');
		$query = $this->db->get();
		return $query->row();
	}
	//End of Course Management Functions

	//Student Records Functions
	function insert_student($data){
		$this->db->insert("student",$data);
	}
	function fetch_student(){
		$query = $this->db->get("student");
		return $query;
	}
	function delete_student($id){
		$this->db->where("student_id",$id);
		$this->db->delete("student");
	}
	function update_student($id){
		$data = array(
			"student_id" => $this->input->post("student_id"),
			"student_tp" => $this->input->post("student_tp"),
			"student_full_name" => $this->input->post("student_full_name"),
			"student_password" => $this->input->post("student_password"),
			"student_intake" => $this->input->post("student_intake"),			
		);
		$this->db->where('student_id',$id);
		$this->db->update('student',$data);
		return $id;
	}	
	function getStudent($id){
		$this->db->select('*');
		$this->db->where('student_id', $id);
		$this->db->from('student');
		$query = $this->db->get();
		return $query->row();
	}	
	//End of Student Records Functions
	
	//Lecturer Records Functions
	function insert_lecturer($data){
		$this->db->insert("lecturer",$data);
	}
	function fetch_lecturer(){
		$query = $this->db->get("lecturer");
		return $query;
	}
	function delete_lecturer($id){
		$this->db->where("lecturer_id",$id);
		$this->db->delete("lecturer");
	}
	function update_lecturer($id){
		$data = array(
			"lecturer_id" => $this->input->post("lecturer_id"),
			"lecturer_username" => $this->input->post("lecturer_username"),
			"lecturer_full_name" => $this->input->post("lecturer_full_name"),
			"lecturer_password" => $this->input->post("lecturer_password"),
		);
		$this->db->where('lecturer_id',$id);
		$this->db->update('lecturer',$data);
		return $id;
	}	
	function getLecturer($id){
		$this->db->select('*');
		$this->db->where('lecturer_id', $id);
		$this->db->from('lecturer');
		$query = $this->db->get();
		return $query->row();
	}	
	//End of Lecturer Records Functions
	
	//Admin Functions
	function insert_admin($data){
		$this->db->insert("admin",$data);
	}
	function fetch_admin(){
		$query = $this->db->get("admin");
		return $query;
	}
	function delete_admin($id){
		$this->db->where("admin_id",$id);
		$this->db->delete("admin");
	}
	function update_admin($id){
		$data = array(
			"admin_id" => $this->input->post("admin_id"),
			"admin_username" => $this->input->post("admin_username"),
			"admin_name" => $this->input->post("admin_name"),
			"admin_password" => $this->input->post("admin_password"),
		);
		$this->db->where('admin_id',$id);
		$this->db->update('admin',$data);
		return $id;
	}	
	function getAdmin($id){
		$this->db->select('*');
		$this->db->where('admin_id', $id);
		$this->db->from('admin');
		$query = $this->db->get();
		return $query->row();
	}	
	//End of Admin Functions
	function fetch_attendance(){
		$this->db->select('*');
		$this->db->from('full_attendance');
		$this->db->join('student','student.student_tp = full_attendance.student_tp');
		$this->db->where('course_week','Week 01');
		$query = $this->db->get();
		return $query;
	}	
	function delete_attendance($id){
		$this->db->where("full_attendance_id",$id);
		$this->db->delete("full_attendance");
	}
	function update_attendance($id){
		$data = array(
			"present_id" => $this->input->post("present_id"),
			"course_lecturer" => $this->input->post("course_lecturer"),
			"course_week" => $this->input->post("course_week"),
			"course_name" => $this->input->post("course_name"),
			"student_tp" => $this->input->post("student_tp"),
			"status" => $this->input->post("status"),
		);
		$this->db->where('present_id',$id);
		$this->db->update('present',$data);
		return $id;
	}	
	function getAttendance($id){
		$this->db->select('*');
		$this->db->where('present_id', $id);
		$this->db->from('present');
		$query = $this->db->get();
		return $query->row();
	}	
 }  