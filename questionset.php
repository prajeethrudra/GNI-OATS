<?php
session_start();
include 'config.php';
if(isset($_SESSION['username'])){
$name=$_SESSION['username'];
if($name=="admin")	{

if(isset($_POST['addset']))
{
$unique_id = uniqid();
$testname=$_POST['setname'];
mysql_query("INSERT INTO testtitles (testid,testname) VALUES ('$unique_id','$testname')");

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
	<h1>Create Test</h1>
 <a href="managequestions.php" >   <input type="button" class="big_button" value="Manage Questions" style="float:left;"/>
</a>
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
                       <div style="background-color:#2b3c4e;  width:1100px;height:auto;border:0px solid #ccc;margin:auto; padding:20px;border-radius:8px;margin-bottom:20px;">
            <form method="POST">
                                 <h2 class="title" style="color:#f5f5f5; float:left; margin-right:50px;">Set Name</h2>
    <input type="text" style=" height:18px; width:280px;float:left;" name="setname" />
    <input type="submit" class="big_button" value="Add Set" style="width:100px; height:40px;line-height:15px;
     margin-right:860px;" name="addset" />
    </form>                                                                           
          </div>


                                 <div style="background-color:#2b3c4e;  width:1100px;height:auto;border:0px solid #ccc;margin:auto; padding:20px;border-radius:8px;margin-bottom:20px;">
           
                                 <h2 class="title" style="color:#f5f5f5; float:left; margin-right:50px;">IMPORT QUESTIONS</h2>
    <form method="post" enctype="multipart/form-data" action="questionset.php">
       <input type="file" name="file" class="big_button" style="width:400px; height:40px;line-height:15px;
     margin-right:460px; ">

<input type="submit" name="import" class="big_button" style="width:400px; height:40px;line-height:15px;
     margin-right:460px; " value="IMPORT" />

</form>         
 <?php
if(isset($_POST['import']))
{
	$file=$_FILES['file']['tmp_name'];
$handle=fopen($file,"r");
while (($fileop=fgetcsv($handle,1000,","))!==false)
 {
	mysql_query("INSERT INTO questionpaper(question,1option,2option,3option,4option,answer,testid) 
		VALUES('$fileop[0]','$fileop[1]','$fileop[2]','$fileop[3]','$fileop[4]','$fileop[5]','$fileop[6]')");

}
}
 ?>
                                                                              
          </div>

          
          <div style="background-color:#2b3c4e;  width:1100px;height:auto;border:0px solid #ccc;margin:auto; padding:20px;border-radius:8px;">
         <h2 class="slider-title" style="color:#f5f5f5;line-height:20px;font-size:18px;">Add Question</h2>
         <form method="POST">
                                  
         <h2 class="title" style="color:#f5f5f5;">Select Set</h2>
        <select style=" height:30px; width:300px;" name="set">
        	<?php
$query1=mysql_query("SELECT * FROM testtitles");
while ($fquery1=mysql_fetch_array($query1)) 
{
$un=$fquery1['testname'];
$tid=$fquery1['testid'];
 ?>
 <option><?php echo $un;?></option>
 
 <?php }
 ?>

        </select><br/>
                                <h2 class="title" style="color:#f5f5f5;">Question</h2>
    <textarea style="min-width:500px;max-width:800px;min-height:60px;max-height:80px;" name="question">ADD your question here</textarea>
     <h2 class="title" style="color:#f5f5f5;">Add Answers</h2>
     <p class="magnolia">Option 1</p>
     <input type="text" style=" height:20px; width:280px; float:left;" name="1option" />
     <input type="radio" style="height:30px;border-radius:8px; background-color:transparent;margin-left:-80px;float:left;
     margin-right:-80px;" name="answer" value="1opt" />
     <h3 class="title" style="color:#f5f5f5;margin-right:0px; ">Correct Option</h3>                          
     
     <p class="magnolia" style="clear:both;">Option 2</p>
     <input type="text" style=" height:20px; width:280px; float:left;" name="2option"  />
     <input type="radio" style="height:30px;border-radius:8px; background-color:transparent;margin-left:-80px;float:left;
     margin-right:-80px;" name="answer" value="2opt"/>
     <h3 class="title" style="color:#f5f5f5;margin-right:0px; ">Correct Option</h3>                   
     
     <p class="magnolia" style="clear:both;">Option 3</p>
     <input type="text" style=" height:20px; width:280px; float:left;" name="3option"/>
     <input type="radio" style="height:30px;border-radius:8px; background-color:transparent;margin-left:-80px;float:left;
     margin-right:-80px;" name="answer" value="3opt"/>
     <h3 class="title" style="color:#f5f5f5;margin-right:0px; ">Correct Option</h3>                          
     
     <p class="magnolia" style="clear:both;">Option 4</p>
     <input type="text" style=" height:20px; width:280px; float:left;" name="4option" />
     <input type="radio" style="height:30px;border-radius:8px; background-color:transparent;margin-left:-80px;float:left;
     margin-right:-80px;" name="answer" value="4opt"/>
     <h3 class="title" style="color:#f5f5f5;margin-right:0px; ">Correct Option</h3>                          
             
	<input name="addto" type="submit" class="big_button" value="ADD IT" style="margin-top:30px;margin-bottom:20px;margin-left:0px;"/>
           
                                                                               
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
<?php
if(isset($_POST['addto']))
{
$question=$_POST['question'];
$option1=$_POST['1option'];
$option2=$_POST['2option'];
$option3=$_POST['3option'];
$option4=$_POST['4option'];
$answer=$_POST['answer'];
echo $answer;
$gr=$answer."ion";
echo $gr;
$qq=$_POST['set'];
$query2=mysql_query("SELECT * FROM testtitles WHERE testname='$qq'");
$fquery2=mysql_fetch_array($query2);
$qw=$fquery2['testid'];
echo $qw;
mysql_query("INSERT INTO questionpaper(question,1option,2option,3option,4option,answer,testid) VALUES('$question','$option1','$option2','$option3','$option4','$gr','$qq')");
}
?>	 

</body></html>
<?php } 
else{
	header("Location:index.php");
}
}

else{
	header("Location:index.php");
}?>