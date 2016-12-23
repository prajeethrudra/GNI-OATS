<?php
session_start();
include 'config.php';
if(isset($_SESSION['username'])){
$d= date("Y/m/d") ;
echo $d;
$u=$_SESSION['username'];
$testname_selected=$_SESSION['testname'];
echo $testname_selected;
$query_for_testdetails=mysql_query("SELECT * FROM testdetails WHERE test_name='$testname_selected'");
$fquery_for_testdetails=mysql_fetch_assoc($query_for_testdetails);
$test_name=$fquery_for_testdetails['test_name'];
	$time_limit=$fquery_for_testdetails['time_limit'];
	$total_marks=$fquery_for_testdetails['total_marks'];
	$no_of_questions=$fquery_for_testdetails['no_of_questions'];
	$marks_per_question=$fquery_for_testdetails['marks_per_question'];
	$select_set=$fquery_for_testdetails['set_selected'];
$query_get_setid=mysql_query("SELECT testid FROM testtitles WHERE testname='$select_set'");
$fquery_get_setid=mysql_fetch_assoc($query_get_setid);
$set_id=$fquery_get_setid['testid'];

?>

<?php
$correct=0;
$i=0;$attempted=0;
if(isset($_POST['addto']))
{
	/*$sel_answer=$_POST['answer1'];
	$full_sel_answer=$sel_answer."ion";
	$fquery1=mysql_fetch_array($query1);
	$cor_answer=$fquery1['answer'];
	echo $cor_answer;*/
	
$query1=mysql_query("SELECT * FROM questionpaper WHERE testid='$select_set'");
for($a=0;$a<$no_of_questions;$a++)
	{

while ($fquery2=mysql_fetch_array($query1)) {
	$i++; //for getting answers for different questions
	$fr_answer="answer".$i;
	if(isset($_POST[$fr_answer]))
	{
$attempted++;
	$sel_answer=$_POST[$fr_answer];
	
	//echo $sel_answer;
	$conc_sel_answer=$sel_answer."ion";
	//echo $conc_sel_answer;
$c_answer=$fquery2['answer'];
//echo $c_answer;

if($conc_sel_answer==$c_answer)
{
	
	$correct=$correct+1;
}
}
}
}
//echo "ur score <br/>";
echo $correct;
$score=$correct*$marks_per_question;
//	$_SESSION['totalscore']=$score;
//echo "attempted questions";
//echo $attempted;
//$_SESSION['attempted']=$attempted;
$exam_attempted_id=uniqid();
//echo $u;
$query_for_name=mysql_query("SELECT username FROM users WHERE rollnumber='$u' ");
$fquery_for_name=mysql_fetch_assoc($query_for_name);
$user_name=$fquery_for_name['username'];
//echo $user_name;
mysql_query("INSERT INTO results(rollno,name,examname,setname,totalmarks,attempted,correct,score,examid,date_exam) 
	VALUES('$u','$user_name','$testname_selected','$select_set','$total_marks','$attempted','$correct','$score','$exam_attempted_id','$d')");

$_SESSION['exam_attempted_id']=$exam_attempted_id;
header("Location:reportcard.php");
}
 ?>

<?php
$dateFormat = "d F Y -- g:i a";
$targetDate = time() + ($time_limit*60);//Change the 25 to however many minutes you want to countdown
$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($remainingMinutes*60));
$actualDateDisplay = date($dateFormat,$actualDate);
$targetDateDisplay = date($dateFormat,$targetDate);
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
	<script type="text/javascript">
  var days = <?php echo $remainingDay; ?>  
  var hours = <?php echo $remainingHour; ?>  
  var minutes = <?php echo $remainingMinutes; ?>  
  var seconds = <?php echo $remainingSeconds; ?> 
function setCountDown ()
{
  seconds--;
  if (seconds < 0){
      minutes--;
      seconds = 59
  }
  if (minutes < 0){
      hours--;
      minutes = 59
  }
  if (hours < 0){
      days--;
      hours = 23
  }
  document.getElementById("remain").innerHTML = days+" timelimit, "+hours+" hours, "+minutes+" minutes, "+seconds+" seconds";
  SD=window.setTimeout( "setCountDown()", 1000 );
  if (minutes == '00' && seconds == '00') { seconds = "00"; window.clearTimeout(SD);
      //window.alert("Time is up. Press OK to continue."); // change timeout message as required
clickButton();
  } 


}
function myFunction() {
    var x;
    if (confirm("Press a button!") == true) {
        x = "You pressed OK!";
    } else {
        x = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}

function clickButton()
{
document.getElementById('start').click();
}
</script>

<style type="text/css">
.boxes{
	 border:1px solid #2b3c4e; font-size: 18px; padding-left:5px; padding-right: 5px;text-align: center; 
}
.boxes:hover{ border-radius: 24px;background-color: #2b3c4e; color: #f5f5f5;}
a:active{
	font-size: 24px;border:2px solid #red;
}


</style>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="JS/jquery-ui.js"></script>
<script src="JS/jquery.min.js"></script>
 <link rel="stylesheet" href="JS/jquery-ui.css" />

 <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script>
function selectstep(n){
	$(".cs").hide();
	$("#content"+n).show();
	
	}
function selectbg(z){
 $("#item"+z).css("background-color","#2b3c4e");
 $("#item"+z).css("color","#f5f5f5");
}	
</script>
<style>
.cs{display:none;
	}
.cs:first-child{display:block;}
</style>

</head>

<body data-twttr-rendered="true" onload="setCountDown();">
 <div id="remain">
 <?php echo "TIME LIMIT: $remainingHour hours, $remainingMinutes minutes, $remainingSeconds seconds";?></div>

<!--header-->
	<div class="header">
		<!--logo-->
	  <div class="container">
					<div class="logo">
						 <a href="index.php">
	<h1 class="title" style="color:#f5f5f5;">GNI O.A.T</h1></a>  
			  </div>
					 <nav id="main_menu">
					<div class="menu_wrap">
						<ul class="nav sf-menu sf-js-enabled sf-arrows">
				<li class="sub-menu"><a href="logout.php" class="sf-with-ul">Logout</a>
							</li>							
							
						</ul>
					</div>
				</nav><!--menu-->
								</div>
		</div>
	<!--//header-->
	<!--page-->    
    	<div id="banner">
	<div class="container intro_wrapper">
	<div class="inner_content">
	<?php echo $u ?>
	<h1>Question Boxes</h1><!--
	<h1 class="title">Current Openings</h1>
	<h1 class="intro">
 </h1>-->
 <?php
 $query1=mysql_query("SELECT * FROM questionpaper WHERE testid='$select_set'");	
 $ind=0;$c=0;

 while ($fquery4=mysql_fetch_array($query1)) {
$c++; 	
$ind++;
if($c<=$no_of_questions){
?>
<a href="#" class="boxes" onclick="selectstep(<?php echo $ind ?>)" id="item<?php echo $ind ?>"><?php echo $ind; ?></a>

<?php } 
else break;
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
              								<div class="accordion-group" style="height:auto;">

<?php
$query1=mysql_query("SELECT * FROM questionpaper WHERE testid='$select_set'");	
$no=0;
$ind=0;$a=0;
//echo $x;


$query1=mysql_query("SELECT * FROM questionpaper WHERE testid='$select_set'");	

while ($fquery1=mysql_fetch_array($query1)) {
$no++;$a++;
if($a<=$no_of_questions)
{
$question=$fquery1['question'];
$option1=$fquery1['1option'];
$option2=$fquery1['2option'];
$option3=$fquery1['3option'];
$option4=$fquery1['4option'];
$canswer=$fquery1['answer'];
//echo $canswer;
?>
<div class="cs" id="content<?php echo $no ?>">

    <div style="background-color:transparent; padding-left:20px; padding-right:20px; height:auto">
    <h2 class="title" style="color:#f5f5f5;">Question <?php echo $no?></h2>
    <h1 style="color:#f5f5f5; font-size:18px;"><?php echo $question; ?>
</h1>
<form method="POST" action="paper.php">

<input type="radio" style="float:left;height:18px;margin-left:-92px;padding-bottom:100px;"
name="answer<?php echo $no;?>" value="1opt"  onclick="selectbg(<?php echo $no;?>)" />
<span style="color:#f5f5f5; font-size:18px;margin-left:-92px;padding-bottom:100px; clear:both;" name="1option"  value="<?php echo $option1;?>"><?php echo $option1;?></span><br/>

<input type="radio" style="float:left;height:18px;margin-left:-92px;padding-bottom:100px;"
 name="answer<?php echo $no;?>" value="2opt"  onclick="selectbg(<?php echo $no;?>)" />
<span style="color:#f5f5f5; font-size:18px;margin-left:-92px;padding-bottom:100px;"
name="2option"  value="<?php echo $option2;?>"><?php echo $option2;?></span><br/>


<input type="radio" style="float:left;height:18px;margin-left:-92px;padding-bottom:100px;" 
name="answer<?php echo $no;?>" value="3opt"  onclick="selectbg(<?php echo $no;?>)"/>
<span style="color:#f5f5f5; font-size:18px;margin-left:-92px;padding-bottom:100px;"
name="3option"  value="<?php echo $option3;?>"><?php echo $option3;?></span><br/>


<input type="radio" style="float:left;height:18px;margin-left:-92px;padding-bottom:100px;" 
name="answer<?php echo $no;?>" value="4opt"  onclick="selectbg(<?php echo $no;?>)"/>
<span style="color:#f5f5f5; font-size:18px;margin-left:-92px;padding-bottom:100px;"
name="4option"  value="<?php echo $option4;?>"><?php echo $option4;?></span><br/><br/>
<input type="checkbox">
          </div>
          </div>
          <?php
}
else
{ break;}
 }  ?>
}

<input type="submit" name="addto" value="submit" id="start" onclick="myFunction()" class="big_button">
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
}

else{
	header("Location:index.php");
}?>