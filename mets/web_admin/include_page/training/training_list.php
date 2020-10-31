<?php include("./include/top_bar.php");
      include("./include/sidebar_nav.php");     
if($edit_id){
	$str33 = mysql_query("select * from training_schedules where course_training_id = '".$edit_id."'");
	$result3 = mysql_fetch_array($str33);
	if($result3['stat']=='N')
		$ch_stat	=	'Y';
	else
		$ch_stat	=	'N';	
	$qr = "UPDATE   training_schedules SET
	stat			=	'".$ch_stat."'
	where  course_training_id		=  '".$edit_id."'";
	mysql_query($qr);
	set_message("Updated Successfully","SUCC");
	red_url("mode=training&pg=training_list&start=".$start);
}
$argu2	= 	'';
$limit	=	10;
$seltab	=	"select * from training_schedules order by course_training_id desc";	
list($res_query, $paging_table,$total_record)	= pagedisplay($start,$argu2,$limit,'home',$seltab) ;
?>    
<div class="content">

    <div class="header">
    
        <h1 class="page-title">Training Schedule List</h1>
    </div>

     <?php include("./include/breadcrumb.php");?>

    <div class="container-fluid">
    
        <div class="row-fluid">
        
         <?php show_message();?>
         
            <div class="btn-toolbar">
                <a href="<?=pg_link("mode=training&pg=add_schedule")?>"  title="Add New Faculty" class="btn btn-primary"><i class="icon-plus"></i> New Schedule</a>
                
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
                            <th style="width:126px;"></th>
                        </tr>
                    </thead>
                    
                    <tbody>
            <?php 
			$cnt=0;
			while($result = mysql_fetch_array($res_query)){
				$cnt++;
				
				$univ = mysql_query("select course_name from course where course_id = '".$result['course_id']."'");
				$un_qry = mysql_fetch_array($univ);
				?>
                    
                        <tr>
                            <td><?=$cnt?></td>
                             <td <? if($result['stat']=='Y'){ ?>style="color:#009900; "<? } ?>><?=$un_qry['course_name']?></td>
                            <td><?=$result['start_date']?></td>
                            <td><?=$result['end_date']?></td>
                            <td><?=$result['day_type']?></td>
                            <td><?=$result['no_of_sign_up']?></td>
                            <td><? if($result['training_stat']=='O'){
									echo 'Open';
									}
									else if($result['training_stat']=='C'){
									echo 'Closed';
									}
									?></td>
                            <td>
                            <a href="<?=pg_link("mode=training&pg=edit_schedule&edit_id=".$result['course_training_id'])?>" title="Edit"><i class="icon-pencil"></i></a>
                           
                            </td>
							
							   <td>
							   <?
							   if($result['stat']=='Y'){
							   ?>
                            	<a href="javascript:;;" onClick="javascript:hide_course('<?=pg_link("mode=training&pg=training_list&start=".$start."&edit_id=".$result['course_training_id'])?>');" title="hide">Hide this course</a>
                           	<?
							}
							else
							{
							?>
							
							<a href="javascript:;;" onClick="javascript:hide_course('<?=pg_link("mode=training&pg=training_list&start=".$start."&edit_id=".$result['course_training_id'])?>');" title="Show">Show this course</a>
							<?
							}
							?>
                            </td>
                        </tr>
             <? }?>           

                    </tbody>
                </table>
            </div>
            <div class="pagination"><?=$paging_table?> </div>
           
        
            
        
        
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


