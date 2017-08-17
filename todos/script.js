Array.from(document.getElementsByClassName('delete')).forEach(function (deleted) {
    deleted.addEventListener('click', function (e) {
        e.stopPropagation();
    }, false);
});
var todoSpan = document.querySelectorAll('#todoList span');
var todoLi = (document.querySelectorAll('#todoList li'));
for (let i = 0; i <= todoSpan.length - 1; i++) {
    todoLi[i].addEventListener('click', function (e) {
        // e.stopPropagation();
        todoSpan[i].classList.toggle('crossedout');
        todoLi[i].classList.toggle('linethrough');
        todoLi[i].classList.toggle('incompleteTodo');
    }, false);
}
Array.from(document.getElementsByClassName('delete')).forEach(trashCan =>{
    trashCan.addEventListener('click', ()=>{
        trashCan.classList.add('erase');
        setTimeout(()=> trashCan.classList.remove('erase'),500);
    })
});