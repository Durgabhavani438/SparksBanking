<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction History</title>
    <style type="text/css">
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
	<div class="pp">
        <div class="df">
    <ul class="mainmenu">
        <li><a href="Usercreate.php">Create User</a></li>
        <li><a href="transmoney.php">Transfer Money</a></li>
            <li><a href="transhistory.php">Transaction History</a></li>
        <a href="index.php"><img src="white-home-icon-png-21.jpg" class="fd"></a>
    </ul>
</div>
        <h2 align="center">Transaction History</h2>
        
       <br>
       <div>
    <table align="center" border="1">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'conf.php';

            $sql ="select * from trans";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td><?php  echo $rows['sno']; ?></td>
            <td><?php echo $rows['sender']; ?></td>
            <td><?php echo $rows['receiver']; ?></td>
            <td><?php echo $rows['balance']; ?> </td>
            <td><?php echo $rows['dateandtime']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
</body>
</html>