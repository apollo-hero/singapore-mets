 <?php
 	if($_POST)
	{
	
		
		
			$qry			=	"SELECT count(*) as c FROM admin_details WHERE admin_name 	='admin' and admin_pass='".$_REQUEST['oldpass']."'";
			$exeqry			=	mysqli_query($con,$qry);
			$resexeqry		=	mysqli_fetch_array($exeqry);
			if($resexeqry['c']>0)
			{	
				$qr = "update admin_details SET admin_pass = '".$_REQUEST['newpass']."' where admin_name = 'admin'";
				$result = mysqli_query($con,$qr) or die(mysqli_error($con));
				set_message("Updated Successfully","SUCC");
				red_url("mode=comm&pg=change_password");
			}
			else
			{
				set_message("Current Password is invalid","ERR");
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
  
<div class="content">

    <div class="header">
    
        <h1 class="page-title">Change Password</h1>
    </div>

   
    <?php $ind=1;
	include("./include/breadcrumb.php");?>
   
   

    <div class="container-fluid">
        <div class="row-fluid">
        
        <?php show_message();?>
        
           
            
            <div class="well">
            
              
                
                <div id="myTabContent" class="tab-content">
                
                    <div class="tab-pane active in" id="home">
                       
                        <form  name="fname" id="fname" method="post" action="">
                        
                        
                        <label><strong>Current password</strong></label>
                        <input type="password" value=""  name="oldpass" id="oldpass" class="input-xlarge">
						
						<label><strong>New password</strong></label>
                        <input type="password" value=""  name="newpass" id="newpass" class="input-xlarge">
						<label><strong>Confirm password</strong></label>
                        <input type="password" value=""  name="confpass" id="confpass" class="input-xlarge">
                         
         
                     
                      
                        
                  <div class="btn-toolbar">
                <button class="btn btn-primary" type="button" onClick="javascript:validate();"><i class="icon-save"></i> Save</button>
              
                   
            </div>
                      
                        
                        </form>
                    </div>
                    
                    
                   
                </div>
            
            </div>
			
			<script language="javascript">

function validate()
{
	var missinginfo ="";
	if(document.getElementById("oldpass").value == ""){		
		missinginfo += "\n     - Old password";
	}
	if(document.getElementById("newpass").value == ""){		
		missinginfo += "\n     - New password";
	}
	if(document.getElementById("confpass").value == ""){		
		missinginfo += "\n     - Confirm password";
	}
	if(document.getElementById("confpass").value != document.getElementById("newpass").value){		
		missinginfo += "\n     - Confirm Password should match New Password.";
	}
	
	if(missinginfo != "") 
	{
		missinginfo ="_____________________________\n" + "You failed to correctly fill in your:\n" + missinginfo + "\n_____________________________" + "\nPlease re-enter and submit again!";
		alert(missinginfo);
	}
	else 
	{
		document.fname.submit();
	}


}
</script>
			
			

        
        
        
        	<?php include("./include/footer.php"); ?>
            
        </div>
    </div>
</div>

  
  </body>
</html>


