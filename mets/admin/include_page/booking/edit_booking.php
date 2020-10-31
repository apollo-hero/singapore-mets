 <?php
 $pg_head = 'booking_list';
 	if($_POST)
	{
		
		
					$qr = "INSERT booking_details SET
					booking_name			=	'".add_trim($f_name)."',
					nationality				=	'".add_trim($nationality)."',
					nric_passport_no		=	'".add_trim($passport_no)."',
					phone					=	'".add_trim($phone)."',
					email					=	'".add_trim($email)."',
					address					=	'".add_trim($address)."',	
					noks_name				=	'".add_trim($nok_name)."',
					noks_phone				=	'".add_trim($nok_phone)."',
					course_id				=   '".add_trim($course_id)."',
					course_training_id		=	'".add_trim($training_id)."',
					registering_as			=	'".add_trim($register)."',
					voucher_code			=	'".add_trim($voucher_code)."',	
					groupon_security_code	=	'".add_trim($security_code)."',
					created_date			=	'".date('Y-m-d')."'";
					
					mysqli_query($con, $qr);
					red_url("mode=booking&pg=booking_list");
					set_message("Added Successfully","SUCC");
					
				
		
		
	}
	
	$str = mysqli_query($con, "select * from booking_details where booking_id = '".$edit_id."'");
	$result = mysqli_fetch_array($str);
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    

<div class="content">

    <div class="header">
    
        <h1 class="page-title">Edit Booking Details</h1>
    </div>

   
    <?php $ind=1;
	include("./include/breadcrumb.php");?>
   
   

    <div class="container-fluid">
        <div class="row-fluid">
        
        <?php show_message();?>
        
            <div class="btn-toolbar">
                <button class="btn btn-primary" type="submit" onClick="document.reg_form.submit()"><i class="icon-save"></i> Save</button>
                <button class="btn" type="reset"  onClick="document.reg_form.reset()">Cancel</button>
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
                        
                        <label>PPCDL Course to Attend</label>
                        
                        <select name="course_id" id="course_id" onchange="javascript:check_course(this);" >
                        <option value="">Select Course</option>
                        <?php $corse = mysqli_query($con, "select * from course order by course_id desc");
						      while($sel_course = mysqli_fetch_array($corse)){?>
                              	<option value="<?php echo $sel_course['course_id']?>" <?php if($sel_course['course_id']==$result['course_id']){?> selected="selected" <?php }?>><?php echo $sel_course['course_name']?></option>
                         <?php }?>
                         </select>
                       
                       
                       <div id="right_schedule">
                     
							
                     <?php       if($result['course_id'] ==2 ||$result['course_id'] ==3 ){
  $schedule = mysqli_query($con, "select * from training_schedules where course_id = '".$result['course_id']."' order by course_training_id asc ");

					         while($show_schedule = mysqli_fetch_array($schedule)){
								
								 $strt_date = explode("-",$show_schedule['start_date']);
								 $end_date = explode("-",$show_schedule['end_date']);
								 $mnth = date("F", mktime(0, 0, 0, $strt_date[1], 10));?>
                              <div class="tr-schedule">   
                             	<br /><a href="javascript:;;" onclick="add_date('<?php echo $strt_date[2]."-".$end_date[2]." ".$mnth."(".$show_schedule['day_type'].")"?>');"><?php echo $strt_date[2]."-".$end_date[2]." ".$mnth."(".$show_schedule['day_type'].")"?></a>
                                </div>
                       <?php }?>
                       
           <label>Preferred Date</label>
            <input type="text" value="<?php echo $training_id?>"  name="training_id" id="training_id" class="input-xlarge">
            
            <label>Are you registering as</label>
            <label class="radio"><input type="radio" onclick="groupon();" value="Full-time Student/NSF"  name="register" id="radio1" class="input-radio" <?php if($result['registering_as']=='Full-time Student/NSF'){?> checked="checked" <?php }?>>Full-time Student / NSF  $270 </label>
            
            <label class="radio"><input type="radio" onclick="groupon();" value="Group of 3 or more"  name="register" id="radio2" class="input-radio"  <?php if($result['registering_as']=='Full-time Student/NSF'){?> checked="checked" <?php }?>>Group of 3 or more  $300 </label>
            
            <label class="radio"><input type="radio" onclick="groupon();" value="Working Adult"  name="register" id="radio3" class="input-radio"  <?php if($result['registering_as']=='Working Adult'){?> checked="checked" <?php }?>>Working Adult  $340 </label>
            
            <label class="radio"><input type="radio"  onclick="groupon();" value="Groupon/Deal.com/Other Vouchers"  name="register" id="radio4" class="input-radio"  <?php if($result['registering_as']=='Groupon/Deal.com/Other Vouchers'){?> checked="checked" <?php }?>>Groupon / Deal.com / Other Vouchers  $168 / $188(Only at MCC)</label>

   <?php }  ?>



                       </div>
                        
                        <div id="groupon" style="display:none;">
                        <label>Groupon / Deal.com Voucher Code</label>
                        <input type="text" value="<?php echo $result['voucher_code']?>"  name="voucher_code" id="voucher_code" class="input-xlarge">
                        
                        <label>Groupon Security Code</label>
                        <input type="text" value="<?php echo $result['groupon_security_code']?>"  name="security_code" id="security_code" class="input-xlarge">
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
function add_date(obj)
{
	document.getElementById("training_id").value=obj;
}

</script>
  
  </body>
</html>


