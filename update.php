<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$id=$_GET['id'];
$fname=$_GET['firstname'];
$lname=$_GET['lastname'];
$email=$_GET['email'];
$sql=$conn->prepare("update none set firstname='$fname',lastname='$lname',email='$email' where id=$id");
$sql->execute();
?>