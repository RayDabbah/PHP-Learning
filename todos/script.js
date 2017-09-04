const todoField = document.getElementById("desc");
var todoList = document.getElementById('todoList');
let response, todoLi, deleteGarbage, pens, done, notDone, todoSpan, deleteTodo, completed;
response = ajaxReq('GET', '/ajax');
function renderList() {
  if (!response) {
    todoList.innerHTML = '<li>Your Todos will go here.</li>';
  } else {
    todoList.innerHTML = '';
    response.forEach(listItem => {
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
                    </div> `;

      deleteTodo = document.getElementsByClassName('deleteTodo');
      deleteGarbage = Array.from(document.getElementsByClassName('delete'));
      const toDo = document.querySelectorAll('.deleteTodo li');
      const submit = document.getElementById('submit');
      todoSpan = document.querySelectorAll("#todoList span");
      todoLi = Array.from(document.querySelectorAll("#todoList li"));
      completed = document.getElementsByClassName('completed');
      const todoForm = document.getElementById('todoForm');
      pens = Array.from(document.querySelectorAll('.pen'));
      const reset = document.getElementById('reset');
      done = document.getElementById('true');
      notDone = document.getElementById('false');

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
          ajaxReq('POST', '/delete', response[i]);
        }, 400);
      })
    })

    // Update completed status of toDo when user clicks on it.

    todoLi.forEach((todo, i) => {
      todo.addEventListener('click', () => {
        response[i].completed == 0 ? response[i].completed = 1 : response[i].completed = 0;
        ajaxReq('POST', '/update', response[i]);
      })
    })

    //Update the content and/or the completed status of the todo. 

    pens.forEach((pen, i) => {
      pen.addEventListener('click', e => {
        e.stopPropagation();
        todoField.value = e.target.parentNode.textContent.trim();
        todoField.focus();
        if (response[i].completed == 0) {
          notDone.checked = true;
          done.checked = false;
        } else {
          done.checked = true;
          notDone.checked = false;
        }
        submit.value = 'Update!'
        todoField.placeholder = "Update your Todo!";
        submit.addEventListener('click', () => {
          response[i].description = todoField.value;
          done.checked ? response[i].completed = 1 : response[i].completed = 0;
          ajaxReq('POST', '/update', response[i]);
          submit.value = 'Add your Todo!'
        })
      }, false);
    })
  }
}
reset.addEventListener('click', () => {
  todoForm.action = '/task';
  submit.disabled = true;
  todoField.placeholder = "Enter your Todo here!";
});

function ajaxReq(method, action, params) {
  let posts;
  ajaxTodo = new XMLHttpRequest()
  ajaxTodo.onreadystatechange = function () {
    if (this.readyState == 4 && this.status === 200) {
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
