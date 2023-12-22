<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    img.bg{
        position: absolute;
        height: 100vh;
        width: 100%;
        opacity: 0.8;
        z-index:-1;
    }
    img.logo{
        position: absolute;
        top:10px;
        left: 20px;
        width: 100px;
    }
    form{
        max-width: 400px;
        min-height: 80vh;
        padding: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #ffffffac;
    }
    h1{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        text-align: center;
        margin-bottom: 40px;
    }
    input{
        display: block;
        margin: 5px 10px;
        padding: 10px;
        width: 300px;
        border-radius: 5px;
        border: 1px solid #0004ff;
    }
    .btn{   
        margin-top: 30px;
        padding: 10px 20px;
        background-color:#2a2ea9;
        color: #fff;
        cursor: pointer;
        border-radius: 10px;
        border: none;
        transition: .5s ease;
    }
    .btn:hover{
        background: #cad0ff;
        color: #000;
    }
    a.register{
        text-decoration: none;
    }
    p.error{
        display: flex;
        align-items: center;
        justify-content: start;
        width: 90%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        color: #fff;
        background: rgba(255, 0, 0, 0.5);
    }
    </style>
</head>


<body>
    <img class="bg" src="bg.jpg" alt="FCRIT">
    <img class="logo" src="logo.png" alt="FCRIT">
    <form action="action.php" method="post">
        <h1>LOGIN</h1>

        <?php
        if (isset($_GET['error'])) {?>
            <p class='error'><?php echo $_GET['error'];?></p>
        <?php
        }
        ?>
        <input type="text" name="uname" id="uname" placeholder="Enter Username" autofocus>
        <br>
        <input type="password" name="pw" id="pw" placeholder="Password">

        <button type="submit" class="btn">LOGIN</button>
        <br>
        <p>Create an account? <a class="register" href="registration.php" style="text-decoration: underline;">Register Now</a></p>
    </form>
</body>
</html>
