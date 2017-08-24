var deleteTodo = document.getElementsByClassName('deleteTodo');
var deleteGarbage = document.getElementsByClassName('delete');
var toDo = document.querySelectorAll('.deleteTodo li');
const submit = document.getElementById('submit');
var todoField = document.getElementById("desc");
var todoSpan = document.querySelectorAll("#todoList span");
var todoLi = document.querySelectorAll("#todoList li");
var completed = document.getElementsByClassName('completed');
const todoForm = document.getElementById('todoForm');
const pens = Array.from(document.querySelectorAll('.pen'));
const todoHeader = document.getElementById('todoHeader');
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

for (let i = 0; i <= todoSpan.length - 1; i++) {
  todoLi[i].addEventListener("click", e => {
    todoSpan[i].classList.toggle("crossedout");
    todoLi[i].classList.toggle("linethrough");
    todoLi[i].classList.toggle("incompleteTodo");
  }, false
  );
}

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

for (let i = 0; i < deleteTodo.length; i++) {
  deleteGarbage[i].addEventListener('click', (e) => {
    setTimeout(() => {
      deleteTodo[i].submit();
    }, 400);
  });
}

// Update completed status of toDo when user clicks on it.

for (let i = 0; i < deleteTodo.length; i++) {
  todoLi[i].addEventListener('click', () => {
    deleteTodo[i].action = '/update';
    completed[i].value == 0 ? completed[i].value = 1 : completed[i].value = 0;
    deleteTodo[i].submit();
    deleteTodo[i].action = '/delete';
  })
}

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
    console.log(e.target.parentNode.parentNode.childNodes[5].value == 0)
    console.log(typeof (e.target.parentNode.parentNode.childNodes[5].value));
    console.log(notDone);
    console.log(done);
    submit.value = 'Update!'
    todoForm.appendChild(id);
    todoForm.action = '/update';
    todoHeader.textContent = 'Update your Todo!';
    // todoField.value = 
  }, false);
})

reset.addEventListener('click', () => {
  todoForm.action = '/task';
  submit.disabled = true;
  todoHeader.textContent = 'Enter your new Todo Item here:';
});

