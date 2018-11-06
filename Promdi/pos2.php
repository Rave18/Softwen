

<?php
session_start();
	global $query;
	
	include "connection.php";
	$id=$_GET["id"];
	$query=$conn->prepare("Select * from tblProducts where ID=:id");
	$query->bindParam("id",$id);
	$query->execute();
	
	?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Colette's Buko Pie</title>
<style>


</style>
<link href="css/responsiveslides.css" rel="stylesheet" type="text/css">

<link href="css/indexPhone.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 320px)" >
<link href="css/indexTablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 321px) and (max-width: 768px)" >
<link href="css/admincss.css" rel="stylesheet" type="text/css"  media="only screen and (min-width: 769px)">
<meta name="viewport" content="width=device-width, maximum-scale=1.0" />

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/responsiveslides.min.js"></script>
<script type="text/javascript">
   $(function() {
    $(".rslides").responsiveSlides({
		 maxwidth: 900,       
		 speed: 800
		
		});
  });
</script>
</head>

<body>
<div id="wrapper">
<?php
	include "admin.php"
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

  <?php
  include "mainfooter.php";

  ?>
</div>
</body>
</html>
