 <?php
 $pg_head = 'booking_list_of_PPCDL_under_MCC';
	
	$str = mysql_query("select * from booking_details where booking_id = '".$booking_id."'");
	$result = mysql_fetch_array($str);
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    

<div class="content">

    <div class="header">
    
        <h1 class="page-title"> Booking Details for Navigation Course</h1>
    </div>

   
    <?php $ind=1;
	include("./include/breadcrumb.php");?>
   
   

    <div class="container-fluid">
        <div class="row-fluid">
        
        <?php show_message();?>
        
            <div class="btn-toolbar">
                <a class="btn btn-primary" href="<?=pg_link("mode=booking&pg=".$pg_name."&start=".$start)?>" ><i class="icon-arrow-left"></i> Back</a>
                <!--<button class="btn" type="reset"  onClick="document.reg_form.reset()">Cancel</button>-->
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
                        
                          <label><b>Full Name : </b><?=$result['booking_name']?></label><br  />
                       
                        
                        <label><b>Nationality : </b><?=$result['nationality']?></label><br  />
                       
                        
                        <label><b>NRIC/Passport No : </b><?=$result['nric_passport_no']?></label><br  />
                      
                        <label><b>Phone : </b><?=$result['phone']?></label><br  />
                    
                    
                        <label><b>Email : </b><?=$result['email']?></label><br  />
                     
                        
                        <label><b>Address : </b><?=$result['address']?></label><br  />
                      
                        
                        <label><b>NOK's Name : </b><?=$result['noks_name']?></label><br  />
                      
                        <label><b>NOK's Phone No : </b><?=$result['noks_phone']?></label><br  />
                      
                       <label><b>Preferred Date : </b><?=$result['preferred_date']?></label><br  />
                       
                       
                       <label><b>Registerd as : </b><?=$result['registering_as']?></label><br  />
                    
                         
                         <? if($result['registering_as']=='Groupon/Deal.com/Other Vouchers'){?> 
                           
                            <label><b>Groupon / Deal.com Voucher Code : </b><?=$voucher_code?></label><br  />
                           
                            
                            <label><b>Groupon Security Code : </b><?=$security_code?></label>
                       
          				<? }?>
                        <? $sel_membr = mysql_query("select * from group_members where booking_id = '".$booking_id."'");
						   $row_cnt = mysql_num_rows($sel_membr);
						   
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
                                  <? while($membr_details = mysql_fetch_array($sel_membr)){?>
                                  
                                     <tr>
                                        <td><?=$membr_details['member_name']?></td>
                                        <td><?=$membr_details['member_email']?></td>
                                        <td><?=$membr_details['member_ic']?></td>
                                      </tr>
                                      
                                   <? }?>
                                 </tbody> 
                                 
                               </table>
                                    
						  <? } ?>
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


