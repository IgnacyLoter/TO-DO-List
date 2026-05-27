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
    
      <header>
        <h1>TO-DO LIST</h1>
      </header>
      <main>
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
          <br>
          <button class="confirm">Zmień</button>
          <a id="cancelEdit" href="index.php">Anuluj</a>
        </form>
      </main>
      <footer>
        <p>Autor: Ignacy Loter; 2026;</p>
      </footer>
    </form>
  </body>
</html>