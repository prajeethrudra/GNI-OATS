<?php
session_start();
include 'config.php';
if(isset($_SESSION['username'])){
$name=$_SESSION['username'];
if($name=="admin")	{
?>
<?php 
if(isset($_POST['export']))
{
	$output = "";
$table = "results"; // Enter Your Table Name 
$t_results=$_POST['t_results'];
$sql = mysql_query("SELECT * FROM results WHERE examname='$t_results'");
$columns_total = mysql_num_fields($sql);

// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}

// Download the file

$filename = "myFile_"."$t_results".".csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

}
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
	<h1>Results</h1>
<form method="POST" action="results.php">	
 <select style=" height:30px; width:300px;margin-left:600px;margin-top:-30px;" name="t_results">
<?php
$query3=mysql_query("SELECT test_name FROM testdetails");
while ($fquery3=mysql_fetch_array($query3)) 
{
$un=$fquery3['test_name'];

?>
 <option><?php echo $un;?></option>
 <?php } ?>
</select>   
<button class="big_button" style="margin-left:920px;margin-top:-50px;" name="export">EXPORT RESULTS </button>
</form>
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
    <div style="background-color:#2b3c4e;  width:auto;height:auto;border:0px solid #ccc;margin:auto; padding:20px;border-radius:8px;margin-bottom:20px;">
    <h2 class="title" style="color:#f5f5f5; float:left; margin-right:50px;">User Id</h2>
    <form method="POST" action="results.php">
      <select style=" height:30px; width:300px;" name="selecttest">
<?php
$query2=mysql_query("SELECT test_name FROM testdetails");
while ($fquery1=mysql_fetch_array($query2)) 
{
$un=$fquery1['test_name'];

?>
 <option><?php echo $un;?></option>
 <?php } ?>
                                             </select>   
<input type="submit" class="big_button" value="Search" style="width:100px; height:40px;line-height:15px;
     margin-right:860px;" name="search" />
     </form>                         
          </div>
          
          <div style="background-color:#2b3c4e;  width:auto;height:auto;border:0px solid #ccc;margin:auto; padding:20px;border-radius:8px;">
         <h2 class="slider-title" style="color:#f5f5f5;line-height:20px;font-size:18px;">Results</h2>

<?php 
if(isset($_POST['search']))
{
$selecttest=$_POST['selecttest'];
$query3=mysql_query("SELECT * FROM results WHERE examname='$selecttest'");
while ($fquery2=mysql_fetch_array($query3)) 
{
	$rollno=$fquery2['rollno'];

$score=$fquery2['score'];
$date=$fquery2['date_exam'];

?>                                                      
            
                       <div style="background-color:#34495E;  width:auto;height:auto;border:0px solid #ccc;margin:auto;margin-top:20px; padding:8px;"> 
<p class="title" style="color:#f5f5f5;float:left;position:relative; margin-right:500px;"><?php echo $rollno ?></p> 
<a href="" style="padding-right:10px; float:;"><?php echo $score ?></a> <a href="" style="float:right;"><?php echo $date ?></a>
          </div>
<?php } }?>                
                
                        <div style="background-color:#34495E;  width:auto;height:auto;border:0px solid #ccc;margin:auto;margin-top:20px; padding:8px;"> 
<p class="title" style="color:#f5f5f5;float:left;position:relative; margin-right:500px;">USerId</p> 
<a href="" style="padding-right:10px; float:;">ExamName</a> <a href="" style="float:right;">Score</a>
          </div>
                                                                             
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