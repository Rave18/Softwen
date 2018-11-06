<?php
include "connection.php";
session_start();
if(isset($_SESSION["username"])){

}else{
header('location:noacc.php');
session_destroy();

}



if(filter_input(INPUT_POST,"checkout")){
	
$tots = $_SESSION['total'];
		$qry=$conn->prepare("SELECT SUM(PRICE) AS sum1 from tblAddToCart WHERE accountid = :id");
		$qry->bindParam("id",$_SESSION["ID"]);
		$qry->execute();
		$result=$qry->fetchAll(PDO::FETCH_ASSOC);
		if($result[0]["sum1"]){
		$quantity=filter_input(INPUT_POST,"quantity");
	$firstname= $_SESSION["username"];
	$lastname=filter_input(INPUT_POST,"LastName");
	$city=filter_input(INPUT_POST,"City");
	$province=filter_input(INPUT_POST,"Province");
	$contactnum=filter_input(INPUT_POST,"ContactNum");
	$paymentmethod="Cash";
	$shipstatus="Pending";
	
	$Status="Pending";
	$qry=$conn->prepare("INSERT INTO tblorders values(NULL,:AccountID,null,:FirstName,null,null,null,null,:Payment,:Status, null,:shipstatus,null)");
	$qry->bindParam("AccountID",$_SESSION["ID"]);
	$qry->bindParam("FirstName", $_SESSION["username"]);
	$qry->bindParam("Payment",$paymentmethod);
	$qry->bindParam("Status",$Status);
	$qry->bindParam("shipstatus",$shipstatus);
	$qry->execute();
	$lastID = $conn->lastInsertId();

	$qry = $conn->prepare("INSERT INTO tblorderdetails SELECT NULL, $lastID, ProductID, Quantity, Price FROM tbladdtocart WHERE accountid = :id");
	$qry->bindParam("id",$_SESSION["ID"]);
	$qry->execute();
	
	
	
	$qry=$conn->prepare("INSERT INTO tblmessages values(NULL, :title,NOW(),:body,0,:rec, :status)");
$qry->bindParam("title",$title);
$qry->bindParam("body",$body);
$qry->bindParam("rec",$_SESSION["ID"]);
$qry->bindParam("status",$status);
$title = "Payment Update";
$status="Unread";

$body="Good day $firstname! The total price of your order is $tots. Please wait while we process your orders. We will be sending you a date later on when your ordered products will be delivered. Thank you for choosing Promdi Lola! ";
$qry->execute();
	
	$qry = $conn->prepare("DELETE FROM tbladdtocart WHERE accountid = :id");
	$qry->bindParam("id",$_SESSION["ID"]);
	if($qry->execute())
	{
	
	//$error="Your information had been successfully sent, please check your notifications for further payment instructions. Thank you. ";//
$err="";
	}
}

		
}

		else if(isset($_POST["delet"])){
	$id=filter_input(INPUT_POST,"id");

	$qry = $conn->prepare("DELETE FROM tbladdtocart WHERE ID = :id");
	$qry->bindParam("id",$id);
	$qry->execute();
	
	
	load_addtocart();
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
	width: 1180px;
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
#prod
{
display:block;
margin-bottom:25px;
width:100%;
height:100px;
border:1px solid;
font-family:Cambria;

}
#prod1
{
display:block;
margin-bottom:25px;
width:100%;
border:1px solid;
font-family:Cambria;

}
#prod2
{
display:block;
margin-bottom:25px;
width:100%;
border:1px solid;
font-family:Cambria;

}
#prod3
{
display:block;
margin-bottom:25px;
width:100%;
border:1px solid;
font-family:Cambria;

}
#addprod{
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
#file{
	width: 344px;
	height:55px;
	background: #FAFAFA;
	margin: 10px auto;
	font-size:18px;
	font-family:Cambria;
	line-height:0px;
	text-align: center;
}
#addprod:hover{
	background: gray;
	color: #FAFAFA;	
}
article{
	width: 1180px;
	overflow: hidden;
	margin: 0 auto 10px;
	border-bottom: 1px solid gray;
}
form
{
margin:20px auto;
width:320px;


}
input{
padding:10px;
font-size:inherit;
}
h3 a{
	color:black;
}
h3 a:hover{
	color:black;
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
#checkout{
	width: 344px;
	height:55px;
	background: #FAFAFA;
	margin: 10px 290px auto;
	font-size:18px;
	font-family:Cambria;
	line-height:0px;
	text-align: center;
	border: 1px solid gray;
	
}
#checkout:hover{
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
	if(isset($err)){
		?>
		alert("Your order is now being processed. Please check your notifications.");
		$("#err").modal("show");
		<?php
	}
	?>
		});
</script>

<div id = "err" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "alert alert-success">
		<div class = "modal-title">Sucess
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
	if(isset($error)){
		?>
			alert("Minimum order is 500");
		$("#err").modal("show");
		
		<?php
	}
	?>
		});
</script>


</head>

<body>
<?php
if(isset($error)){
	?>
<div id = "err" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "alert alert-default fade in">
		<div class = "modal-title">Info
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


<?php } ?>
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
		  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete from Cart?</h4>
      </div>
      <div class="modal-body">
	  <div id='resultss' class="alert alert-danger" style="display:none;">Check Your Inputs<span class="close" data-dismiss='alert'>&times;</span></div>
	  
       <div class="row">
	   <form method="post">
	   <input type='hidden' name='id' id="id">
	   <input type="submit" name='delet' class='btn btn-danger' value='Yes'>
	    <input type="submit" name='del' class='btn btn-warning' value='Cancel' style='float:right;' data-dismiss="modal">
	   </div>
		</form>
		</div><br/>
		
		
		
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
  

<article>
	
	

	<h3 style="font-family:Cambria;text-align:center">SHOPPING CART</h3></br>
	
	 <div id="inventory">
	 <table class="table table-bordered table-hover">
	 <tr><th>ID</th><th>Product Name</th><th>Quantity</th><th>Price</th><th></th></tr>
	 
	 <?php
	 

	function load_addtocart(){
		include "connection.php";
		global $query;
		$query=$conn->prepare("select accountid, tblProducts.ID,tbladdtocart.ID,tblProducts.ProductName,tbladdtocart.quantity,tbladdtocart.price from tblProducts right join tblAddToCart on tblProducts.ID=tblAddToCart.ProductID HAVING accountid = :aid");
		$query->bindParam("aid",$_SESSION["ID"]);
		$query->execute();
		
	}
	load_addtocart();











		 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 echo "<tr><td>".$row["ID"]."</td><td>".$row["ProductName"]."</td><td>".$row["quantity"]."</td><td>".$row["price"]."</td><form method='post'><input type='hidden' name='prod_id' value=".$row["ID"]."><td><button type='button' class='btn btn-info' id='okay'  data-toggle='modal' data-target='#myModal' style='float:left;'>REMOVE TO CART</button></form></td></tr>";
		 
	 }
	 
	 ?>
	 </table>
	 </div>
	 
	
		<label style="font-family:Cambria;font-size:18px;margin-left:800px">Total:
		<?php
			$id=$_SESSION["ID"];
		include "connection.php";
		$qry=$conn->prepare("SELECT SUM(PRICE)sum1 from tblAddToCart where accountid=:id");
		$qry->bindParam("id",$id);
		$qry->execute();
		while($row=$qry->fetch(PDO::FETCH_ASSOC)){
			$format=number_format($row["sum1"],2,'.',',');
			$_SESSION['total'] = $format;
			echo $format;
			
			
		}
		
		?>
		

		</label>
	
	
	<form method="post">
	
	<strong><input type="submit" id="checkout" value="Check Out" name="checkout"></strong>
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
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
   <script>
   $('#okay').click(function(){
	  $('#id').val($(this).closest("tr").find('td:eq(0)').text());
   });
   </script>
</body>
</html>