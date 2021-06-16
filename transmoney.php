<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transfer Money</title>

    <style type="text/css">
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
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
<?php
    include 'conf.php';
    $sql = "SELECT * FROM accountholders";
    $result = mysqli_query($conn,$sql);
?>
<div class="pp">
     <div class="df">
    <ul class="mainmenu">
        <li><a href="Usercreate.php">Create User</a></li>
        <li><a href="transmoney.php">Transfer Money</a></li>
            <li><a href="transhistory.php">Transaction History</a></li>
        <a href="index.php"><img src="white-home-icon-png-21.jpg" class="fd"></a>
    </ul>
</div>
        <h2 align="center">Transfer Money</h2>
        <br>
                    <table align="center" border="1">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Balance</th>
                            <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name']?></td>
                        <td><?php echo $rows['email']?></td>
                        <td><?php echo $rows['balance']?></td>
                        <td><a href="selecteduser.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Transact</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
         </div>
</body>
</html>