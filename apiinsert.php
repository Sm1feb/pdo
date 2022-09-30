
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$fname=$_GET['firstname'];
$lname=$_GET['lastname'];
$email=$_GET['email'];
$output=$conn->prepare( "INSERT INTO none (firstname, lastname,email) values('$fname','$lname','$email')");
$output->execute();
?>