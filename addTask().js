function addTask(id,name,description,sinceString){
  const taskDiv = document.querySelector('#taskDiv');
  const div = document.createElement('div');
  div.className = 'task';
  taskDiv.append(div);

  const h2 = document.createElement('h2');
  h2.innerText = name;
  const descPar = document.createElement('p');
  descPar.innerText = description;
  const sinceStringPar = document.createElement('p');
  sinceStringPar.innerText = sinceString;

  const removeForm = document.createElement('form');
  removeForm.action = 'removeTask.php';
  removeForm.method = 'post';
  const removeFormInput = document.createElement('input');
  removeFormInput.type = 'hidden';
  removeFormInput.value = id;
  removeFormInput.name = 'taskId';
  const removeFormButton = document.createElement('button');
  removeFormButton.className = 'cancel';
  removeFormButton.innerText = 'Usuń';

  const updateForm = document.createElement('form');
  updateForm.action = 'updateForm.php';
  updateForm.method = 'post';
  const updateFormInputs = [];
  for(let i = 0; i < 3; i++){
    updateFormInputs[i] = document.createElement('input');
    updateFormInputs[i].type = 'hidden';
    updateFormInputs[i].name = 'task' + ['Name','Description','Id'][i];
    updateFormInputs[i].value = [name,description,id][i];
  }
  const updateFormButton = document.createElement('button');
  updateFormButton.className = 'editBtn';

  const brs = [];
  for(let i = 0; i < 3; i++){
    brs[i] = document.createElement('br');
  }
  div.append(h2,descPar,sinceStringPar,removeForm,updateForm);
  for(let i = 0; i<3;i++){
    div.append(brs[i]);
  }
  removeForm.append(removeFormInput,removeFormButton);
  for(let i = 0; i<3;i++){
    updateForm.append(updateFormInputs[i]);
  }
  updateForm.append(updateFormButton);
  
}