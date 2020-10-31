<?php
$site_url = "http://gaap1.com/metsSite/";
$con = mysqli_connect("localhost","mets1_vbis","vb!$!nd!@","mets1_mets");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
