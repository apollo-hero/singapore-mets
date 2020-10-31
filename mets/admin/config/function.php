<?php

if($_POST)
	extract($_POST);
if($_GET)
	extract($_GET);

$MYSQL_ERRNO='';
$MYSQL_ERROR='';

function db_connect(){
	global $dbhost,$dbusern,$dbuserp,$default_dbname;
	global $MYSQL_ERRNO,$MYSQL_ERROR;
	$con_id=mysqli_connect($dbhost,$dbusern,$dbuserp);
	if(!$con_id){
		$MYSQL_ERRNO=0;
		$MYSQL_ERROR="Connection failed to the host $dbhost";
		return 0;
	} else if (empty($dbname) && !mysqli_select_db($con_id,$default_dbname)){
			$MYSQL_ERRNO=mysqli_errno($con_id);
			$MYSQL_ERROR=mysqli_error($con_id);
			return 0;
	}else return $con_id;
}
	
function sql_error(){
		global $MYSQL_ERRNO,$MYSQL_ERROR;
		if(empty($MYSQL_ERROR)){
			$MYSQL_ERRNO=mysqli_errno($con_id);
			$MYSQL_ERROR=mysqli_error($con_id);
		} return "$MYSQL_ERRNO: $MYSQL_ERROR";
}

$con_id		=	db_connect();
if(!$con_id) die(sql_error());



if(isset($anp))
	parse_str(base64_decode(base64_decode($anp)));	

function url_encode($url){
	$en=0;
	if($en)
		return "anp=".base64_encode(base64_encode($url));
	else
		return $url;
}

function red_url($url){
		$page	=	"home.php?".url_encode($url);
		header('Location:'.$page);
		exit;	
}

function set_message($msg,$type)
{
	$_SESSION['ERR_MSG']	=	$msg;
	$_SESSION['ERR_TYP']	=	$type;
}

function del_message()
{
	unset($_SESSION['ERR_MSG']);
	unset($_SESSION['ERR_TYP']);
}

function show_message()
{
	$msg = '';
	$type = '';
	if(isset($_SESSION['ERR_MSG'])){
	$msg	=	$_SESSION['ERR_MSG'];
	}
	if(isset($_SESSION['ERR_TYP'])){
	$type	=	$_SESSION['ERR_TYP'];
	}
	if($type=='SUCC')
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Well done!</strong> '.$msg.'</div>';
	else if($type=='ERR')
		echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Warning!</strong> '.$msg.'</div>';
}

function pg_link($url)
{
   if($url) 
   		$ret	=	"home.php?".url_encode($url);
   else
   		$ret	=	"home.php";
   return $ret;
}

function admin_auth()
{
	if(!$_SESSION["ADMIN_AREA"] || $_SESSION["ADMIN_AREA"]!="Active")
		header('Location:login.php?msg=logout'); 
}

function pagedisplay($start,$argu2,$nur,$argu1,$seltab)  
{ 
		global $mode,$pg,$con_id;
		$argu2	=	'mode='.$mode.'&pg='.$pg.$argu2;
		if(!$start)
			$start=0;
		$seltab	=	strtolower($seltab);
		$cut_qr = 	strstr($seltab, 'from');
		$Selqr	= 	mysqli_query($con_id,"SELECT count(*) as cnt ".$cut_qr);
		$res3	= 	mysqli_fetch_array($Selqr);
		$no		=   $res3['cnt'];//total number of record
		$qr		=	$seltab." limit ".$start.",".$nur;
		$res22	= 	mysqli_query($con_id,$qr);
		$nopages   =   ceil($no/$nur);					    // Number of records per page is 10   
	
		$str="";
	   $str.="<ul>";
	
	if($start==0)									       //Print previous link 
	  {
	  $str.='<li><a href="javascript:;">Prev</a></li>'; 
	  }
	else
	 {
	  $previous  =  $start - $nur; 
	  $path=$argu1.".php?".$argu2."&start=".$previous;
	  $str.='<li><a href="'.$path.'">Prev</a></li>'; 
	 }
$currentpage = 0;
	for($i=0,$j=1;$i<$no;$i=$i+$nur,$j++)
	{
		if ($start==$i)
		{
			$currentpage=$j;
		}
	}
	
	if ($currentpage<10)
		$loopstart=0;
	else
		$loopstart=$currentpage-10;

	if($currentpage+10 > $nopages)
		$loopend=$nopages;
	else
		$loopend=$currentpage+10;
		
	for($k=$loopstart+1,$i=$loopstart;$i<$loopend;$i++,$k++)
	{
		if($k==$currentpage)
		{
			$str.='<li class="active" ><a href="javascript:;">'.$k.'</a></li>'; 
		}		
		else
		{
			$j=$i*$nur;
			$path=$argu1.".php?".$argu2."&start=".$j;
			$str.='<li><a href="'.$path.'">'.$k.'</a></li>'; 
			
		}
	}
	
	
	
	
	$current = ceil($start/$nur);
	$current=$current+1;
	
	if( $current < $nopages)
	 {
		 $next      =  $start + $nur;
		$path=$argu1.".php?".$argu2."&start=".$next;
	  	$str.='<li><a href="'.$path.'">Next</a></li>'; 
	 }
	else
	{
	 $str.='<li><a href="javascript:;;">Next</a></li>'; 
	}
	 $str.="</ul>";
	 $res[0]	=	$res22;
	 $res[1]	=	$str;
	 $res[2]	=	$no;
	 
	 return $res;
}


function _prepare_url_text_for_cat($string)
{
	// remove all characters that aren't a-z, 0-9, dash, underscore or space
	$NOT_acceptable_characters_regex = '#[^-a-zA-Z0-9_ ]#'; 
	$string = preg_replace($NOT_acceptable_characters_regex, '', $string);
	// remove all leading and trailing spaces
	$string = trim($string);
	//make all letters small 
	$string = strtolower($string);
	// change all dashes, underscores and spaces to dashes
	$string = preg_replace('#[-_ ]+#', '-', $string);
	// return the modified string 
	return $string;
}
function add_trim($string)
{
	return	trim(addslashes($string));
}

function strip($string)
{
	return	stripslashes($string);
}

function add_trim_upper($string)
{
	return	strtoupper(trim(addslashes($string)));
}



function thumbnail($image_path,$thumb_path,$image_name,$MAX_WIDTH,$MAX_HEIGHT,$mode="",$new_name="",$cropped=0)
{
	//echo $MAX_WIDTH;echo "<br>";
	//echo $MAX_HEIGHT;
	$sImage = $image_path.$image_name;
	if($new_name)
	{
		$dImage = $thumb_path.$new_name;
	}
	else
	{
		$dImage = $thumb_path.$image_name;
	}
/*if($new_name)
	{
	$sImage = $image_path.$new_name;
	}
*/	//echo $sImage;
	/* get source image size */
	$src_size = getimagesize($sImage );
	
	/* resize the image (if needed) */
	$ext = strtolower(substr( $sImage, strrpos( $sImage, '.' ) + 1 ));
			
	if ( $ext == 'jpg' || $ext == 'jpeg' )
		$img_type = "jpg";
	else if ( $ext == 'gif' )
		$img_type = "gif";
	else if ( $ext == 'png' )
		$img_type = "png";
	else
		die( 'Unsupported source file format' );
	
	
	if ($cropped==0) 
	{
		if ( $src_size[0] > $MAX_WIDTH && $src_size[1] > $MAX_HEIGHT )
		{
				if ( $src_size[0] > $src_size[1] )
				{
					if ($src_size[0]>=$MAX_WIDTH)
					{
						if ($src_size[1]>=$MAX_HEIGHT)
						{
							$dest_width = $MAX_WIDTH;
							$dest_height = ($dest_width * $src_size[1]) / $src_size[0];
						
						}
						else 
						{
							$dest_width = $MAX_HEIGHT;
							$dest_height  = ($dest_width * $src_size[1]) / $src_size[0];
						}
					}
					else 
					{
						$dest_height = $src_size[1];
						$dest_width  = $src_size[0];
					}
				}
				else
				{
					if ($src_size[1]>=$MAX_HEIGHT)
					{
						if ($src_size[0]>=$MAX_WIDTH)
						{
							$dest_height = $MAX_WIDTH;
							$dest_width  = ($dest_height * $src_size[0]) / $src_size[1];
						}
						else 
						{
							$dest_height = $MAX_HEIGHT;
							$dest_width  = ($dest_height * $src_size[0]) / $src_size[1];
						}
					}
					else 
					{
						$dest_height = $src_size[1];
						$dest_width  = $src_size[0];
					}
				}
			//}
		}
		else if ( $src_size[0] > $MAX_WIDTH )
		{
			$dest_width = $MAX_WIDTH;
			$dest_height = ( $src_size[1] * $MAX_WIDTH ) / $src_size[0];
		}
		else if ( $src_size[1] > $MAX_HEIGHT )
		{
			$dest_width = ( $src_size[0] * $MAX_HEIGHT ) / $src_size[1];
			$dest_height = $MAX_HEIGHT;
		}
		else
		{
			$dest_width  = $src_size[0];
			$dest_height = $src_size[1];
		}
	
	
			//$dest_width  = $MAX_WIDTH;
			//$dest_height = $MAX_HEIGHT;
	
		if ( extension_loaded( 'gd' ) )
		{
		   
			/* check the source file format */
			$ext = strtolower(substr( $sImage, strrpos( $sImage, '.' ) + 1 ));
			
			if ( $ext == 'jpg' || $ext == 'jpeg' )
			$src = imagecreatefromjpeg( $sImage ) or die( 'Cannot load input JPEG image' );
			else if ( $ext == 'gif' )
			$src = imagecreatefromgif( $sImage ) or die( 'Cannot load input GIF image' );
			else if ( $ext == 'png' )
			$src = imagecreatefrompng( $sImage ) or die( 'Cannot load input PNG image' );
			else
			die( 'Unsupported source file format' );
	
			/* create and output the destination image */
	
			
			$dest = imagecreatetruecolor( $dest_width, $dest_height ) or die( 'Cannot initialize new GD image stream' );
			
			// For placing a white background for Transparent images
			$back = imagecolorallocate($dest, 255, 255, 255);
			imagefilledrectangle($dest, 0, 0, $dest_width - 1, $dest_height - 1, $back);
			// End - By Retheesh on 21/12/2007
			
			imagecopyresampled( $dest, $src, 0, 0, 0, 0, $dest_width, $dest_height, $src_size[0], $src_size[1] );
			
	
			/* The following code commented for GIF conversion
			if($global["product_imagetype"] == 'same') {
			if( (imagetypes() & IMG_PNG ) && ($ext == 'png' ) )
			{
			imagepng( $dest,$dImage);
			}
			else if ( (imagetypes() & IMG_JPG ) && ( $ext == 'jpg' || $ext == 'jpeg' ) )
			{
			imagejpeg( $dest,$dImage);
			}
			else if ( (imagetypes() & IMG_GIF ) && ( $ext == 'gif' ))
			{
			imagegif( $dest,$dImage);
			} else print 'Cannot find a suitable output format';
			}*/
	
			if( (imagetypes() & IMG_PNG ) && ($ext == 'png' || $ext == 'PNG' ) ) {
				imagepng( $dest,$dImage);
			} else if ( (imagetypes() & IMG_JPG ) && ( $ext == 'jpg' || $ext == 'jpeg' ) ) {
				imagejpeg( $dest,$dImage,100);
			} else if ( (imagetypes() & IMG_GIF ) && ( $ext == 'gif' || $ext == 'GIF' )) {
				imagegif( $dest,$dImage);
			} else print 'Cannot find a suitable output format';
	
		} # Close if loaded GD Package
		else print 'GD-library support is not available';
	}
	else
	{
		cropImage($MAX_WIDTH,$MAX_HEIGHT,$sImage,$img_type,$dImage);
	}

	/* destroy the buffer of the image in order to free up used memory */
	//imagedestroy();

	return true;
}


function cropImage($nw, $nh, $source, $stype, $dest) {
	$size = getimagesize($source);
	$w = $size[0];
	$h = $size[1];
	switch($stype) {
		case 'gif':
		$simg = imagecreatefromgif($source);
		break;
		case 'jpg':
		$simg = imagecreatefromjpeg($source);
		break;
		case 'png':
		$simg = imagecreatefrompng($source);
		break;
	}
	$dimg = imagecreatetruecolor($nw, $nh);
	$wm = $w/$nw;
	$hm = $h/$nh;
	$h_height = $nh/2;
	$w_height = $nw/2;
	if($wm> $hm) {
		$adjusted_width = $w / $hm;
		$half_width = $adjusted_width / 2;
		$int_width = $half_width - $w_height;
		imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
	} elseif(($wm <$hm) || ($wm == $hm)) {
		$adjusted_height = $h / $wm;
		$half_height = $adjusted_height / 2;
		$int_height = $half_height - $h_height;
		imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
	} else {
		imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
	}
	
	switch($stype) 
	{
		case 'gif':
			imagegif($dimg,$dest);
		break;
		case 'jpg':
			imagejpeg($dimg,$dest,100);
		break;
		case 'png':
			imagepng($dimg,$dest);
		break;
	}
	
	
}
function ret_sql_date($date)
{
	if($date){
		$dt_ar= explode("-",$date);
		if(!$dt_ar[2])
			$dt_ar= explode("/",$date);
		//$test3 = new DateTime($month.'/01/'.$year);			
		$test = new DateTime($dt_ar[1].'/'.$dt_ar[0].'/'.$dt_ar[2]);
		return date_format($test, 'Y-m-d');	
	}
	else
		return '';
}

function pg_sql_date($date)
{
	if($date){
		$dt_ar= explode("-",$date);
		$test = new DateTime($dt_ar[1].'/'.$dt_ar[2].'/'.$dt_ar[0]);
		return date_format($test, 'd-m-Y');	
	}
	else
		return '';	
}


function email_check($email)
{
	if($email==''){
		return  false;
	}else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
		return  false;
	}else {
		
		return true;
	}
}
function num_check($num)
{ 
	if($num==''){
		return false;
	}else{
		return is_numeric($num);
	}
}
function value_check($val)
{ 
	if($val==''){
		return false;
	}else{
		return true;
	}
}
function valuelength_check($val)
{ 
	if(strlen($val)<3 || strlen($val)>255){
		return false;
	}else{
		return true;
	}
}
function price_display($val){
	return number_format($val, 2, ".", ",");
}

function cms_content($content_perma)
{
	$qr = mysqli_query($con_id,"select * from cms where cms_perma = '".$content_perma."'");
  	$res_qr = mysqli_fetch_array($qr);	
	
	$result[0]	=	$res_qr['cms_title'];
	$result[1]	=	$res_qr['cms_content'];
	$result[2]	=	$res_qr['cms_image'];
		
	return $result;
	
}

function cat_subcat($ads_id)
{
	$str = mysqli_query($con_id,"select * from qads_listing as a inner join qads_category as b on a.cat_id=b.id inner join qads_sub_category as c  on a.sub_cat_id=c.id where a.ads_id = '".$ads_id."'");
	$result = mysqli_fetch_array($str);
	
	$result[0] = $result['cat_name'];
	$result[1] = $result['cat_id'];
	$result[2] = $result['sub_cat_name'];
	$result[3] = $result['sub_cat_id'];
	
	return $result;
	

}
function category ($subcat_id)
{
	$str = mysqli_query($con_id,"select b.cat_name,b.id from qads_sub_category as a,qads_category as b where a.cat_id=b.id and a.id='".$subcat_id."'");
    $res_str = 	mysqli_fetch_array($str);
	
	$res_str[0] = $res_str['cat_name'];
	$res_str[1] = $res_str['id'];
	$res_str[2] = $res_str['sub_cat_name'];
	//$res_str[3] = $res_str['id'];
	
	return $res_str;
	
}
function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
}

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

?>