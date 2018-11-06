   
<?php include 'functions.php'; ?>

    <?php

	
    	 

	   		
	   	global $warning;
	   		 global $user;
	   		 global $user_id;
	   		 global $fname;
	   		 global $pass;
	   		 global $userid;
	   		 global $rescode;
	   		 global $mode;
	   		
	   	


			if (isset($_POST["btn_login"])) {
				

					$mode = filter_input(INPUT_POST, "mode_name");
			
				
			
			
				
				 include "PDO_Login_Connect.php";
				$username=filter_input(INPUT_POST,"user");
				$password=filter_input(INPUT_POST,"pass");
				$hash= md5($password);
			

				$query=$connect->prepare("select * from tblaccounts where USER_ID=:username");
				$query->bindParam("username",$username);
				
				$query->execute();
				$result=$query->rowCount();
				if($result){ 
						while($row=$query->fetch(PDO::FETCH_ASSOC)){

								$fname = $row["FIRST_NAME"].' '.$row["LAST_NAME"];
								$pass = $row["PASSWORD"];
								$userid = $row["USER_ID"];
								$rescode= $row["RESCODE"];
								
						}

						if($rescode == "1" && $mode == "0"){
						if($hash==$pass){
						
							
							
								session_start();
								$_SESSION["user"]=$fname;
								$_SESSION["user_id"]=$userid;
								header("location:Home.php");
								
								


						}else{

								$warning="<div class='alert alert-danger'>Username And Password Don't match<span class='close' data-dismiss='alert'>&times;</span></div>";	
						}

						}else if($rescode == "1" && $mode == "1"){
							if($hash==$pass){
						
							
							
								session_start();
								$_SESSION["user_mon"]=$fname;
								$_SESSION["user_id_mon"]=$userid;
								header("location:Monitor.php");
								
								


						}else{

								$warning="<div class='alert alert-danger'>Username And Password Don't match<span class='close' data-dismiss='alert'>&times;</span></div>";	
						}


					
							
						}else if($rescode == "2"){

							if($hash==$pass){
								session_start();
							$_SESSION["user_store"]=$fname;
							$_SESSION["user_id_store"]=$userid;
							header("location:Home_Store.php");

							
							}else{
								$warning="<div class='alert alert-danger'>Username And Password Don't match<span class='close' data-dismiss='alert'>&times;</span></div>";	
							}
							
						}else{
							$warning="<div class='alert alert-danger'>User ID is Deactivated!<span class='close' data-dismiss='alert'>&times;</span></div>";	

						}

				
				}else{

					
					$warning="<div id='error1' class='alert alert-danger'>Wrong Username/Password!<span class='close' data-dismiss='alert'>&times;</span></div>";
				

				}
			}
		
		
			
		

			
			?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<link rel="stylesheet" type="text/css" href="Login_Design.css">
<script src="jquery/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.min.css">
<script src="ajax/login_verify.js"></script>
<?php email_send() ?>


<title> Lucky Fashion Mart</title>
<link rel="icon" type="image/png" href="Lucky.ico" />
<script type="text/javascript">

$(function(ready){
	if($(this).width() < 1025){
		 $('body').css('background-color', 'rgba(33, 42, 98, 0.7)');
            $('body').css('background-image', 'none');
            $('#card').css('background-color', 'rgba(0, 0, 0, 0)');
            $('#card').css('box-shadow', '0 0px 0px 0 rgba(0, 0, 0, 0)'); 

	 
	}else{
		 $('body').css('background-image', "url('Untitled.jpg')");
	}
	 

    $(window).resize(function() {
        if ($(this).width() < 1025) {
            $('body').css('background-color', 'rgba(33, 42, 98, 0.7)');
            $('body').css('background-image', 'none');
            $('#card').css('background-color', 'rgba(0, 0, 0, 0)');
            $('#card').css('box-shadow', '0 0px 0px 0 rgba(0, 0, 0, 0)'); 

        } else { 
            // default setting for desktop here...
            $('body').css('background-image', "url('Untitled.jpg')");
			$('#card').css('background-color', 'rgba(33, 42, 98, 0.7)');
       		 $('#card').css('box-shadow', '0 3px 8px 0 rgba(0, 0, 0, 0.6)'); 
       

        }
    });
    

});











</script>
<style type="text/css">


	.body{

		
		background-repeat: no-repeat;
		background-size: cover;
		
		
		height: 100%;
	

	}

	.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

 input:checked + .slider {
  background-color: #1196F3;
  
  

  
 }

 
input:focus + .slider {
  box-shadow: 0 0 1px #2196F1;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</style>

</head>

<body class="body" > 

<div class="modal fade" id="ModalForgotPassword" role="dialog" >
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header" id="modal_head" style="background-color: #636990;color: white;" >
            <button type="button"  class="close" data-dismiss="modal" style="background-color: #636990;color: white;">&times;</button>
           
            <h4 class="modal-title" >Forgot Password</h4>
            <div class='alert alert-danger' id="alert1" style="display: none;">Activation Code Has Been Sent to your Email. <span  class='close' data-dismiss='alert'>&times;</span></div>
            </div>
            <div class="modal-body">
           	<form method="post">
            <input type="text" name="f_userid" class="form-control" placeholder="Enter User ID" required><br>
            <button type="submit" name="f_forgot" class="btn btn-primary form-control" >Submit</button>
 			</form>
    </div>
    </div>
    </div>
    </div>



	<div class="Card container-fluid" id="card">
	<form method="post">

	     <input type="text" id="mode1" name="mode_name" style="display: none">
	    <div>
	   
	    <div class="form-group">

	    <div class="input-group">
	    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
	    	<input classtype="text" class="form-control" name="user" placeholder=" Username" style="direction: ltr; height: 44px; font-size: 16px; width: 100%; border: none;font-family: Arial;" required>
	    	
	    	</div>
	    	</div>
	    	
	    <div class="form-group">
	    <div class="input-group">
	    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
	    	<input type="password" class="form-control" name="pass" placeholder="Password" style="direction: ltr; height: 44px; font-size: 16px; width: 100%;border: none;font-family: Arial;" required="a">
	   	</div>
	    </div>	

	    	 <?php  echo $warning; ?>
	    	<button type="submit" value="Login" name="btn_login"  id="button_login" class="btn btn-success">Login</button>
	    	<br><br>
	    	<a style="color:#718cbc; float: right" href="#ModalForgotPassword" data-toggle="modal">Forgot Password?</a>
	   
	    	 
	   
	    </div>
	    	
	
	    <label class="switch">

		  <input type="checkbox" id="check">
		  <span class="slider"></span>
		</label>
		<p  name="mode" id="mode" style="display:none; color:#718cbc;">Monitor Mode is ON <br>(for admin account only.)</p>
			
	</form>

	</div>





</body>
</html>