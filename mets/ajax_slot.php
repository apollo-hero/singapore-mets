 <?php 
	include("includes/config.php");
	include("includes/function.php");
	echo $preferred_date = date("Y-m-d", strtotime($_POST['preferred_date']));
			$day	=	date("N", strtotime($preferred_date));
			
			$str15 = mysqli_query($con, "select * from refresher_training where training_day= '".$day."' and refresher_training_id not in (select refresher_training_id from refresher_training_schedules where booking_status='Y' and booking_date='".$preferred_date."') order by start_time");
			if(mysqli_num_rows($str15) >0){ ?>
			<option value="">Select</option>
			<?php
					while($result_bat = mysqli_fetch_array($str15)){
					?>
					<option value="<?php echo $result_bat['refresher_training_id']?>"><?php echo date("g A", strtotime($result_bat['start_time']))?> - <?php echo date("g A", strtotime($result_bat['end_time']))?></option>
					<?php
					}
			}
			else
			{
			?>
			<option value="">No Slot Availabile for <?php echo $preferred_date?> </option>
			<?php
			}
?>