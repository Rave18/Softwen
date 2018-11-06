<?php

session_start();

   if(isset($_SESSION["user"])){
       
         $name = $_SESSION["user"];
        
          $id = $_SESSION["user_id"];
      
       }else{
       header('Location:ERROR.php');
       session_destroy();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Lucky Fashion Mart | Sales Reports</title>
	<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>

  <script src="jquery/jquery-3.2.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/print_stock.css" media="print">
   <script src="ajax/sales_report.js"></script>
   <script src="ajax/print_sales_report.js"></script>
    <script src="ajax/search_by_date.js"></script>
    <script type="text/javascript">
            function idleTimer() {
    var t;
    //window.onload = resetTimer;
    window.onmousemove = resetTimer; // catches mouse movements
    window.onmousedown = resetTimer; // catches mouse movements
    window.onclick = resetTimer;     // catches mouse clicks
    window.onscroll = resetTimer;    // catches scrolling
    window.onkeypress = resetTimer;  //catches keyboard actions

    function logout() {
        window.location.href = 'Logout.php';  //Adapt to actual logout script
    }

   function reload() {
          window.location = self.location.href;  //Reloads the current page
   }

   function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout, 300000);  // time is in milliseconds (1000 is 1 second)
          // time is in milliseconds (1000 is 1 second)
    }
}
idleTimer();
    </script>

  
  <title>Lucky Fashion Mart | Stock</title>
  <link rel="icon" type="image/png" href="Lucky.ico" />
</head>
<body style="background:#e9ebee;">

<nav class="navbar navbar-inverse ">
  <div class="container-fluid" style="box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 1);">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" href="#">Lucky Fashion Mart</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="Home.php">Transaction</a></li>
        <li class="dropdown ">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inventory <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li ><a href="Stocks.php">Stocks</a></li>
            
            <li><a href="suppliers.php">Suppliers</a> </li>          
          
            <li><a href="critical_stock.php">Critical Stock</a></li>
          </ul>
        </li>
         <li class="dropdown active">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="#">Sales</a></li>
            <li><a href="Returned_Items.php">Returned Items</a></li>          
          </ul>
        </li>
   <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">cPanel<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="manage_accounts.php">Manage Accounts</a></li>
            
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>  
     
        <?php echo "$name" ?>
        </a>
        </li>
        <li onclick="logout()"><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
<h2 style="text-align: center;border-bottom:thin double  rgb(116, 117, 119);">Sales Report</h2>
<div class="row" >
<div class="col-sm-3">
<button class="btn btn-primary form-control" id="daily" >Daily</button>
</div>
<div class="col-sm-3">
<button class="btn btn-primary form-control" id="weekly">Weekly</button>
</div>
<div class="col-sm-3">
<button class="btn btn-primary form-control" id="monthly">Monthly</button>
</div>
<div class="col-sm-3">
<button class="btn btn-primary form-control" id="annually">Annually</button>
</div>

</div>
<div class="row" style="margin-top: 5px;width: 50%;" >

  <div class="col-sm-3">
    <input type="date" class="form-control" id="date_start" name="date_start">
  </div>
  <div class="col-xs-1">
   <p style="font-size: 12pt;margin-top: 5px;">To</p>
  </div>

     <div class="col-sm-3">
    <input type="date" class="form-control" id="date_end">
  </div>
  <div class="col-sm-2">
 
    <button type="button " name="search" id="id_search" class=" btn-primary form-control">Search</button>
  </div>

</div>


<p id="p_daily" style="font-size: 12pt;margin-top: 5px;" ><b>Report Type: </b> Daily</p>
<p id="p_weekly" style="font-size: 12pt;margin-top: 5px;" ><b>Report Type: </b> Weekly</p>
<p id="p_monthly" style="font-size: 12pt;margin-top: 5px;" ><b>Report Type: </b> Monthly</p>
<p id="p_annually" style="font-size: 12pt;margin-top: 5px;" ><b>Report Type: </b> Annually</p>
<p id="p_search" style="font-size: 12pt;margin-top: 5px;" ><b>Report Type: </b></p>

<div id="daily_reports" style='clear: left; overflow-y: auto; margin-top:10px;overflow-x: auto; min-height: 400px; max-height: 400px;  box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);border-radius: 8px;  '>
<?php
 include "PDO_Login_Connect.php";
  global $qry;
  global $result;
  $qry=$connect->prepare("SELECT TRANSACTION_CODE,USER_ID,ITEM_CODE,ITEM_NAME,DESCRIPTION,QUANTITY,ITEM_PRICE,DISCOUNT,TOTAL,TRANSACTION_DATE FROM tbltransactions  WHERE YEAR(transaction_date) = YEAR(NOW()) AND MONTH(transaction_date) = MONTH(NOW()) AND DAY(transaction_date) = DAY(NOW())  ORDER BY TRANSACTION_DATE DESC");
  $qry->execute();
  $result=$qry->rowCount();
   
      
 echo "<table id='myTable' class=' table  table-responsive table-bordered table-stripped table-hover'  stlyle='paddng:7px;border='1' cellpadding='3' '>
 <tr style='background:gray;'>
      
       <th>Transaction Code</th>
       <th>User ID</th>
       <th>Item Code</th>
       <th>Item Name</th>
       <th>Description</th>
       <th>Quantity</th>
        <th>Item Price</th>
        <th>Discount</th>
        <th>Total</th>
        <th>Transaction Date</th>
       </tr>";
 while($row=$qry->fetch(PDO::FETCH_ASSOC)){


   $daily_itemprice =number_format($row["ITEM_PRICE"],2,'.',',');
       

         $daily_discount =number_format($row["DISCOUNT"],2,'.',',');
   

        $daily_total =number_format($row["TOTAL"],2,'.',',');

   
        echo "<tr>
        <td>".$row["TRANSACTION_CODE"]."</td>
        <td>".$row["USER_ID"]."</td>
        <td>".$row["ITEM_CODE"]."</td>
        <td>".$row["ITEM_NAME"]."</td>
        <td>".$row["DESCRIPTION"]."</td>
        <td>".$row["QUANTITY"]."</td>
        <td>".$daily_itemprice."</td>
        <td>".$daily_discount."</td>
        <td>".$daily_total."</td>
        <td>".$row["TRANSACTION_DATE"]."</td></tr>";

    }
 echo "</table>";
?>

</div>

<div id='weekly_reports' style='clear: left; overflow-y: auto; margin-top:10px;overflow-x: auto; min-height: 400px; max-height: 400px;  box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);border-radius: 8px;  '>
<?php
 include "PDO_Login_Connect.php";
  global $qry;
  global $result;
  $qry=$connect->prepare("SELECT * FROM tbltransactions WHERE WEEKOFYEAR(Transaction_date) = WEEKOFYEAR(NOW()) ORDER BY TRANSACTION_DATE DESC");
  $qry->execute();
  $result=$qry->rowCount();
   
      
 echo "<table id='myTable' class=' table  table-responsive table-bordered table-stripped table-hover'  stlyle='paddng:7px;border='1' cellpadding='3' '>
 <tr style='background:gray;'>
      
       <th>Transaction Code</th>
       <th>User ID</th>
       <th>Item Code</th>
       <th>Item Name</th>
       <th>Description</th>
       <th>Quantity</th>
        <th>Item Price</th>
        <th>Discount</th>
        <th>Total</th>
        <th>Transaction Date</th>
       </tr>";
 while($row=$qry->fetch(PDO::FETCH_ASSOC)){


        $weekly_itemprice =number_format($row["ITEM_PRICE"],2,'.',',');
       

         $weekly_discount =number_format($row["DISCOUNT"],2,'.',',');
   

        $weekly_total =number_format($row["TOTAL"],2,'.',',');
        

   
        echo "<tr>
        <td>".$row["TRANSACTION_CODE"]."</td>
        <td>".$row["USER_ID"]."</td>
        <td>".$row["ITEM_CODE"]."</td>
        <td>".$row["ITEM_NAME"]."</td>
        <td>".$row["DESCRIPTION"]."</td>
        <td>".$row["QUANTITY"]."</td>
        <td>".$weekly_itemprice."</td>
        <td>".$weekly_discount."</td>
        <td>".$weekly_total."</td>
        <td>".$row["TRANSACTION_DATE"]."</td></tr>";

    }
 echo "</table>";
?>

</div>



<div id='monthly_reports' style='clear: left; overflow-y: auto; margin-top:10px;overflow-x: auto; min-height: 400px; max-height: 400px;  box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);border-radius: 8px;  '>
<?php
 include "PDO_Login_Connect.php";
  global $qry;
  global $result;
  $qry=$connect->prepare("SELECT * FROM tbltransactions WHERE MONTH(TRANSACTION_DATE) = MONTH(NOW()) ORDER BY TRANSACTION_DATE DESC");
  $qry->execute();
  $result=$qry->rowCount();
   
      
 echo "<table id='myTable' class=' table  table-responsive table-bordered table-stripped table-hover'  stlyle='paddng:7px;border='1' cellpadding='3' '>
 <tr style='background:gray;'>
      
       <th>Transaction Code</th>
       <th>User ID</th>
       <th>Item Code</th>
       <th>Item Name</th>
       <th>Description</th>
       <th>Quantity</th>
        <th>Item Price</th>
        <th>Discount</th>
        <th>Total</th>
        <th>Transaction Date</th>
       </tr>";
 while($row=$qry->fetch(PDO::FETCH_ASSOC)){
         $monthly_itemprice =number_format($row["ITEM_PRICE"],2,'.',',');
       

         $monthly_discount =number_format($row["DISCOUNT"],2,'.',',');
   

        $monthly_total =number_format($row["TOTAL"],2,'.',',');

   
        echo "<tr>
        <td>".$row["TRANSACTION_CODE"]."</td>
        <td>".$row["USER_ID"]."</td>
        <td>".$row["ITEM_CODE"]."</td>
        <td>".$row["ITEM_NAME"]."</td>
        <td>".$row["DESCRIPTION"]."</td>
        <td>".$row["QUANTITY"]."</td>
        <td>".$monthly_itemprice."</td>
        <td>".$monthly_discount."</td>
        <td>".$monthly_total."</td>
        <td>".$row["TRANSACTION_DATE"]."</td></tr>";

    }
 echo "</table>";
?>

</div>

<div id="annually_reports" style='clear: left; overflow-y: auto; margin-top:10px;overflow-x: auto; min-height: 400px; max-height: 400px;  box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);border-radius: 8px;  '>
<?php
 include "PDO_Login_Connect.php";

 
  $qry=$connect->prepare("SELECT * FROM tbltransactions WHERE YEAR(TRANSACTION_DATE) = YEAR(NOW())  ORDER BY TRANSACTION_DATE DESC;");
  $qry->execute();
  $result=$qry->rowCount();
   
      
 echo "<table id='myTable_Annually' class=' table  table-responsive table-bordered table-stripped table-hover'  stlyle='paddng:7px;border='1' cellpadding='3' '>
 <tr style='background:gray;'>
      
       <th>Transaction Code</th>
       <th>User ID</th>
       <th>Item Code</th>
       <th>Item Name</th>
       <th>Description</th>
       <th>Quantity</th>
        <th>Item Price</th>
        <th>Discount</th>
        <th>Total</th>
        <th>Transaction Date</th>
       </tr>";
 while($row=$qry->fetch(PDO::FETCH_ASSOC)){
         $annually_itemprice =number_format($row["ITEM_PRICE"],2,'.',',');
       

         $annually_discount =number_format($row["DISCOUNT"],2,'.',',');
   

        $annually_total =number_format($row["TOTAL"],2,'.',',');

   
        echo "<tr>
        <td>".$row["TRANSACTION_CODE"]."</td>
        <td>".$row["USER_ID"]."</td>
        <td>".$row["ITEM_CODE"]."</td>
        <td>".$row["ITEM_NAME"]."</td>
        <td>".$row["DESCRIPTION"]."</td>
        <td>".$row["QUANTITY"]."</td>
        <td>".$annually_itemprice."</td>
        <td>".$annually_discount."</td>
        <td>".$annually_total."</td>
        <td>".$row["TRANSACTION_DATE"]."</td></tr>";

    }
 echo "</table>";
?>

</div>

<div id="search_reports" style='clear: left; overflow-y: auto; margin-top:10px;overflow-x: auto; min-height: 400px; max-height: 400px;  box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);border-radius: 8px;  '>


</div>
<div class="jumbotron" id="total_daily" style="border-radius: 8px;padding: 10px; margin-top: 5px;box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);">
    <h3 id="tots_daily"><b>Total: &#8369
    <?php

    include "PDO_Login_Connect.php";

       $qry=$connect->prepare("Select SUM(TOTAL)SUM1 from tbltransactions WHERE YEAR(transaction_date) = YEAR(NOW()) AND MONTH(transaction_date) = MONTH(NOW()) AND DAY(transaction_date) = DAY(NOW()) ");
        $qry->execute();
        $result=$qry->rowCount();
      
        while($row=$qry->fetch(PDO::FETCH_ASSOC)){
         
          $english_format_number =number_format($row["SUM1"],2,'.',',');
        echo  $english_format_number;
        



    }

    ?>

    </b></h3> 

 
  </div> 

  <div class="jumbotron" id="total_annually" style="border-radius: 8px;padding: 10px; margin-top: 5px;box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);">
    <h3 id="tots_annually"><b>Total: &#8369
    <?php

    include "PDO_Login_Connect.php";
       $qry=$connect->prepare("SELECT SUM(TOTAL)SUM1 FROM tbltransactions WHERE YEAR(TRANSACTION_DATE) = YEAR(NOW()) ");
        $qry->execute();
        $result=$qry->rowCount();
      
        while($row=$qry->fetch(PDO::FETCH_ASSOC)){
         
          $english_format_number =number_format($row["SUM1"],2,'.',',');
        echo  $english_format_number;
       
    



    }

    ?>

    </b></h3> 

 
  </div> 

   <div class="jumbotron" id="total_monthly" style="border-radius: 8px;padding: 10px; margin-top: 5px;box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);">
    <h3 id="tots_monthly"><b>Total: &#8369
    <?php

    include "PDO_Login_Connect.php";
       $qry=$connect->prepare("SELECT SUM(TOTAL)SUM1 FROM tbltransactions WHERE MONTH(TRANSACTION_DATE) = MONTH(NOW()) ORDER BY TRANSACTION_DATE DESC ");
        $qry->execute();
        $result=$qry->rowCount();
      
        while($row=$qry->fetch(PDO::FETCH_ASSOC)){
         
          $english_format_number =number_format($row["SUM1"],2,'.',',');
        echo  $english_format_number;
        



    }

    ?>

    </b></h3> 

 
  </div> 
  <div class="jumbotron" id="total_weekly" style="border-radius: 8px;padding: 10px; margin-top: 5px;box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);">
    <h3 id="tots_weekly"><b>Total: &#8369
    <?php


    include "PDO_Login_Connect.php";
       $qry=$connect->prepare("SELECT SUM(TOTAL)SUM1 FROM tbltransactions WHERE WEEKOFYEAR(Transaction_date) = WEEKOFYEAR(NOW()) ORDER BY TRANSACTION_DATE DESC ");
        $qry->execute();
        $result=$qry->rowCount();
      
        while($row=$qry->fetch(PDO::FETCH_ASSOC)){
         
          $english_format_number =number_format($row["SUM1"],2,'.',',');
        echo  $english_format_number;
        



    }

    ?>

    </b></h3> 

 
  </div> 
   <div class="jumbotron" id="total_search" value="0.00" style="border-radius: 8px;padding: 10px; margin-top: 5px;box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);">
   <h3 id="tots_search">
    <b>Total: &#8369
    

   

    </b>
</h3> 
 
  </div> 
  <button class="btn btn-default " type="submit" id="id_btn_report"><span class="glyphicon glyphicon-print"> Print</span></button>


</div>
</body>
</html>