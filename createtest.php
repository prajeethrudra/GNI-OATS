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
		</div><!--//header-->
	<!--page-->    
    	<div id="banner">
	<div class="container intro_wrapper">
	<div class="inner_content">
	<h1>Create Test</h1>
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


								<div class="accordion-group" style="height:auto;padding:20px;">
                       <div style="background-color:#2b3c4e;  width:auto;height:auto;border:0px solid #ccc;margin:auto; padding:20px;border-radius:8px;position:relative;">
<?php 
if(isset($_POST['create_test']))
{
	$test_name=$_POST['testname'];
	$time_limit=$_POST['timelimit'];
	$total_marks=$_POST['totalmarks'];
	$number_of_questions=$_POST['numberofquestions'];
	$marks_per_question=$_POST['marksperquestion'];
	$select_set=$_POST['selectset'];
	$unique_id = uniqid();
	$verify=$number_of_questions*$marks_per_question; 


	$query3=mysql_query("SELECT * FROM questionpaper WHERE testid='$select_set'");
	$noq_in_set=0;
while ($fquery3=mysql_fetch_array($query3)) 
{
$noq_in_set++;

}
echo $noq_in_set;
	if($test_name&&$time_limit&&$total_marks&&$number_of_questions&&$marks_per_question&&$select_set)
	{
		//if($number_of_questions<=$noq_in_set)
		//	{
				if($total_marks==$verify)
		{
			echo "hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii";
mysql_query("INSERT INTO testdetails(uniqid,test_name,time_limit,total_marks,no_of_questions,marks_per_question,set_selected) 
			VALUES('$unique_id','$test_name','$time_limit','$total_marks','$number_of_questions','$marks_per_question','$select_set')");
	}
else {
echo "<h2 class='title' style='color:#f1592a;' >There is a problem with Total Marks <br/>";
echo "be sure that total marks=marks per each question X numberofquestions </h2>";

}
//	}
//else echo "<h2 class='title' style='color:#f1592a;' >There are no enough questions <br/>"; 
	}
	else echo "<h2 class='title'  style='color:#f1592a;position:absolute; margin-left:500px'>fields are empty</h2>";
}
?>

<form method="POST" action="createtest.php">
                                             <h2 class="title" style="color:#f5f5f5;" >Test Name</h2>
                                             <input type="text" style=" height:18px; width:280px;" name="testname" />
                                             <h2 class="title" style="color:#f5f5f5;" >Time Limit</h2>
                                             <input type="text" style=" height:20px; width:280px;" name="timelimit" />
                                             <h2 class="title" style="color:#f5f5f5;">Total Marks</h2>
                                             <input type="text" style=" height:20px; width:280px;" name="totalmarks"  />
                                             <h2 class="title" style="color:#f5f5f5;" >Number Of Questions</h2>
                                             <input type="text" style=" height:20px; width:280px;" name="numberofquestions" />
                                             <h2 class="title" style="color:#f5f5f5;" >Marks Per Question</h2>
                                             <input type="text" style=" height:20px; width:280px;" name="marksperquestion"  />
                                             <h2 class="title" style="color:#f5f5f5;" >Select Set</h2>
                                             <select style=" height:30px; width:300px;" name="selectset">
<?php
$query1=mysql_query("SELECT * FROM testtitles");
while ($fquery1=mysql_fetch_array($query1)) 
{
$un=$fquery1['testname'];
$tid=$fquery1['testid'];
?>
 <option><?php echo $un;?></option>
 <?php } ?>
                                             </select><br/>
	<input type="submit" class="big_button" value="Create Test"style="margin-top:20px;margin-bottom:20px;"
	name="create_test" />
</form>
    </div>
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
<?php } 
else{
	header("Location:index.php");
}
}

else{
	header("Location:index.php");
}?>
