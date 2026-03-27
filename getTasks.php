<?php
require_once "connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

if($connection->connect_errno !== 0){
    echo "Error: " , $connection->connect_errno; 
} else{
    $tasks = @$connection->query("SELECT * FROM tasks");
    if(!$tasks){
        echo "No tasks found";
    } else{
        $_SESSION["tasks"] = [];
        while($row = $tasks->fetch_assoc()){
            array_push($_SESSION["tasks"], ["id" => $row["ID"],"name" => $row["NAME"], "description" => $row["DESCRIPTION"]]);
        }
    }
    mysqli_free_result($tasks);
}
$connection->close();
?>