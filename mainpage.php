<?php
session_start();    //session start
if(!isset($_SESSION['username']))     //if session not found redirect to homepage
{
header('location:index.php');
}
echo "Welcome &nbsp;";
echo $_SESSION['username'];      //retrieved using session
?>
 
<html>
<head>
</head>
<body>
<center>
<h2>Welcome to Main page :)</h2>
<a href="index.php">home</a>
</center>
</body>
</html>