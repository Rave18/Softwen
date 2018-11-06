

<?php
function load_prods(){
	global $query;
	
	include "connection.php";
	$id=$_GET["id"];
	$query=$conn->prepare("Select * from tblProducts where ID=:id");
	$query->bindParam("id",$id);
	$query->execute();
	

}

load_prods();

if(isset($_POST["addcart"])){
header("location:noaccount.php");
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
	overflow: hidden;
	margin: 0 auto 20px;
	border-bottom: 1px solid gray;
}

#prodImage {
	width: 560px;
	height: 400px;
	margin: 20px;
	float:left;
}

#prodDes {
	width: 300px;
	margin: 20px;
	float: left;
	font-family:Cambria;
}

h3, p {
	margin: 0;
	text-align: center;
}
p{
	font-size:17px;
}

#prodDes h3, #prodDes p {
	margin: 20px;
	text-align: left;
	
}	
#addtocart {
	width: 150px;
	height:55px;
	background: #FAFAFA;
	color:black;
	margin-left:30px;
	line-height: 50px;
	font-size:16px;
	text-align: center;
	position:relative;
	border: 3px solid gray;
	
}

#addtocart a {
	color: black;
	text-decoration: none;
	display:block;
}
#addtocart:hover {
	background: gray;
	color: #FAFAFA;	
}


.col {
	width: 280px;
	height: 250px;
	margin: 20px ;
	float: left;
	color: black;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size: 16px;
	text-align: center;
	
}

.imageContainer {
	width: 200px;
	height: 200px;
	margin: auto;
}

h4 {
	margin: 10px 0 0 0;
	text-align: center;
}
article {
	width: 960px;
	overflow: hidden;
	margin: 0 auto;
	border-bottom: 1px solid gray;
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
#quantity{
margin-left:100px;
width:45px;
height:50px;
}

#content form p{
	position:absolute;
	right:700px;
	
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
</head>
<body>

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
<?php
while($row=$query->fetch(PDO::FETCH_ASSOC)){	
echo "
	<div id='content'>
    <div id='prodImage'><img src='data:image;base64,".$row["product_image"]."'  width='560' height='400'></div>
	<div id='prodDes'>
    	<h3><strong>".$row["ProductName"]."</strong></h3>
      <p>".$row["ProdDesc"]."</p>
	<p>Price:<strong>".$row['Price'].".00</strong></p>
	
	
	<form method='post' enctype='multipart/form-data'>
	  <fieldset>
	 <form action='http://google.com'>
	
<p>Quantity:</p><input type='number' min='1' max='99' name='quantity' id='quantity' size='15' required/>
<strong><input type='submit' value='ADD TO CART' name='addcart' id='addtocart' onclick='window.location.href='fb.com'' /></strong>
</form>
</fieldset>

</form>
     	 

</div>

    </div>
	";
}
?>



</div>
<article>
	<h3 style="font-family:Cambria"><strong>OTHER PRODUCTS</strong></h3>
<?php
	
	function load_products1(){
		include "connection.php";
		global $query;
		$query=$conn->prepare("select * from tblproducts where branchid=0");
		$query->execute();
		
	}
	load_products1();
?>

	
	 <?php
	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 
		echo "<section class='col'>

	 <div class='imageContainer'><a href=".$row["ProductName"].">
			<a href='proddesc.php?id=".$row["ID"]."'><img src='data:image;base64,".$row["product_image"]."' width='200' height='200'></a>
			<h4><strong>".$row["ProductName"]."</strong></h4>
			</div>
		
		</section>
	"; 	

		}
		?>
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