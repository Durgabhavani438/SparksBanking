<!DOCTYPE html>
<html>
<head>
	<title>User create</title>
	<style type="text/css">
		.a{
			width:400px;
			height: 300px;
			margin-top: 200px;
			background:rgba(44,62,80,0.7);
			border-radius: 20px;
		}
		.l{
			color:orange;
		}
		body{
			background-image: url(business-woman-working-on-laptop-in-her-office-2210x1473.jpg);
			background-size:1550px;
			background-repeat: no-repeat;
			z-index: 1;
			display: block;
		}
		.p{
			height: 25px;
			width:320px;
			color:white;
			background-color: gray;
			z-index: 99;
			border-radius: 20px;
			padding: 6px;
			background:rgba(44,62,80,0.7);
		}
		.sp{
			height: 35px;
			width:320px;
			color:white;
			background-color: orange;
			color:white;
			font-style: italic;
			border-radius: 20px;


		}
		img{
			width:50px;
			height:50px;
		}
		a{
			text-decoration: none;
			color:orange;
			text-transform: capitalize;
			font-size: 20px;
			text-align: center;
		}
		.ghj{
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<?php
    include 'conf.php';
    if(isset($_POST['submit'])){
    $number = "select last_insert_id();";
    $number++;
    $name=$_POST['name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
    $sql="insert into accountholders(id,name,email,balance) values('{$number}','{$name}','{$email}','{$balance}')";
    $result=mysqli_query($conn,$sql);
    if($result){
               echo "<script> alert('User created');
                               window.location='transmoney.php';
                     </script>";
                    
    }
  }
?>
	<center>
   <form class="a" method="post">
   	<h1 class="l"><i><b>Create User</b></i></h1>
            <div class="ab">
              <input class="p" placeholder="NAME" type="text" name="name" required>
            </div>
            <div class="cd">
              <input class="p" placeholder="EMAIL" type="email" name="email" required>
            </div>
            <div class="cd">
              <input class="p" placeholder="BALANCE" type="number" name="balance" required>
            </div>
            <br>
            <div class="app-form-group button">
              <input class="sp" type="submit" value="CREATE" name="submit"></input>
              <input class="sp" type="reset" value="RESET" name="reset"></input>
            </div>
          </form>
</center>
<center>
	<div class="ghj">
	<table class="dj"><tr><td>
		<a href="index.php" class="se">home</a>
	</td></tr>
</table>
</div>
</center>
</body>
</center>
</html>