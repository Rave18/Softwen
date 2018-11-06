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
	width:205px;
	float: left;
	margin: 0px 0 10px;
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
input[type="text"]{
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
input[type="password"]
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
input[type="submit"]{
	width: 100px;
	height:30px;	
	background: #FAFAFA;
	margin: 1px 175px auto;
	top:6px;
	line-height: 20px;
	text-align: center;
	border: 2px solid gray;
	font-family:Cambria;
	position:absolute;
	
}

input[type="submit"]:hover{

	background: gray;
	color: #FAFAFA;	
}
article{
	background:white;
	padding:10px;
	width:960px;
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
#line{
	
	border-top:1px solid gray;
	width:960px;
		margin: 0 auto;

}
#content{
	
}



</style>


<meta charset="utf-8">
<meta name="viewport" content= "width=device-width, initial-scaling=1"/>
<script type="text/javascript" src= "jquery/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src= "bootstrap/js/bootstrap.min.js"> </script>
<script type="text/javascript" src= "js/script.js"> </script>
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
 
  <?php
  include "login_stub.php";
  ?>
  
  <div id="line">
  
  
  </div>
  <h3 style="font-family:Cambria;text-align:center">JOBS</h3></br>
  <div id="content">
<?php

		$query=$conn->prepare("select * from tbljobs ORDER BY tbljobs.ID DESC");
		$query->execute();
		$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $row){
			
	$cont=strip_tags($row["JobDesc"]);
	$conte=substr($cont,0,400);
	

		
echo "
<article>
<section class='Post-Heading'>

		<h3>".$row["JobTitle"]."</h3>
<small>Posted on ".$row["JobDate"]."</small>
</section>
<div id='Post-Message'>
<p> $conte . . .</br><br/><a href='jobdesc.php?ID=".$row["ID"]."'>Read more</p></a>
</div>
</article>";
		}
?>



</div>

	
	
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