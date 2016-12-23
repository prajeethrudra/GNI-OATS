<?php
session_start();
include 'config.php';
if(isset($_SESSION['username'])){
$vid= $_SESSION['exam_attempted_id'];
$query_results=mysql_query("SELECT * FROM results WHERE examid='$vid'");
$fquery_results=mysql_fetch_assoc($query_results);
$name=$fquery_results['name'];
$rollno=$fquery_results['rollno'];
$totalmarks=$fquery_results['totalmarks'];
$examname=$fquery_results['examname'];
$attempted=$fquery_results['attempted'];
$correct=$fquery_results['correct'];
$score=$fquery_results['score'];
$date_exam=$fquery_results['date_exam'];
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
	<h1>REPORT CARD</h1>
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


								<div class="accordion-group" style="height:auto;">
                    <form action="login.php" method="POST">       
                                   <div style="background-color:#2b3c4e;  width:600px;height:800px;border:0px solid #ccc;margin:auto;margin-top:20px; padding:20px; text-align:center;">
         <h2 class="title" style="color:#f5f5f5;margin:auto;">NAME</h2>
         <h2 class="title" style="color:#f1592a;margin:auto; font-size:24px;font-weight:bold;"><?php echo $name?></h2><br/>

          <h2 class="title" style="color:#f5f5f5;margin:auto;">ROLL NO</h2>
         <h2 class="title" style="color:#f1592a;margin:auto;font-size:24px;font-weight:bold;"><?php echo $rollno?></h2><br/>

          <h2 class="title" style="color:#f5f5f5; margin:auto;">EXAM NAME</h2>
         <h2 class="title" style="color:#f1592a; margin:auto;font-size:24px;font-weight:bold;"><?php echo $examname?></h2><br/>

          <h2 class="title" style="color:#f5f5f5; margin:auto;">TOTAL MARKS</h2>
         <h2 class="title" style="color:#f1592a;margin:auto;font-size:24px;font-weight:bold;"><?php echo $totalmarks?></h2><br/>

          <h2 class="title" style="color:#f5f5f5;margin:auto;">ATTEMPTED</h2>
         <h2 class="title" style="color:#f1592a;margin:auto;font-size:24px;font-weight:bold;"><?php echo $attempted?></h2><br/>

          <h2 class="title" style="color:#f5f5f5; margin:auto;">CORRECT</h2>
         <h2 class="title" style="color:#f1592a; margin:auto;font-size:24px;font-weight:bold;"><?php echo $correct?></h2><br/>

          <h2 class="title" style="color:#f5f5f5; margin:auto;">SCORE</h2>
         <h2 class="title" style="color:#f1592a; margin:auto;font-size:24px;font-weight:bold;"><?php echo $score?></h2><br/>

          <h2 class="title" style="color:#f5f5f5;margin:auto;">DATE OF EXAM</h2>
         <h2 class="title" style="color:#f1592a; margin:auto;font-size:24px;font-weight:bold;"><?php echo $date_exam?></h2><br/>
                            

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
<?php 
session_destroy();
}

else{
	header("Location:index.php");
}
?>