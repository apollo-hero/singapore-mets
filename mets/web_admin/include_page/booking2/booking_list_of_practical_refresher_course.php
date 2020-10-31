<?php include("./include/top_bar.php");
      include("./include/sidebar_nav.php");     



$argu2	= 	'';
$limit	=	10;
$seltab	=	"select * from refresher_training_schedules order by booking_id desc";	
list($res_query, $paging_table,$total_record)	= pagedisplay($start,$argu2,$limit,'home',$seltab) ;
?>    
<div class="content">

    <div class="header">
    
        <h1 class="page-title">Booking List  Navigation Course</h1>
    </div>

     <?php include("./include/breadcrumb.php");?>

    <div class="container-fluid">
    
        <div class="row-fluid">
        
         <?php show_message();?>
         
            <div class="btn-toolbar">
              <!--   <a href="<?=pg_link("mode=booking&pg=add_details_for_navigation_course&course_id=3")?>"  title="Add New Booking" class="btn btn-primary"><i class="icon-plus"></i> New Booking</a> -->
                
                <div class="btn-group">
                </div>
                
            </div>
            <div class="well">
                <table class="table" style="font-size:12px; " border="1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                           
                            <th>Phone</th>
                            <th>Email</th>
                           
                           
                            <th>Course to Attend</th>
                            <th>Booking Date</th>
                            <th>Booking Slot</th>
                           
                           
                            
                        </tr>
                    </thead>
                    
                    <tbody>
            <?php 
			$cnt=0;
			while($result = mysql_fetch_array($res_query)){
				$cnt++;
				
				$univ = mysql_query("select * from refresher_training where refresher_training_id ='".$result['refresher_training_id']."'");
				$result_bat3 = mysql_fetch_array($univ);
				?>
                    
                        <tr>
                            <td><?=$cnt?></td>
                            <td><?=$result['name']?></td>
                           
                            <td><?=$result['phone']?></td>
                            <td><?=$result['email']?></td>
                          
                           
							<td><?=$result['course_to_attend']?></td>
                            <td><?=$result['booking_date']?></td>
                            <td><?=date("g A", strtotime($result_bat3['start_time']))?> <?=date("g A", strtotime($result_bat3['end_time']))?></td>
                            
                           
                           
                        </tr>
             <? }?>           

                    </tbody>
                </table>
            </div>
            <div class="pagination"><?=$paging_table?> </div>
           
        
            <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            
                <div class="modal-header">
                
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Delete Confirmation</h3>
                    
                </div>
                
                <div class="modal-body">
                    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
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


