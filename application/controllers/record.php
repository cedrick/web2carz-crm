<?php
Class Record extends CI_Controller
{
	function Record()
	{
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		$this->load->model('User_model');
	}

	function call_search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search','Search','trim|xss_clean|required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('master_view', array('page' => 'view_main', 'data' => NULL));
		}
		else
		{
				$option = $this->input->post('option');
				$search = $this->input->post('search');
				$data = $this->User_model->search($search,$option);
				$this->load->view('master_view', array('page' => 'view_main', 'data' =>$data));
		}
		
		
	}
	
	function call_info($id = NULL)
	{
		$data = $this->User_model->view_info($id);
		$this->load->view('master_view', array('page' => 'view_search','data' =>$data));
	}
	
	function date_info()
	{
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search','Search','trim|xss_clean|required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('master_view', array('page' => 'date_finder', 'data' => NULL));
		}
		else
		{
				$search = $this->input->post('search');
				$data = $this->User_model->select_date($search);
				$this->load->view('master_view', array('page' => 'date_report', 'data' =>$data));
		}
	}
	
	function log_out()
		{
			$this->session->sess_destroy('username');
				redirect('/user/login/', 'refresh');
		}
		
	
}