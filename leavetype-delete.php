<?php
session_start();
include('database/connect.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="delete from tblleavetype where id='$id'";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        $_SESSION['success']="Data Deleted Successfully";
        echo "<script>window.location.href='leavetype-manage.php'</script>";
    }
    else
    {
        $_SESSION['status']="Data Not Deleted";
        echo "<script>window.location.href='leavetype-manage.php'</script>";
    }
}
?>