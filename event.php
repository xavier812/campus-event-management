<?php
$sname="localhost";
$unmae="root";
$password="";

$db_name="xavier";

$conn = mysqli_connect($sname,$unmae,$password,$db_name);

session_start();
?>

<?php
if(isset($_POST['add']))
{
    $ename = $_POST['ename'];
    $edate = $_POST['edate'];
    $etime = $_POST['etime'];
    $evenue = $_POST['evenue'];
    $edetails = $_POST['edetails'];

    if(!$conn){
        echo "Connection failed";
    }
    else{
        $stmt = $conn->prepare("insert into events(ename, edate, etime, evenue, edetails)
        values (?, ?, ? ,?, ?) ");
        $stmt->bind_param("sssss",$ename, $edate, $etime, $evenue, $edetails);
        $stmt->execute();
        $_SESSION['message'] = "New Event Added Successfully.";
        echo "Saved Successfully.";
        header("Location:admin.php");
        exit();
        $stmt->close();
        $conn->close();
    }
}
?> 


<?php
if(isset($_POST['edit']))
{
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $ename = mysqli_real_escape_string($conn, $_POST['ename']);
    $edate = mysqli_real_escape_string($conn, $_POST['edate']);
    $etime = mysqli_real_escape_string($conn, $_POST['etime']);
    $evenue = mysqli_real_escape_string($conn, $_POST['evenue']);
    $edetails = mysqli_real_escape_string($conn, $_POST['edetails']);

    if(!$conn){
        echo "Connection failed";
    }
    else{
        $query = "UPDATE events SET ename='$ename' , edate='$edate' , etime='$etime' , evenue='$evenue' , edetails='$edetails' WHERE ename='$event_name'";
        $query_run = mysqli_query($conn, $query);
        $_SESSION['message'] = "Event Updated Successfully.";
        echo "Updated Successfully.";
        header("Location:admin.php");
    }
}
?> 


<?php
if(isset($_POST['delete']))
{
    $event_name = mysqli_real_escape_string($conn, $_POST['delete']);
    if(!$conn){
        echo "Connection failed";
    }
    else{
        $query = "DELETE FROM events WHERE ename='$event_name'";
        $query_run = mysqli_query($conn, $query);
        $_SESSION['message'] = "Event Deleted Successfully.";
        echo "Deleted Successfully.";
        header("Location:admin.php");
    }
}
?>