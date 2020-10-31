<?php 
function add_booking($post,$conn){
	$booking_name = $post["booking_name"];
	$nationality = $post["nationality"];
	$nric_passport_no = $post["nric_passport_no"];
	$phone = $post["phone"];
	$email = $post["email"];
//	$address = $post["address"];
//	$noks_name = $post["noks_name"];
	$noks_phone = $post["noks_phone"];
//	 $course_id = $post["course"];
	$course_training_id = $post["course_training_id"];
	$registering_as = $post["registering_as"];
	$voucher_code = $post["groupon"];
	$groupon_security_code = $post["groupon_security_code"];
	$course_name = $post["course"];
	$preferred_date = $post["preferred_date"];
//	$amount = $post["amount"];
//	$payable_amount = $post["payable_amount"];
	//$booking_status = $post["booking_status"]; 
	//return "dddd";
	
	$str15 = mysqli_query($conn, "select * from training_schedules where course_training_id= '".$course_training_id."'");
			$result_batch = mysqli_fetch_array($str15);
	
	$sql	= 	"INSERT  booking_details SET 
			booking_name		=	'".trim($booking_name)."',
			nationality			=	'".trim($nationality)."',
			nric_passport_no	=	'".trim($nric_passport_no)."',
			phone				=	'".trim($phone)."',
			email				=	'".trim($email)."',
			noks_phone				=	'".trim($noks_phone)."',
			registering_as		=	'".trim($registering_as)."',
			voucher_code		=	'".trim($voucher_code)."',
			groupon_security_code		=	'".trim($groupon_security_code)."',
			course_name		=	'".trim($course_name)."',
			course_id			=	'".trim($result_batch['course_id'])."', 
			course_training_id	=	'".trim($course_training_id)."',
			preferred_date		=	'".trim($preferred_date)."',
			booking_status		=	'N',
			created_date		=	'".date("Y-m-d")."'";

if (mysqli_query($conn, $sql)) {
  //  echo "New record created successfully";
	 $booking_id = mysqli_insert_id($conn);
	 if($registering_as =='FAVE' || $registering_as =='Groupon(Full Course)' || $registering_as =='Groupon(Only Simulator practical)'){
				$qr	= 	"UPDATE  training_schedules SET 
				no_of_sign_up	=	no_of_sign_up+1 where course_training_id='".$course_training_id."' and limit_stat='Y'";
				mysqli_query($conn, $qr);
				
				if(($result_batch['no_of_sign_up']+1)>=$result_batch['max_limit'] &&  $result_batch['limit_stat'] =='Y')
				{
					$qr	= 	"UPDATE  training_schedules SET 
					training_stat	=	'C' where course_training_id='".$course_training_id."' ";
					mysqli_query($conn, $qr);
				}
				$qr	= 	"UPDATE  booking_details SET 
				booking_status	=	'Y' where booking_id='".$booking_id."' ";
				mysqli_query($conn, $qr);
			}		
			if($registering_as =='Group of 3 or more')
			{
				for($i=0;$i<count($post["memberName"]);$i++){
				$sql	= 	"INSERT  group_members SET 
			booking_id		=	'".trim($booking_id)."',
			member_name			=	'".trim($post["memberName"][$i])."',
			member_ic	=	'".trim($post["memberIC"][$i])."',
			member_email				=	'".trim($post["memberEmail"][$i])."'";

mysqli_query($conn, $sql);
				}
			}	
			header("location:registration_ppcdl_confirm.php?booking_id=".$booking_id);
			
			exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

function add_practical_refresher($post,$conn){
	$sql	= 	"INSERT  refresher_training_schedules SET 
				name			=	'".trim($post["booking_name"])."', 
				email			=	'".trim($post["email"])."', 
				phone			=	'".trim($post["phone"])."', 
				booking_date			=	'".date("Y-m-d",strtotime($post["preferred_date"]))."', 
				refresher_training_id			=	'".trim($post["refresher_training"])."', 
				course_to_attend			=	'".trim($post["course"])."', 
				created_date		=	'".date("Y-m-d")."'";
				mysqli_query($conn, $sql);
				
				$booking_id = mysqli_insert_id($conn);
				//echo mysqli_info($conn); 
				header("location:practical_refresher_confirm.php?booking_id=".$booking_id);
}
?>