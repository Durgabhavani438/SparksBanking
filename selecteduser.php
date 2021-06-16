<?php
include 'conf.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from accountholders where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from accountholders where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert(" Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Sorry Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE accountholders set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE accountholders set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO trans(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction</title>

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}
        .pp{
        background-image:linear-gradient(
                rgba(0,0,0,0.6),
                rgba(0,0,0,0.6)),
            url(dark-blue-wallpapers-25191-6464881.JPG);
        -webkit-background-size:cover;
            background-size:cover;
            background-position: center;
            height:750px;
            width:1600px;
            position: fixed;
            left:0px;
            right: 0px;
            top:0px;
            z-index: -1;
    }
    td{
        font-size: 15px;
        color:white;
    }
    th{
        font-size: 20px;
        color:white;
    }
    h2{
        color:white;
    }
    label{
        text-align: center;
        color: white;
        font-size: 20px;

    }
    .df{
            height:45px;
            width: 1700px;
            background-color:black;
            margin-top: -15px;
        }
        ul.mainmenu li{
            padding: 10px;
            width: 200px;
            height: 25px;
            position:relative;
            float: left;
        }
        a{
            text-decoration: none;
            text-transform: capitalize;
            font-size: 20px;
            text-align: center;
            color: white;
            padding-top: 10px;
            padding-bottom: 10px;

        }
        ul.mainmenu{
            display: block;
        }
        ul.mainmenu li:hover{
            background-color: #454545;
            padding-top: 10px;
        }
        body{
            background-color:black;
        }
        .fd{
            height: 35px;
            width: 40px;
            margin-top: 7px;
            margin-left: 670px;
        }
    </style>
</head>

<body>

	<div class="pp" align="center">
         <div class="df">
    <ul class="mainmenu">
        <li><a href="Usercreate.php">Create User</a></li>
        <li><a href="transmoney.php">Transfer Money</a></li>
            <li><a href="transhistory.php">Transaction History</a></li>
        <a href="index.php"><img src="white-home-icon-png-21.jpg" class="fd"></a>
    </ul>
</div>
        <h2 align="center">Transaction</h2>
            <?php
                include 'conf.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  accountholders where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table align="center" border="1">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label>Transfer To:</label>
        <select name="to" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'conf.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM accountholders where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
</body>
</html>