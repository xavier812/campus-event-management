<?php
include("./connect.php");
?>


<?php
session_start();

if(!$conn){
    echo "Connection failed";
}
else{
    echo "Connection success";
}

if(isset($_POST['uname']) && isset($_POST['pw'])){
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }

    $uname = validate($_POST["uname"]);
    $pwd = validate($_POST["pw"]);

    if(empty($uname)){
        header("Location:login.php?error=Username Required.");
        exit();
    }
    else if(empty($pwd)){
        header("Location:login.php?error=Password Required.");
        exit();
    }
    else{
        $sql = "SELECT * FROM registration WHERE uname='$uname' AND pw='$pwd'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            
            if($row['uname']=='admin'){
                $_SESSION['uname']=$row['uname'];
                header("Location:admin.php");
                exit();
            }
            if($row['uname']==$uname && $row['pw']==$pwd){
                $_SESSION['uname']=$row['uname'];
                header("Location:user.php");
                exit();
            }
            
            else{
                header("Location:login.php?error=Incorrect Name or Password.");
                exit();
            }
        }
        else{
            header("Location:login.php?error=Incorrect Name or Password.");
            exit();
        }
    }
}
else{
    header("Location:login.php");
    exit();
}
?>