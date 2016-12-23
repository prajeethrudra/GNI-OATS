<?php
session_start();
include 'config.php';

if(isset($_SESSION['username'])){
$name=$_SESSION['username'];
if($name=="admin")	{
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
                    <nav id="main_menu">
					<div class="menu_wrap">
						<ul class="nav sf-menu sf-js-enabled sf-arrows">
				<li class="sub-menu"><a href="dashboard.php" class="sf-with-ul">Tests</a>
							</li>							
							<li class="last"><a href="questionset.php">QuestionSets</a></li>
							<li class="last"><a href="results.php">Results</a></li>
							
				<li class="sub-menu"><a href="logout.php" class="sf-with-ul">Logout</a>
							
							
						</ul>
					</div>
				</nav>
								</div>
		</div>
	<!--//header-->
	<!--page-->    
    	<div id="banner">
	<div class="container intro_wrapper">
	<div class="inner_content">
	<h1>TESTS</h1>
	<h2>welcome <?php echo $name; ?></h2>
    <a href="createtest.php"><input type="button" class="big_button" value="Create New Test" style="float:left;"/></a>
                                           
 <!--
	<h1 class="title">Current Openings</h1>
	<h1 class="intro">
 </h1>-->
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


								<div class="accordion-group" style="height:500px;padding:10px;">
                        <h2 class="title" style="color:#f5f5f5;">List of tests</h1>      
                       <div style="background-color:#2b3c4e;  width:1100px;height:auto;border:0px solid #ccc;margin:auto;margin-top:20px; padding:8px;"> 
<p class="title" style="color:#f5f5f5;float:left;position:relative; margin-right:500px;">Test Name</p> 
<a href="" style="padding-right:10px; float:;">SetName</a> <a href="" style="float:right;">Delete</a>
          </div>
<?php 

$query1 = mysql_query("select * from testdetails");
while ($fquery1=mysql_fetch_array($query1)) 
{
$testname=$fquery1['test_name'];
$setname=$fquery1['set_selected'];
?>
<form action="dashboard.php" method="post">
<div style="background-color:#2b3c4e;  width:1100px;height:auto;border:0px solid #ccc;margin:auto;margin-top:20px; padding:8px;"> 
<p class="title" style="color:#f5f5f5;float:left;position:relative; margin-right:500px;"><?php echo $testname; ?></p> 
<a href="" style="padding-right:10px; float:;"><?php echo $setname; ?></a>  <button style="float:right; background-color:transparent; border:none; color:#f1592a;" type="submit"
 name="del_ques" value="<?php echo $testname ?>" >Delete</button>
          </div>
</form>
<?php } ?>	
<?php
if(isset($_POST['del_ques']))
{
$pr=$_POST['del_ques'];
echo $pr."HAS BEEN DELETED";
mysql_query("DELETE FROM testdetails WHERE test_name='$pr'");
header("location:dashboard.php");
}
 ?>		


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
<!--<script src="js/jquery.js"></script>-->
<script type="text/javascript">
//<![CDATA[
	$("[data-rel=popover]").hover(function(){
	$(this).popover('toggle');
	});
	//]]>
	</script>
    <!--
<script src="js/bootstrap.min.js"></script>
<script src="js/superfish.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>-->
	 

</body></html>
<?php } 
else{
	header("Location:index.php");
}
}

else{
	header("Location:index.php");
}?>
