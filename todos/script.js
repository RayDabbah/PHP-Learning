const todoField = document.getElementById("desc");
var todoList = document.getElementById('todoList');
var response;
let todoLi;
let deleteGarbage;
let pens;
// var allUserTodos = new XMLHttpRequest();
// allUserTodos.onreadystatechange = function () {
//   if (this.readyState == 4 && this.status === 200) {
//     var response = JSON.parse(this.responseText);
//     // console.log(JSON.parse(this.responseText));
//     // todoList.innerHTML = response[4].description;
response = ajaxReq('GET', '/ajax');
function renderList() {
  if (!response) {
    todoList.innerHTML = '<li>Your Todos will go here.</li>';
  } else {
    todoList.innerHTML = '';
    response.forEach(listItem => {
      // console.log(listItem);
      const complete = 'class="linethrough"';
      const incomplete = 'class="incompleteTodo"';
      const crossedout = 'crossedout';
      const notCrossedOut = '';
      todoList.innerHTML += `<div class="deleteTodo">
        <li ${listItem.completed == 0 ? incomplete : complete}>
        <img class="delete" src="delete-basket.png">
        <span class="${listItem.completed == 0 ? notCrossedOut : crossedout}">${listItem.description}</span>
        <img class="pen" src="pen.png">
        </li>
        <input type="hidden" name="description" value="${listItem.description}">
                    <input class="completed" type="hidden" name="completed" value="${listItem.completed}">
                    <input type="hidden" name="id" value=" ${listItem.id}">
                    </div> `;

      const deleteTodo = document.getElementsByClassName('deleteTodo');
      deleteGarbage = Array.from(document.getElementsByClassName('delete'));
      const toDo = document.querySelectorAll('.deleteTodo li');
      const submit = document.getElementById('submit');
      const todoSpan = document.querySelectorAll("#todoList span");
      todoLi = Array.from(document.querySelectorAll("#todoList li"));
      const completed = document.getElementsByClassName('completed');
      const todoForm = document.getElementById('todoForm');
      pens = Array.from(document.querySelectorAll('.pen'));
      const reset = document.getElementById('reset');
      const done = document.getElementById('true');
      const notDone = document.getElementById('false');

    })
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
          console.log(response[i])
          ajaxReq('POST', '/delete', response[i]);
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
        const id = document.createElement('input');
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
  }
}
reset.addEventListener('click', () => {
  todoForm.action = '/task';
  submit.disabled = true;
  desc.placeholder = "Enter your Todo here!";
});
// console.log(deleteTodo)
// deleteTodo.addEventListener('click')

// allUserTodos.open('GET', '/ajax', true);
// allUserTodos.send();

function ajaxReq(method, action, params) {
  let posts;
  ajaxTodo = new XMLHttpRequest()
  ajaxTodo.onreadystatechange = function () {
    if (this.readyState == 4 && this.status === 200) {
      console.log(`This is the response:  ${this.responseText}`)
      response = JSON.parse(this.responseText);
      renderList();
    }
  }
  ajaxTodo.open(method, action, true);
  if (method === 'POST') {
    ajaxTodo.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    posts = `description=${params.description}&completed=${params.completed}&id=${params.id}`
    console.log(posts)
  } else {
    params = null;
  }
  ajaxTodo.send(posts);
}
