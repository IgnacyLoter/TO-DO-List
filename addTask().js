function addTask(id,name,description,sinceString){
  /*
  <div class='task'>
    <h2>name</h2>
    <p>description</p>
    <p>sinceString</p>
    <form method="post">
      <input type="hidden" value=name name="taskId">
      <input type="hidden" value=description name="taskDescription">
      <input type="hidden" value=id name="taskId">
      <button class='cancel' formAction='removeTask.php'>Usuń</button>
      <button class='editBtn' formAction='updateForm.php'></button>
    </form>
    <br>
    <br>
    <br>
  </div
  */
    const taskDiv = document.querySelector('#taskDiv');
    const div = document.createElement('div');
    div.className = 'task';
    taskDiv.append(div);

    const h2 = div.appendChild(document.createElement('h2'));
    h2.innerText = name;
    const descPar = div.appendChild(document.createElement('p'));
    descPar.innerText = description;
    const sinceStringPar = div.appendChild(document.createElement('p'));
    sinceStringPar.innerText = sinceString;

    const taskForm = div.appendChild(document.createElement('form'));
    taskForm.method = 'post';
    for(let i = 0; i < 3; i++){
      let currentInput = taskForm.appendChild(document.createElement('input'));
      currentInput.type = 'hidden';
      currentInput.name = 'task' + ['Name','Description','Id'][i];
      currentInput.value = [name,description,id][i];
    }
    const removeTaskButton = taskForm.appendChild(document.createElement('button'));
    removeTaskButton.className = 'cancel';
    removeTaskButton.innerText = 'Usuń';
    removeTaskButton.formAction = 'removeTask.php';
    const updateTaskButton = taskForm.appendChild(document.createElement('button'));
    updateTaskButton.className = 'editBtn';
    updateTaskButton.formAction = 'updateForm.php';
    for(let i = 0; i < 3; i++){
      div.appendChild(document.createElement('br'));
    }
  }