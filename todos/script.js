var todoList = document.getElementById('todoList');

var allUserTodos = new XMLHttpRequest();
allUserTodos.onreadystatechange = function () {
  if (this.readyState == 4 && this.status === 200) {
    var response = JSON.parse(this.responseText);
    // console.log(JSON.parse(this.responseText));
    // todoList.innerHTML = response[4].description;
    if (!response) {
      todoList.innerHTML = '<li>Your Todos will go here.</li>';
    } else {
      response.forEach(listItem => {
        console.log(listItem);
        var complete = 'class="linethrough"';
        var incomplete = 'class="incompleteTodo"';
        var crossedout = 'crossedout';
        var notCrossedOut = '';
        todoList.innerHTML += `<form class="deleteTodo" action="/delete" method="POST">
        <li ${listItem.completed == 0 ? incomplete : complete}>
        <img class="delete" src="delete-basket.png">
        <span class="${listItem.completed == 0 ? notCrossedOut : crossedout }">${listItem.description}</span>
        <img class="pen" src="pen.png">
        </li>
        <input type="hidden" name="description" value="${listItem.description}">
                    <input class="completed" type="hidden" name="completed" value="${listItem.completed}">
                      <input type="hidden" name="id" value=" ${listItem.id}">
        </form> `;
      })
    }

var deleteTodo = document.getElementsByClassName('deleteTodo');
var deleteGarbage = Array.from(document.getElementsByClassName('delete'));
var toDo = document.querySelectorAll('.deleteTodo li');
const submit = document.getElementById('submit');
var todoField = document.getElementById("desc");
var todoSpan = document.querySelectorAll("#todoList span");
var todoLi = Array.from(document.querySelectorAll("#todoList li"));
var completed = document.getElementsByClassName('completed');
const todoForm = document.getElementById('todoForm');
const pens = Array.from(document.querySelectorAll('.pen'));
const reset = document.getElementById('reset');
var done = document.getElementById('true');
var notDone = document.getElementById('false');

//Prevent the clicking on the trash bin from clicking on the <li> and staying only on the image.
// Change the class of the image to animate when clicked on.

Array.from(document.getElementsByClassName("delete")).forEach(function (deleted) {
  deleted.addEventListener("click", e => {
    e.stopPropagation();
    deleted.classList.add("erase");
    setTimeout(() => deleted.classList.remove("erase"), 1500);
  }, false);
});

// Toggle the color and strikethrough when ckicking on the todo.
todoLi.forEach((todo, i) => {
  todo.addEventListener("click", e => {
    todoSpan[i].classList.toggle("crossedout");
    todo.classList.toggle("linethrough");
    todo.classList.toggle("incompleteTodo");
  }, false);
})

// Disable the submit button if there's no text in the input.

if (!todoField.value) submit.disabled = true;
todoField.addEventListener("input", () => {
  if (!todoField.value) {
    submit.disabled = true;
  } else {
    submit.disabled = false;
  }
});

// Delete todo when clicking on the garbage icon.
deleteGarbage.forEach((deleteCan, i) => {
  deleteCan.addEventListener('click', (e) => {
    setTimeout(() => {
      deleteTodo[i].submit();
    }, 400);
  })
})

// Update completed status of toDo when user clicks on it.

todoLi.forEach((todo, i) => {
  todo.addEventListener('click', () => {
    deleteTodo[i].action = '/update';
    completed[i].value == 0 ? completed[i].value = 1 : completed[i].value = 0;
    deleteTodo[i].submit();
    deleteTodo[i].action = '/delete';
  })
})

//Update the content and/or the completed status of the todo. 

pens.forEach(pen => {
  pen.addEventListener('click', e => {
    e.stopPropagation();
    todoField.value = e.target.parentNode.textContent.trim();
    todoField.focus();
    var id = document.createElement('input');
    id.type = 'hidden';
    id.name = 'id';
    id.value = e.target.parentNode.parentNode.childNodes[7].value;
    if (e.target.parentNode.parentNode.childNodes[5].value == 0) {
      notDone.checked = true;
      done.checked = false;
    } else {
      done.checked = true;
      notDone.checked = false;
    }
    submit.value = 'Update!'
    todoForm.appendChild(id);
    todoForm.action = '/update';
    desc.placeholder = "Update your Todo!";
  }, false);
})

reset.addEventListener('click', () => {
  todoForm.action = '/task';
  submit.disabled = true;
  desc.placeholder = "Enter your Todo here!";
});
  }
}
allUserTodos.open('GET', '/ajax', true);
allUserTodos.send();




