<?php
require_once "connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

if($connection->connect_errno !== 0){
  $_SESSION['error'] = $connection->connect_errno; 
  } else{
    $name = $_POST["taskName"];
    $description = $_POST["taskDescription"];
    $uniqueness = @$connection->query("SELECT * FROM tasks WHERE name = '$name'");
    if(mysqli_num_rows($uniqueness) > 0){
      $_SESSION['error'] = "Task TO-DO z tą nazwą już istnieje!";
      } else{
        $now = date("d.m.y");
        @$connection->query("INSERT INTO tasks (NAME,DESCRIPTION,DATE) VALUES ('$name','$description','$now')");
        }
    mysqli_free_result($uniqueness);
    }
$connection->close();
header('Location: index.php');
?>