<br><br>
<font face = arial>
<?php 
	 echo "<table border=0 align=center cellspacing=1 bgcolor=#C9C3C3>";
	
	
	

	
		foreach ($data->result() as $row)
		{
		  
			 	if($row->id%2==0)
										{$color=" bgcolor = '#a19f9e' ";}
										else{$color=" bgcolor='#FFF5EE'";}
			 echo '<tr class = row_disp >';
			 echo"<td>"."<b>"."Call Origin"."</b>"."</td>";
			 echo '<td width="80%">'.$row->call_origin.'</td>';
		  	 echo '<tr class = row_disp >';
		  	 echo"<td>"."<b>"."Incoming No. Used"."</b>"."</td>";
			 echo '<td>'.$row->incoming_no.'</td>';
			 echo '<tr class = row_disp >';
			 echo"<td>"."<b>"."Application"."</b>"."</td>";
		  	 echo '<td>'.$row->cs_status.'</td>';
		  	 echo '<tr class = row_disp >';
		  	 echo"<td>"."<b>"."Service Data"."</b>"."</td>";
		  	 echo '<td>'.$row->cs_data.'</td>';
		  	 echo '<tr class = row_disp >';
		  	 echo"<td>"."<b>"."Comments/Remarks"."</b>"."</td>";
		  	 echo '<td>'.$row->others_cmt.'</td>';
		  	 echo '<tr class = row_disp >';
		  	 echo"<td>"."<b>"."Customer Complaint"."</b>"."</td>";
		  	 echo '<td>'.$row->cust_cmplnt.'</td>';
		  	 echo '<tr class = row_disp >';
		  	 echo"<td>"."<b>"."Customer's Phone# on File"."</b>"."</td>";
		  	 echo '<td>'.$row->cust_phone.'</td>';
		  	 echo '<tr class = row_disp >';
		  	 echo"<td>"."<b>"."Customer Name"."</b>"."</td>";
		  	 echo '<td>'.$row->cust_name.'</td>';
		  	 echo '<tr class = row_disp >';
		  	 echo"<td>"."<b>"."ISR Name"."</b>"."</td>";
		  	 echo '<td>'.$row->isr_name.'</td>';
		  	 echo '<tr class = row_disp >';
		  	 echo"<td>"."<b>"."Date"."</b>"."</td>";
			 echo '<td>'.$row->rdate.'</td>';
		}
				echo '</tr>';
				echo '</table>';
?>

</font>
<br><br>

