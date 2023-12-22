<?php
include("./connect.php");

session_start();

if(!$conn){
    echo "Connection failed";
}
else{
    echo "Connection success";
}
?>


<?php
    $uname = $_POST["uname"];
    $pwd = $_POST["pw"];
    $rpwd = $_POST["rpw"];

    $sql = "SELECT * FROM registration WHERE uname='$uname'";
    $checkUser = mysqli_query($conn,$sql);

    if(empty($uname)){
        header("Location:registration.php?error=Username Required.");
        exit();
    }
    else if(mysqli_num_rows($checkUser)>=1){
        header("Location:registration.php?error=Username already exists! Try Logging in.");
        exit();
    }
    else if(empty($pwd)){
        header("Location:registration.php?error=Password Required.");
        exit();
    }
    else if(empty($rpwd)){
        header("Location:registration.php?error=Repeat Password.");
        exit();
    }
    else if($pwd!=$rpwd){
        header("Location:registration.php?error=Passwords do not match! Try again.");
        exit();
    }
    else{
        $stmt = $conn->prepare("insert into registration(uname, pw, rpw)
        values (?, ?, ?)");
        $stmt->bind_param("sss",$uname,$pwd,$rpwd);
        $stmt->execute();
        header("Location:login.php?error=Log in now.");
        exit();
        $stmt->close();
        $conn->close();
    }
?>