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
          require 'getTasks.php';
          
          foreach ($_SESSION["tasks"] as $task) {
            echo '
            <div class="task">
                <h1>'.$task["name"].'</h1>
                <p>'.$task["description"].'</p>
                <button id="edit'.$task["id"].'" name="editBtn">Zmień</button>
                <form action="deleteTask.php" method="post">
                    <button class="deleteBtn" value="'.$task["id"].'">Usuń</button>
                </form>
            </div>';
          }
    ?>
    <script>
        const editBtns = document.getElementsByName('editBtn');
        for(let i = 0; i < editBtns.length; i++){
            const currentBtn = editBtns[i];
            currentBtn.addEventListener('click',() => {
                const parent = closest(`div:has(#${currentBtn["id"]})`)
                const form = parent.appendChild(document.createElement('form'));
                form.action = "addTask.php";
                form.method = "post";
                //Nazwa zadania
                let label = form.appendChild(document.createElement('label'));
                label.innerText = "Nazwa zadania";
                label.for = "taskName";
                label.appendChild(document.createElement('br'));
                let input = label.appendChild(document.createElement('input'));
                input.type = "text";
                input.name = "taskName";
                input.value = currentBtn['name']
                form.appendChild(document.createElement('br'));
                //Opis zadania
                label = form.appendChild(document.createElement('label'));
                label.innerText = "Opis zadania";
                label.for = "taskDescription";
                label.appendChild(document.createElement('br'));
                let textarea = label.appendChild(document.createElement('textarea'));
                input.type = "text";
                input.name = "taskDescription";
                input.value = currentBtn['description']
                //Przycisk zmień (update) zadanie
                form.appendChild(document.createElement('button')).innerText = "Zmień zadanie";
                const cancelBtn = form.appendChild(document.createElement('button'));
                cancelBtn.type = "button";
                cancelBtn.id = `btn${i}`;
                cancelBtn.innerText = "Anuluj";
                //Funkcjonalność anuluj
                cancelBtn.addEventListener('click',() => {
                    form.remove();
                })
            })
        }
    </script>
</body>
</html>