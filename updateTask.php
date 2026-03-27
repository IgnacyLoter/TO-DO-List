<?php
require_once "connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

if($connection->connect_errno !== 0){
    echo "Error: " , $connection->connect_errno; 
} else{
    $newName = $_POST['newName'];
    $newDescription = $_POST['newDescription'];
    $id = $_POST['id'];

    $exists = @$connection->query("SELECT * FROM tasks WHERE id = '$id'");
    if(mysqli_num_rows($exist) === 0){
        echo "Can't update task: no task found";
    } else{
        @$connection->query("UPDATE tasks SET name='$newName' description='$newDescription' WHERE id = '$id'");
    }
}
$connection->close();
header('Location: index.php');
?>