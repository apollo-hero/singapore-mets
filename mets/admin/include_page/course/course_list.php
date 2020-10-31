

<?php include("./include/top_bar.php");
      include("./include/sidebar_nav.php");     



$argu2	= 	'';
$limit	=	10;
$seltab	=	"select * from course order by course_id asc";	
list($res_query, $paging_table,$total_record)	= pagedisplay($start,$argu2,$limit,'home',$seltab) ;
?>    
<div class="content">

    <div class="header">
    
        <h1 class="page-title">List of Courses</h1>
    </div>

    <?php include("./include/breadcrumb.php");?>

    <div class="container-fluid">
    
        <div class="row-fluid">
        
         <?php show_message();?>
         
            <div class="btn-toolbar">
               <!-- <a href="<?php echo pg_link("mode=data_entry&pg=add_user")?>"  title="Add New Data Entry User"class="btn btn-primary"><i class="icon-plus"></i> New User</a>-->
                
                <div class="btn-group">
                </div>
                
            </div>
            <div class="well">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                        </tr>
                    </thead>
                    
                    <tbody>
            <?php 
			$cnt=0;
			while($result = mysqli_fetch_array($res_query)){
				$cnt++;?>
                    
                        <tr>
                            <td><?php echo $cnt?></td>
                            <td><?php echo $result['course_name']?></td>
                        </tr>
             <?php }?>           

                    </tbody>
                </table>
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
                <form name="del_form" id="del_form" method="post" action=""> 
                 <input type="hidden" name="del_id" id="del_id" value="" />
                 
                    <button class="btn" data-dismiss="modal" aria-hidden="true" >Cancel</button>
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
		 $(".modal-footer #del_id").val(del_id);
	});
	
</script>

    
  </body>
</html>


