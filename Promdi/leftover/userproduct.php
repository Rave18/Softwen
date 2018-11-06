<?php
	
	function load_products(){
		include "connection.php";
		global $query;
		$query=$conn->prepare("select * from tblproducts");
		$query->execute();
		
	}
	load_products();
?>
<!doctype html>

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
	border-top:1px solid gray;
	width: 970px;
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
	margin-left:500px;
}
.col {
	width: 280px;
	height: 300px;
	margin: 20px ;
	float: left;
	color: black;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size: 0px;
	text-align: center;
	
}

.imageContainer {
	width: 200px;
	height: 200px;
	margin: 20px auto;
	
	
}

h3 {
	
	margin: 0;
	text-align: center;
}
p {
		font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	margin: 0;
	text-align: center;

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
	<div id="welcome">
		<div id="welcomee">
				<?php
	
	function load_accounts(){
		include "connection.php";
		global $query;
		$query=$conn->prepare("select * from tblaccounts");
		$query->execute();
		
	}
	load_accounts();
?>

		<?php	
		 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		echo" 
		<h4 style='text-align:left;'><em>WELCOME,".$row["FirstName"]."!</em></h4>
		
		
		";
		 }
		?>
		</div>
		</div>

    	<div id="mainNav">    	
    	<ul>
        	<li><a href="blog.php" class="under"><strong>BLOG</strong></a></li>
			    <li><a href="promdiprod.php" class="under"><strong>NOTIFICATIONS</strong></a></li>
							    <li><a href="promdiprod.php" class="under"><strong>PRODUCTS</strong></a></li>
            <div id="logo" ><a href="home.php"><img src="images/logo.jpg" width="300" height="178" alt=""/></a></div>
			    <li><a href="promdiprod.php" class="under"><strong>MY CART</strong></a></li>
			    <li><a href="promdiprod.php" class="under"><strong>SETTINGS</strong></a></li>
							    <li><a href="promdiprod.php" class="under"><strong>LOG-OUT</strong></a></li>
        </ul>
        </div>
	</nav>
	
	<div class="row" style=" width:970px;margin:20px auto;">
	 <article>
	<h3 style="font-family:Cambria"><strong>PRODUCTS</strong></h3>
    <p>Local, artisanal Filipino treats and pasalubong from the province inspired by the Filipino lola's cooking.</p>
	
	 <?php
	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 
		echo "<section class='col'>

	 <div class='imageContainer'><a href=".$row["ProductName"].">
			<a href='userproddesc.php?id=".$row["ID"]."'><img src='data:image;base64,".$row["product_image"]."' width='200' height='200'></a>
			<h4><strong>".$row["ProductName"]."</strong></h4>
			</div>
		
		</section>
	"; 	

		}
		?>
	 </article>
	 
	 </div>
	
	
	
       <div id="clearBoth"></div>
     <footer>
    	<div id="mainFooter">
        	<section id="borderRight" class="column">
        		<h4><strong>STAY CONNECTED</strong></h4>
            	<ul>
				 <li><a href="https://plus.google.com/share?url=http%3A//collettesph.com"><img src="images/white.jpg" alt=""/></a></li>
                  <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//collettesph.com/"><img src="images/fb.jpg" width="50" height="50" alt="" /></a></li>    
			    
                      <li><a href="https://plus.google.com/share?url=http%3A//collettesph.com"><img src="images/ig.jpg" width="50" height="50" alt=""/></a></li>
                
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
</body>
</html>