<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

 $id=$_GET['id'];
$sql=$conn->prepare("select * from none where id=$id");
$sql->execute();
?>
<table>
<table border="1px">
<tr>
    <td>id</td>
    <td>firstname</td>
   <td>Lastname</td>
   <td>Email</td>
   <td>Delete</td>
   <td>Edit</td>
</tr>
<?php
while($row=$sql->fetch())
{
    ?>
    <tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['firstname']?></td>
    <td><?php echo $row['lastname']?></td>
    <td><?php echo $row['email']?></td>
    <td><a href="crudpdo.php?id=<?php echo $row['id'] ?>">Delete</a></td>
        <td><a href="crudpdo.php?id=<?php echo $row['id'] ?>">Edit</a></td>
</tr>
    <?php
}
?>
</table>
<?php
// $fname=$_GET['firstname'];
// $lname=$_GET['lastname'];
// $email=$_GET['email'];
// $output=$conn->prepare( "INSERT INTO none (firstname, lastname,email) values('$fname','$lname','$email')");
// $output->execute();
?>