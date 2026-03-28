<?php
session_start();
require_once "connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

if($connection->connect_errno !== 0){
    $_SESSION['error'] = $connection->connect_errno; 
  } else{
    $newName = $_POST['newName'];
    $newDescription = $_POST['newDescription'];
    $id = $_POST['taskId'];

    $exists = @$connection->query("SELECT * FROM tasks WHERE id = '$id'");
    if(mysqli_num_rows($exists) === 0){
      $_SESSION['error'] = "Couldn't find that task!";
      } else{
        @$connection->query("UPDATE tasks SET name='$newName', description='$newDescription' WHERE id = '$id'");
        }
    mysqli_free_result($exists);
  }
$connection->close();
header('Location: index.php');
?>