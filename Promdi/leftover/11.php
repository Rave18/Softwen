<?php  
  session_start();
        global $confirmation;
        global $error;
        global $confirmation1;
        global $error1;   
        global $error_sprice;
        global $error_itemcode;
        global $error_quantity;
        global $error_whitespaces;
        global $query1;
        global $result1;
        global $itemcode_select;
        global $itemname_select;
        global $itemprice_select;
        global $quantity_select;
        global $discount_select;
        global $description_select;
        global $search_result;
         global $itemcode1;
         global $itemname1;
         global $itemprice1;
         global $quantity1;
         global $discount1;
         global $description1;
         global $subtotal;
         global $subtotal1;
       
         global $id;


         global $add_to_cart_error_quantity;
         global $add_to_cart_error_itemname;
         global $add_to_cart_error_itemprice;
         global $add_to_cart_error_discount;
         global $add_to_cart_error_description;
         global $item_code_letter;
         global $item_code_number;
         global $error_cash;
         global $sukli;
         global $show_change;

         global $quantity_from_db;
         global $itemprice_from_db;
         global $itemname_from_db;
         global $description_from_db;

         global $insert_process_error;
         global $insert_process_success;
         global $last_code;
         global $final;
         
        load_code();
        



       
                                  function load_code(){
                                 $string = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
                                                $number = rand(100000,999999);
                                                $year = date("Y");
                                             
                                               $process_transactioncode = $year."".$string."".$number;
                                    
                                                  $coding = $process_transactioncode;



                                        
 
                                                  
                                                          

                                              $_SESSION['coded'] = $coding;
                                              
                                             
                                   }

       
        
          
      
                


       
                              
                                


         $projects=array();
         $td = array();


       $list;
    
            
        
          
       if(isset($_SESSION["user"])){
       
         $name = $_SESSION["user"];
        
          $id = $_SESSION["user_id"];
      
       }else{
       header('Location:ERROR.php');
       session_destroy();
       }


 function change(){
   include "PDO_Login_Connect.php";
   $query_select_total1=$connect->prepare("SELECT SUM(SUB_TOTAL)SUM1 FROM tbladdtocart ");
   $query_select_total1->execute();
   $result1=$query_select_total1->rowCount();

   while ($row=$query_select_total1->fetch(PDO::FETCH_ASSOC)) {
   $total=$row["SUM1"];
                                                 
                                                  

   $change = $cash101 - $total;
   $last_change = number_format($change,2,'.',',');
   $final = $last_change;
   }                                           
 }





      


function load_items(){

  include "PDO_Login_Connect.php";
  global $qry;
  global $result;
  $qry=$connect->prepare("Select * from tbladdtocart");
  $qry->execute();
  $result=$qry->rowCount();
}load_items();


if (isset($_POST["btn_addtocart"])) {
  load_code();
       include "PDO_Login_Connect.php";
       $itemcode1=$_POST['code'];
       $itemname1=$_POST['itemname'];
       $itemprice1=$_POST['itemprice'];
       $quantity1=$_POST['quan'];
       $discount1=$_POST['disc'];
       $description1=$_POST['desc'];
       
       $subtotal=$itemprice1*$quantity1;
       $subtotal1=$subtotal-$discount1;
       $last_dcount1 = $quantity1 *  $itemprice1;


       //this will   check if the data of itemcode is correct
        $query_select1=$connect->prepare("SELECT * FROM tblstock WHERE ITEM_CODE=:i_c");
        $query_select1->bindParam("i_c",$itemcode1);
        $query_select1->execute();
        $result1=$query_select1->rowCount();
        if($result1){//ITEM CODE

                while($row=$query_select1->fetch(PDO::FETCH_ASSOC)){
                    $quantity_from_db=$row["QUANTITY"];
                    $description_from_db=$row["DESCRIPTION"];
                    $itemname_from_db=$row["ITEM_NAME"];
                    $itemprice_from_db=$row["ITEM_PRICE"];


					
					
					



                    if ($quantity1 > $quantity_from_db) {
                      $add_to_cart_error_quantity ="<div class='alert alert-success'>Insufficient Quantity in your Stock! <span class='close' data-dismiss='alert'>&times;</span></div>";

                    }elseif ($quantity_from_db == "0") {
                      $add_to_cart_error_quantity ="<div class='alert alert-success'>Out of Stock! <span class='close' data-dismiss='alert'>&times;</span></div>";

                    }elseif($itemname1 != $itemname_from_db ) {
                      
                       $add_to_cart_error_itemname ="<div class='alert alert-success'>Invalid Item Name! please do not make any <b>ALTERATION</b> on this section!<span class='close' data-dismiss='alert'>&times;</span></div>";

                    }elseif($description_from_db != $description1) {
                      $add_to_cart_error_description ="<div class='alert alert-success'>Invalid Description! please do not make any <b>ALTERATION</b> on this section!<span class='close' data-dismiss='alert'>&times;</span></div>";

                    }elseif($itemprice1 != $itemprice_from_db) {
                      $add_to_cart_error_itemprice ="<div class='alert alert-success'>Invalid Item Price! please do not make any <b>ALTERATION</b> on this section!<span class='close' data-dismiss='alert'>&times;</span></div>";

                    }elseif($discount1 >= $last_dcount1) {
                      $add_to_cart_error_discount ="<div class='alert alert-success'>Invalid Discount! please make sure the <b> DISCOUNT </b> is less than to the Sub Total!<span class='close' data-dismiss='alert'>&times;</span></div>";

                    }else{
                

                        $itemcode1=$_POST['code'];
                         $itemname1=$_POST['itemname'];
                         $itemprice1=$_POST['itemprice'];
                         $quantity1=$_POST['quan'];
                         $discount1=$_POST['disc'];
                         $description1=$_POST['desc'];
                         $subtotal=$itemprice1*$quantity1;
                         $subtotal1=$subtotal-$discount1;

                        $query_select1_addtocart=$connect->prepare("SELECT * FROM tbladdtocart WHERE ITEM_CODE=:i_c");
                        $query_select1_addtocart->bindParam("i_c",$itemcode1);
                        $query_select1_addtocart->execute();
                        $result_quantity=$query_select1_addtocart->rowCount();

                        if($result_quantity){
							
							while($row=$query_select1_addtocart->fetch(PDO::FETCH_ASSOC)){
								
								$quantity_on_addtocart=$row["QUANTITY"];
								$add_new_quantity = $quantity1 + $quantity_on_addtocart;
								
									if($add_new_quantity > $quantity_from_db){
										
										
										$add_to_cart_error_quantity ="<div class='alert alert-success'>Insufficient Quantity in your Stock!<span class='close' data-dismiss='alert'>&times;</span></div>";
									}else{
												
							
		
                            $query_update_addtocart=$connect->query("UPDATE tbladdtocart SET QUANTITY = QUANTITY + '$quantity1', DISCOUNT= DISCOUNT + '$discount1'  WHERE ITEM_CODE = '$itemcode1'");
			
                            if ($query_update_addtocart) {
									
							
                               $query_select_quantity=$connect->prepare("SELECT * FROM tbladdtocart WHERE ITEM_CODE=:i_c");
                                $query_select_quantity->bindParam("i_c",$itemcode1);
                                $query_select_quantity->execute();
                                $result_quantity=$query_select_quantity->rowCount();

                             if($result_quantity){
                                        while($row=$query_select_quantity->fetch(PDO::FETCH_ASSOC)){
                                          $new_quantity=$row["QUANTITY"];
                                          $itemprice101=$row["ITEM_PRICE"];
                                          $multiply=$new_quantity * $itemprice101;
                                          $new_discount=$row["DISCOUNT"];

                                          $new_subtotal=$multiply - $new_discount;

                                           $query_update_subtotal=$connect->query("UPDATE tbladdtocart SET  SUB_TOTAL= '$new_subtotal' WHERE ITEM_CODE = '$itemcode1'");
										
                                          if ($query_update_subtotal) {

                                            load_items();
                                             load_code();
                                              
                                            



                                            


                                        
											}


										}

                               

                        }	
                        


                         }
				  }
				}

                  }else{
							 
							 $query=$connect->prepare("INSERT INTO tbladdtocart values(null,:code,:name,:price,:quantity,:discount,:description,:sub)");
                        $query->bindParam("code",$itemcode1);
                        $query->bindParam("name",$itemname1);
                        $query->bindParam("price",$itemprice1);
                        $query->bindParam("quantity",$quantity1);
                        $query->bindParam("discount",$discount1);
                        $query->bindParam("description",$description1);
                        $query->bindParam("sub",$subtotal1);

                     
                          if($query->execute()){//INSERT

                         
                       
                         $confirmation="<div class='alert alert-success'>Added Succesfully<span class='close' data-dismiss='alert'>&times;</span></div>";
                         load_items();
                              
                           }else{//ELSE INSERT IS WRONG
                        
                               $error="<div class='alert alert-danger'>Invalid Inputs<span class='close' data-dismiss='alert'>&times;</span></div>";
                           }
                    
                  }
                         
                       

				}
			}
		}else{
			
                   $error="<div class='alert alert-danger'> Item Code Doesn't Exist! </b><span class='close' data-dismiss='alert'>&times;</span></div>";    
        
      
		}
}
 
                


                
                   $show_modal=false;

    
  if (isset($_POST["btn_process"])){

                                                                  

        include "PDO_Login_Connect.php";
        $query_select_total=$connect->prepare("SELECT SUM(SUB_TOTAL)SUM1 FROM tbladdtocart ");
        
        $query_select_total->execute();
        $result1=$query_select_total->rowCount();

        while ($row=$query_select_total->fetch(PDO::FETCH_ASSOC)) {
              $total=$row["SUM1"];
              $cash=$_POST['name_cash'];
            

              $change = $cash - $total;
              $last_change = number_format($change,2,'.',',');

                if($cash < $total ){

                    $error_cash ="<div class='alert alert-danger' style='text-align='center'><b>Insufficient Cash Amount!</b>!<span class='close' data-dismiss='alert'>&times;</span></div>";

                }else{
                     $query_select_process=$connect->prepare("SELECT * FROM tbladdtocart");
            
                    $query_select_process->execute();
                    $result1=$query_select_process->rowCount();

                    while ($row=$query_select_process->fetch(PDO::FETCH_ASSOC)) {
                              $projects[] = $row;
                    }
                        
                      foreach ($projects as $project) {

                                $each_itemcode = $project["ITEM_CODE"];
                                $each_quantity = $project["QUANTITY"];
                        
                          $query_update_process=$connect->query("UPDATE tblstock SET QUANTITY = QUANTITY - '$each_quantity' /'2' WHERE ITEM_CODE = '$each_itemcode'");
                          if ($query_update_process->execute()) {






                            $query_select_process1=$connect->prepare("SELECT * FROM tbladdtocart");
            
                              $query_select_process1->execute();
                            $result1=$query_select_process1->rowCount();


                            while ($row=$query_select_process1->fetch(PDO::FETCH_ASSOC)) {

                                 
                               $process_userid = $id;
                               $process_itemcode= $row["ITEM_CODE"];
                               $process_itemname=$row["ITEM_NAME"];
                               $process_description=$row["DESCRIPTION"];
                               $process_quantity=$row["QUANTITY"];
                               $process_itemprice=$row["ITEM_PRICE"];
                               $process_discount=$row["DISCOUNT"];
                               $process_total=$row["SUB_TOTAL"];



                                include "PDO_Login_Connect.php";
                                $query_insert_process=$connect->prepare("INSERT INTO tbltransactions(TRANSACTION_CODE,USER_ID,ITEM_CODE,ITEM_NAME,DESCRIPTION,QUANTITY,ITEM_PRICE,DISCOUNT,TOTAL,TRANSACTION_DATE) values(:transaction_code,:user_id,:item_code,:item_name,:description,:quantity,:item_price,:discount,:total,NOW())");

                                         
                                                                
                                $query_insert_process->bindParam("transaction_code",$_SESSION['coded']);
                                 $query_insert_process->bindParam("user_id",$process_userid);
                                    $query_insert_process->bindParam("item_code",$process_itemcode);
                                  $query_insert_process->bindParam("item_name",$process_itemname);
                                  $query_insert_process->bindParam("description",$process_description);
                                  $query_insert_process->bindParam("quantity",$process_quantity);
                                  $query_insert_process->bindParam("item_price",$process_itemprice);
                                  $query_insert_process->bindParam("discount",$process_discount);
                                  $query_insert_process->bindParam("total",$process_total);

                                if($query_insert_process->execute()){//INSERT
                                       
                                       
                                         include "PDO_Login_Connect.php";
                                       
                                                                  global $query6;
                                                                   $query6=$connect->prepare("truncate table tbladdtocart");
                                                                
                                                                  if($query6->execute()){
                                                                    
                                                                    $sukli = $last_change;
                                                                    $show_change ="<div class='alert alert-success'><b>CHANGE: &#8369</b> $sukli <span class='close' data-dismiss='alert'>&times;</span></div>";
                                                                       
                                                                   load_items();

                                              //------------------print receipt----
                                                                    
                                                                


                                                                  //-----------------------------  




                                                               
 
                                                                      
                                                                      }




                                    }else{
                                      header('Location: ERROR.php');


                                    }

                                     }
                                    }else{

                          }


                   
                        
                     }
                   
                 }
               }
             }
          
            
                    
  if(isset($_POST["btn_remove"])){
 include "PDO_Login_Connect.php";
 global $query_remove;

 $remove = $_POST['remove_code'];
  $query_remove=$connect->prepare("delete from tbladdtocart WHERE ITEM_CODE=:i_c");
  $query_remove->bindParam("i_c",$remove);
         
 if($query_remove->execute()){
  
            
   load_items();
 }
 }        


            

        
  


            
   
      if(isset($_POST["btn_clearall"])){
          include "PDO_Login_Connect.php";
          global $query6;
           $query6=$connect->prepare("truncate table tbladdtocart");
         
          if($query6->execute()){

           
         
           
           load_items();
         }else{
             
             
         }
      }


      if(isset($_POST["name_modal_btn_itemcode"])){
          
        echo date_format($item_code_number, 'Y-m-d H:i:s');
             
             
         
      }
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>

  <script src="jquery/jquery-3.2.1.min.js"></script>

  
  <script src="bootstrap/js/bootstrap.min.js"></script>



  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  

  
  <title>Lucky Fashion Mart | Home</title>
  <link rel="icon" type="image/png" href="Lucky.ico" />
 

  <script type="text/javascript">

  

    function calculate() {
    var quantity = document.getElementById('quantity').value; 
    var itemprice = document.getElementById('i_price').value;
    var discount = document.getElementById('dcount').value;
  
    var myResult = quantity * itemprice;
    var tot = myResult - discount;
    var a = Number(myResult);
    var b = Number(tot);
    document.getElementById('p_total').innerHTML = tot;
    var l_tot = Number(tot);
    if(quantity == "" && itemprice == ""){
      document.getElementById('p_total').innerHTML = "0.00";
    }

  }













   function myFunction(){
   
     
          $.get("./ajax/getname.php?ITEM_CODE=" + $("#i_code").val(), function(r){
          
        
         var result =JSON.parse(r);
      
         $("#i_name").val(result[0]["ITEM_NAME"]);
         $("#i_price").val(result[0]["ITEM_PRICE"]);
         $("#dtion").val(result[0]["DESCRIPTION"]);
     
         
        

         
     }); 
        
   }
   function myFunction2(){
   
  
          $.get("./ajax/getcode.php?ITEM_CODE LIKE" + $("#i_code").val(), function(r){
          
        
        var result1 = JSON.parse(r);
     
      
         $("#i_code1").val(result1[0]["ITEM_CODE"]);
         $("#i_code2").val(result1[1]["ITEM_CODE"]);
         $("#i_code3").val(result1[2]["ITEM_CODE"]);
       
             console.log(result1);
         
        
          
             
          

           
     
         
        

         
     }); 
        
   }











 



    function generate(e)
      { 
        var action = "1";
        $.ajax({

          url: './ajax/generate_code.php',
          type: 'POST',
          data: {action : 'showItem'},
          dataType: 'html',
          success: function(result)
          {
            $('#id_modal_itemcode').val(result);
            
          },
          error: function()
          {
            alert('failed!');
          }
        })
      }

 </script>

<script src="ajax/add_stock.js"></script> 
<script type="text/javascript">
     function item_code_checker(e){
       $("#therest").animate({
            height : 0
          });
     if(e.keyCode === 13){
             $.get("./ajax/check_itemcode.php?ITEM_CODE=" + $("#id_modal_itemcode").val(), function(r){
         var result = JSON.parse(r);
         if(result.ErrorCode === "Error 2"){
            alert('Item Code Exist! Make sure it is unique!');
         }else{
          $("#therest").animate({
            height : 700
          });
         }  
     }); 
    



   
 }
}



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


  



 
<script type="text/javascript">
$(document).ready(function() {
    $("#i_code").keyup(function() {
        var valtext = $(this).val()
        $(this).val(valtext.toUpperCase())

    })
   
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("#remove_item_code").keyup(function() {
        var valtext = $(this).val()
        $(this).val(valtext.toUpperCase())

    })
   
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("#id_modal_itemcode").keyup(function() {
        var valtext = $(this).val()
        $(this).val(valtext.toUpperCase())

    })
   
});
</script>

  <script type="text/javascript">
    $(document).ready(function()
{
    $("#quan").attr('maxlength','6');
});
  </script>

 



  <script type="text/javascript">
  function run(field) {
    setTimeout(function() {
        var regex = /\d*\.?\d?\d?/g;
        field.value = regex.exec(field.value);
    }, 5);
}
</script>

<script type="text/javascript">
 


 $(document).ready(function () {

  $.fn.capitalize = function () {
    $.each(this, function () {
        var split = this.value.split(' ');
        for (var i = 0, len = split.length; i < len; i++) {
            split[i] = split[i].charAt(0).toUpperCase() + split[i].slice(1);
        }
        this.value = split.join(' ');
    });
    return this;
};


    
    $('#id_modal_itemcode').keyup(function() {

        var $th = $(this);
        $th.val( $th.val().replace(/[^a-zA-Z0-9-]/g, function(str) { return ''; } ) );
    });


    $('#id_modal_itemname').keyup(function() {
        var $th = $(this);
        $(this).capitalize();
        $th.val( $th.val().replace(/[^a-zA-Z0-9 ]/g, function(str) { return ''; } ) );
        $th.val( $th.val().replace(/  /g, function(str) { return ' '; } ) );
        
    });

     $('#id_modal_sup_name').keyup(function() {
        $(this).capitalize();
        var $th1 = $(this);
        $th1.val( $th1.val().replace(/[^a-zA-Z0-9 ]/g, function(str) { return ''; } ) );
        $th1.val( $th1.val().replace(/  /g, function(str) { return ' '; } ) );
        
    });

      $('#id_modal_category').keyup(function() {
        $(this).capitalize();
        var $th = $(this);
        $th.val( $th.val().replace(/[^a-zA-Z0-9 ]/g, function(str) { return ''; } ) );
        $th.val( $th.val().replace(/  /g, function(str) { return ' '; } ) );
        
    });

        $('#id_modal_dtion').keyup(function() {
        $(this).capitalize();
        var $th = $(this);
        $th.val( $th.val().replace(/[^a-zA-Z0-9 ]/g, function(str) { return ''; } ) );
        $th.val( $th.val().replace(/  /g, function(str) { return ' '; } ) );
        
    });

          
});


 


        


</script>

<script type="text/javascript">
  function run_whole(field) {
    setTimeout(function() {
        var regex = /\d*/g;
        field.value = regex.exec(field.value);
    }, 5);
}
</script>

<script type="text/javascript">
$(document).ready(function()
{
    $("#id_modal_itemcode").attr('maxlength','15');
    $("#remove_item_code").attr('maxlength','15');
     $("#id_modal_itemname").attr('maxlength','15');
      $("#id_modal_quantity").attr('maxlength','5');
       $("#id_modal_clevel").attr('maxlength','5');
        $("#id_modal_sprice").attr('maxlength','8');
         $("#id_modal_supprice").attr('maxlength','8');
          $("#id_modal_sup_name").attr('maxlength','50');
           $("#id_modal_category").attr('maxlength','15');
            $("#id_modal_dtion").attr('maxlength','15');
            $("#i_code").attr('maxlength','15');
            $("#quantity").attr('maxlength','5');
            $("#dcount").attr('maxlength','8');
             $("#id_cash").attr('maxlength','8');

});
</script>

<script type="text/javascript">

    

        function printDiv2(myTable) {
         
         
          
     

          var sales = document.getElementById("tablesales").innerHTML;
           var head = document.getElementById("tablesales").innerHTML;
            var cash =  document.getElementById("id_cash").value;
           

           // To get the TOTAL
            var last_tots=(<?php include "PDO_Login_Connect.php"; 
            $qry1=$connect->prepare("Select SUM(SUB_TOTAL)SUM1 from tbladdtocart "); 
            $qry1->execute();  
            $result=$qry1->rowCount();
            $row=$qry1->fetchAll(PDO::FETCH_ASSOC);
            if($row){ 
            $english_format_number1 =$row[0]["SUM1"]; 
                        $last_last = $english_format_number1;
           

            echo  $last_last ? $last_last : "0.00";
            global $last_last;
          }
           
         
          ?>);
            // To get the TOTAL QUANTITY
            var total_quantity= (<?php include "PDO_Login_Connect.php"; 
            $qry1=$connect->prepare("Select SUM(QUANTITY)SUM1 from tbladdtocart "); 
            $qry1->execute();  
            $result=$qry1->rowCount();
            while($row=$qry1->fetch(PDO::FETCH_ASSOC)){ 
            $quantity =$row["SUM1"]; 
            echo $quantity ? $quantity : "0";
          
          }
          ?>);

          //TO get the TAX/VAT
          var res = (<?php include "PDO_Login_Connect.php"; 
            $qry11=$connect->prepare("Select * from tbl_taxation "); 
            $qry11->execute();  
            $result=$qry11->rowCount();
            while($row1=$qry11->fetch(PDO::FETCH_ASSOC)){ 
            $vat =$row1["TAX"]; 
            echo $vat;
          
          }
          ?>);

                //To get TRANSACTION_CODE
         
                var softwen = last_tots.toFixed(2);

                //VAT/TAX Computation
                var res1 = 112;
                var vat = res / res1;
                var vat1 = vat * last_tots;
                var vat2 = vat1.toFixed(2);

                var tots = last_tots;
                var last = cash - tots;
                var new_last = last.toFixed(2);

                var d = new Date();
                var year = d.getFullYear();
                var month = d.getMonth();
                var date = d.getDate();
           
                var hours = d.getHours();
                var minutes = d.getMinutes();
                var seconds = d.getSeconds();
            
          if(cash < last_tots){
             

            }else{
          

          
           
          
            
          var newWin = window.open("");
         


          
          newWin.document.write('<html><head> <title></title></head><body style="text-align:left;font-size:7pt; color: #5e89ff;font-family:helvetica;"><h1 style="text-align:center;font-size:10px; font-family:helvetica;">Lucky Fashion Mart <br> 2nd Floor SPC Shopping Mall <br>San Pablo City, Laguna.</h1>');
          newWin.document.write('Cashier: <?php echo $_SESSION["user"]; ?>'+   "<br>" +  'Transaction Code:' + '<?php echo $_SESSION["coded"]; ?> <br>' );
           newWin.document.write(month+"/"+ date+"/"+year +"  "+hours+":"+minutes+":"+ seconds  );
     
          newWin.document.write("<p style = 'margin-top: -15; text-align:center;'><br>----------------------------------------------------------------------------------------------<br></p>");
          newWin.document.write("<p style = 'margin-top: -25; text-align:center;'><br>----------------------------------------------------------------------------------------------<br></p>");
          newWin.document.write("<table style = 'font-size : 10px;text-align:center; margin-top: -10;padding:-10px;text-align:center;'>" + sales + "</table>");
          newWin.document.write("<p style = 'text-align:center;'><b>--------------------------------------"+total_quantity+" item(s)-----------------------------------------</p><br>");

          newWin.document.write('<p style = "text-align:right;"><b>Total:----------</b> '+ softwen +' </p>' +"<br>"); 
            
          newWin.document.write('<p style = "margin-top: -15;text-align:right;"><b>Cash:----------</b>  ' +  cash); 
          newWin.document.write('<p style = "margin-top: -15;text-align:right;"><br><b>Change:----------</b>  ' +  new_last); 
           newWin.document.write("<br>----------------------------------------------------------------------------------------------<br>");
          newWin.document.write('<p style = "margin-top: -15;text-align:right;"><br><b>VAT OUTPUT:----------</b>  ' +  vat2); 

           newWin.document.write("<br>");
           newWin.document.write("<br>");
           newWin.document.write("<br>");
           newWin.document.write("<p style='text-align:center;'>---OFFICIAL RECEIPT---</p>");
           newWin.document.write("<p style='text-align:center;'>Thank you, come again...</p>");
          
           
           
                     

             
             
         
      
      newWin.print();
      newWin.close();
    }
    }
        
   
 
</script>



<?php echo "$insert_process_success"; ?>
<?php echo "$insert_process_error"; ?>

</head>
<body style="background:#e9ebee;">


<div class="modal fade" id="myModal" role="dialog" >
            <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header" id="modal_head"style="background-color: #af4a01;color: white;" >
            <button type="button"  class="close" data-dismiss="modal" style="background-color: #af4a01;color: white;">&times;</button>
           
            <h4 class="modal-title" >Add Stock</h4>
            <div class='alert alert-danger' id="alert1" style="display: none;">Successfully Added! <span  class='close' data-dismiss='alert'>&times;</span></div>
            </div>
            <div class="modal-body">
  <div class="row" style="margin-left: 10px; margin-right: 0px;">           
 
 <div class = "col-xs-12 col-md-11">
  <form class="form" method="post" >

    <div class="form-group">
      <label for="code"> Item Code:</label>
      <input type="text" class="form-control" id="id_modal_itemcode" placeholder="Enter Item Code" name="name_modal_itemcode" onkeyup="item_code_checker(event)" required="" maxlength="15">
       <button name="name_modal_btn_itemcode" type="button" class="btn btn-primary" id="id_modal_btn_itemcode" onclick="generate(event);" onkeyup="item_code_checker(event)"  style="position:relative;right: 0px;height:30px;width:150px;font-size:15px;padding:0px;top:12px;" >Generate Code</button>
        
    </div>
   
    
    
      
       
       
       

        
   
    <div id = "therest" style = "height : 0px; overflow : hidden;">
    <div class="form-group">
      <label for="itemname"> Item Name:</label>
      <input type="text" class="form-control" id="id_modal_itemname" placeholder="Enter Item Name" name="name_modal_itemname" required >
      <div class='alert alert-danger' id="null_itemname" style="display: none;">Item Name Required <span  class='close' data-dismiss='alert'>&times;</span></div>

    </div>
    <div class="form-group">
      <label for="quan"> Quantity:</label>
      <input type="text" class="form-control" id="id_modal_quantity"  placeholder="Enter Quantity" name="name_modal_quan" onkeypress="run_whole(this)"  required>
      <div class='alert alert-danger' id="null_quantity" style="display: none;">Quantity Required <span  class='close' data-dismiss='alert'>&times;</span></div>
   
    </div>
    <div class="form-group">
      <label for="quan"> Critical Level:</label>
      <input type="text" class="form-control" id="id_modal_clevel" placeholder="Enter Critical Level" name="name_modal_clevel" onkeypress="run_whole(this)" required>
       <div class='alert alert-danger' id="alert_quantity" style="display: none;">Critical Level should be less than on Quantity!! ! <span  class='close' data-dismiss='alert'>&times;</span></div>
       <div class='alert alert-danger' id="null_clevel" style="display: none;">Critical Level Requiredsss <span  class='close' data-dismiss='alert'>&times;</span></div>
    </div>
    <div class="form-group">
      <label for="disc"> Store Price:</label>
      <input type="text" class="form-control" id="id_modal_sprice" placeholder="Enter Store Price" name="name_modal_sprice" onkeypress="run(this)" required>
      <div class='alert alert-danger' id="null_sprice" style="display: none;">Store Price Required <span  class='close' data-dismiss='alert'>&times;</span></div>
    </div>
      
   
      
      <div class="form-group">
      <label for="itemprice"> Supplier Price:</label>
      <input type="text" class="form-control" id="id_modal_supprice" placeholder="Enter Supplier Price" name="name_modal_supprice" onkeypress="run(this)" required >
       <div class='alert alert-danger' id="alert_supplierprice" style="display: none;">Supplier Price  should be less than on Store Price ! <span  class='close' data-dismiss='alert'>&times;</span></div>
       <div class='alert alert-danger' id="null_supprice" style="display: none;">Supplier Price Required <span  class='close' data-dismiss='alert'>&times;</span></div>

    </div>   
     <div class="form-group">
      <label for="itemprice"> Supplier Name:</label>
      <input type="text" class="form-control" id="id_modal_sup_name" placeholder="Enter Supplier Name" name="name_modal_supname" required >
      <div class='alert alert-danger' id="null_supp_name" style="display: none;">Supplier Name Required <span  class='close' data-dismiss='alert'>&times;</span></div>
    </div> 
    <div class="form-group">
      <label for="desc"> Category:</label>
      <input type="text" class="form-control" id="id_modal_category" placeholder="Enter Category" name="name_modal_category" required >
      <div class='alert alert-danger' id="null_category" style="display: none;">Category Required <span  class='close' data-dismiss='alert'>&times;</span></div>
    </div>
      <div class="form-group">
      <label for="desc"> Description:</label>
      <input type="text" class="form-control" id="id_modal_dtion" placeholder="Enter Description" name="name_modal_dtion" required >
      <div class='alert alert-danger' id="null_dtion" style="display: none;">Description Required <span  class='close' data-dismiss='alert'>&times;</span></div>
    </div>
      

      <div class="modal-footer">
     
    <button  name="modal_btn_additem" type="button"  class="btn btn-primary"  id="modal_add_item" style="position:relative;left: 20px ;">Add Item</button>     
   
    </div>
    </div>
    
      
    </form>
</div>
</div>   
    </div>
    </div>
    </div>
    </div>
          
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
        <li class="active"><a href="Home.php">Transaction</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inventory <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Stocks.php">Stocks</a></li>
            
            <li><a href="suppliers.php">Suppliers</a> </li>          
          
            <li><a href="critical_stock.php">Critical Stock</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Sales_Report.php">Sales</a></li>
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

<div class="row" style="margin-left: 10px; margin-right: 10px;">
  
 <div class = "col-xs-12 col-md-3">

  <form class="form" method="post" >
    <div class="form-group">
      <label for="code"> Item Code:</label>
      <input type="text" class="form-control" list="list_code" id="i_code" placeholder="Enter Item Code" name="code" onkeyup="myFunction2(this)" onchange="myFunction(this)"  required>
      <datalist id="list_code">
    <option id="i_code1" >
    <option id="i_code2" >
    <option id="i_code3" >

    </datalist>
     
    </div>
    <div class="form-group">
      <label for="quan"> Quantity:</label>
      <input type="text" class="form-control" id="quantity" oninput="calculate()" placeholder="Enter Quantity" name="quan" onkeypress="run_whole(this)" required>
      <?php echo "$add_to_cart_error_quantity"; ?>
    </div>
    <div class="form-group">
      <label for="disc"> Discount:</label>
      <input type="text" class="form-control" id="dcount" oninput="calculate()"  name="disc" onkeyup="run(this)" value="0.00"  required>
       <?php echo "$add_to_cart_error_discount"; ?>
    </div>
      <div class="form-group"><div style="position:absolute;height:230px;width:330px;background-color: black;opacity: 0;"></div> 
      <label for="itemname"> Item Name:</label>
      <input type="text" class="form-control" id="i_name" name="itemname" readonly >
       <?php echo "$add_to_cart_error_itemname"; ?>
    </div>        
      <div class="form-group">
      <label for="itemprice"> Item Price:</label>

      <input type="text" class="form-control" id="i_price" name="itemprice" oninput="calculate()" onkeyup="run(this)" value="0.00" readonly>
       <?php echo "$add_to_cart_error_itemprice"; ?>
    </div>
      <div class="form-group">
      <label for="desc"> Description:</label>
      <input type="text" class="form-control" id="dtion" name="desc" readonly= >
       <?php echo "$add_to_cart_error_description"; ?>
    </div>
        <h3 class="total" style="display:inline">Sub Total: &#8369 </h3>
    <h3 class="total" style="display:inline" id="p_total" >0.00</h3>
      <br>
      <?php echo "$confirmation"; echo "$error";?>
      <button type="submit" name="btn_addtocart" type="button" class="btn btn-primary"  id="add_to_cart" style="margin-top: 10px"><span class="halflings halflings-shopping-cart"></span>Submit</button>     
    </form>
</div>
  
<form method="post"  > 

 <div class = "col-md-9 col-xs-12" style="right: 2px; border-top: thin double  rgb(116, 117, 119);margin-top: 10px;">
  
 <button name="btn_clearall" type="submit"  type="button"  class="btn btn-primary" style="margin-top: 10px;background-color: red;" formnovalidate>Clear All</button> 
 <form method= "post">
 <button name="btn_remove" type="submit"  type="button"  class="btn btn-primary" style="margin-top: 10px; margin-left: 10px;margin-top: 10px;">Remove</button> 
  <input type="text"   id="remove_item_code" placeholder="Enter Item Code" name="remove_code" onkeyup ="myFunction()" style="position:absolute;left: 190px;top: 12px;height: 30px;" required>
  </form>
  <?php echo "$show_change"; ?>
  
  <div  id="cart" style='overflow-y: auto; height: 300px; box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);border-radius: 8px;margin-top: 5px;' >
 <?php


 echo "<table id='tablesales' class=' table  table-responsive table-bordered table-stripped table-hover'>";
 echo "<tr id='header' style='background:gray;' >
       <th id='head_itemcode'>Item Code</th>
       <th id='head_itemname'>Item Name</th>
       <th id='head_itemprice'>Item Price</th>
       <th id='head_quantity'>Quantity</th>
       <th id='head_discount'>Discount</th>
       <th id='head_subtotal'>Sub Total</th>
       </tr>";
 while($row=$qry->fetch(PDO::FETCH_ASSOC)){
        
           
        $english_format_number_price =number_format($row["ITEM_PRICE"],2,'.',',');
        $new1=$english_format_number_price;

         $english_format_number_discount =number_format($row["DISCOUNT"],2,'.',',');
        $new2=$english_format_number_discount;

        $english_format_number_subtotal =number_format($row["SUB_TOTAL"],2,'.',',');
        $new3=$english_format_number_subtotal;

        echo "<tr id='tr'>
        <td id='td_itemcode' > ".$row["ITEM_CODE"]."</td>
        <td id='td_itemname'>".$row["ITEM_NAME"]."</td>
        <td id=td_itemprice>".$new1."</td>
        <td id=td_quantity>".$row["QUANTITY"]."</td>
        <td id='td_discount'>".$new2."</td>
        <td id='td_subtotal'>".$new3."</td>
        </tr>";

        


 } 
 
 echo "</table>";

 ?>
  </div>

  <br>

  <div  style="margin-left: -2px;">
  <div class="jumbotron" style="border-radius: 8px;padding: 10px; margin-left: 0px;box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.6);">
    <h3><b>Total Price: &#8369
    <?php

    include "PDO_Login_Connect.php";
       $qry=$connect->prepare("Select SUM(SUB_TOTAL)SUM1 from tbladdtocart ");
        $qry->execute();
        $result=$qry->rowCount();
      
        while($row=$qry->fetch(PDO::FETCH_ASSOC)){
         
          $english_format_number =number_format($row["SUM1"],2,'.',',');
        echo  $english_format_number;
        



    }

    ?>

    </b></h3> 

 
  </div> 
  
    </div>
  </div><div class="form-group"> 
  </form> 
  <div class="row" style="margin-left: 10px;">

  <form class="form" method="post">
 

  <div class="input-group">
      <div class="input-group-addon" style="font-size: 25px;color: black;" ><span class="glyphicon glyphicon-peso-sign"><b>&#8369</b></span></div> 
  <input id="id_cash" name="name_cash" placeholder="Enter Cash..." class="form-control" style="height: 50px; width: 300px;font-size: 25px; " onkeyup="run(this)" required>
   <button  name="btn_process"  type="submit" class="btn btn-primary" onclick="printDiv2('myTable')"  style="margin-left:5px; margin-top:0px; height: 50px; background-color: green; text-align:center;"><span class="halflings halflings-shopping-cart" id="process" ></span>Process</button>  

 
  </div>  


  </div>
  </form>

  </div>
      <div style="text-align: center;">  <?php echo "$error_cash"; ?></div>



</body>
</html>

