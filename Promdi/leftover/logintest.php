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
width:300px;
height:auto;
background:#fff;
right:400px;
top:140px;
border-radius:2px;
border-bottom:5px solid gray;
display:none;

}
#login-form>form{
width:250px;
margin:2px auto;
font-size:16px;
font-family:Cambria;
color:black;
letter-spacing:-0.05em;

}
input[type="text"],
input[type="password"]{
width:220px;
height:30px;
border:1px solid;
outline:none;
box-shadow: inset 0 0 10px #eee;
border-radius:1px; 
margin-bottom:10px;
margin-top:5px;

font-family:Cambria;
font-size:15px;
}
input[type="submit"]{
	width: 150px;
	height:55px;	
	background: #FAFAFA;
	margin: 1px 40px auto;
	line-height: 50px;
	text-align: center;
	border: 3px solid gray;
	font-family:Cambria;
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



</head>

<body>
<div id="wrapper">
	<nav>
    	<div id="mainNav">    	
    	<ul>
        	<li><a href="blog.php" class="under"><strong>BLOG</strong></a></li>
            <li><a href="promdiprod.php" class="under"><strong>PRODUCTS</strong></a></li>
            <div id="logo" ><a href="index.html"><img src="images/logo.jpg" width="300" height="179" alt=""/></a></div>
            <li><a href="promdisignup.php" class="under"><strong>SIGN-UP</strong></a></li>
            <li><a href="#" id="login" class="under"><strong>LOG-IN</strong></a></li>
        </ul>
        </div>
	</nav>
	
	<div id="arrow-up"></div>
	
	<div id="login-form">
<form>
<label>Username</label>
<div>

<input type="text" placeholder="Username" name="username" required/>
</div>
<label>Password</label>
<div>

<input type="password" placeholder="Password" name="" required/>
</div>
<div>
<strong><input type="submit" value="LOGIN" name="log_in"/></strong>
</form>
</div>
	 </div>
	
       <div id="clearBoth"></div>
     <footer>
    	<div id="mainFooter">
        	<section id="borderRight" class="column">
        		<h4><strong>STAY CONNECTED</strong></h4>
            	<ul>
                	<li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//collettesph.com/"><img src="images/media1.png" width="50" height="50" alt=""/></a></li>         
                    <li><a href="https://plus.google.com/share?url=http%3A//collettesph.com"><img src="images/media3.png" width="50" height="50" alt=""/></a></li>
                    <li><a href="https://pinterest.com/pin/create/button/?url=http%3A//collettesph.com/&media=http%3A//collettesph.com/images/products/prod3.jpg&description=%23colettesbukopie"><img src="images/media4.png" width="50" height="50" alt=""/></a></li>          					
          
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