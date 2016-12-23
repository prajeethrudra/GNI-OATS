<?php
session_start();
mysql_connect("localhost","root","") or die();
mysql_select_db("oats") or die();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en"><head><script id="twitter-wjs" src="https://platform.twitter.com/widgets.js"></script>
<meta charset="utf-8">
<title>GNI ONLINE ASSESMENT TEST</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Google Fonts -->
<link href="http://fonts.googleapis.com/css?family=Lato:400,700,300" rel="stylesheet" type="text/css">
<!--[if IE]>
	<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
<![endif]-->

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
<![endif]-->
<style type="text/css">
</style></head>

<body data-twttr-rendered="true">
<!--header-->
	<div class="header">
		<!--logo-->
	  <div class="container">
					<div class="logo">
						 <a href="index.php">
	<h1 class="title" style="color:#f5f5f5;">GNI O.A.T</h1></a>  
			  </div>
					<!--menu-->
								</div>
		</div>
	<!--//header-->
	<!--page-->    
    	<div id="banner">
	<div class="container intro_wrapper">
	<div class="inner_content">
	<h1>LOGIN</h1>
 <!--
	<h1 class="title">Current Openings</h1>
	<h1 class="intro">
 </h1>-->

<?php

if(isset($_POST['login']))
{

	$username=$_POST['rollno'];
	$password=$_POST['password'];
if($username=="admin"&&$password=="rock"){
	
         	$_SESSION['username']=$username;
	header("Location:createtest.php");
}
	if($username&&$password)
	{

      $login=mysql_query("SELECT * FROM users WHERE rollnumber='$username'");
      while ($row=mysql_fetch_assoc($login))
       {
         $db_password=$row['password'];
         if(md5($password)==$db_password)
         { $loginok=TRUE;}
         
         if($loginok==TRUE)
         {   
         	$_SESSION['username']=$username;

         	header("Location:testselection.php");
         	exit();

         }	
         else
         	die("incorrect");
      }
	}

} 
?>
	</div>
		</div>
			</div>
			<div class="pad30"></div>
			<div class="container wrapper">
			<div class="inner_content">
	
	<div class="row">
	<div class="span12">
         <div class="bs-docs-example">
              <div id="accordion" class="accordion">


								<div class="accordion-group" style="height:500px;;">
                    <form action="index.php" method="POST">       
                                   <div style="background-color:#2b3c4e;  width:300px;height:auto;border:0px solid #ccc;margin:auto;margin-top:20px; padding:20px;">
                                             <h2 class="title" style="color:#f5f5f5;">ROLL NO</h2>
                            <input type="text" style=" height:20px; width:280px;" name="rollno" />
                                             <h2 class="title" style="color:#f5f5f5;">PASSWORD</h2>
                             <input type="password" style=" height:22px; width:280px;" name="password" /><br/>
                             <input type="submit" name="login" class="big_button" style="margin-top:20px;margin-bottom:20px;" value="Submit"/>
                                            <input type="reset" class="big_button"/><br/>
                                            <p style="color:#fff;font-size:20px;">Click <a href="signup.php">SignUp</a> to get registered</p>

          </div>
          </form>
 
	</div>
    </div>
	</div>
    </div>
  </div>

<!--//page-->
    
	<!--//page-->
		
		<div class="pad25 hidden-desktop"></div>
	
	
	<!-- footer -->
	<!-- footer 2 -->
	<div id="footer2">
		<div class="container">
			<div class="row">
				<div class="span12">
				<div class="copyright">By PrajeethRudra,GauravRawlyani,HariKrishna</div>
						</div>
					</div>
				</div>
					</div>
						
				<!-- up to top -->
				<a href="#"><i class="go-top hidden-phone hidden-tablet  icon-double-angle-up" style="display: none;"></i></a>
				<!--//end-->
<!-- scripts -->
<!--<script src="js/jquery.js"></script>	
<script type="text/javascript">
//<![CDATA[
	$("[data-rel=popover]").hover(function(){
	$(this).popover('toggle');
	});
	//]]>
	</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/superfish.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>-->
	 

</body></html>
