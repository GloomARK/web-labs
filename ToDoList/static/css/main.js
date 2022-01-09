function moveBtnHandler(event){
    let taskElement = event.target.closest('.task');
    let currentTable = event.target.closest('tbody');
    let targetTable = document.getElementById(currentTable.id == 'to-do-list' ? 'done-list' : 'to-do-list');

    let taskCounterElement = taskElement.closest('.card').querySelector('.task-counter');
    taskCounterElement.innerHTML = Number(taskCounterElement.innerHTML)-1;

    targetTable.append(taskElement);

    taskCounterElement = taskElement.closest('.card').querySelector('.task-counter');
    taskCounterElement.innerHTML = Number(taskCounterElement.innerHTML)+1;
}

function showMsg(msg){
    let alertsContainer = document.querySelector('.alerts');
    let newAlert = document.querySelector('.alert').cloneNode(true);
    newAlert.querySelector('.msg').innerHTML = msg;
    newAlert.classList.remove('d-none');
    alertsContainer.append(newAlert);
}

function createTaskElement(form){
    let newTaskElement = document.getElementById('task-template').cloneNode(true);
    newTaskElement.id = taskCounter++;
    newTaskElement.querySelector('.task-name').textContent = form.elements['name'].value;
    newTaskElement.querySelector('.task-description').textContent = form.elements['description'].value;
    newTaskElement.classList.remove('d-none');

    for (let btn of newTaskElement.querySelectorAll('.move-btn')){
        btn.onclick = moveBtnHandler;
    }

    return newTaskElement;
}

function updateTask(form){
    let taskElement = document.getElementById(form.elements['task-id'].value);
    taskElement.querySelector('.task-name').textContent = form.elements['name'].value;
    taskElement.querySelector('.task-description').textContent = form.elements['description'].value;
}

function removeTaskBtnHandler(event){
    let form = event.target.closest('.modal').querySelector('form');
    let taskElement = document.getElementById(form.elements['task-id'].value);

    let taskCounterElement = taskElement.closest('.card').querySelector('.task-counter');
        taskCounterElement.innerHTML = Number(taskCounterElement.innerHTML)-1;

    taskElement.remove();
}

function resetForm(form){
    form.reset();
    form.querySelector('select').closest('.mt-3').classList.remove('d-none');
    form.elements['name'].classList.remove('form-control-plainte');
    form.elements['description'].classList.remove('form-control-plainte');
}

function setFormValue(form, taskid){
    let taskElement = document.getElementById(taskid);
    form.elements['name'].value = taskElement.querySelector('.task-name').textContent;
    form.elements['description'].value = taskElement.querySelector('.task-description').textContent;
    form.elements['task-id'].value = taskid;
}

function actionTaskBtnHandler(event){
    let alertMsg;
    let form = this.closest('.modal').querySelector('form');
    let action = form.elements['action'].value;
    if (action == 'new'){
        let taskElement = document.getElementById(`${form.elements['column'].value}-list`);
        taskElement.append(createTaskElement(form));

        let taskCounterElement = taskElement.closest('.card').querySelector('.task-counter');
        taskCounterElement.innerHTML = Number(taskCounterElement.innerHTML)+1;

        alertMsg = `Задача ${form.elements['name'].value} создана успешно!`;
        form.reset();
    }
    else if (action == 'edit'){
        updateTask(form);
        alertMsg = `Задача ${form.elements['name'].value} обновлена успешно!`;
    }
    if(alertMsg) showMsg(alertMsg);
}

let taskCounter = 0;

titles = {
    'new':"Создание новой задачи",
    'edit':"Редактирование задачи",
    'show':"Просмотр задачи"
};

actionBtnText = {
    'new':"Создать",
    'edit':"Сохранить",
    'show':"Ок"
};

window.onload = function(){
    document.querySelector('.action-task-btn').onclick = actionTaskBtnHandler;
    var taskModal = document.getElementById('task-modal');
    taskModal.addEventListener('show.bs.modal', function(event){
        let form = event.target.querySelector('form');
        resetForm(form);
        let action = event.relatedTarget.dataset.action;
        form.elements['action'].value = action;
        this.querySelector('.modal-title').textContent = titles[action];
        this.querySelector('.action-task-btn').textContent = actionBtnText[action];
        if (action == 'edit' || action == 'show'){
            this.querySelector('.mt-3').classList.add('d-none');
            setFormValue(form, event.relatedTarget.closest('.task').id);
        }
        if (action == 'show'){
            form.elements['name'].classList.add('form-control-plainte');
            form.elements['description'].classList.add('form-control-plainte');
        }
    })

    var taskModal = document.getElementById('remove-task-modal');
    taskModal.addEventListener('show.bs.modal', function(event){
        let taskElement = event.relatedTarget.closest('.task');
        let form = event.target.querySelector('form');
        form.elements['task-id'].value = taskElement.id;
        event.target.querySelector('.task-name').textContent = taskElement.querySelector('.task-name').textContent;
    });

    document.querySelector('.remove-task-btn').onclick = removeTaskBtnHandler;
}