<?php
session_start();
ob_start();
//$timezone = "Asia/Singapore";
//if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$dbhost='localhost';
$default_dbname='mets1_mets';
$dbusern='mets1_vbis';
$dbuserp='vb!$!nd!@';

$map_key="";
$site_url	=	"http://gaap1.com/metsSite/";
$site_title	=	"";
$encode =0;

$con = mysqli_connect($dbhost,$dbusern,$dbuserp,$default_dbname);


?>
