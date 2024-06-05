<?php 
include('dbconfig.php');
$id=$_GET['id'];
$sts=$_GET['sts'];

$sql="update tblleaves set status='$sts' where id='$id'";
$result=mysqli_query($conn,$sql);

if($result)
{
    header("location: leave-manage.php");
}

?>