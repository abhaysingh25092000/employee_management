<?php
$conn=mysqli_connect("localhost","root","","elmsdb");
if(!$conn)
{
    die('connection Failed'.mysqli_connect_error());
}
?>