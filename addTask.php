<?php
require_once "connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

if($connection->connect_errno !== 0){
    echo "Error: " , $connection->connect_errno; 
} else{
    $name = $_POST["name"];
    $description = $_POST["description"];
    $uniqueness = @$connection->query("SELECT * FROM tasks WHERE name = '$name'");
    if(mysqli_num_rows($uniqueness) > 0){
        echo "Can't add task with same name";
    } else{
        @$connection->query("INSERT INTO tasks (`ID`, `NAME`, `DESCRIPTION`) VALUES (NULL,'$name','$description')");
    }
}
$connection->close();
header('Location: index.php');
?>