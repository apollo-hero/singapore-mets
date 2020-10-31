 <?php
 $pg_head = 'booking_list_of_practical_refresher_course';
 	if($_POST)
	{
		
			$str153 = mysqli_query($con, "select * from refresher_training where refresher_training_id ='".$refresher_training."'");
			$result_bat3 = mysqli_fetch_array($str153);
						
			if($m4761acourse=='MCC/RSYC') 
				$amt = $result_bat3['slot_duration']*120; 
			else 
				$amt = $result_bat3['slot_duration']*150;
				
				
					$qr = "UPDATE refresher_training_schedules  SET
					name			=	'".add_trim($name)."',					
					phone					=	'".add_trim($phone)."',
					email					=	'".add_trim($email)."',
					amount			=	'".add_trim($amt)."', 
					booking_date			=	'".add_trim($m4761adate)."', 
					refresher_training_id			=	'".add_trim($refresher_training)."', 
					course_to_attend			=	'".add_trim($m4761acourse)."' 
					 where booking_id = '".$edit_id."'";
					
					mysqli_query($con, $qr);
					
					set_message("Updated Successfully","SUCC");
					red_url("mode=booking&pg=booking_list_of_practical_refresher_course");
					
					
				
		
		
	}
	
	$str = mysqli_query($con, "select * from refresher_training_schedules where booking_id = '".$edit_id."'");
	$result = mysqli_fetch_array($str);
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="../resources/demos/style.css" />
  <script>
  $(function() {
    $( "#m4761adate" ).datepicker({minDate: 2,dateFormat: "yy-mm-dd",onSelect: function() {
                sel_dt();
             }});  });
  
  
  </script>
<div class="content">

    <div class="header">
    
        <h1 class="page-title">Edit Booking Details for Premium PPCDl</h1>
    </div>

   
    <?php $ind=1;
	include("./include/breadcrumb.php");?>
   
   

    <div class="container-fluid">
        <div class="row-fluid">
        
        <?php show_message();?>
        
            <div class="btn-toolbar">
                <button class="btn btn-primary" type="submit" onClick="document.m4761amoduleform_1.submit()"><i class="icon-save"></i> Save</button>
                <button class="btn" type="reset"  onClick="document.m4761amoduleform_1.reset()">Cancel</button>
                    <div class="btn-group">
                    </div>
            </div>
            
            <div class="well">
            
                <!--<ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
                    <li><a href="#profile" data-toggle="tab">Password</a></li>
                </ul>-->
                
                <div id="myTabContent" class="tab-content">
                
                    <div class="tab-pane active in" id="home">
                       
                        <form  name="m4761amoduleform_1" id="m4761amoduleform_1" method="post" action="">
                        
                        <label> Name</label>
                        <input type="text" value="<?php echo $result['name']?>"  name="name" id="name" class="input-xlarge">
                        
                        
                        <label>Phone</label>
                        <input type="text"  value="<?php echo $result['phone']?>" name="phone" id="phone" class="input-xlarge">
                    
                        <label>Email</label>
                        <input type="text" value="<?php echo $result['email']?>"  name="email" id="email" class="input-xlarge"> 
                       
					   
					   <label>Preferred Date</label>Click your preferred date and time<br>

                            <?php
						$dt = date("Y-m-d");
						$dts = date('Y-m-d', strtotime($dt. ' + 2 days'));
						if(!isset($_GET['m4761adate']))
							$m4761adate = $result['booking_date'];
						if(!isset($_GET['m4761acourse']))
							$m4761acourse = $result['course_to_attend'];
							
							
							
								$refresher_training = $result['refresher_training_id'];
						?>
							<input type="text" name="m4761adate" value="<?php if($m4761adate){ echo $m4761adate; } else echo $dts;?>"  id="m4761adate" readonly="readonly" size="10"/><a href="javascript:;;" onclick="javascript:checkavl();">Check&nbsp;Availability</a>
                            
                         <label>Availabile Slot</label>
						<select name="refresher_training" id="refresher_training">
		<?php
		
		if($m4761adate)
		{
			$day	=	date("N", strtotime($m4761adate));
			
			
			$str15 = mysqli_query($con, "select * from refresher_training where training_day= '".$day."' and (refresher_training_id = '".$refresher_training."' or refresher_training_id not in (select refresher_training_id from refresher_training_schedules where booking_status='Y' and booking_date='".$m4761adate."')) order by start_time");
			if(mysqli_num_rows($str15) >0){
					while($result_bat = mysqli_fetch_array($str15)){
					?>
					<option value="<?php echo $result_bat['refresher_training_id']?>" <?php if($refresher_training ==$result_bat['refresher_training_id']){?> selected <?php } ?>><?php echo date("g A", strtotime($result_bat['start_time']))?> - <?php echo date("g A", strtotime($result_bat['end_time']))?></option>
					<?php
					}
			}
			else
			{
			?>
			<option value="">No Slot Availabile for <?php echo $m4761adate?> </option>
			<?php
			}		
		}
		else
			{
			?>
			<option value="">Select One</option>
			<?php
			}	
		
		?>
		</select>
		
		
		
                        <label>Course to Attend</label>
						<select name="m4761acourse">
						<option value="MCC/RSYC" <?php if($m4761acourse == 'MCC/RSYC'){?> selected <?php } ?>>MCC/RSYC ($120 / hour)</option>
						<option value="Other Marinas" <?php if($m4761acourse == 'Other Marinas'){?> selected <?php } ?>>Other Marinas ($150 / hour)</option></select>
                
					   
					   
					    
                       <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_id?>"  />
                         <input type="hidden" name="mode" id="mode" value="<?php echo $mode?>" >
					   <input type="hidden" name="pg" id="pg" value="<?php echo $pg?>" >
                        </form>
                    </div>
                    
                    
                   
                </div>
            
            </div>
        
            <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Delete Confirmation</h3>
                </div>
                
                <div class="modal-body">
                
                    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
                </div>
                
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
                </div>
            </div>
        
        
        
        	<?php include("./include/footer.php"); ?>
            
        </div>
    </div>
</div>

<script type="text/javascript">
function checkavl()
{
	document.m4761amoduleform_1.method='get';
	document.m4761amoduleform_1.submit();

}

function sel_dt()
{
	document.getElementById('refresher_training').innerHTML='<option value="">Select One</option>';
}

</script>
  
  </body>
</html>


