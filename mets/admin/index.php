<?php
include("config/config.php");
include("config/function.php");
if($_POST)
{
	 $u_name = $_POST['username'];
	 $u_pass = $_POST['pswd'];
	
		/* if($u_name=="" || $u_pass==""){
			set_message('Invalid username or Password','ERR');
			header("location:index.php");
			exit;
		} */		
		//$u_pass=	md5($u_pass);
		if($u_name	==	'admin'){
			   $query="select count(*) as cnt from  admin_details where admin_name 	='admin' and admin_pass  ='".$u_pass."'";
		
			$res_query=mysqli_query($con,$query);
			$res_query2=mysqli_fetch_array($res_query);
			
			if ($res_query2['cnt']>0){
				$_SESSION['ADMIN']	=	'Admin';
				header("location:home.php");
				exit;
				}
			else
				{
					set_message('Invalid username or Password','ERR');
					header("location:index.php");
					exit;
				}
		}
	
}
else{
	$username = "";
$pswd = "";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>mets1</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
  



<div class="navbar">
        <div class="navbar-inner">
                <!--<ul class="nav pull-right">
                    
                  
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> Admin
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                           
                          
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>-->
                <a class="brand" href="#"><span class="first"></span> <span class="second"></span></a>
        </div>
    </div>



    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Sign In</p>
            <div class="block-body">
                <form name="signup_frm" id="signup_frm" method="post" action="">
                    <label>Username</label>
                    <input type="text"  name="username" id="username"  value="<?php echo $username; ?>" class="span12">
                    <label>Password</label>
                    <input type="password" name="pswd" id="pswd" value="<?php echo $pswd;?>" class="span12">
                    <button  type="submit" onClick="document.signup_frm.submit();" class="btn btn-primary pull-right">Sign In</button>
                   <!-- <label class="remember-me"><input type="checkbox"> Remember me</label>-->
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
       
    </div>
</div>


    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


