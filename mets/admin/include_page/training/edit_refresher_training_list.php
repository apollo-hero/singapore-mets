 <?php
 

 $pg_head = 'training_list';
 	if($_POST)
	{
	
		if(!value_check($m4761atime)){
			set_message("Please Select Start Time","ERR");
		}else {
			$end_time = date(' H:i:s', strtotime($m4761atime . ' + '.$duration.' Hours'));
		
			
			
			
			
			$qr = "UPDATE  refresher_training SET
			start_time				=	'".add_trim($m4761atime)."',
			end_time				=	'".add_trim($end_time)."' where refresher_training_id='".$refresher_training_id."'";
		
		
			mysqli_query($con, $qr);
			set_message("Updated Successfully","SUCC");
			red_url("mode=training&pg=refresher_training_list&training_day=".$training_day);
		}
		
	}
		$str = mysqli_query($con, "select count(*) as ct from refresher_training_schedules where refresher_training_id = '".$refresher_training_id."'");
		$result = mysqli_fetch_array($str);
		if($result['ct']>0)		
		{
		
			set_message("Not Editable, Booking exists for this slot","ERR");
			red_url("mode=training&pg=refresher_training_list&training_day=".$training_day);
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
	$str4 = mysqli_query($con, "select * from refresher_training  where training_day='".$training_day."' and refresher_training_id <> '".$refresher_training_id."'");
	while($result4 = mysqli_fetch_array($str4)){
		if($rem_hr!='')
			$rem_hr.=',';
		$rem_hr.="'".$result4['start_time']."'";	
		if($result4['slot_duration']==2){
			$rem_hr.= ','.date("'H:i:s'", strtotime($result4['start_time'] . ' - 1 Hours'));
			$rem_hr.= ','.date("'H:i:s'", strtotime($result4['start_time'] . ' + 1 Hours'));
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
            
              
                
                <div id="myTabContent" class="tab-content">
                
                    <div class="tab-pane active in" id="home">
                       
                        <form  name="reg_form" id="reg_form" method="post" action="">
                        
                        
                        
                         
                        <label><strong>Start Time</strong></label>
                       <select name="m4761atime" id="m4761atime" >
					   <?
					   	$strr ='';
					   if($rem_hr)
					   	$strr	=	' where st_time not in ('.$rem_hr.')';
					   
					  	 $str = mysqli_query($con, "select * from refresher_start_time  ".$strr."	  order by id");
						while($result = mysqli_fetch_array($str)){
							 if($training_day==5 || $training_day==6){
							   
									?>
								   <option value="<?php echo $result['st_time']?>"><?php echo $result['time_label']?></option>
								  <?
								
							}
							else
							{
								if($result['st_time']!='17:00:00'){
								?>
								   <option value="<?php echo $result['st_time']?>"><?php echo $result['time_label']?></option>
								  <?
							  }
							}
					  }
					  ?>
						</select>
                     
                        <label><strong>Duration</strong></label>
                       <select name="duration">
					   <?
					   if($training_day==5 || $training_day==6){
					   ?>
					   <option value="1" >1</option>
					   <?
					   }
					   else
					   {
					   ?>
					   <option value="2">2</option>
					   <?
					   }
					   ?></select>
                        
                  <div class="btn-toolbar">
                <button class="btn btn-primary" type="submit" onClick="document.reg_form.submit()"><i class="icon-save"></i> Save</button>
              
                   
            </div>
                      
                        
                        </form>
                    </div>
                    
                    
                   
                </div>
            
            </div>
			
			
			
			

        
        
        
        	<?php include("./include/footer.php"); ?>
            
        </div>
    </div>
</div>

  
  </body>
</html>


