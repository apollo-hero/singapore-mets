<?
include("config/config.php");
include("config/function.php");
if($_SESSION['ADMIN']!= 'Admin')
{
	set_message('Invalid area','ERR');
header("location:logout.php");
exit;
}
echo $pg;

if($pg && $mode)
{
	if(file_exists("include_page/".$mode."/".$pg.".php")){
		include("include_page/".$mode."/".$pg.".php");
	}
	else
		include("include_page/comm/dashboard.php");
} 

else
	include("include_page/comm/dashboard.php");	
 del_message();
?>





