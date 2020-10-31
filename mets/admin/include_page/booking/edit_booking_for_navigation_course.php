 <?php
 $pg_head = 'booking_list_of_navigation_course';
 	if($_POST)
	{
		
		
					$qr = "UPDATE booking_details SET
					booking_name			=	'".add_trim($f_name)."',
					nationality				=	'".add_trim($nationality)."',
					nric_passport_no		=	'".add_trim($passport_no)."',
					phone					=	'".add_trim($phone)."',
					email					=	'".add_trim($email)."',
					address					=	'".add_trim($address)."',	
					noks_name				=	'".add_trim($nok_name)."',
					noks_phone				=	'".add_trim($nok_phone)."',
					course_id				=   '".add_trim($course_id)."',
					course_training_id		=	'".add_trim($course_training_id)."',
					preferred_date			=	'".add_trim($preferred_date)."' where booking_id = '".$edit_id."'";
					
					mysqli_query($con, $qr);
					
					
					
					
					if($old_course_training_id <> $$course_training_id)
					{
						$qr	= 	"UPDATE  training_schedules SET 
						no_of_sign_up	=	no_of_sign_up+1 where course_training_id='".$course_training_id."' and limit_stat='Y'";
						mysqli_query($con, $qr);
						
						
						$str15 = mysqli_query($con, "select * from training_schedules where course_training_id= '".$course_training_id."'");
						$result_batch = mysqli_fetch_array($str15);
						if(($result_batch['no_of_sign_up'])==$result_batch['max_limit'] &&  $result_batch['limit_stat'] =='Y')
						{
							$qr	= 	"UPDATE  training_schedules SET 
							training_stat	=	'C' where course_training_id='".$course_training_id."' ";
							mysqli_query($con, $qr);
						}
						
						$qr	= 	"UPDATE  training_schedules SET 
						no_of_sign_up	=	no_of_sign_up-1 where course_training_id='".$old_course_training_id."' and limit_stat='Y'";
						mysqli_query($con, $qr);
						$str152 = mysqli_query($con, "select * from training_schedules where course_training_id= '".$old_course_training_id."'");
						$result_batch2 = mysqli_fetch_array($str152);
						
						if(($result_batch2['no_of_sign_up'])<$result_batch2['max_limit'] &&  $result_batch2['limit_stat'] =='Y')
						{
							$qr	= 	"UPDATE  training_schedules SET 
							training_stat	=	'O' where course_training_id='".$old_course_training_id."' ";
							mysqli_query($con, $qr);
						}
					
					}
					
					set_message("Updated Successfully","SUCC");
					red_url("mode=booking&pg=booking_list_of_navigation_course");
					
					
				
		
		
	}
	
	$str = mysqli_query($con, "select * from booking_details where booking_id = '".$edit_id."'");
	$result = mysqli_fetch_array($str);
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    

<div class="content">

    <div class="header">
    
        <h1 class="page-title">Edit Booking Details for Navigation Course</h1>
    </div>

   
    <?php $ind=1;
	include("./include/breadcrumb.php");?>
   
   

    <div class="container-fluid">
        <div class="row-fluid">
        
        <?php show_message();?>
        
            <div class="btn-toolbar">
                <button class="btn btn-primary" type="submit" onClick="document.reg_form.submit()"><i class="icon-save"></i> Save</button>
                <button class="btn" type="reset"  onClick="javascript:location.href='<?php echo pg_link("mode=booking&pg=booking_list_of_navigation_course")?>';">Back</button>
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
                       
                        <form  name="reg_form" id="reg_form" method="post" action="">
                        
                        <label>Full Name</label>
                        <input type="text" value="<?php echo $result['booking_name']?>"  name="f_name" id="f_name" class="input-xlarge">
                        
                        <label>Nationality</label>
                        <input type="text" value="<?php echo $result['nationality']?>"  name="nationality" id="nationality" class="input-xlarge">
                        
                        <label>NRIC/Passport No</label>
                        <input type="text" value="<?php echo $result['nric_passport_no']?>" name="passport_no" id="passport_no" class="input-xlarge">
                        
                        <label>Phone</label>
                        <input type="text"  value="<?php echo $result['phone']?>" name="phone" id="phone" class="input-xlarge">
                    
                        <label>Email</label>
                        <input type="text" value="<?php echo $result['email']?>"  name="email" id="email" class="input-xlarge"> 
                        
                        <label>Address</label>
                        <textarea  name="address" id="address" class="input-xlarge"><?php echo $result['address']?></textarea>
                        
                        <label>NOK's Name</label>
                        <input type="text" value="<?php echo $result['noks_name']?>"  name="nok_name" id="nok_name" class="input-xlarge">
                        
                        <label>NOK's Phone No</label>
                        <input type="text" value="<?php echo $result['noks_phone']?>"  name="nok_phone" id="nok_phone" class="input-xlarge">
                        
                       <input type="hidden" name="course_id" id="course_id" value="3" />
                       
                       
                       <div id="right_schedule">
                     
							
                    <?
  $schedule = mysqli_query($con, "select * from training_schedules where course_id='3' and start_date >= '".date("Y-m-d")."' and training_stat='O'  and stat='Y' order by start_date asc");?>
                    <table class="tr-schedule"><?

					         while($show_schedule = mysqli_fetch_array($schedule)){
								
								 $strt_date = explode("-",$show_schedule['start_date']);
								 $end_date = explode("-",$show_schedule['end_date']);
								 $mnth = date("F", mktime(0, 0, 0, $strt_date[1], 10));?>
                                
                             	<tr><td>
                                <a href="javascript:;;" onclick="add_date('<?php echo $strt_date[2]."-".$end_date[2]." ".$mnth."(".$show_schedule['day_type'].")"?>','<?php echo $show_schedule['course_training_id']?>');"><?php echo $strt_date[2]."-".$end_date[2]." ".$mnth."(".$show_schedule['day_type'].")"?></a>
                                </td></tr>
                               
                       <?php }?> </table>

                       
           <label>Preferred Date</label>
            <input type="text" value="<?php echo $result['preferred_date']?>"  name="preferred_date" id="preferred_date" class="input-xlarge" readonly="readonly">
              <input type="hidden" name="course_training_id" id="course_training_id" value="<?php echo $course_training_id?>" />
             <input type="hidden" name="old_course_training_id" id="old_course_training_id" value="<?php echo $result['course_training_id']?>" />
            
  



                       </div>
                        
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

<script type="text/javascript">
function groupon()
{
	if(document.getElementById("radio4").checked){
		document.getElementById('groupon').style.display = 'block';
	}else {
     document.getElementById('groupon').style.display = 'none';
  }
}

function check_course(obj)
{ 

	$.ajax({
		url:'ajax/training.php',
		type:'POST',
		data:'course_id='+obj.value,
		success:function(data){$('#right_schedule').html(data);
		}
	});
		
		
}
function add_date(obj,id)
{
	document.getElementById("preferred_date").value=obj;
	document.getElementById("course_training_id").value=id;
	
}

</script>
  
  </body>
</html>


