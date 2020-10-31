 <?php
 $pg_head = 'booking_list_of_premium_PPCDL';
	
	$str = mysqli_query($con, "select * from booking_details where booking_id = '".$booking_id."'");
	$result = mysqli_fetch_array($str);
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    

<div class="content">

    <div class="header">
    
        <h1 class="page-title">Booking Details for Navigation Course</h1>
    </div>

   
    <?php $ind=1;
	include("./include/breadcrumb.php");?>
   
   

    <div class="container-fluid">
        <div class="row-fluid">
        
        <?php show_message();?>
        
            <div class="btn-toolbar">
                <a class="btn btn-primary" href="<?php echo pg_link("mode=booking&pg=".$pg_name."&start=".$start)?>" ><i class="icon-arrow-left"></i> Back</a>
               <!-- <button class="btn" type="reset"  onClick="document.reg_form.reset()">Cancel</button>-->
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
                        
                         <label><b>Full Name : </b><?php echo $result['booking_name']?></label><br  />
                       
                        
                        <label><b>Nationality : </b><?php echo $result['nationality']?></label><br  />
                       
                        
                        <label><b>NRIC/Passport No : </b><?php echo $result['nric_passport_no']?></label><br  />
                      
                        <label><b>Phone : </b><?php echo $result['phone']?></label><br  />
                    
                    
                        <label><b>Email : </b><?php echo $result['email']?></label><br  />
                     
                        
                        <label><b>Address : </b><?php echo $result['address']?></label><br  />
                      
                        
                        <label><b>NOK's Name : </b><?php echo $result['noks_name']?></label><br  />
                      
                        <label><b>NOK's Phone No : </b><?php echo $result['noks_phone']?></label><br  />
                       
                       
                      
                        <?php $sel_membr = mysqli_query($con, "select * from group_members where booking_id = '".$booking_id."'");
						   $row_cnt = mysqli_num_rows($sel_membr);
						   
						   if($row_cnt>0){?>
							   <a class="block-heading" data-toggle="collapse" href="#memberwidget">Member Details</a>
                               <div id="memberwidget" class="block-body collapse in">
							   <table class="table"  width="60%" border="1">
                               
                               	<thead>
                                    <tr>
                                        <th>Member Name</th>
                                        <th>Member Email</th>
                                        <th>Member IC</th>
                                    </tr>
                                 </thead>
                                 
                                 <tbody>
                                  <?php while($membr_details = mysqli_fetch_array($sel_membr)){?>
                                  
                                     <tr>
                                        <td><?php echo $membr_details['member_name']?></td>
                                        <td><?php echo $membr_details['member_email']?></td>
                                        <td><?php echo $membr_details['member_ic']?></td>
                                      </tr>
                                      
                                   <?php }?>
                                 </tbody> 
                                 
                               </table>
                                    
						  <?php } ?>
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

  
  </body>
</html>


