
<?php
class User extends CI_Controller
{
	function User()
	{
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		$this->load->model('User_model');
	}

	function index()  
	{
			redirect('/user/login/','refresh');
   	}
	
	function login()
	{
	 if($this->session->userdata('username') == '')
	 {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required');
		$this->form_validation->set_rules('password','Password','trim||xss_clean|required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('master_view', array('page' => 'view_login', 'data' => NULL) );
		}else 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
		if($this->User_model->set_login($username,$password)){
							//$category = $this->User_model->get_category();
							//$data = array(
															//'category' => $category
														//);
							redirect('/user/crm_call/', 'refresh');
						}
						else
						{
							echo "<font color=#AA0000 face=Arial>Login Error!</font>";
							redirect('/user/login/', 'refresh');
						}
		
		}
	 }else
				{
					redirect('/user/crm_call/', 'refresh');
				}
	}
   	
	
function register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required|callback_username_not_exist');
		$this->form_validation->set_rules('agent-id','Agent ID','trim||xss_clean|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required');
		$this->form_validation->set_rules('password_conf','Confirm Password','trim||xss_clean|required|matches[password]');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('master_view', array('page' => 'view_register', 'data' => NULL) );
		}else 
		{
			$username = $this->input->post('username');
			$agent_id= $this->input->post('agent-id');
			$password = $this->input->post('password');
		if($this->User_model->set_register($username,$password,$agent_id))
						{
							$this->session->set_flashdata('insertdata', 'The data was inserted');
							$this->load->view('master_view', array('page' => 'view_register', 'data' => NULL));
						}else
						{
							return FALSE;
						}
			
		}
	 
		
	}
	
	function username_not_exist($username)
		{
			$this->form_validation->set_message('username_not_exist','That username already exist choose another username');
			if($this->User_model->check_exist_username($username))
			{
				return FALSE;
			}else
			{
				return TRUE;
			}
		}
	
   	function crm_call()
	{
		if($this->session->userdata('username') != '')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('incoming_no','Incoming Number Used','trim|xss_clean|required');
			$this->form_validation->set_rules('others_remarks','Remarks/Comments','trim|xss_clean');
			$this->form_validation->set_rules('cust_cmplnt','Customer Complaint','trim|xss_clean');
			$this->form_validation->set_rules('cust_phone_file','Customers Phone Number on File','trim|xss_clean|required');
			$this->form_validation->set_rules('cust_name','Customer Name','trim|xss_clean|required');
			$this->form_validation->set_rules('isr_name','ISR Name','trim|xss_clean|required');
			if($this->form_validation->run() == FALSE)
			{
					$dropdown = $this->User_model->drop_down();
					$data = array(
							'dropdown' => $dropdown
						);
					$this->load->view('master_view', array('page' => 'new_record', 'data' => $data));
			}else
			{
				//$date = $this->session->userdata('date');
				$call_origin = $this->input->post('call_origin');
				$incoming_no  = $this->input->post('incoming_no');
				$cs_status = $this->input->post('cs');
				//$app_status = $this->input->post('app');
				$category_cs = $this->input->post('category_cs');
				//$category_app = $this->input->post('category_app');
				$others_remarks = $this->input->post('others_remarks');
				$cust_cmplnt = $this->input->post('cust_cmplnt');
				$cust_phone_file = $this->input->post('cust_phone_file');
				$cust_name = $this->input->post('cust_name');
				$isr_name= $this->input->post('isr_name');
				$agent_id= $this->session->userdata('agent-id');
				$msg = NULL;
				$dropdown = $this->User_model->drop_down();
				$data = array(
						'dropdown' => $dropdown
					);
				if (isset($_POST['save']) && $_POST['save'] == 'Save All')
				{
					$this->User_model->insert($call_origin,$incoming_no,$cs_status,$category_cs,$others_remarks,$cust_cmplnt,$cust_phone_file,$cust_name,$isr_name,$agent_id);
					$msg = "The Record was Already Saved";
				}
				$this->load->view('master_view', array('page' => 'new_record', 'data' => $data,'msg' => $msg,));
				
			}
		}else
				{
					redirect('/user/login/', 'refresh');
				}
	}
	 
	
	
}



?>