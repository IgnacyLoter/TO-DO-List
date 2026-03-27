<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA TO-DO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="addTask.php" method="post">
        <label for="taskName">
            Nazwa zadania<br>
            <input type="text" name="name" id="taskName">
        </label>
        <br>
        <label for="taskDescription">
            Opis zadania<br>
            <textarea type="text" name="description" id="taskDescription"></textarea>
        </label>
        <button>Dodaj zadanie</button>
    </form>
    <?php 
          require 'getTasks.php';
          
          foreach ($_SESSION["tasks"] as $task) {
            echo '
            <div class="task">
                <h1>'.$task["name"].'</h1>
                <p>'.$task["description"].'</p>
                <form action="editForm.php" method="post">
                    <input type="hidden" value="'.$task['id'].'" name="taskId">
                    <button class="editBtn">Edytuj</button>
                </form>
                <form action="removeTask.php" method="post">
                    <input type="hidden" value="'.$task['id'].'" name="taskId">
                    <button class="deleteBtn">Usuń</button>
                </form>
            </div>';
          }
    ?>
</body>
</html>