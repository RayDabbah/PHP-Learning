var deleteTodo = document.getElementsByClassName('deleteTodo');
var deleteGarbage = document.getElementsByClassName('delete');
var toDo = document.querySelectorAll('.deleteTodo li');
const submit = document.getElementById('submit');
var todoField = document.getElementById("desc");
var todoSpan = document.querySelectorAll("#todoList span");
var todoLi = document.querySelectorAll("#todoList li");
var completed = document.getElementsByClassName('completed');

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
