&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '<a href="'.base_url().'record/date_info/"><font face = arial>Date Info</font><a>'; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '<a href="'.base_url().'record/call_search/"><font face = arial>General Info</font><a>'; ?>
<br><br>
	<center>
		<?php
			
		echo form_open(base_url().'record/call_search');								
						
						$search = array(
												'name' => 'search',
												'id'	 => 'search',
												'value'	 => isset($_POST['search']) ? $_POST['search'] : '',
												'size'   => '25'
										);
						
						$option = array(
										    'name'        => 'option',
										    'id'          => 'option',
										    'value'       => 'inco_no',
										    'checked'     => isset($_POST['option']) && $_POST['option']== 'inco_no' || !isset($_POST['option']) ? TRUE : FALSE,
										    'style'       => 'margin:10px',
										 );
										 
						$option = array(
											    'name'        => 'option',
											    'id'          => 'option',
											    'value'       => 'on_file_no',
											    'checked'     =>isset($_POST['option']) && $_POST['option']== 'on_file_no' ? TRUE : FALSE,
											    'style'       => 'margin:10px',
											 );
											 
						$option = array(
											    'name'        => 'option',
											    'id'          => 'option',
											    'value'       => 'cust_name',
											    'checked'     =>isset($_POST['option']) && $_POST['option']== 'cust_name' ? TRUE : FALSE,
											    'style'       => 'margin:10px',
											 );
											 
											 
						$inco_no = FALSE;
						$on_file_no = FALSE;
						$cust_name = FALSE;
						if(isset($_POST['option'])) {
							switch ($_POST['option']) {
								case '':
									$inco_no = TRUE;
									break;
								case 'inco_no':
									$inco_no = TRUE;
									break;
								case 'on_file_no':
									$on_file_no = TRUE;
									break;
								case 'cust_name':
									$cust_name = TRUE;
									break;
							}
						}
		?>
		
					
					
					
					
					<table border=0 cellpadding=1 cellspacing=1 style="background-color:#EBF4FB; border-radius:7px; border:1px solid #29333A;">
						<tr class = "data">
							<td>
								<font color = #63200A face = arial>
									Search By:
								</font>
							</td>
							<td>
								<?php echo form_input($search); ?>
							</td>
						</tr>
						<tr class = "data">
							<td>
								<font color = #63200A face = arial>
									Incoming Number Used: 
								</font>
							</td>
							<td>
								<?php echo form_radio('option','inco_no',$option); ?>
							</td>
						</tr>
						<tr class = "data">
							<td>
								<font color = #63200A face = arial>
									Customer's Phone Number on File:
								</font>
							</td>
							<td>
								<?php echo form_radio('option','on_file_no',$on_file_no); ?>
							</td>
						</tr>
						<tr class = "data">
							<td>
								<font color = #63200A face = arial>
									Customer Name: 
								</font>
							</td>
							<td>
								<?php echo form_radio('option','cust_name',$cust_name); ?>
							</td>
						</tr>
						<tr>
							<td>
						
							</td>
							<td>
								<?php echo form_submit(array('name' => 'submit_name', 'id' => 'submit_id', ), 'Search'); ?>
							</td>
						</tr>
					</table>
		
		<?php echo form_close(); ?>
	</center>
	<div align = center>
	<font color="#AA0000" face="Arial">
		<?php echo validation_errors(); ?>
	</font> 
</div>
<br><br>
<?php
if(isset($data))
{
	 echo "<table width=800 border=0 align=center cellspacing=1 bgcolor=#C9C3C3>";
	 echo"<td>"."<b>"."Call Origin"."</b>"."</td>";
	 echo"<td>"."<b>"."Incoming No. Used"."</b>"."</td>";
	 echo"<td>"."<b>"."Application"."</b>"."</td>";
	 echo"<td>"."<b>"."Date"."</b>"."</td>";
	 echo"<td>"."<b>"."View Info"."</b>"."</td>";
		foreach ($data->result() as $row)
		{
		  
			 	if($row->id%2==0)
										{$color=" bgcolor = '#a19f9e' ";}
										else{$color=" bgcolor='#FFF5EE'";}
			 echo '<tr class = row_disp >';
			 echo '<td>'.$row->call_origin.'</td>';
		  	 echo '<td>'.$row->incoming_no.'</td>';
		  	 echo '<td>'.$row->cs_status.'</td>';
			 echo '<td>'.$row->rdate.'</td>';
			 echo '<td align="center"><a href="'.base_url().'record/call_info/'.$row->id.'/" target="_blank">View Info<a></td>';
		}
				echo '</tr>';
				echo '</table>';
}
?>
