<?php
session_start();
if(isset($_SESSION["username"])){

}else{
header('location:noacc.php');
session_destroy();

}


function load_prod(){
	global $qry;
	
	include "connection.php";
	$id=$_GET["id"];
	$qry=$conn->prepare("Select * from tblProducts where ID=:id");
	$qry->bindParam("id",$id);
	$qry->execute();
	

}
load_prod();

global $prod_id;
global $price;
global $qry;
while($row=$qry->fetch(PDO::FETCH_ASSOC)){
	$prod_id=$row["ID"];
	$price=$row["Price"];
	
}





if(filter_input(INPUT_POST,"addcart")){
	include "connection.php";
	$quantity=filter_input(INPUT_POST,"quantity");
	$prices=$price * $quantity;
	
	$qry=$conn->prepare("Select * from tblAddToCart where accountID= :aid and productid=:prod_id");
	$qry->bindParam("aid",$_SESSION["ID"]);
	$qry->bindParam("prod_id",$prod_id);
	$qry->execute();
	$rows = $qry->fetchAll(PDO::FETCH_ASSOC);
	if($rows){
		$qry=$conn->prepare("update tblAddToCart set price=  :price + price,quantity=quantity + :quantity where accountid=:aid and productid=:prod_id");

$qry->bindParam("price",$prices);
$qry->bindParam("quantity",$quantity);
$qry->bindParam("aid",$_SESSION["ID"]);
$qry->bindParam("prod_id",$prod_id);
$qry->execute();
	}else{
	
$qry=$conn->prepare("INSERT INTO tblAddToCart values(NULL, :aid,:prod_id,:quantity,:price)");
$qry->bindParam("quantity",$quantity);
$qry->bindParam("price",$prices);
$qry->bindParam("prod_id",$prod_id);
$qry->bindParam("aid",$_SESSION["ID"]);
$qry->execute();
	}
load_prods();
$error = "You successfully added this product to the cart.";
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
	margin-top:20px;
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
#quantity{
	
margin-left:100px;
width:40px;
height:50px;
}

#content form p{
	position:absolute;
	right:700px;
	
}
#log {
	height: 30px;
	width: 740px;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	color:white;
	left:1000px;
	position:absolute;
	top:17px;
}
h4 a{
	color:white;
}
h4 a:hover{
	color:white;
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
		<div class = "modal-title">Sucess
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $error; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-primary" data-dismiss = "modal" onclick = "window.location.replace('userproddesc.php?id=<?php print $prod_id; ?>');">OK</button>
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
			<h4><em><a href="userorder.php">MY ORDERS</a> &nbsp; &nbsp; <a href="logout.php">LOGOUT</a></em></h4>
		</div>
		</div>

    	<div id="mainNav">    	
    	<ul>
        	<li><a href="userblog.php" class="under"><strong>BLOG</strong></a></li>
			    <li><a href="usernotif.php" class="under"><strong>NOTIFICATIONS</strong></a></li>
							    <li><a href="userprod.php" class="under"><strong>PRODUCTS</strong></a></li>
            <div id="logo" ><a href="userhome.php"><img src="images/logo.jpg" width="300" height="178" alt=""/></a></div>
			    <li><a href="mycart.php" class="under"><strong>MY CART</strong></a></li>
			    <li><a href="userjob.php" class="under"><strong>JOBS</strong></a></li>
							    <li><a href="usersettings.php" class="under"><strong>SETTINGS</strong></a></li>
        </ul>
        </div>
	</nav>
	
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

?>

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
			<a href='userproddesc.php?id=".$row["ID"]."'><img src='data:image;base64,".$row["product_image"]."' width='200' height='200'></a>
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
        	<h4><strong>GET TO KNOW US</strong></h4>
            <div id="button"><a href="userabout.php"><strong>ABOUT</strong></a></div>
            <p>Learn more about Promdi Lola</p>
       		</section>
      		 <section id="borderLeft" class="column">
        		<h4><strong>CONTACTS</strong></h4>
       <div id="button"><a href="usercontact.php"><strong>CONTACT US</strong></a></div>
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