<?php 
global $warn;
if(isset($_POST["login"])){
	global $warn;
	include "connection.php";
	$username=filter_input(INPUT_POST,"username");
	$password=filter_input(INPUT_POST,"password");
	$query=$conn->prepare("select * from tblaccounts where username=:Username and password=:password");
	$query->bindParam("Username",$username);
	$query->bindParam("password",$password);
	$query->execute();
	$result=$query->rowCount();
	
	if($result){
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			$_SESSION["username"]=$row["Username"];
						
			$_SESSION["ID"]=$row["ID"];
			if($row["UserType"]=="Admin"){
				//header("location:ownerhome.php");
				$success = "Thank you for logging in!";
				print "<script>window.location.replace('ownerhome.php');</script>";
			}
			else if($row["UserType"]=="Branch"){
				//header("location:branchhome.php");
					$success = "Thank you for logging in!";
				print "<script>window.location.replace('branchhome.php');</script>";
	
					$success = "Thank you for logging in!";
				print "<script>window.location.replace('branchhome.php');</script>";
				return;
			}
			
			
			else{
				//header("location:userhome.php");
					$success = "Thank you for logging in!";
				print "<script>window.location.replace('userhome.php');</script>";
			}
			
		}
		
	}else{
		$error = "The username or password you entered does not exists.";
	}
}
	
	?>

<style>
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
#user{
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
#password
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
#sub{
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
		<div class = "alert alert-danger fade in">
		<div class = "modal-title">Error
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $error; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-default" data-dismiss = "modal">OK</button>
		</div>
	</div>
	</div>
</div>



<script>
	$(document).ready(function(){
	<?php
	if(isset($success)){
		?>
		$("#success").modal("show");
		<?php
	}
	?>
		});
</script>


</head>

<body>

<div id = "success" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "alert alert-success">
		<div class = "modal-title">Success
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $success; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-default" data-dismiss = "modal">OK</button>
		</div>
	</div>
	</div>
</div>











<div id="arrow-up"></div>
	
	<div id="login-form">
<form method = "post">

<div>

<input type="text" placeholder="Username" name="username" id="user" required/>
<input type="password" placeholder="Password"  name="password" id="password" required/>
</div>

<div>
<strong><input type="submit" value="LOGIN" name="login" id="sub"/></strong>
</form>
</div>
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

/*function processLogin(){
	$.post("login_stub.php",
	{
		username : ,
		password :
	}, function(data, success){
	});
}*/
</script>   


