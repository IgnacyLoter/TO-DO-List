<?php
require_once "connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);
if($connection->connect_errno !== 0){
    $_SESSION['error'] = $connection->connect_errno; 
  } else{
      $taskId = $_POST['taskId'];
      @$connection->query("DELETE FROM tasks WHERE id = '$taskId'");
    }
$connection->close();
header('Location: index.php');
?>