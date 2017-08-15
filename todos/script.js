var todoSpan = document.querySelectorAll('#todoList span');
var todoLi = (document.querySelectorAll('#todoList li'));
for (let i = 0; i <= todoSpan.length; i++) {
    todoLi[i].addEventListener('click', function (e) {
        e.stopPropagation();
        todoSpan[i].classList.toggle('crossedout');
        todoLi[i].classList.toggle('linethrough');
        todoLi[i].classList.toggle('incompleteTodo');
    }, false);
}
Array.from(document.querySelectorAll('delete')).forEach(function(delete){
    delete.addEventListener('click', e=> e.stopPropagation());
});