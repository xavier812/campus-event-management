<?php
include("./connect.php");

session_start();

if(isset($_SESSION['uname'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Event Management</title>
    
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .nav{
            display: flex;
            flex-wrap: wrap;
            align-content: center;
            align-items: center;
            justify-content: space-between;
            margin: 20px;
        }
        h1{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .user-btns a{
            padding: 10px 20px;
            background: #1b1b1b;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
            text-decoration: none;
            transition: .5s ease;
        }
        .user-btns a:hover{
            background: #ececec;
            color: #000;
        }
        a.addEvent{
            background: green;
        }
        a.addEvent:hover{
            background: rgba(10,255,10,0.4);
        }
    </style>

    
</head>
<body>
    <div class="nav">
        <h1 class="user">Hello <?=$_SESSION['uname']?></h1>
        <div class="user-btns">
            <a class="addEvent" href="newEvent.php">+ Add New Event</a>
            <a class="logout" href="logout.php">Logout</a>
        </div>
    </div>
    <hr>
    
</body>
</html>

<?php
}
else{
    header("Location:login.php");
    exit();
}
?>