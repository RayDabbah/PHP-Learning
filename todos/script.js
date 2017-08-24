// Production steps of ECMA-262, Edition 6, 22.1.2.1
if (!Array.from) {
  Array.from = (function () {
    var toStr = Object.prototype.toString;
    var isCallable = function (fn) {
      return typeof fn === 'function' || toStr.call(fn) === '[object Function]';
    };
    var toInteger = function (value) {
      var number = Number(value);
      if (isNaN(number)) { return 0; }
      if (number === 0 || !isFinite(number)) { return number; }
      return (number > 0 ? 1 : -1) * Math.floor(Math.abs(number));
    };
    var maxSafeInteger = Math.pow(2, 53) - 1;
    var toLength = function (value) {
      var len = toInteger(value);
      return Math.min(Math.max(len, 0), maxSafeInteger);
    };

    // The length property of the from method is 1.
    return function from(arrayLike/*, mapFn, thisArg */) {
      // 1. Let C be the this value.
      var C = this;

      // 2. Let items be ToObject(arrayLike).
      var items = Object(arrayLike);

      // 3. ReturnIfAbrupt(items).
      if (arrayLike == null) {
        throw new TypeError('Array.from requires an array-like object - not null or undefined');
      }

      // 4. If mapfn is undefined, then let mapping be false.
      var mapFn = arguments.length > 1 ? arguments[1] : void undefined;
      var T;
      if (typeof mapFn !== 'undefined') {
        // 5. else
        // 5. a If IsCallable(mapfn) is false, throw a TypeError exception.
        if (!isCallable(mapFn)) {
          throw new TypeError('Array.from: when provided, the second argument must be a function');
        }

        // 5. b. If thisArg was supplied, let T be thisArg; else let T be undefined.
        if (arguments.length > 2) {
          T = arguments[2];
        }
      }

      // 10. Let lenValue be Get(items, "length").
      // 11. Let len be ToLength(lenValue).
      var len = toLength(items.length);

      // 13. If IsConstructor(C) is true, then
      // 13. a. Let A be the result of calling the [[Construct]] internal method 
      // of C with an argument list containing the single item len.
      // 14. a. Else, Let A be ArrayCreate(len).
      var A = isCallable(C) ? Object(new C(len)) : new Array(len);

      // 16. Let k be 0.
      var k = 0;
      // 17. Repeat, while k < len… (also steps a - h)
      var kValue;
      while (k < len) {
        kValue = items[k];
        if (mapFn) {
          A[k] = typeof T === 'undefined' ? mapFn(kValue, k) : mapFn.call(T, kValue, k);
        } else {
          A[k] = kValue;
        }
        k += 1;
      }
      // 18. Let putStatus be Put(A, "length", len, true).
      A.length = len;
      // 20. Return A.
      return A;
    };
  }());
}


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

