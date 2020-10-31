 <?php
 $pg_head = 'booking_list';
 	if($_POST)
	{
		
		if(!value_check($f_name)){
			set_message("Please Enter Full Name","ERR");
		}else if(!value_check($nationality)){
			set_message("Please Enter Nationality","ERR");
		}else if(!value_check($passport_no)){
			set_message("Please Enter NRIC/Passport No","ERR");
		}else if(!value_check($phone)){
			set_message("Please Enter Phone","ERR");
		}else if(!value_check($email)){
			set_message("Please Enter Email","ERR");
		}else if(!email_check($email)){
			set_message("Invalid Email","ERR");
		}else if(!value_check($address)){
			set_message("Please Enter Address","ERR");
		}else if(!value_check($nok_name)){
			set_message("Please Enter NOK's Name: (next-of-kin)","ERR");
		}else if(!value_check($nok_phone)){
			set_message("Please Enter NOK's Phone No","ERR");
		}else if(!value_check($course_id)){
			set_message("Please Enter PPCDL Course to Attend","ERR");
		}else if(!value_check($training_id)){
			set_message("Please Enter Preferred Date","ERR");
		}else if(!value_check($register)){
			set_message("Please Enter Are you registering as","ERR");
		}else if(!value_check($voucher_code)){
			set_message("Please Enter Voucher Code","ERR");
		}else{
			
				
					
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
		
	}
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    

<div class="content">

    <div class="header">
    
        <h1 class="page-title">Add Booking Details</h1>
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
                        <input type="text" value="<?php echo $f_name?>"  name="f_name" id="f_name" class="input-xlarge">
                        
                        <label>Nationality</label>
                        <input type="text" value="<?php echo $nationality?>"  name="nationality" id="nationality" class="input-xlarge">
                        
                        <label>NRIC/Passport No</label>
                        <input type="text" value="<?php echo $passport_no?>" name="passport_no" id="passport_no" class="input-xlarge">
                        
                        <label>Phone</label>
                        <input type="text"  value="<?php echo $phone?>" name="phone" id="phone" class="input-xlarge">
                    
                        <label>Email</label>
                        <input type="text" value="<?php echo $email?>"  name="email" id="email" class="input-xlarge"> 
                        
                        <label>Address</label>
                        <textarea  name="address" id="address" class="input-xlarge"> <?php echo $con_pswd?></textarea>
                        
                        <label>NOK's Name</label>
                        <input type="text" value="<?php echo $nok_name?>"  name="nok_name" id="nok_name" class="input-xlarge">
                        
                        <label>NOK's Phone No</label>
                        <input type="text" value="<?php echo $nok_phone?>"  name="nok_phone" id="nok_phone" class="input-xlarge">
                        
                        <label>PPCDL Course to Attend</label>
                        
                        <select name="course_id" id="course_id" onchange="javascript:check_course(this);" >
                        <option value="">Select Course</option>
                        <?php $corse = mysqli_query($con, "select * from course order by course_id desc");
						      while($sel_course = mysqli_fetch_array($corse)){?>
                              	<option value="<?php echo $sel_course['course_id']?>"><?php echo $sel_course['course_name']?></option>
                         <?php }?>
                         </select>
                       
                       
                       <div id="right_schedule">
                     

                       </div>
                        
                        <div id="groupon" style="display:none;">
                        <label>Groupon / Deal.com Voucher Code</label>
                        <input type="text" value="<?php echo $voucher_code?>"  name="voucher_code" id="voucher_code" class="input-xlarge">
                        
                        <label>Groupon Security Code</label>
                        <input type="text" value="<?php echo $security_code?>"  name="security_code" id="security_code" class="input-xlarge">
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
</script>
  
  </body>
</html>


