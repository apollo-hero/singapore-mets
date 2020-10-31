 <?php
if($_POST){
	$qr	= 	"delete from group_members  where booking_id='".$booking_id."' ";
	mysqli_query($con, $qr);
	for($i=1;$i<=$m464f5number_member;$i++)
	{
		$member_name = $_POST['m464f5member_name'.$i];
		$member_ic = $_POST['m464f5member_ic'.$i];
		$member_email = $_POST['m464f5member_email'.$i];
		$qr	= 	"INSERT INTO  group_members SET 
		booking_id	=	'".$booking_id."', 
		member_name	=	'".$member_name."', 
		member_ic	=	'".$member_ic."', 
		member_email	=	'".$member_email."'";
		mysqli_query($con, $qr);
	
	}
	$qr	= 	"UPDATE  booking_details SET 
	payable_amount	=	'".$m464f5total_amount."' where booking_id='".$booking_id."' ";
	mysqli_query($con, $qr);
	
	set_message("Added Successfully","SUCC");
	red_url("mode=booking&pg=booking_list_of_PPCDL_under_MCC");
}


$str15 = mysqli_query($con, "select * from booking_details where booking_id= '".$booking_id."'");
$result_batch = mysqli_fetch_array($str15);
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    

<div class="content">

    <div class="header">
    
        <h1 class="page-title">Add Booking Details for PPCDL under MCC</h1>
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
                       
                       <?
$str1533 = mysqli_query($con, "select count(*) as ct from group_members where booking_id= '".$booking_id."'");
$result_batch33 = mysqli_fetch_array($str1533);
if($result_batch33['ct']==0)
{
?>
<form action="" method="post">
<div class="hidden">
<input type="hidden" name="method" value="group" />
<input type="hidden" name="booking_id" value="<?php echo $booking_id?>" />

</div>



<div class="box_register_table">
                <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_two">
                      <tr>
                        <td><b>Name:</b> <?php echo strip($result_batch['booking_name'])?></td>
                      </tr>
                       <tr>
                        <td><b>Nationality:</b> <?php echo strip($result_batch['nationality'])?></td>
                    </tr>
                       <tr>
                        <td><b>Nric:</b> <?php echo strip($result_batch['nric_passport_no'])?></td>
                    </tr>
                       <tr>
                        <td><b>Phone:</b> <?php echo strip($result_batch['phone'])?></td>
                    </tr>
                       <tr>
                        <td><b>Email:</b> <?php echo strip($result_batch['email'])?></td>
                    </tr>
                       <tr>
                        <td><b>Address:</b> <?php echo strip($result_batch['address'])?></td>
                      </tr>
                         <tr>
                        <td><b>Nokn:</b> <?php echo strip($result_batch['noks_name'])?></td>
                    </tr>
                       <tr>
                        <td><b>Nokp:</b> <?php echo strip($result_batch['noks_phone'])?></td>
                    </tr>
                  </table>
                    
</div>
                  <div class="box_register_title"><strong>PPCDL Course Details</strong></div>
                  <div class="box_register_table">
                  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_two">
     <tr>
                        <td><b>Training:</b>  <?php echo strip($result_batch['course_name'])?></td>
                      </tr>
                       <tr>
                        <td><b>Date:</b>  <?php echo strip($result_batch['preferred_date'])?></td>
                    </tr>
                       <tr>
                        <td><b>Register:</b>  <?php echo strip($result_batch['registering_as'])?></td>
                    </tr>
                      <tr>
                        <td><b>Amount:</b> <?php echo strip($result_batch['amount'])?> SGD</td>
                      </tr>
                      <tr>
                        <td><b>Total Amount: </b><input type="text" name="m464f5total_amount" id="m464f5total_amount" value="300.00" size="10" maxlength="255" READONLY />
</td>
                      </tr>
					</table>
                  </div>

                  <div class="box_register_title"><strong>Group Details</strong></div>
                  <div class="box_register_table">
                  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_two">
                      <tr>
                        <td><b>Number of people signing up:</b> <input type="text" name="m464f5number_member" id="m464f5number_member" value="" size="10" maxlength="255" />
<br><br>
                        <input type=button style="background-color:#CCCCCC; size:5px;"  name='m464f5add' value='add member' onClick='displayMember()'></td>
                      </tr>
                       <tr>
                        <td><div id="member_info"></div></td>
                    </tr>
					</table>
                  </div>
                  <div class="box_register_table2">
                  <br><br>
				  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_three">
                       <tr>
                        <td align="left" ><input name="m464f5submit" id="m464f5submit" value="Submit" type="submit" 1 />
</td>
                      </tr>   
					</table>
                  </div>
<input type="hidden" name="m464f5newid" value="10466" />

</form>
</div>
<?
}else
{
?>
<div class="hidden">
<input type="hidden" name="method" value="group" />
<input type="hidden" name="booking_id" value="<?php echo $booking_id?>" />

</div>



<div class="box_register_table">
                <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_two">
                      <tr>
                        <td><b>Name:</b> <?php echo strip($result_batch['booking_name'])?></td>
                      </tr>
                       <tr>
                        <td><b>Nationality:</b> <?php echo strip($result_batch['nationality'])?></td>
                    </tr>
                       <tr>
                        <td><b>Nric:</b> <?php echo strip($result_batch['nric_passport_no'])?></td>
                    </tr>
                       <tr>
                        <td><b>Phone:</b> <?php echo strip($result_batch['phone'])?></td>
                    </tr>
                       <tr>
                        <td><b>Email:</b> <?php echo strip($result_batch['email'])?></td>
                    </tr>
                       <tr>
                        <td><b>Address:</b> <?php echo strip($result_batch['address'])?></td>
                      </tr>
                         <tr>
                        <td><b>Nokn:</b> <?php echo strip($result_batch['noks_name'])?></td>
                    </tr>
                       <tr>
                        <td><b>Nokp:</b> <?php echo strip($result_batch['noks_phone'])?></td>
                    </tr>
                  </table>
                    
</div>
                  <div class="box_register_title"><strong>PPCDL Course Details</strong></div>
                  <div class="box_register_table">
                  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_two">
     <tr>
                        <td><b>Training:</b>  <?php echo strip($result_batch['course_name'])?></td>
                      </tr>
                       <tr>
                        <td><b>Date:</b>  <?php echo strip($result_batch['preferred_date'])?></td>
                    </tr>
                       <tr>
                        <td><b>Register:</b>  <?php echo strip($result_batch['registering_as'])?></td>
                    </tr>
                      <tr>
                        <td><b>Amount:</b>  <?php echo strip($result_batch['payable_amount'])?></td>
                      </tr>
					</table>
                  </div>


                  

</div>
<?
}
?>


<script type='text/javascript' language='javascript'>
function displayMember() {
	
var number_member = document.getElementById('m464f5number_member').value;
//	var amount = document.getElementById('m464f5amount').value;
if(number_member != '' && IsNumeric(number_member)){
document.getElementById('member_info').innerHTML = "";	  
  for(i=1;i<=number_member; i++) {	
  document.getElementById('member_info').innerHTML += "<br><b>Member "+ i + "</b><br />" + 
													  "Name:&nbsp;<input type='text' id='m464f5member_name" + i + "' name='m464f5member_name" + i + "'><br />" + 
													  "I/C:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' id='m464f5member_name" + i + "' name='m464f5member_ic" + i + "'><br />" +
													  "Email:&nbsp;<input type='text' id='m464f5member_name" + i + "' name='m464f5member_email" + i + "'><br />";
  }

var total = Math.abs(300 * number_member); 

document.getElementById('m464f5total_amount').value = total.toFixed(2);	  
}
else {
alert('Please input a valid number of member')
}

}
</script>

<SCRIPT language="JavaScript">
  <!--

function IsNumeric(strString)
   //  check for valid numeric strings	
   {
   var strValidChars = "0123456789";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
   }

  // -->
</SCRIPT>
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


