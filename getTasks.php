<?php
require_once "connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);
if($connection->connect_errno !== 0){
    $_SESSION['error'] = $connection->connect_errno; 
  } else{
      $_SESSION["tasks"] = [];
      $tasks = @$connection->query("SELECT * FROM tasks");
      
      if(mysqli_num_rows($tasks) > 0){
        while($row = $tasks->fetch_assoc()){
            array_push($_SESSION["tasks"], ["id" => $row["ID"],"name" => $row["NAME"], "description" => $row["DESCRIPTION"], "date" => $row["DATE"]]);
          }
        }  
      mysqli_free_result($tasks);
    }
$connection->close();
?>