<?php

include "connection.php";
session_start();


?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Promdi Lola </title>
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
	width: 740px;
	margin: 0 auto;
	height: 180px;
	background:white;

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


article{
	width:960px;
	overflow: hidden;
	margin: 0 auto 10px;
	border-bottom: 1px solid gray;
}
#form1
{
margin:20px auto;
width:320px;


}

#text
{
display:block;
margin-bottom:25px;
width:100%;
border:1px solid;
font-family:Cambria;

}
#pass
{
	font-family:Cambria;
display:block;
margin-bottom:25px;
width:100%;
border:1px solid;

}
#sub1{
	width: 344px;
	height:55px;
	background: #FAFAFA;
	margin: 10px auto;
	font-size:18px;
	font-family:Cambria;
	line-height:0px;
	text-align: center;
	border: 1px solid gray;
}
#sub1:hover{
	background: gray;
	color: #FAFAFA;	
}


#arrow-up{
width:0;
height:0;
position:absolute;
border-left:20px solid transparent;
border-right:20px solid transparent;
border-bottom:15px solid gray;
right:620px;
top:130px;

display:none;
}

#login-form{
position:absolute;
width:440px;
height:auto;
background:#fff;
right:230px;
top:140px;
border-radius:2px;
display:none;

}
#login-form>form{
width:250px;
margin-top:2px;
font-size:16px;
font-family:Cambria;
color:black;
letter-spacing:-0.05em;

}
#user{
width:160px;
height:30px;
border:1px solid;
outline:none;
box-shadow: inset 0 0 10px #eee;
border-radius:1px; 
margin-bottom:10px;
margin-top:5px;

font-family:Cambria;
font-size:15px;
float:left;
}
#password
{
	position:absolute;
	width:160px;
height:30px;
border:1px solid;
outline:none;
box-shadow: inset 0 0 10px #eee;
border-radius:1px; 
margin-bottom:10px;
margin-top:5px;
float:right;
margin-left:10px;
font-family:Cambria;
font-size:15px;
}
#sub{
	width: 100px;
	height:30px;	
	background: #FAFAFA;
	margin: 1px 175px auto;
	top:6px;
	line-height: 0px;
	text-align: center;
	border: 2px solid gray;
	font-family:Cambria;
	position:absolute;
	
}

#sub:hover{

	background: gray;
	color: #FAFAFA;	
}

#line{
	
	border-top:1px solid gray;
	width:960px;
		margin: 0 auto;

}






</style>


<meta charset="utf-8">
<meta name="viewport" content= "width=device-width, initial-scaling=1"/>
<script type="text/javascript" src= "jquery/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src= "bootstrap/js/bootstrap.min.js"> </script>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>




<div id="wrapper">
	<nav>
    	<div id="mainNav">    	
    	<ul>
        	    <li><a href="bloghome.php" class="under"><strong>BLOG</strong></a></li>
            <li><a href="promdiprod.php" class="under"><strong>PRODUCTS</strong></a></li>
            <div id="logo" ><a href="index.php"><img src="images/logo.jpg" width="300" height="179" alt=""/></a></div>
            <li><a href="job.php" class="under"><strong>JOB</strong></a></li>
            <li><a href="#" id="login" class="under"><strong>LOG-IN</strong></a></li>
        </ul>
        </div>
	</nav>
	

  <div id="line">
  
  
  </div>
	<?php
	include "connection.php";
	$user="";
	$pass="";
	$confpass="";
	$fn="";
	$ln="";
	$email="";
	$contnum="";

	if(filter_input(INPUT_POST,"signup")){
include "connection.php";

	$passw=filter_input(INPUT_POST,"Passw");
	$confirm=filter_input(INPUT_POST,"ConfirmPass");
	
	
			
	 if ($passw == $confirm) {
   
		
		$user=filter_input(INPUT_POST,"user");
		$pass=filter_input(INPUT_POST,"Passw");
		$fn=filter_input(INPUT_POST,"FirstName");
		$ln=filter_input(INPUT_POST,"LastName");
		$email=filter_input(INPUT_POST,"Email");
		$contnum=filter_input(INPUT_POST,"ContactNumber");
				$usernamecheck=$conn->prepare("select Username from tblAccounts where Username=:user");
				$usernamecheck->bindParam("user",$user);
				$usernamecheck->execute();
				$result=$usernamecheck->rowCount();
					$emailcheck=$conn->prepare("select Email from tblAccounts where Email=:damn");
					$emailcheck->bindParam("damn",$email);
				
				$emailcheck->execute();
				$results=$emailcheck->rowCount();
				
				if($result){
				$us= "Username is already taken";	
				}
				
				
				else if($results){
				$err= "Email is already taken";	
				}
				else{
		$qry=$conn->prepare("INSERT INTO tblAccounts values(NULL,:Username,:Password,:FirstName,:LastName,:Email,:ContactNumber,:usertype)");
		$usertype= "User";

$qry->bindParam("Username",$user);
$qry->bindParam("Password",$pass);
$qry->bindParam("FirstName",$fn);
$qry->bindParam("LastName",$ln);
$qry->bindParam("Email",$email);
$qry->bindParam("ContactNumber",$contnum);
$qry->bindParam("usertype",$usertype);
$qry->execute();



	$eror = "Your account is created successfully!";
				}
	}
	else
	{
		$pw="Password does not match";
		
	}
	 }


	
		
	
	
	
	
	?>	
	
	<article>
	

<script>
	$(document).ready(function(){
	<?php
	if(isset($eror)){
		?>
		$("#eror").modal("show");
		<?php
	}
	?>
		});
</script>

<div id = "eror" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "alert alert-success">
		<div class = "modal-title">Sucess
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $eror; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-primary" data-dismiss = "modal">OK</button>
		</div>
	</div>
	</div>
</div>

	

<script>
	$(document).ready(function(){
	<?php
	if(isset($err)){
		?>
		$("#err").modal("show");
		<?php
	}
	?>
		});
</script>

<div id = "err" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "alert alert-danger fade in">
		<div class = "modal-title">Error
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $err; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-primary" data-dismiss = "modal">OK</button>
		</div>
	</div>
	</div>
</div>


<script>
	$(document).ready(function(){
	<?php
	if(isset($pw)){
		?>
		$("#pw").modal("show");
		<?php
	}
	?>
		});
</script>


</head>

<body>
<div id = "pw" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "alert alert-danger fade in">
		<div class = "modal-title">Error
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $pw; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-primary" data-dismiss = "modal">OK</button>
		</div>
	</div>
	</div>
</div>

<script>
	$(document).ready(function(){
	<?php
	if(isset($us)){
		?>
		$("#us").modal("show");
		<?php
	}
	?>
		});
</script>


</head>

<body>
<div id = "us" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "alert alert-danger fade in">
		<div class = "modal-title">Error
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $us; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-primary" data-dismiss = "modal">OK</button>
		</div>
	</div>
	</div>
</div>




  <?php
  include "login_stub.php";
  ?>

<form method="POST" id="form1">
<fieldset>
<h3 style="font-family:Cambria;text-align:center">CREATE ACCOUNT</h3></br>

<input type="text" name="user" minlength=8 id="text" placeholder="Username" size="35" style="margin:5px;padding:10px;font-size:inherit" required/><br>
<input type="password" name="Passw" minlength=8 placeholder="Password" size="35" id="pass" style="margin:5px;padding:10px;font-size:inherit" required/><br>
<input type="password" name="ConfirmPass" minlength=8 placeholder="Confirm Password" size="35" id="pass" style="margin:5px;padding:10px;font-size:inherit" required/><br>
<input type="text" name="FirstName" id="text"placeholder="First Name" size="35" style="margin:5px;padding:10px;font-size:inherit" required/><br>
<input type="text" name="LastName" id="text" placeholder="Last Name" size="35" style="margin:5px;padding:10px;font-size:inherit" required/><br>
<input type="email" name="Email" id="text" placeholder="Email" size="35" style="margin:5px;padding:10px;font-size:inherit"required/ ><br>
<input type="text" name="ContactNumber" maxlength="11" pattern='[0][9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]' id="text" placeholder="Contact Number" size="35" style="margin:5px;padding:10px;font-size:inherit" required/><br>
<strong><input type="submit" value="SIGN-UP" id="sub1" name="signup"></strong>

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
        	<h4><strong>CREATE ACCOUNT</strong></h4>
            <div id="button"><a href="promdisignup.php"><strong>SIGN-UP</strong></a></div>
            <p>Don't have an account yet? Register now!</p>
       		</section>
      		 <section id="borderLeft" class="column">
        	<h4><strong>CONTACTS</strong></h4>
             <div id="button"><a href="contacts.php"><strong>CONTACT US</strong></a></div>
            <p>Interested in business with Promdi Lola?</p>
        	</section>          
        </div>
         <div id="clearBoth"></div>
         <div id="footernavWrapper">
         	<div id="footerNav">
            	<ul>
                	<li><strong><a href="about.php">ABOUT</a></strong></li>
                    <li>Promdi Lola</li>
                </ul>
                <span>copyright &copy 2017 PROMDI LOLA's.All rights reserved.</span>
            </div> 
         </div>            
  </footer>
   
   
   
   
   
   
   
   
   </div>
   
   
</body>
</html>