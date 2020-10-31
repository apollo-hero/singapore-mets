<?php 
if($_POST)
{

	if($del_id){
	
		$str15 = mysqli_query($con, "select * from booking_details where booking_id= '".$del_id."'");
		$result_batch = mysqli_fetch_array($str15);
		if($result_batch['booking_id'])
		{
			$str153 = mysqli_query($con, "delete from booking_details where booking_id ='".$result_batch['booking_id']."'");
			$str153 = mysqli_query($con, "delete from group_members where booking_id ='".$result_batch['booking_id']."'");
			$qr	= 	"UPDATE  training_schedules SET 
			no_of_sign_up	=	no_of_sign_up-1 where course_training_id='".$result_batch['course_training_id']."' and limit_stat='Y'";
			mysqli_query($con, $qr);
			$str152 = mysqli_query($con, "select * from training_schedules where course_training_id= '".$result_batch['course_training_id']."'");
			$result_batch2 = mysqli_fetch_array($str152);
			
			if(($result_batch2['no_of_sign_up'])<$result_batch2['max_limit'] &&  $result_batch2['limit_stat'] =='Y')
			{
				$qr	= 	"UPDATE  training_schedules SET 
				training_stat	=	'O' where course_training_id='".$result_batch['course_training_id']."' ";
				mysqli_query($con, $qr);
			}
			
			set_message("Deleted Successfully","SUCC");
			red_url("mode=booking&pg=booking_list_of_navigation_course");		
		 }			
	}
}


include("./include/top_bar.php");
      include("./include/sidebar_nav.php");     



$argu2	= 	'';
$limit	=	10;
$seltab	=	"select * from booking_details where course_id  = 3 and (booking_status='Y' or (registering_as='Groupon' and booking_status='N')) order by booking_id desc";	
list($res_query, $paging_table,$total_record)	= pagedisplay($start,$argu2,$limit,'home',$seltab) ;
?>    
<div class="content">

    <div class="header">
    
        <h1 class="page-title">Booking List of Advance Navigation Course</h1>
    </div>

     <?php include("./include/breadcrumb.php");?>

    <div class="container-fluid">
    
        <div class="row-fluid">
        
         <?php show_message();?>
         
            <div class="btn-toolbar">
              <a href="<?php echo pg_link("mode=booking&pg=add_details_for_navigation_course&course_id=3")?>"  title="Add New Booking" class="btn btn-primary"><i class="icon-plus"></i> New Booking - Advance Navigation Course</a> 
                
                <div class="btn-group">
                </div>
                
            </div>
            <div class="well">
                <table class="table" style="font-size:12px; " border="1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Nationality</th>
                            <th>NRIC/Passport No</th>
                            <th>Phone</th>
                            <th>Email</th>
                           
                           
                            <th>Course to Attend</th>
                            <th>Preferred Date</th>
                            <th>Registering as</th>
                           
                             <th style="width: 26px;">View</th>
                            <th style="width: 26px;">Edit</th>
                            <th style="width: 26px;">Delete</th>
                        </tr>
                    </thead>
                    
                    <tbody>
            <?php 
			$cnt=0;
			while($result = mysqli_fetch_array($res_query)){
				$cnt++;
				
				$univ = mysqli_query($con, "select course_name from course where course_id = '".$result['course_id']."'");
				$un_qry = mysqli_fetch_array($univ);
				?>
                    
                        <tr>
                            <td><?php echo $cnt?></td>
                            <td><?php echo $result['booking_name']?></td>
                            <td><?php echo $result['nationality']?></td>
                            <td><?php echo $result['nric_passport_no']?></td>
                            <td><?php echo $result['phone']?></td>
                            <td><?php echo $result['email']?></td>
                          
                           
							<td><?php echo $result['course_name']?></td>
                            <td><?php echo $result['preferred_date']?></td>
                            
                           <td><?
							if($result['registering_as']=='Groupon')
								echo 'Groupon';
							else
								echo $result['registering_as'].' (Paypal)';
							?></td>
                           <td>
                            <a href="<?php echo pg_link("mode=booking&pg=view_details_for_navigation_course&booking_id=".$result['booking_id']."&pg_name=booking_list_of_navigation_course&start=".$start)?>" title="View"><i class="icon-tag"></i></a> </td>
                          <td>  <a href="<?php echo pg_link("mode=booking&pg=edit_booking_for_navigation_course&edit_id=".$result['booking_id'])?>" title="Edit"><i class="icon-pencil"></i></a>
                            </td> 
							<td>
                          <a href="#myModal" data-id="<?php echo $result['booking_id']?>" class="open-delDialog" role="button" data-toggle="modal" title="Delete"><i class="icon-remove"></i></a> 
                            </td>
                        </tr>
             <?php }?>           

                    </tbody>
                </table>
            </div>
            <div class="pagination"><?php echo $paging_table?> </div>
           
        
            <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            
                <div class="modal-header">
                
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Delete Confirmation</h3>
                    
                </div>
                
                <div class="modal-body">
                    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the record?</p>
                    <input type="hidden" name="del_id" id="del_id" value="" />
                </div>
                    
                <div class="modal-footer">
                 <form name="del_form" id="del_form" method="post" action="">
                  	 <input type="hidden" name="del_id" id="del_id" value="" />
                   
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger" type="submit" name="delete" id="delete">Delete</button>
                </form>
                </div>
            </div>
        
        
          <?php include("./include/footer.php");?>
        
        </div>
    </div>
</div>
    
<script>
	
	$(document).on("click", ".open-delDialog", function () {
		
		 var del_id = $(this).data('id');
		 $(".modal-footer #del_id").val(del_id );
	});
	
</script>

    
  </body>
</html>


