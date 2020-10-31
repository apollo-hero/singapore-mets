 <?php
 $pg_head = 'booking_list_of_navigation_course';
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
		}else if(!value_check($preferred_date)){
			set_message("Please Enter Preferred Date","ERR");
		}else if(!value_check($register)){
			set_message("Please Enter Are you registering as","ERR");
		}else if($register == 'Groupon/Deal.com/Other Vouchers' && !value_check($voucher_code)){
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
					course_training_id		=	'".add_trim($course_training_id)."',
					registering_as			=	'".add_trim($register)."',
					voucher_code			=	'".add_trim($voucher_code)."',	
					groupon_security_code	=	'".add_trim($security_code)."',
					course_name				=	'Navigation Course',
					preferred_date			=	'".add_trim($preferred_date)."',
					payable_amount		=	'".add_trim($amount)."',
					amount		=	'".add_trim($amount)."',
					booking_status		=	'Y',
					created_date		=	'".date("Y-m-d")."'";
					mysql_query($qr);
					
					 $booking_id = mysql_insert_id();
					$qr	= 	"UPDATE  training_schedules SET 
					no_of_sign_up	=	no_of_sign_up+1 where course_training_id='".$course_training_id."' and limit_stat='Y'";
					mysql_query($qr);
					$str15 = mysql_query("select * from training_schedules where course_training_id= '".$course_training_id."'");
					$result_batch = mysql_fetch_array($str15);
					if(($result_batch['no_of_sign_up'])==$result_batch['max_limit'] &&  $result_batch['limit_stat'] =='Y')
					{
						$qr	= 	"UPDATE  training_schedules SET 
						training_stat	=	'C' where course_training_id='".$course_training_id."' ";
						mysql_query($qr);
					}
					
					
					set_message("Added Successfully","SUCC");
					red_url("mode=booking&pg=booking_list_of_navigation_course");
					
					
				
		}
		
	}
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    

<div class="content">

    <div class="header">
    
        <h1 class="page-title">Add Booking Details for Advance Navigation Course</h1>
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
                        <input type="text" value="<?=$f_name?>"  name="f_name" id="f_name" class="input-xlarge">
                        
                        <label>Nationality</label>
                        <input type="text" value="<?=$nationality?>"  name="nationality" id="nationality" class="input-xlarge">
                        
                        <label>NRIC/Passport No</label>
                        <input type="text" value="<?=$passport_no?>" name="passport_no" id="passport_no" class="input-xlarge">
                        
                        <label>Phone</label>
                        <input type="text"  value="<?=$phone?>" name="phone" id="phone" class="input-xlarge">
                    
                        <label>Email</label>
                        <input type="text" value="<?=$email?>"  name="email" id="email" class="input-xlarge"> 
                        
                        <label>Address</label>
                        <textarea  name="address" id="address" class="input-xlarge"> <?=$con_pswd?></textarea>
                        
                        <label>NOK's Name</label>
                        <input type="text" value="<?=$nok_name?>"  name="nok_name" id="nok_name" class="input-xlarge">
                        
                        <label>NOK's Phone No</label>
                        <input type="text" value="<?=$nok_phone?>"  name="nok_phone" id="nok_phone" class="input-xlarge">
                        
                        <div id="right_schedule">
                     		
						<?    $schedule = mysql_query("select * from training_schedules where course_id='3' and start_date >= '".date("Y-m-d")."' and training_stat='O'  and stat='Y' order by start_date asc");?>
                        
						 <table class="tr-schedule">
						<?	while($show_schedule = mysql_fetch_array($schedule)){
								
								$strt_date = explode("-",$show_schedule['start_date']);
								$end_date = explode("-",$show_schedule['end_date']);
								$mnth = date("F", mktime(0, 0, 0, $strt_date[1], 10));?>
                                
								
                                <tr><td>
                                    <a href="javascript:;;" onclick="add_date('<?=$strt_date[2]."-".$end_date[2]." ".$mnth."(".$show_schedule['day_type'].")"?>','<?=$show_schedule['course_training_id']?>');"><?=$strt_date[2]."-".$end_date[2]." ".$mnth."(".$show_schedule['day_type'].")"?></a> &nbsp;&nbsp;
                                </td></tr>
                                   
								
							<? }?></table> 
                        
                            <label>Preferred Date</label>
                            <input type="text" value="<?=$preferred_date?>"  name="preferred_date" id="preferred_date" class="input-xlarge" readonly="readonly">
                            
                            <input type="hidden" name="course_training_id" id="course_training_id" value="<?=$course_training_id?>" />
                            <label>Are you registering as</label>

                            <label class="radio"><input type="radio" onclick="groupon(450);" value="Working Adult"  name="register" id="radio3" class="input-radio">Working Adult  $450 </label>
                            
                            <label class="radio"><input type="radio"  onclick="groupon(268);" value="Groupon/Deal.com/Other Vouchers"  name="register" id="radio4" class="input-radio">Groupon / Deal.com / Other Vouchers  $268(Only at MCC)</label>


                       </div>
                        
                        <div id="groupon" style="display:none;">
                        <label>Groupon / Deal.com Voucher Code</label>
                        <input type="text" value="<?=$voucher_code?>"  name="voucher_code" id="voucher_code" class="input-xlarge">
                        
                        <label>Groupon Security Code</label>
                        <input type="text" value="<?=$security_code?>"  name="security_code" id="security_code" class="input-xlarge">
                        </div>
                        
                       <input type="hidden" name="course_id" id="course_id" value="3" />
                         <input type="hidden" id="amount" name="amount" value="">
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
function groupon(amt)
{
document.getElementById('amount').value=amt;
	if(document.getElementById("radio4").checked){
		document.getElementById('groupon').style.display = 'block';
	}else {
     document.getElementById('groupon').style.display = 'none';
  }
}

function add_date(obj,id)
{
	document.getElementById("preferred_date").value=obj;
	document.getElementById("course_training_id").value=id;
}

</script>
  
  </body>
</html>


