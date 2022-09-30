<?php
$servername = "localhost";
$username = "root";

try {
    //database connection
    $conn = new PDO("mysql:host=$servername;dbname=mydbpdo", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Insert record
    if (!empty($_REQUEST['firstname']) && !empty($_REQUEST['email'])) {
        $name = $_REQUEST['firstname'];
        $email = $_REQUEST['email'];
        $query = "insert into none (firstname,email) VALUES('$name','$email')";
        $conn->exec($query);
        echo "Record inserted";
    }
    //delete record
    if (!empty($_REQUEST['did'])) {
        $id=$_GET['id'];
       $sql=$conn->prepare("delete  from none where id=$id");
      $sql->execute();
        }
    
    //update record
    $id=$_GET['cid'];
    if (!empty($_REQUEST['cid'])) {
        $id=$_GET['cid'];
       $fname=$_GET['firstname'];
          $lname=$_GET['lastname'];
       $email=$_GET['email'];
       $sql=$conn->prepare("update none set firstname='$fname',lastname='$lname',email='$email' where id=$id");
        $sql->execute();
    }
    //display custom record
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $query = "select * from none where id=$id";
        $result = $conn->prepare($query);
        $result->execute();
        $row = $result->fetchAll();
        foreach ($row as $data) {
            print_r($data);
        }
    }
    //display record
    else {
        $query = "select * from none";
        $result = $conn->prepare($query);
        $result->execute();
        $row = $result->fetchAll();
        print_r($row);
    }
    //catching error
} catch (PDOException $e) {
    echo "Connection failed: " . " " . $e->getMessage();
}