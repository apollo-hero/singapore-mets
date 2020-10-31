 <?php 
	include("includes/config.php");
	include("includes/function.php");
?>
  <div class="box_registration" style="padding-top:6px;" id="spba_schedule">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_four">
					<?php
					$ct=0;
					$str15 =mysqli_query($con, "select * from training_schedules where course_id='".$_POST["course_id"]."' and start_date >= '".date("Y-m-d")."' and training_stat='O' and stat='Y' order by start_date asc");
					 while($result_batch = mysqli_fetch_array($str15)){
					$ct++;
						if($ct==1)
							echo '<tr>';
							$timestamp = strtotime($result_batch['start_date']);
							$start_date = date('d', $timestamp); 
							$start_month = date('M', $timestamp); 
							
							
							$timestamp2 = strtotime($result_batch['end_date']);
							$end_date = date('d', $timestamp2); 
							$end_month = date('M', $timestamp2); 
							if($start_month == $end_month)
							{
								$training  = $start_date." - ".$end_date . " ".$start_month." (".($result_batch['day_type']).")";
							}
							else
							{
								$training  = $start_date." ".$start_month." - ".$end_date . " ".$end_month." (".($result_batch['day_type']).")";
							}
							
							
					
					?>	
								<td><a onclick="updateDate('<?=$training?>','<?=($result_batch['course_training_id'])?>'); return false"><?=$training?></a></td>
								
						<?php
						if($ct==2){
							echo '</tr>';
							$ct=0;
							}
						} 
						?>		
									
					</table>
               </div>
			   <script>
			   function updateDate(date,id){
$('#preferred_date').val(date);				
$('#course_training_id').val(id);				
				}
			   </script>