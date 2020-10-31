 <?php
 $pg_head = 'booking_list_of_navigation_course';
if($_POST)
	{
		$m4761aname = $_POST['m4761aname'];
		$m4761aphone = $_POST['m4761aphone'];
		$m4761aemail = $_POST['m4761aemail'];
		$refresher_training = $_POST['refresher_training'];
		$m4761acourse = $_POST['m4761acourse'];
		$err ='';
		if(!value_check($m4761aname)){
			$err .='<span style="color:red">* "Name" need to be filled.</span><br>';
		}
		if(!value_check($m4761aphone)){
			$err .='<span style="color:red">* "Phone" need to be filled.</span><br>';
		}
		else if(!num_check($m4761aphone)){
			$err .='<span style="color:red">* Invalid "Phone No"</span><br>';
		}
		if(!value_check($m4761aemail)){
			$err .='<span style="color:red">* "Email" need to be filled.</span><br>';
		}else if(!email_check($m4761aemail)){
			$err .='<span style="color:red">* Invalid "Email"</span><br>';
		}
		if(!value_check($refresher_training)){
			$err .= '<span style="color:red">* "Availabile Slot" need to be filled.</span><br>';
		}
		if(!value_check($m4761acourse)){
			$err .= '<span style="color:red">* "Course to Attend" need to be filled.</span><br>';
		}
		
		if($err=="")
		{
			$str153 = mysql_query("select * from refresher_training where refresher_training_id ='".$refresher_training."'");
			$result_bat3 = mysql_fetch_array($str153);
						
			if($m4761acourse=='MCC/RSYC') 
				$amt = $result_bat3['slot_duration']*120; 
			else 
				$amt = $result_bat3['slot_duration']*150;
				
				$qr	= 	"INSERT  refresher_training_schedules SET 
				name			=	'".add_trim($m4761aname)."', 
				email			=	'".add_trim($m4761aemail)."', 
				phone			=	'".add_trim($m4761aphone)."', 
				amount			=	'".add_trim($amt)."', 
				booking_date			=	'".add_trim($m4761adate)."', 
				refresher_training_id			=	'".add_trim($refresher_training)."', 
				course_to_attend			=	'".add_trim($m4761acourse)."', 
				booking_status			=	'Y', 
				created_date		=	'".date("Y-m-d")."'";
				mysql_query($qr);
				
				set_message("Added Successfully","SUCC");
				red_url("mode=booking&pg=booking_list_of_practical_refresher_course");
		
		}
}
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
    
        <h1 class="page-title">Add Booking Details for Practical Refresher</h1>
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
                        
                        <label>Name</label>
                      
						<input type="text" name="m4761aname" id="m4761aname" value="<?=$m4761aname?>" size="10" maxlength="255"  class="input-xlarge"/>
                        
                     
                        <label>Phone</label>
						<input type="text" name="m4761aphone" id="m4761aphone" class="input-xlarge" value="<? if($m4761aphone){ echo $m4761aphone;}else echo '65';?>" size="10" maxlength="255" />

                    
                        <label>Email</label>
                        
                        <input type="text" name="m4761aemail" id="m4761aemail" value="<?=$m4761aemail?>" class="input-xlarge" size="10" maxlength="255" />
                       
                        
                       
                        
                 
						
                        
                            <label>Preferred Date</label>Click your preferred date and time<br>

                            <?
						$dt = date("Y-m-d");
						$dts = date('Y-m-d', strtotime($dt. ' + 2 days'));
						?>
							<input type="text" name="m4761adate" value="<? if($m4761adate){ echo $m4761adate; } else echo $dts;?>"  id="m4761adate" readonly="readonly" size="10"/><a href="javascript:;;" onclick="javascript:checkavl();">Check&nbsp;Availability</a>
                            
                         <label>Availabile Slot</label>
						<select name="refresher_training" id="refresher_training">
		<?
		if($m4761adate)
		{
			$day	=	date("N", strtotime($m4761adate));
			
			
			$str15 = mysql_query("select * from refresher_training where training_day= '".$day."' and refresher_training_id not in (select refresher_training_id from refresher_training_schedules where booking_status='Y' and booking_date='".$m4761adate."') order by start_time");
			if(mysql_num_rows($str15) >0){
					while($result_bat = mysql_fetch_array($str15)){
					?>
					<option value="<?=$result_bat['refresher_training_id']?>" <? if($refresher_training ==$result_bat['refresher_training_id']){?> selected <? } ?>><?=date("g A", strtotime($result_bat['start_time']))?> - <?=date("g A", strtotime($result_bat['end_time']))?></option>
					<?
					}
			}
			else
			{
			?>
			<option value="">No Slot Availabile for <?=$m4761adate?> </option>
			<?
			}		
		}
		else
			{
			?>
			<option value="">Select One</option>
			<?
			}	
		
		?>
		</select>
		
		
		
                        <label>Course to Attend</label>
						<select name="m4761acourse">
						<option value="MCC/RSYC" <? if($m4761acourse == 'MCC/RSYC'){?> selected <? } ?>>MCC/RSYC ($120 / hour)</option>
						<option value="Other Marinas" <? if($m4761acourse == 'Other Marinas'){?> selected <? } ?>>Other Marinas ($150 / hour)</option></select>
                       
					   <input type="hidden" name="mode" id="mode" value="<?=$mode?>" >
					   <input type="hidden" name="pg" id="pg" value="<?=$pg?>" >
					   
					    </form>
                    </div>
                    
                    
                    <!--<div class="tab-pane fade" id="profile">
                        <form id="tab2">
                        
                        <label>New Password</label>
                        <input type="password" class="input-xlarge">
                        
                        <div>
                            <button class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                    </div>-->
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

<script>

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


