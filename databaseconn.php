<?php
$conn=mysqli_connect("localhost","sarthak","9552581296","sarthakphpdemo");
if($conn)
{
	echo"Connection established sucessfully";
}
else
{
	echo"Unable to connect";
}
mysqli_close($conn);
?>