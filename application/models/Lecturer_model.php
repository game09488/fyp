<?php  
 class Lecturer_model extends CI_Model  
 { 
 	function fetch_course(){
		$this->db->select('*');
		$this->db->from('course');
		$this->db->join('lecturer','course.course_lecturer = lecturer.lecturer_full_name','inner');
		$this->db->where('course.course_status','Await');
		$this->db->where('course.course_lecturer',$_SESSION['lecturer_full_name']);
		$query = $this->db->get();
		return $query;
	}
	function update_course($id){		
		$data = array(
			"course_status" => $this->input->post('course_status'),
		);		
		$num = $this->input->post('number');
		
		//update time in course table
		$this->db->where('course_id',$id);
		$this->db->update('course',$data);
		
		//insert data into full_attendance table
		$this->db->select('course.course_lecturer,course.course_week,course.course_name');
		$this->db->from('student');
		$this->db->join('course','student.student_intake = course.course_intake','inner');
		$this->db->where('course_id',$id);
		$query = $this->db->get();
		$rowcount = $query->num_rows();		
		
		$this->db->select('course.course_lecturer,course.course_week,course.course_name,student.student_tp');
		$this->db->from('student');
		$this->db->join('course','student.student_intake = course.course_intake','inner');
		$this->db->where('course_id',$id);
		$query2 = $this->db->get();
		
		foreach ($query2->result() as $row) {
			$this->db->insert('full_attendance',$row);	
		}
		foreach ($query->result() as $row) {		
			$this->db->insert('present',$row);			
		}
		
		$numrow = $rowcount - $num ;
		$this->db->limit($numrow);
		$this->db->where('student_tp','');
		$this->db->delete('present');
		
		return $id;
	} 
 	function getCourse($id){
		$this->db->select('*');
		$this->db->where('course_id', $id);
		$this->db->from('course');
		$query = $this->db->get();
		return $query->row();
	}	
	function insert_attendance(){
		$data = array(
			"student_tp" => $this->input->post("tp"),
			"status" => $this->input->post("status"),
		);		
		$this->db->limit(1);
		$this->db->where('student_tp','');
		$this->db->update('present',$data);	
	}
	function update_absent(){
		$data = array(
			"status" => $this->input->post('status'),
		);		
		$this->db->select('f.student_tp,f.course_week,f.course_name,f.course_lecturer');
		$this->db->from('full_attendance f');
		$this->db->join('present p','f.student_tp = p.student_tp AND f.course_week = p.course_week AND f.course_name = p.course_name AND f.course_lecturer = p.course_lecturer','left');
		$this->db->where('p.student_tp',NULL);
		$query = $this->db->get();
		$this->db->where('student_tp','');
		$this->db->delete('present');
		foreach ($query->result() as $row) {
			$this->db->set('status','Absent');
			$this->db->replace('present',$row);
		}		
	}
	function update_attendance($id){
		$data = array(
			"status" => $this->input->post("status"),
		);
		$this->db->where('present_id',$id);
		$this->db->update('present',$data);
		return $id;
	}
 	function getPresent($id){
		$this->db->select('*');
		$this->db->where('present_id', $id);
		$this->db->from('present');
		$query = $this->db->get();
		return $query->row();
	}	
 }
