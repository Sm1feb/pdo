<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$id=$_GET['id'];
$sql=$conn->prepare("delete  from none where id=$id");
$sql->execute();
?>