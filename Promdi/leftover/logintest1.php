<?php 
global $warn;
if(isset($_POST["login"])){
	global $warn;
	include "connection.php";
	$username=filter_input(INPUT_POST,"username");
	$password=filter_input(INPUT_POST,"password");
	$query=$conn->prepare("select username,password from tblaccounts where username=:Username and password=:password");
	$query->bindParam("Username",$username);
	$query->bindParam("password",$password);
	$query->execute();
	$result=$query->rowCount();
	
	if($result){
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			if($row["username"]=="admin"&& $row["password"]=="admin"){
				header("location:ownerhome.php");
			}
			else if($row["username"]=="lagunabranch"&& $row["password"]=="laguna"){
				header("location:branchhome.php");
			}
			
			else{
				header("location:userhome.php");
			}
			
		}
		
	}else{
		$error = "The username or password you entered does not exists.";
	}
}
	
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

#content {
	width: 960px;
	margin: 10px auto;
	overflow: hidden;
	min-height: 80px;
	border-bottom:1px solid gray; 
	font-family:Cambria;
	text-align:center;
	font-size:18px;
}
#imgContainer {
	width: 560px;
	height: 400px;
	margin: 30px 500px 0;
	float:center;
}
h3{
	margin:0;
	text-align:center;
	
}
p{
	margin:0;
	text-align:center;
	font-family: Cambria
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

</style>


<meta charset="utf-8">
<meta name="viewport" content= "width=device-width, initial-scaling=1"/>
<script type="text/javascript" src= "jquery/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src= "bootstrap/js/bootstrap.min.js"> </script>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
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
		<div class = "modal-title">Error
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
    	<div id="mainNav">    	
    	<ul>
        	<li><a href="blog.php" class="under"><strong>BLOG</strong></a></li>
            <li><a href="promdiprod.php" class="under"><strong>PRODUCTS</strong></a></li>
            <div id="logo" ><a href="home.php"><img src="images/logo.jpg" width="300" height="179" alt=""/></a></div>
            <li><a href="promdisignup.php" class="under"><strong>SIGN-UP</strong></a></li>
            <li><a href="#" id="login" class="under"><strong>LOG-IN</strong></a></li>
        </ul>
        </div>
	</nav>
	<h3 style="font-family:Cambria"><strong>Welcome to Promdi Lola!</strong></h3>
	<p>Local, artisanal Filipino treats and pasalubong from the province inspired by the Filipino lola's cooking.</p>
 <div id="imgContainer"><img src="images/promdihome.jpg" width="915" height="400"/></div>
	   <div id="content">

        <p><strong><em>Promdi Lola is a wholesale business that curates specialty tradional and heirloom foods from different regions in Ph.</em></strong></p>
    </div>
	
	

<div id="arrow-up"></div>
	
	<div id="login-form">
<form method="post">

<div>

<input type="text" placeholder="Username" name="username" required/>
<input type="password" placeholder="Password"  name="password" required/>
</div>

<div>
<strong><input type="submit" name="login" value="LOGIN" name="log_in"/></strong>
</form>
</div>
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
        	<h4><strong>GET TO KNOW US</strong></h4>
            <div id="button"><a href="about.html"><strong>PROMDI LOLA</strong></a></div>
            <p>Learn more about Promdi Lola</p>
       		</section>
      		 <section id="borderLeft" class="column">
        	<h4><strong>CONTACT US</strong></h4>
             <div id="button"><a href="contacts.html"><strong>CONTACTS</strong></a></div>
            <p>Call Us Now!</p>
        	</section>          
        </div>
         <div id="clearBoth"></div>
         <div id="footernavWrapper">
         	<div id="footerNav">
            	<ul>
                	<li><strong><a href="about.html">ABOUT</a></strong></li>
                    <li><strong><a href="contacts.html">CONTACTS</a></strong></li>
                    <li>Promdi Lola</li>
                </ul>
                <span>copyright(c) 2017 PROMDI LOLA's.All rights reserved.</span>
            </div> 
         </div>            
  </footer>
   </div>

   <script type="text/javascript">
$(document).ready(function(){
var arrow=$("#arrow-up");
var form=$("#login-form");
var status=false;
$("#login").click(function(event){
event.preventDefault();
 if(status==false){
 arrow.fadeIn();
 form.fadeIn();
 status= true;
 }
 else{
 arrow.fadeOut();
 form.fadeOut();
 status=false;
 }
})

})
</script>   
</body>
</html>