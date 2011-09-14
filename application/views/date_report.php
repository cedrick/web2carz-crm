<br>
<div class = "date_report">
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
		  
			 	//if($row->id%2==0)
										//{$color=" bgcolor = '#a19f9e' ";}
										//else{$color=" bgcolor='#FFF5EE'";}
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
<center>
	<font face = "arial">
		<?php echo '<a href="'.base_url().'record/date_info/">Cancel<a>'; ?>
	</font>
</center>
</div>

	
