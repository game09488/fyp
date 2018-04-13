<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturer extends CI_Controller {
	
	public function p_lecturer(){
		$this->load->view('p_lecturer');
	}
	public function p_lecturer_a(){
		$this->load->model("Lecturer_model");
		$data["fetch_course"] = $this->Lecturer_model->fetch_course();		
		$this->load->view('p_lecturer_a',$data);
	}	
	public function p_lecturer_c(){
		$this->load->view('p_lecturer_c');
	}
	public function m_student(){
		$this->load->view('m_student');
	}
	public function qr_attendance($id){
		$this->load->model('Lecturer_model');
		$data['course'] = $this->Lecturer_model->getCourse($id);
		$this->load->view('qr_attendance',$data);
	}	
	public function attendance($id){
		$this->load->model('Lecturer_model');
		if(isset($_POST['confirm'])){
			if($this->Lecturer_model->update_course($id)){
				$this->session->set_flashdata('success','Confirmed');
				redirect(base_url()."lecturer/qr_attendance/".$id);
			}else{
				$this->session->set_flashdata('failed','Failed');
				redirect(base_url()."lecturer/p_lecturer_a");
			}
		}
		$data['course'] = $this->Lecturer_model->getCourse($id);
		$this->load->view('c_attendance',$data);
	}		
	public function submit(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("tp","TP Number",'required');
		if($this->form_validation->run()){
			$this->load->model("Lecturer_model");			
			$this->Lecturer_model->insert_attendance();
			redirect(base_url()."main/close");		
		}else{
			redirect(base_url()."main/close");
		}	
	}
	public function update_absent(){
		$this->load->model("Lecturer_model");
		$this->Lecturer_model->update_absent();
		redirect(base_url()."lecturer/p_lecturer_a");
	}	
	public function update_attendance($id){
		$this->load->model('Lecturer_model');
		if(isset($_POST['update'])){
			if($this->Lecturer_model->update_attendance($id)){
				$this->session->set_flashdata('success','Update Successfully');
				redirect(base_url()."lecturer/p_lecturer_a");
			}else{
				$this->session->set_flashdata('success','Update Failed');
				redirect(base_url()."lecturer/p_lecturer_a");
			}
		}
		$data['attendance'] = $this->Lecturer_model->getPresent($id);
		$this->load->view('lu_attendance',$data);
	}	
}