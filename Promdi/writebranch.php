
<?php

session_start();
include "connection.php";
if(isset($_SESSION["username"])){

}else{
header('location:noacc.php');
session_destroy();

}
	
if(filter_input(INPUT_POST,"addbutton")){

$title =filter_input(INPUT_POST,"MessageTitle");
$body=filter_input(INPUT_POST,"MessageBody");
$date=filter_input(INPUT_POST,"MessageDate");
$qry=$conn->prepare("INSERT INTO tblnotif values(NULL,:aid, :title,NOW(),:body,:status)");
$qry->bindParam("aid",$_SESSION["ID"]);
$qry->bindParam("title",$title);
$qry->bindParam("body",$body);
$qry->bindParam("status",$status);
$status="Unread";
		$qry->execute();
		$error="You successfully sent a message to the admin";
		
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Promdi Lola </title>
<meta charset="utf-8">
<meta name="viewport" content= "width=device-width, initial-scaling=1"/>
<script type="text/javascript" src= "jquery/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src= "bootstrap/js/bootstrap.min.js"> </script>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>


<script type = "text/javascript" src = "tinymce/js/tinymce/tinymce.min.js"></script>

<script>
	$(document).ready(function(){
		tinymce.init({
            selector: "#blogbody",
            theme: "modern",
            fontsize_formats: "8pt 9pt 10pt 11pt 12pt 26pt 36pt",
            width: "100%",
            height: "400px",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "undo redo | forecolor backcolor emoticons | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        });
	});
</script>
<style>

body {
	margin: 0;
	color: #1F0449;
	background: #FAFAFA;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
}

.column {
	
	width: 245px;
	margin: 0;
	float: left;
	margin: 20px 0 10px;
	padding: 0 20px;
	min-height: 200px;
		font-family: Cambria;

	
}
#wrapper {
	margin: 0;
	overflow: hidden;
}

nav {
	margin: 0;
	width: 100%;
	padding: 20px 0 30px;
}

#mainNav {
	border-top:1px solid gray;
	width:1180px;
	margin: 0 auto;
	height: 180px;
	background:white;
	border-bottom:1px solid gray;
}

nav ul {
	margin: 0;
	padding: 0;
	overflow: hidden;
}

nav li {
	list-style: none;
	float: left;	
	margin: 0;
	line-height: 200px;
	width: 110px;
	text-align: center;
	
}
nav li a {
	text-decoration: none;
	color: #1F0449;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	
}
#logo {
	float: left;
	width: 300px;
	height: 160px;
	margin:auto;
}

section {
	width: 205px;
	float: left;
	margin: 20px 0 10px;
	padding: 30px 19px;
	min-height: 200px;
}

#clearBoth {
	clear: both;
}
footer{
	overflow: hidden;
	width: 100%;
	margin: 0;
}
#mainFooter {
	width: 740px;
	margin: 0;
	margin: 10px auto;
	overflow: hidden;
}

#footernavWrapper {
	width: 100%;
	overflow: hidden;
		height: 30px;
	margin: 0;
	background: gray;
}

#footerNav {
	height: 30px;
	width: 740px;
	margin: 0 auto;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
}

#mainFooter ul {
	margin: 12px;
	padding: 0;
	
}

#mainFooter li {
	float: left;
	list-style: none;
	margin: 0 10px 0 0;
	padding: 0;
}


h4 {
	margin: 0;
	text-align: center;
}

#mainFooter p {
	text-align: center;
	margin: 10px 0 0 0;
	font-size: 16px;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
}
#button {
	width: 150px;
	height:55px;
	background: #FAFAFA;
	margin: 10px auto;
	line-height: 50px;
	text-align: center;
	border: 3px solid gray;
}

#button a {
	color: black;
	text-decoration: none;
	display:block;
}
#button a:hover {
	background: gray;
	color: #FAFAFA;	
}
#footerNav ul {
	margin: 0;
	color: #FAFAFA
}

#footerNav li {
	list-style: none;
	line-height: 30px;
	float: left;
	margin: 0 10px;
}
#footerNav a {
	color: #FAFAFA;	
	text-decoration: none;
	
}
span {
	line-height: 30px;
	color: #FAFAFA;
	float: right;
	font-size: 12px;
	
}

#borderRight {
	border-right: 1px solid gray;
}

#borderLeft {
	border-left: 1px solid gray;
}

#welcome {
	width: 100%;
	overflow: hidden;
		height: 30px;
	margin: 0;
	background: gray;
}
#welcomee {
	height: 30px;
	width: 740px;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	color:white;
	margin-left:370px;
}
#log {
	height: 30px;
width:740px;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	color:white;
left:1130px;
	position:absolute;
	top:17px;
}
h4 a{
	color:white;
}
h4 a:hover{
	color:white;
}
article{
	background:white;
	padding:10px;
	width: 1180px;
	overflow: hidden;
	margin: 0 auto 10px;
	border-bottom: 1px solid gray;
}
.Post-Heading h3{
	font-size:2em;
	font-family:Cambria;
	
	
}
#Post-Message p{
	font-size:15px;
	font-family:Cambria;
margin:50px 50px 0px 0px;
}
.Post-Heading small{
margin-left:0px;
	font-style:italic;
	color:green;
	font-size:85%;
	
}

h3 a{
	color:black;
}
h3 a:hover{
	color:black;
}

#date
{
	margin-bottom:0px;
display:block;
width:200px;
border:1px solid;
font-family:Cambria;

}#blogtitle
{
display:block;
margin-bottom:25px;
width:100%;
font-family:Cambria;
border:1px solid;
}

#blogbody
{
display:block;
margin-bottom:25px;
width:100%;
min-height:400px;
padding:10px;
border:1px solid;
font-family:Cambria;

}
#send{
	width: 344px;
	height:55px;
	background: #FAFAFA;
	margin: 30px 0 0 315px;
	font-size:18px;
	font-family:Cambria;
	line-height:0px;
	text-align: center;
	border: 1px solid gray;
	
}
input{
padding:10px;
font-size:inherit;
}
input[type="text"]
{
display:block;
width:400px;
font-family:Cambria;


}
input[type="submit"]{
	width: 344px;
	height:55px;
	background: #FAFAFA;
	margin: 10px 250px;
	font-size:18px;
	font-family:Cambria;
	line-height:0px;
	text-align: center;
	border: 1px solid gray;
}
input[type="submit"]:hover{
	background: gray;
	color: #FAFAFA;	
}
</style>

<script>
	$(document).ready(function(){
	<?php
	if(isset($error)){
		?>
		$("#error").modal("show");
		<?php
	}
	?>
		});
</script>


</head>

<body>
<div id = "error" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "modal-header">
		<div class = "modal-title">Sucess
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $error; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-primary" data-dismiss = "modal">OK</button>
		</div>
	</div>
	</div>
</div>
<div id="wrapper">
	<nav>
	<div id="welcome">
		<div id="welcomee">
					<?php
	
function load_account(){
	include "connection.php";
		global $query;
		$query=$conn->prepare("select * from tblaccounts");
		$query->execute();



}
load_account();

?>
		<h4 style='text-align:left;'><em>Welcome, <?php echo $_SESSION["username"]; ?>!</em></h4>
		
		</div>
			<div id="log">
			<h4> <em><a href="logout.php">LOGOUT</a></em></h4>
		</div>
		</div>
    	<div id="mainNav">    	
    	<ul>
        	    	<li><a href="branchblog.php" class="under"><strong>BLOG</strong></a></li>
			    <li><a href="branchnotif.php" class="under"><strong>NOTIFICATIONS</strong></a></li>
							    <li><a href="branchprod.php" class="under"><strong>PRODUCTS</strong></a></li>
											    <li><a href="branchcart.php" class="under"><strong>MY CART</strong></a></li>
				
            <div id="logo" ><a href="branchhome.php"><img src="images/logo.jpg" width="300" height="178" alt=""/></a></div>
			    <li><a href="branchinventory" class="under"><strong>INVENTORY</strong></a></li>
			    <li><a href="branchjob.php" class="under"><strong>JOB</strong></a></li>
							 	   <li><a href="branchorders.php" class="under"><strong>MY ORDERS</strong></a></li>
							    <li><a href="branchsettings.php" class="under"><strong>SETTINGS</strong></a></li>
        </ul>
        </div>
	</nav>
	<h3 style="font-family:Cambria;text-align:center">NOTIFICATIONS</h3>
	<h2 style="font-family:Cambria;text-align:center">Write Message</h2></br>

<article>
<form method="post" enctype="multipart/form-data">
<fieldset>

<input type="text" name="MessageTitle" placeholder="Title" size="35" id="blogtitle" style="margin:5px:" required/><br>
<input type="date" name="MessageDate" id="date" size="35"  required/><br>
<textarea name="MessageBody" placeholder="Write your blog here" size="300" id="blogbody" style="margin:5px:"/ ></textarea>
<strong><input type="submit" id="send" value="Submit" name="addbutton"></strong>
</fieldset>
</form>
</article>
	
       <div id="clearBoth"></div>
     <footer>
    	<div id="mainFooter">
        	<section id="borderRight" class="column">
        	


      		<h4><strong>STAY CONNECTED</strong></h4>
            	<ul>
					 <li><img src="images/white.jpg" alt="" /></a></li>
                	<li><a href="https://www.facebook.com/Promdi-Lola-1686609931637151/?sw_fnr_id=2235839213&fnr_t=0"><img src="images/fb.jpg" width="50" height="50" alt=""/></a></li>         
                    <li><a href="https://www.instagram.com/promdilola/"><img src="images/ig.jpg" width="50" height="50" alt=""/></a></li>
                
                </ul>
                <div id="clearBoth"></div>
                <p>Share your experience. Tell your family and friends.</p>               
              
       		</section>
       		<section class="column">
        	<h4><strong>GET TO KNOW US</strong></h4>
            <div id="button"><a href="branchabout.php"><strong>ABOUT</strong></a></div>
            <p>Learn more about Promdi Lola</p>
       		</section>
      		 <section id="borderLeft" class="column">
        		<h4><strong>CONTACTS</strong></h4>
             <div id="button"><a href="branchcontact.php"><strong>CONTACT US</strong></a></div>
            <p>Interested in business with Promdi Lola?</p>
        	</section>          
        </div>
         <div id="clearBoth"></div>
         <div id="footernavWrapper">
         	<div id="footerNav">
            	<ul>
                
                    <li>Promdi Lola</li>
                </ul>
                <span>copyright &copy 2017 PROMDI LOLA's.All rights reserved.</span>
            </div> 
         </div>            
  </footer>
   
   
   
   
   
   
   
   
   </div>
</body>
</html>