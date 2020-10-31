 <?php
 
 if(isset($del))
 {
		$str = mysqli_query($con, "select count(*) as ct from refresher_training_schedules where refresher_training_id = '".$refresher_training_id."' and booking_status='Y'");
		$result = mysqli_fetch_array($str);
		if($result['ct']==0)
		{
			$str = mysqli_query($con, "delete from refresher_training where refresher_training_id = '".$refresher_training_id."'");
			set_message("Deleted Successfully","SUCC");
			red_url("mode=training&pg=refresher_training_list&training_day=".$training_day);
		}
		else
		{
			set_message("Booking exists for this slot","ERR");
		}
 }
 $pg_head = 'training_list';
 	if($_POST)
	{
	
		if(!value_check($m4761atime)){
			set_message("Please Select Start Time","ERR");
		}else {
			$end_time = date(' H:i:s', strtotime($m4761atime . ' + '.$duration.' Hours'));
		
		
		
		
			
			
			$str = mysqli_query($con, "SELECT count(*) as ct FROM `refresher_training` WHERE `start_time` <= '".$end_time."' and `end_time` >= '".$end_time."'  and `training_day`='".$training_day."'");
			$result = mysqli_fetch_array($str);
			if($result['ct']==0)
			{
			
				$qr = "INSERT  refresher_training SET
				training_day			=	'".add_trim($training_day)."',
				start_time				=	'".add_trim($m4761atime)."',
				end_time				=	'".add_trim($end_time)."',
				slot_duration			=	'".add_trim($duration)."'";
			
			
				mysqli_query($con, $qr);
				set_message("Added Successfully","SUCC");
				red_url("mode=training&pg=refresher_training_list&training_day=".$training_day);
			}
			else
			{
				
				set_message("End Time Already Alotted","ERR");
				red_url("mode=training&pg=refresher_training_list&training_day=".$training_day);
				
			}
		}
		
	}
	
	
	if($training_day==1){
		$day ='Monday';
	}
	else if($training_day==2){
		$day ='Tuesday';
	}else if($training_day==3){
		$day ='Wednesday';
	}else if($training_day==4){
		$day ='Thursday';
	}else if($training_day==5){
		$day ='Friday';
	}else if($training_day==6){
		$day ='Saturday';
	}else if($training_day==7){
		$day ='Sunday';
	}
	$rem_hr='';
	$str4 = mysqli_query($con, "select * from refresher_training  where training_day='".$training_day."'");
	while($result4 = mysqli_fetch_array($str4)){
		if($rem_hr!='')
			$rem_hr.=',';
		$rem_hr.="'".$result4['start_time']."'";	
		if($result4['slot_duration']==2){
			//$rem_hr.= ','.date("'H:i:s'", strtotime($result4['start_time'] . ' - 1 Hours'));
			//$rem_hr.= ','.date("'H:i:s'", strtotime($result4['start_time'] . ' + 1 Hours'));
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
    
        <h1 class="page-title">Refresher Training Slot On <?php echo $day?></h1>
    </div>

   
    <?php $ind=1;
	include("./include/breadcrumb.php");?>
   
   

    <div class="container-fluid">
        <div class="row-fluid">
        
        <?php show_message();?>
        
           
            
            <div class="well">
            
                <ul class="nav nav-tabs">
                   
                    <li <?php if($training_day==1){ ?> class="active" <?php } ?> ><a href="<?php echo pg_link("mode=training&pg=refresher_training_list&training_day=1")?>" >Monday</a></li>
					 <li <?php if($training_day==2){ ?> class="active" <?php } ?>><a href="<?php echo pg_link("mode=training&pg=refresher_training_list&training_day=2")?>">Tuesday</a></li>
					 <li <?php if($training_day==3){ ?> class="active" <?php } ?>><a href="<?php echo pg_link("mode=training&pg=refresher_training_list&training_day=3")?>">Wednesday</a></li>
					 <li <?php if($training_day==4){ ?> class="active" <?php } ?>><a href="<?php echo pg_link("mode=training&pg=refresher_training_list&training_day=4")?>">Thursday</a></li>
					 <li <?php if($training_day==5){ ?> class="active" <?php } ?>><a href="<?php echo pg_link("mode=training&pg=refresher_training_list&training_day=5")?>">Friday</a></li>
					 <li <?php if($training_day==6){ ?> class="active" <?php } ?>><a href="<?php echo pg_link("mode=training&pg=refresher_training_list&training_day=6")?>">Saturday</a></li>
					 <li<?php if($training_day==7){ ?> class="active" <?php } ?> ><a href="<?php echo pg_link("mode=training&pg=refresher_training_list&training_day=7")?>">Sunday</a></li>
                </ul>
                
                <div id="myTabContent" class="tab-content">
                
                    <div class="tab-pane active in" id="home">
                       
                        <form  name="reg_form" id="reg_form" method="post" action="">
                        
                        
                        
                         
                        <label><strong>Start Time</strong></label>
                       <select name="m4761atime" id="m4761atime" >
					   <?php
					   	$strr ='';
					   if($rem_hr)
					   	$strr	=	' where st_time not in ('.$rem_hr.')';
					   
					  	 $str = mysqli_query($con, "select * from refresher_start_time  ".$strr."	  order by id");
						while($result = mysqli_fetch_array($str)){
							 //if($training_day==5 || $training_day==6){
							   
									?>
								   <option value="<?php echo $result['st_time']?>"><?php echo $result['time_label']?></option>
								  <?php
								
							//}
							//else
							//{
								if($result['st_time']!='17:00:00'){
								?>
								   <option value="<?php echo $result['st_time']?>"><?php echo $result['time_label']?></option>
								  <?php
							  }
							//}
					  }
					  ?>
						</select>
                     
                        <label><strong>Duration</strong></label>
                       <select name="duration">
					   <?php
					  // if($training_day==5 || $training_day==6){
					   ?>
					   <option value="1" >1</option>
					   <?php
					  // }
					  // else
					  // {
					   ?>
					   <option value="2">2</option>
					   <?php
					  // }
					   ?></select>
                        
                  <div class="btn-toolbar">
                <button class="btn btn-primary" type="submit" onClick="document.reg_form.submit()"><i class="icon-save"></i> Save</button>
              
                   
            </div>
                      
                        
                        </form>
                    </div>
                    
                    
                   
                </div>
            
            </div>
			
			
			
			
        <div class="well">
				    <h3 >Refresher Training Slot List On <?php echo $day?></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            
                            <th>Start Time</th>
                            <th>End Time</th>
                            
                            <th>Duration</th>
                             <th></th>
 <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
            <?php 
			$cnt=0;
			$univ = mysqli_query($con, "select * from refresher_training  where training_day='".$training_day."' order by start_time ");
			while($result = mysqli_fetch_array($univ)){
				$cnt++;
				?>
                    
                        <tr>
                            <td><?php echo $cnt?></td>
                             <td><?php echo date("g A", strtotime($result['start_time']))?></td>
                            <td><?php echo date("g A", strtotime($result['end_time']))?></td>
                            <td><?php echo $result['slot_duration']?></td>
<td> <a href="<?php echo pg_link("mode=training&pg=edit_refresher_training_list&training_day=".$training_day."&refresher_training_id=".$result['refresher_training_id']."&start=".$start)?>" title="Edit">Edit</a></td>
                           <td> <a href="<?php echo pg_link("mode=training&pg=refresher_training_list&training_day=".$training_day."&refresher_training_id=".$result['refresher_training_id']."&del=true&start=".$start)?>" title="Delete">Delete</a></td>
                        </tr>
             <?php }?>           

                    </tbody>
                </table>
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
$
</script>
  
  </body>
</html>


