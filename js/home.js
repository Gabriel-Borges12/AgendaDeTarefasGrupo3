const tbody = document.querySelector('tbody');
const addForm = document.querySelector('.add-form');
const inputTask = document.querySelector('.input-task');

const tasks = [];

const addTask = (event) => {
  event.preventDefault();

  const task = { title: inputTask.value, created_at: new Date(), status: 'pendente' };
  tasks.push(task);

  renderTasks();

  inputTask.value = '';
};

let editIndex;

const deleteTask = (index) => {
  const confirmDelete = confirm('Deseja realmente apagar?');
  if (confirmDelete) {
    tasks.splice(index, 1);
    renderTasks();
  }
};

const updateTask = (index, updatedTask) => {
  tasks[index] = { ...tasks[index], ...updatedTask };

  renderTasks();
};

const formatDate = (date) => {
  const options = { dateStyle: 'long', timeStyle: 'short' };
  return new Date(date).toLocaleString('pt-br', options);
};

const createRow = (task, index) => {
  const { title, created_at, status } = task;

  const tr = document.createElement('tr');
  const tdTitle = document.createElement('td');
  const tdCreatedAt = document.createElement('td');
  const tdStatus = document.createElement('td');
  const tdActions = document.createElement('td');

  tdTitle.textContent = title;
  tdCreatedAt.textContent = formatDate(created_at);

  const select = document.createElement('select');
  const options = `
    <option value="pendente">pendente</option>
    <option value="em andamento">em andamento</option>
    <option value="concluída">concluída</option>
  `;
  select.innerHTML = options;
  select.value = status;

  select.addEventListener('change', (event) => {
    updateTask(index, { status: event.target.value });
  });

  const editButton = document.createElement('button');
  editButton.innerHTML = '<span class="material-symbols-outlined">edit</span>';
  editButton.classList.add('btn-action');

  editButton.addEventListener('click', () => {
    const editInput = document.createElement('input');
    editInput.value = title;

    tdTitle.innerHTML = '';
    tdTitle.appendChild(editInput);

    const saveButton = document.createElement('button');
    saveButton.innerHTML = '<span class="material-symbols-outlined">save</span>';
    saveButton.classList.add('btn-action');

    saveButton.addEventListener('click', () => {
      const newTitle = editInput.value;
      updateTask(index, { title: newTitle });
    });

    tdActions.appendChild(saveButton);
    editIndex = index;
  });

  const deleteButton = document.createElement('button');
  deleteButton.innerHTML = '<span class="material-symbols-outlined">delete</span>';
  deleteButton.classList.add('btn-action');

  deleteButton.addEventListener('click', () => {
    deleteTask(index);
  });

  tdStatus.appendChild(select);
  tdActions.appendChild(editButton);
  tdActions.appendChild(deleteButton);

  tr.appendChild(tdTitle);
  tr.appendChild(tdCreatedAt);
  tr.appendChild(tdStatus);
  tr.appendChild(tdActions);

  return tr;
};

const renderTasks = () => {
  tbody.innerHTML = '';

  tasks.forEach((task, index) => {
    const row = createRow(task, index);
    tbody.appendChild(row);
  });
};

addForm.addEventListener('submit', addTask);

renderTasks();