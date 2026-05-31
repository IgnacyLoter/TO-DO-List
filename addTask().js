function addTask(id,name,description,sinceString){
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

    const removeForm = div.appendChild(document.createElement('form'));
    removeForm.action = 'removeTask.php';
    removeForm.method = 'post';
    const removeFormInput = removeForm.appendChild(document.createElement('input'));
    removeFormInput.type = 'hidden';
    removeFormInput.value = id;
    removeFormInput.name = 'taskId';
    const removeFormButton = removeForm.appendChild(document.createElement('button'));
    removeFormButton.className = 'cancel';
    removeFormButton.innerText = 'Usuń';

    const updateForm = div.appendChild(document.createElement('form'));
    updateForm.action = 'updateForm.php';
    updateForm.method = 'post';
    const updateFormInputs = [];
    for(let i = 0; i < 3; i++){
        updateFormInputs[i] = updateForm.appendChild(document.createElement('input'));
        updateFormInputs[i].type = 'hidden';
        updateFormInputs[i].name = 'task' + ['Name','Description','Id'][i];
        updateFormInputs[i].value = [name,description,id][i];
      }
    const updateFormButton = updateForm.appendChild(document.createElement('button'));
    updateFormButton.className = 'editBtn';
    for(let i = 0; i < 3; i++){
      div.appendChild(document.createElement('br'));
    }
  }