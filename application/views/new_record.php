<br>
<?php 

if(isset($msg))
{
//echo $msg;
	echo "<script type='text/javascript'>";
		echo "alert('$msg');";
		//echo "window.location = 'http://191.168.3.243/call-manager/user/call/';";
echo "</script>"; 
}
?>

<script type="text/javascript">
$(document).ready(function(){
	$("#save").click(function(){

		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#box" ).dialog( "destroy" );

		$( "#box" ).dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});
});
</script> 

<div class = "container">
<font face = arial>
<center>
<?php 
echo form_open(base_url().'user/crm_call');

        
	
	$call_origin = array(
		                  '' => '',
						  'U.S.'  =>  'U.S.',
		                  'CANADA'    => 'CANADA'
		                  
		       
		                );
		             
	$incoming_no = array(
							 'name' => 'incoming_no',
							 'id'	 => 'incoming_no',
							 'value'	 => isset($_POST['incoming_no']) ? $_POST['incoming_no'] : '',
							  'size'   => '25'
						 );
		                
	$cs_yes = array(
						    'name'        => 'cs',
						    'id'          => 'cs',
						    'value'       => 'yes',
						    'checked'     =>isset($_POST['cs']) ? $_POST['cs']== 'yes' ? TRUE : FALSE : (isset($row->cs_status) && $row->cs_status == 'yes' ? TRUE : FALSE),
						    'style'       => 'margin:10px',
						    );
						    
	$cs_no = array(
						    'name'        => 'cs',
						    'id'          => 'cs',
						    'value'       => 'no',
						    'checked'     =>isset($_POST['cs']) ? $_POST['cs']== 'no' ? TRUE : FALSE : (isset($row->cs_status) && $row->cs_status == 'no' ? TRUE : FALSE),
						    'style'       => 'margin:10px',
						    );
						 
	//$app_yes = array(
						    //'name'        => 'app',
						  //  'id'          => 'app',
						  //  'value'       => 'yes',
						  //  'checked'     =>isset($_POST['app']) ? $_POST['app']== 'yes' ? TRUE : FALSE : (isset($row->app_status) && $row->app_status == 'yes' ? TRUE : FALSE),
						  //  'style'       => 'margin:10px',
						   // );
						 
	//$app_no = array(
						   // 'name'        => 'app',
						   // 'id'          => 'app',
						   // 'value'       => 'no',
						   // 'checked'     =>isset($_POST['app']) ? $_POST['app']== 'no' ? TRUE : FALSE : (isset($row->app_status) && $row->app_status == 'no' ? TRUE : FALSE),
						   // 'style'       => 'margin:10px',
						  //  );
						    
   $category_option = array('' => '');
	if($dropdown) {
		$temp = array();
		foreach ($dropdown->result() as $row) {
			$category_option = $category_option + array($row->drop_dwn => $row->drop_dwn);
			//$dropdown_calldispo = $dropdown_calldispo + $temp;
		}
	}
	
   	$others_remarks = array(
				              'name'        => 'others_remarks',
				              'id'          => 'others_remarks',
				              'value'       => isset($_POST['others_remarks']) ? $_POST['others_remarks'] : '',
				              'maxlength'   => '',
				              'size'        => '100',
				              'style'       => 'width:90%',

				   		 );
				   		 
	$cust_cmplnt = array(
				              'name'        => 'cust_cmplnt',
				              'id'          => 'cust_cmplnt',
				              'value'       => isset($_POST['cust_cmplnt']) ? $_POST['cust_cmplnt'] : '',
				              'maxlength'   => '',
				              'size'        => '100',
				              'style'       => 'width:90%',

				   		 );
				   		 
	$cust_phone_file= array(
							 'name' => 'cust_phone_file',
							 'id'	 => 'cust_phone_file',
							 'value'	 =>  isset($_POST['cust_phone_file']) ? $_POST['cust_phone_file'] : '',
							  'size'   => '25'
						 );

	$cust_name= array(
							 'name' => 'cust_name',
							 'id'	 => 'cust_name',
							 'value'	 => isset($_POST['cust_name']) ? $_POST['cust_name'] : '',
							  'size'   => '25'
						 );
						 
	$isr_name= array(
							 'name' => 'isr_name',
							 'id'	 => 'isr_name',
							 'value'	 => isset($_POST['isr_name']) ? $_POST['isr_name'] : '',
							  'size'   => '25'
						 );

?>
<div id ="box" style = "display:none;">
		<font color="#AA0000" face="Arial">
			<?php echo validation_errors(); ?>
		</font> 
		<font face = "arial" color = "RED">
			<?php echo $this->session->flashdata('insertdata'); ?>
		</font> 
</div>
<div class = "top_a"><font face = "Arial" size = "5" color = "#6B6A67"><b>Transaction Information</b></font></div>
<div class = "sec_a">
<table cellspacing="1" cellpadding="3">
	<tr class = "data">
		<td>
			Date:
		</td>
		<td>
				<?php 
						//get current date
						$format = 'DATE_RFC1123';
						
						$sdate_unix = time() + 28800;
						
						$sdate_human = unix_to_human($sdate_unix);
		
						echo $date = mdate("%Y-%m-%d %h:%i:%a",$sdate_unix);
						//$this->session->set_userdata('date',$date);
				
				?>
		</td>
		
	</tr>
	<tr class = "data">
		<td>
			Call Origin:
		</td>
		<td>
			<?php echo form_dropdown('call_origin',$call_origin); ?>
		</td>
	</tr>
	<tr class = "data">
		<td>
			Incoming Number Used:
		</td>
		<td>
			<?php echo form_input($incoming_no); ?>
		</td>
	</tr>
	<tr class = "data">
		<td>
			Application:
		</td>
		<td>
			Yes:&nbsp;<?php echo form_radio($cs_yes); ?>&nbsp;&nbsp;&nbsp;&nbsp;No:&nbsp;<?php echo form_radio($cs_no); ?><font size = "1">(Customer Service)</font>
		</td>
	</tr>
	<tr>	
		<td></td>
		<td>
				<?php echo form_dropdown('category_cs',$category_option); ?>
		</td>
		<td>
			<?php// echo form_dropdown('category_app',$category_option); ?>
		</td>
	</tr>
</table>
	</div>
<br>
<div class = "top_a"><font face = "Arial" size = "5" color = "#6B6A67"><b>Remarks/Comments</b></font></div>
<div class= "sec_b">
<table cellspacing="1" cellpadding="3">
		<tr>
		<td>
		<div class = "data">
			Remarks/Comments:
		</div>
		</td>
		<td>
			<?php echo form_textarea($others_remarks); ?>
		</td>
	</tr>
	<tr>
		<td>
			<div class = "data">
				Customer Complaint:
			</div>
		</td>
		<td>
			<?php echo form_textarea($cust_cmplnt); ?>
		</td>
	</tr>
</table>
</div>
<br>
<div class = "top_a"><font face = "Arial" size = "5" color = "#6B6A67"><b>Personal Information</b></font></div>
<div class = "sec_c">
<table cellspacing="1" cellpadding="3">
	<tr class = "data">
		<td>
			Customer's Phone Number on File:
		</td>
		<td>
			<?php echo form_input($cust_phone_file); ?>
		</td>
	</tr>
	<tr class = "data">
		<td>
			Customer Name:
		</td>
		<td>
			<?php echo form_input($cust_name); ?>
		</td>
	</tr>
		<tr>
	</tr>
	<tr class = "data">
		<td>
			ISR Name:
		</td>
		<td>
			<?php echo form_input($isr_name); ?>
		</td>
	</tr>
	<tr>
		<td>
			<div id = "save">
				<?php echo form_submit(array('name' => 'save', 'id' => 'save', ),'Save All'); ?>
			</div>
		</td>
		<td>
			<div class = "but">
				&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '<a href="'.base_url().'user/crm_call/"><font face = arial>Reset</font><a>'; ?>
			</div>
		</td>
	</tr>
</table>
</div>
<?php echo form_close(); ?>
</center>
</font>
</div>
<br>

