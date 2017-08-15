// Array.from(document.querySelectorAll('#todoList>li')).forEach(function (li) {
//     li.addEventListener('click', function (e) {
//         li.classList.toggle('linethrough');
//         li.classList.toggle('incompleteTodo');
//         console.log(e.target), false;
//     })
// });

// Array.from(document.querySelectorAll('#todoList span')).forEach(function (li) {
//     li.addEventListener('click', function (e) {
//         li.classList.toggle('crossedout');
//         console.log(e.target), false;
//     })
// });
// document.querySelectorAll('#todoList span'));
var todoSpan = document.querySelectorAll('#todoList span');
var todoLi = document.querySelectorAll('#todoList li');
for(let i = 0; i<= todoSpan.length; i++){
    console.log(todoSpan[i]);
    todoLi[i].addEventListener('click', function (e) {
        todoSpan[i].classList.toggle('crossedout');
        todoLi[i].classList.toggle('linethrough')
        todoLi[i].classList.toggle('incompleteTodo')
        console.log(e.target), false;
    })
}
