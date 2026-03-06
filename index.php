<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA TO-DO</title>
</head>
<body>
    <form action="addTask.php" method="post">
        <label for="taskName">
            Nazwa zadania<br>
            <input type="text" name="taskName" id="taskName">
        </label>
        <br>
        <label for="taskDescription">
            Opis zadania<br>
            <textarea type="text" name="taskDescription" id="taskDescription"></textarea>
        </label>
        <button>Dodaj zadanie</button>
    </form>
    <?php 
        echo '<div class="task">'   
    ?>
</body>
</html>