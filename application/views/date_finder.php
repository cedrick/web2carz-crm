&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '<a href="'.base_url().'record/date_info/"><font face = arial>Date Info</font><a>'; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '<a href="'.base_url().'record/call_search/"><font face = arial>General Info</font><a>'; ?>

<?php
	echo form_open(base_url().'record/date_info');	
						$search = array(
												'name' => 'search',
												'id'	 => 'search',
												'value'	 => isset($_POST['search']) ? $_POST['search'] : '',
												'size'   => '25'
										);
										
		
						
?>
<br><br>
<center>
	<div class = "date_example">
		<font face= "arial" size = "2">
			(Example:2011-06-25 )
		</font>
	</div>
	<div class = "date_finder">
		<font face= "arial">
			Input date:
		</font>	
	<?php echo form_input($search); ?>
	<?php echo form_submit(array('name' => 'submit_name', 'id' => 'submit_id', ), 'Search'); ?>
	</div>
</center>
<br><br>