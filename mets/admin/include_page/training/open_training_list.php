<?php include("./include/top_bar.php");
      include("./include/sidebar_nav.php");     

if(isset($edit_id)){
	$qr = "UPDATE   training_schedules SET
	stat			=	'N'
	where  course_training_id		=  '".$edit_id."'";
	mysqli_query($con, $qr);
	set_message("Updated Successfully","SUCC");
	red_url("mode=training&pg=open_training_list&start=".$start);
}

$argu2	= 	'';
$limit	=	10;
$seltab	=	"select * from training_schedules where training_stat='O'  and stat='Y' order by course_training_id desc";	
list($res_query, $paging_table,$total_record)	= pagedisplay($start,$argu2,$limit,'home',$seltab) ;
?>    
<div class="content">

    <div class="header">
    
        <h1 class="page-title">Open Training Schedule List</h1>
    </div>

     <?php include("./include/breadcrumb.php");?>

    <div class="container-fluid">
    
        <div class="row-fluid">
        
         <?php show_message();?>
         
            <div class="btn-toolbar">
               
                
                <div class="btn-group">
                </div>
                
            </div>
            <div class="well">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Day Types</th>
                            <th>No of signup</th>
                            <th>Status</th>
                            
                            <th style="width: 26px;"></th>
							  <th style="width:66px;"></th>
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
                             <td><?php echo $un_qry['course_name']?></td>
                            <td><?php echo $result['start_date']?></td>
                            <td><?php echo $result['end_date']?></td>
                            <td><?php echo $result['day_type']?></td>
                            <td><?php echo $result['no_of_sign_up']?></td>
                            <td><?php if($result['training_stat']=='O'){
									echo 'Open';
									}
									else if($result['training_stat']=='C'){
									echo 'Closed';
									}
									?></td>
                            <td>
                            <a href="<?php echo pg_link("mode=training&pg=edit_schedule&edit_id=".$result['course_training_id'])?>" title="Edit"><i class="icon-pencil"></i></a>
                           
                            </td>
							
							
							
							<td>
							   <?php
							   if(date("Y-m-d")> $result['end_date']){
							   ?>
                            	<a href="javascript:;;" onClick="javascript:hide_course('<?php echo pg_link("mode=training&pg=open_training_list&start=".$start."&edit_id=".$result['course_training_id'])?>');" title="hide">Hide this course</a>
                           	<?php
							}
							?>
                            </td>
                        </tr>
             <?php }?>           

                    </tbody>
                </table>
            </div>
            <div class="pagination"><?php echo $paging_table?> </div>
           
        
            
        
        
          <?php include("./include/footer.php");?>
        
        </div>
    </div>
</div>
    <script language="javascript">
	function hide_course(url)
	{
		if(confirm('Are you sure to hide this course?'))
		{
			window.location.href=url;
		}
	
	}
	</script> 
  </body>
</html>