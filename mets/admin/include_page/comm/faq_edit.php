 <?php
 $pg_head = 'booking_list_of_PPCDL_under_MCC';
 	if($_POST)
	{
		
		if(!value_check($question)){
			set_message("Please Enter Question","ERR");
		}else if(!value_check($answer)){
			set_message("Please Enter Answer","ERR");
		}else{
			
				
					
			
					$qr = "UPDATE faq SET
					question			=	'".add_trim($question)."',
					answer				=	'".add_trim($answer)."' where id = '".$edit_id."'";
					
					mysqli_query($con, $qr);
					
					 set_message("Updated Successfully","SUCC");
						red_url("mode=comm&pg=faq");
					
					
				
		}
		
	}
	$str = mysqli_query($con, "select * from faq where id = '".$edit_id."'");
	$result = mysqli_fetch_array($str);
	$question =$result['question'];
	$answer =$result['answer'];
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    

<div class="content">

    <div class="header">
    
        <h1 class="page-title">Add FAQ</h1>
    </div>

    <ul class="breadcrumb">
            <li><a href="home.php">Home</a> <span class="divider">/</span></li>
            <li>FAQ <span class="divider">/</span></li>
            <li class="active">Add FAQ</li>
        </ul>
  
   
   

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
            
                
                <div id="myTabContent" class="tab-content">
                
                    <div class="tab-pane active in" id="home">
                       
                        <form  name="reg_form" id="reg_form" method="post" action="">
                        
                        <label>Question</label>
                        <textarea name="question" id="question" style="width: 80%;height: 60px;"><?php if(isset($question)){echo $question;}?></textarea>
                        <label>Answer</label>
						 <textarea name="answer" id="answer" style="width: 80%;height: 80px;"><?php if(isset($answer)){echo $answer;}?></textarea>
                        
                     
                        
              
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


