	<?php
	$slict_table_name = explode("_",$value);//slicting feild names to find depending table
	 $table="tbl_";
	 $size_of_slict=count($slict_table_name);
	 if($size_of_slict==2)//if feild name has 2 slict frist one for depending table and next for this table name
	 {
	 $table.=$slict_table_name[0];
	 $table_id="".$slict_table_name[0]."_id";
	 $val=$slict_table_name[1];
	 }
	 else if($size_of_slict==3)//if feild name has 3 slict frist 2 for depending table and next for this table name
	 {
	 $table.=$slict_table_name[0];
	 $table.="_".$slict_table_name[1]."";
	 $table_id=$slict_table_name[0];
	 $table_id.="_".$slict_table_name[1]."_id";
	 $val=$slict_table_name[2];
	 }
	 $condition="1";
	
	?>
	<select name="<?php echo $row['name'];?>" value="" class="form-control" required>
    <?php
	if(isset($_GET['eid'])){}
	else
	{
		echo"<option value=''>Please select $feild_name</option>";
	}
	 
	$edit=$obj->select_any($table,$condition);
	foreach($edit as $select) 
		{
			?>
		<option value="<?php echo $select[$table_id];?>"<?php if($select[$table_id]==$table_field_value) echo 'selected';?> ><?php echo $select[$val];?></option>
		<?php
		}
	 ?>
     </select>
	