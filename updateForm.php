<?php 
    session_start();
    $id = $_POST['taskId'];
    $name = $_POST['taskName'];
    $description = $_POST['taskDescription'];
?>
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edytowanie TO-DO</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form action="updateTask.php" method="post">

      <label for="newName">
        Nowa nazwa zadania<br>
        <input name="newName" value=<?=$name?> placeholder=<?=$name?>>
      </label>
      <br>
      <label for="newDescription">
        Nowy opis zadania<br>
        <textarea name="newDescription" placeholder=<?=$description?>><?=$description?></textarea>
      </label>
      <input type="hidden" value=<?=$id?> name="taskId">
      <button class="confirm">Zmień</button>

      <a class="cancel" href="index.php"></a>

    </form>
  </body>
</html>