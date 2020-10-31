 <?php
 $pg_head = 'training_list';
 	if($_POST)
	{
		
		if(!value_check($course_id)){
			set_message("Please Enter Course","ERR");
		}else if(!value_check($start_date)){
			set_message("Please Enter Start Date","ERR");
		}else if(!value_check($end_date)){
			set_message("Please Enter End Date","ERR");
		}else if(!value_check($day_type)){
			set_message("Please Enter Day Type","ERR");
		}else if(!value_check($limit_stat)){
			set_message("Please Enter Limit Status","ERR");
		}else if($limit_stat=='Y' && !value_check($max_limit)){
			set_message("Please Enter Maximum Limit","ERR");
		}else if(!value_check($training_stat)){
			set_message("Please Enter Training Stat","ERR");
		}else{
			
				
					
					$qr = "INSERT  training_schedules SET
					course_id			=	'".add_trim($course_id)."',
					start_date			=	'".add_trim($start_date)."',
					end_date			=	'".add_trim($end_date)."',
					day_type			=	'".add_trim($day_type)."',
					limit_stat			=	'".add_trim($limit_stat)."',
					max_limit			=	'".add_trim($max_limit)."',	
					
					training_stat		=	'".add_trim($training_stat)."',
					stat		=	'Y'";
					
					
					mysqli_query($con, $qr);
					red_url("mode=training&pg=training_list");
					set_message("Added Successfully","SUCC");
					
				
		}
		
	}
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    

<link rel="stylesheet" href="css/date_style.css" />
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#start_date" ).datepicker({minDate: 0,dateFormat: "yy-mm-dd"});
  });
   $(function() {
    $( "#end_date" ).datepicker({minDate: 0,dateFormat: "yy-mm-dd"});
  });
  </script>
<div class="content">

    <div class="header">
    
        <h1 class="page-title">Add Training Schedules</h1>
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
                        <label><strong>Course</strong></label>
                        
                     
                         
                         
                      <select name="course_id" id="course_id" >
                           <option value="">Select Course</option>
                           <option value="3" <?php if(isset($result) && $result['course_id']==3){?> selected="selected" <?php }?> >Advance Navigation Course</option>
                            <option value="2" <?php if(isset($result) && $result['course_id']==3){?> selected="selected" <?php }?>>PPCDL under MCC</option>
                                                        
                      </select>
                         
                        <label><strong>Start Date</strong></label>
                        <input type="text" value="<?php if (isset($start_date)){ echo $start_date; }?>"  name="start_date" id="start_date" class="input-xlarge">
                        
                        <label><strong>End Date</strong></label>
                        <input type="text" value="<?php if (isset($end_date)){ echo $end_date; }?>"  name="end_date" id="end_date" class="input-xlarge">
                        
                        <label><strong>Day Type</strong></label>
           				<label class="radio"><input type="radio"  value="Week Days"  name="day_type" id="radio1" class="input-radio">Week Days</label>
            
            			<label class="radio"><input type="radio"  value="Wk End"  name="day_type" id="radio2" class="input-radio">Week End</label>
                       
                    
                        <label><strong>Limit Stat</strong></label>
           				<label class="radio"><input type="radio"  value="Y" onclick="groupon();" name="limit_stat" id="radio3" class="input-radio">Yes</label>
            
            			<label class="radio"><input type="radio"  value="N" onclick="groupon();" name="limit_stat" id="radio4" class="input-radio">No</label>
                        
                        <div id="l_stat" style="display:none">
                            <label><strong>Max limit</strong></label>
                            <input type="text" value="<?php if (isset($max_limit)){ echo $max_limit; }?>"  name="max_limit" id="max_limit" class="input-xlarge">
                        </div>
                        
                       
                        
                        <label><strong>Training Status</strong></label>
                        <label class="radio"><input type="radio"  value="O"  name="training_stat" id="radio5" class="input-radio">Open</label>
            
            			<label class="radio"><input type="radio"  value="C"  name="training_stat" id="radio6" class="input-radio">Closed</label>
                        
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
	if(document.getElementById("radio3").checked){
		document.getElementById('l_stat').style.display = 'block';
	}else {
     document.getElementById('l_stat').style.display = 'none';
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


