<?php
class User_model extends CI_Model
{
	function user_model()
	{
		parent::__construct();
	}
	
	function drop_down()
	{
		return $this->db->query("SELECT * FROM crm_drop");
	}
	
	function select_date($search)
	{
		return $this->db->query("SELECT * FROM crm_data WHERE date(rdate)= '$search'");
	}
	
	function search($search,$option)
	{
		
						$inco_no =NULL;
						$on_file_no = NULL;
						$cust_name = NULL;
						if(isset($_POST['option'])) {
							switch ($_POST['option']) {
								case 'inco_no':
									return $query = $this->db->query("SELECT * FROM crm_data where incoming_no = '$search' order by rdate");
									echo $query;
									break;
								case 'on_file_no':
									return $query = $this->db->query("SELECT * FROM crm_data where cust_phone = '$search' order by rdate");
									echo $query;
									break;
								case 'cust_name':
									return $query = $this->db->query("SELECT * FROM crm_data where cust_name = '$search' order by rdate");
									echo $query;
									break;
							}
						}
	
	}
	
	function view_info($id)
	{
		return $this->db->query("SELECT * FROM crm_data WHERE id = '$id' ");
	}
	
	
	function set_login($username,$password)
	{
			$key = "Codeigniter";
			$password = md5($password.$key);
			$query_str = "SELECT * FROM crm_user WHERE username='$username' and password='$password'";
			$result = $this->db->query($query_str,array($username,$password));
			if($result->num_rows()==1){
				
				foreach($result->result() as $row)
				{
					$agent_id = $row->agent_id;
				}
			  $this->session->set_userdata('agent-id',$agent_id);
			  $this->session->set_userdata('username',$username);
				return TRUE;
			}
			else
			{
				return FALSE;
			}	
	}
	
	function set_register($username,$password,$agent_id)
	{
			$key = "Codeigniter";
			$password = md5($password.$key);
			$query_str =  "INSERT INTO  crm_user (agent_id,username,password) Values (?,?,?)";
			if($this->db->query($query_str,array($agent_id,$username,$password))){
					return TRUE;
				}
				else
				{
					return FALSE;
				}
	}
	
	function check_exist_username($username)
		{
			$query_str = "SELECT username from crm_user where username = ?";
			$result = $this->db->query($query_str,$username);
			if($result->num_rows() > 0)
			{
				return TRUE;
			}else
			{
				return FALSE;
			}
		}
		
		function insert($call_origin,$incoming_no,$cs_status,$category_cs,$others_remarks,$cust_cmplnt,$cust_phone_file,$cust_name,$isr_name,$agent_id)
		{
		$query_str =  "INSERT INTO crm_data(rdate,call_origin,incoming_no,cs_status,cs_data,others_cmt,cust_cmplnt,cust_phone,agent_id,cust_name,isr_name) Values (NOW(),?,?,?,?,?,?,?,?,?,?)";
		if($this->db->query($query_str,array($call_origin,$incoming_no,$cs_status,$category_cs,$others_remarks,$cust_cmplnt,$cust_phone_file,$agent_id,$cust_name,$isr_name))){
			return TRUE;
		}
		else
		{
			return FALSE;
		}
		}

}
?>