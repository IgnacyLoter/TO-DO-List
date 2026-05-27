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
      <header>
        <h1>TO-DO LIST</h1>
      </header>
      <main>
        <form action="addTask.php" method="post">
          <label for="taskName">
            Nazwa zadania<br>
            <input name="taskName">
          </label>
          <br>
          <label for="taskDescription">
            Opis zadania<br>
          <textarea name="taskDescription"></textarea>
          </label>
          <br>
          <button class="confirm">Dodaj zadanie</button>
        </form>
        <?php 
          if(isset($_SESSION['error'])){
            echo '<span style="color:red;">'.$_SESSION['error'].'</span>';
            unset($_SESSION['error']);
            }
          require 'getTasks.php';

          if(isset($_SESSION['no_tasks'])){
              echo "
              <h1> No tasks found! </h1>
              <p> Go ahead and add some! </h1>";
            } else{
              foreach ($_SESSION["tasks"] as $task) {
                  $id = $task['id'];
                  $name = $task['name'];
                  $description = $task['description'];

                  $date = DateTime::createFromFormat('d.m.y', $task['date']);
                  $now = DateTime::createFromFormat('d.m.y', date("d.m.y"));
                  $since = $date->diff($now);
                    
                  if($since->y > 0){
                      $sinceString = "Minęło ". $since->y ." lat, od kiedy powstało zadanie";
                    } else if($since->m > 0){
                        $sinceString = "Minęło ". $since->m ." miesięcy, od kiedy powstało zadanie";
                      } else if($since->d > 0){
                          $sinceString = "Minęło ". $since->d ." dni, od kiedy powstało zadanie";
                        } else{
                            $sinceString = "Stworzono dziś";
                          }
                  echo "
                    <div class=\"task\">
                      <h2>$name</h2>
                      <p>$description</p>
                      <p>$sinceString</p>
                      <form action='removeTask.php' method='post'>
                        <input type='hidden' value=\"$id\" name='taskId'>
                        <button class='cancel'>Usuń</button>
                      </form>
                      <form action='updateForm.php' method='post'>
                        <input type='hidden' name='taskName' value=\"$name\">
                        <input type='hidden' name='taskDescription' value=\"$description\">
                        <input type='hidden' name='taskId' value=\"$id\">
                        <button class='editBtn'></button>
                      </form>
                      <br>
                      <br>
                      <br> 
                    </div>";
                }
            }
        ?>
      </main>
      <footer>
        <p>Autor: Ignacy Loter; 2026;</p>
      </footer>
    </body>
  </html>