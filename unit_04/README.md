# 21v-js
Загрузка документа: 
===================

Процесс загрузки HTML-документа, условно, состоит из трёх стадий:

- DOMContentLoaded — браузер полностью загрузил HTML, и построил DOM-дерево.
- load — браузер загрузил все ресурсы.
- beforeunload/unload — уход со страницы.

На каждую можно повесить обработчик, чтобы совершить полезные действия:

- DOMContentLoaded — означает, что все DOM-элементы разметки уже созданы, можно их искать, вешать обработчики, создавать интерфейс, но при этом, возможно, ещё не догрузились какие-то картинки или стили.

- load — страница и все ресурсы загружены, используется редко, обычно нет нужды ждать этого момента.

- beforeunload/unload — можно проверить, сохранил ли посетитель изменения, уточнить, действительно ли он хочет покинуть страницу.

HTML DOM Script Object 
----------------------

DOMContentLoaded
-----------------
Событие DOMContentLoaded поддерживается во всех браузерах, кроме IE8-. 

Обработчик на него вешается только через addEventListener:

document.addEventListener("DOMContentLoaded", ready);


```
<script>
  function ready() {
    alert( 'DOM готов' );
    alert( "Размеры картинки: " + img.offsetWidth + "x" + img.offsetHeight );
  }

  document.addEventListener("DOMContentLoaded", ready);
</script>

<img id="img" src="https://js.cx/clipart/yozhik.jpg?speed=1">
```
обработчик DOMContentLoaded сработает сразу после загрузки документа, не дожидаясь получения картинки.

Поэтому на момент вывода alert и сама картинка будет невидна и её размеры — неизвестны (кроме случая, когда картинка взята из кеша браузера).

DOMContentLoaded и скрипты
---------------------------
Если в документе есть теги script, то браузер обязан их выполнить до того, как построит DOM. Поэтому событие DOMContentLoaded ждёт загрузки и выполнения таких скриптов.

Исключением являются скрипты с атрибутами async и defer, которые подгружаются асинхронно.

если на странице подключается скрипт с внешнего ресурса (к примеру, реклама), и он тормозит, то событие DOMContentLoaded и связанные с ним действия могут сильно задержаться.

document.createElement('script')
--------------------------------
Современные системы рекламы используют атрибут async, либо вставляют скрипты через DOM: document.createElement('script')..., что работает так же как async: такой скрипт выполняется полностью независимо от страницы и от других скриптов — сам ничего не ждёт и ничего не блокирует.

```
<!DOCTYPE html>
<html>
<body>

<h3>A demonstration of how to access a SCRIPT element</h3>

<script id="myScript" src="demo_script_src.js"></script>

<p>Click the button to get the URL of the external script file.</p>

<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("myScript").src;
    document.getElementById("demo").innerHTML = x;
}
</script>

</body>
</html>

document.write("This text comes from an external script.");

```

createElement
-------------

```
<!DOCTYPE html>
<html>
<body>

<p>Click the button to create a SCRIPT element that alerts "Hello World!".</p>

<button onclick="myFunction()">Try it</button>

<script>
function myFunction() {
    var x = document.createElement("SCRIPT");
    var t = document.createTextNode("alert('Hello World!')");
    x.appendChild(t);
    document.body.appendChild(x);
}
</script>

</body>
</html>
```
DOMContentLoaded и стили
-------------------------
Внешние стили никак не влияют на событие DOMContentLoaded.

Если после стиля идёт скрипт, то этот скрипт обязан дождаться, пока стиль загрузится:
```
<link type="text/css" rel="stylesheet" href="style.css">
<script>
  // сработает после загрузки style.css
</script>
```
Такое поведение прописано в стандарте. Его причина — скрипт может захотеть получить информацию со страницы, зависящую от стилей, например, ширину элемента, и поэтому обязан дождаться загрузки style.css.

так как событие DOMContentLoaded будет ждать выполнения скрипта, то оно подождёт и загрузки стилей, которые идут перед script.

defer
------

```
<!DOCTYPE html>
<html>
<body>

<script id="myScript" src="demo_defer.js" defer></script>

<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("myScript").defer;
    document.getElementById("demo").innerHTML = x;
}
</script>

</body>
</html>

demo_defer.js

scriptObject.defer=true;

```
charst
-------

```
<!DOCTYPE html>
<html>
<body>

<script id="myScript" src="demo_script_charset.js" charset="UTF-8"></script>

<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("myScript").charset;
    document.getElementById("demo").innerHTML = x;
}
</script>

</body>
</html>


```
async
-----
```
<!DOCTYPE html>
<html>
<body>

<p id="p1">Hello World!</p>
<script id="myScript" src="demo_async.js" async></script>

<p>executed asynchronously</p>

<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("myScript").async;
    document.getElementById("demo").innerHTML = x;
}
</script>

</body>
</html>

scriptObject.async=true;
```

scriptObject.text=contents
---------------------------

```
<!DOCTYPE html>
<html>
<body>

<script id="myScript">
document.write("Hello World!");
</script>


<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("myScript").text;
    document.getElementById("demo").innerHTML = x;
}
</script>

</body>
</html>

```

## Событие onreadystatechange

Когда серверу посылается запрос, мы хотим выполнить некоторые действия на основе ответа.

Собите onreadystatechange происходит каждый раз, когда свойство readyState (состояние готовности) изменяется.

### Свойство readyState содержит состояние запроса XMLHttpRequest.

#### Три важных свойства объекта XMLHttpRequest:

1. onreadystatechange - Хранит функцию (или имя функции), которая вызывается автоматически каждый раз, когда изменяется свойство readyState
2. readyState - Содержит состояние объекта XMLHttpRequest. Изменяется от 0 до 4: 
```
0: запрос не инициализирован 
1: установлено соединение с сервером
2: запрос получен 
3: обработка запроса 
4: запрос завершен и ответ готов
```
3. status - 200: "OK (все хорошо)" 404: Страница не найдена

В событии onreadystatechange мы указываем, что произойдет, когда ответ с сервера будет получен и готов для обработки.

Когда состояние readyState равно 4 и статус (status) содержит значение 200, это означает, что ответ готов

window.onload
=============
Обработчик window.onload срабатывает, когда загружается вся страница, включая ресурсы на ней — стили, картинки, ифреймы и т.п.

```
window.onload = function(){
  setTimeout("if (!alreadyrunflag){VanillaRunOnDomReady}", 0);
}//]]> 
```

## VanillaRunOnDomReady

```
var VanillaRunOnDomReady = function() {

}

```
Создание элемента
==================
Для создания элементов используются следующие методы:

document.createElement(tag)
---------------------------
Создает новый элемент с указанным тегом:
```
var div = document.createElement('div');
```
document.createTextNode(text)
-----------------------------
Создает новый текстовый узел с данным текстом:
```
var textElem = document.createTextNode('Тут был я');
```
Создание сообщения
------------------
В нашем случае мы хотим сделать DOM-элемент div, дать ему классы и заполнить текстом:
```
<style>
.alert {
  padding: 15px;
  border: 1px solid #d6e9c6;
  border-radius: 4px;
  color: #3c763d;
  background-color: #dff0d8;
}
</style>


var div = document.createElement('div');
div.className = "alert alert-success";
div.innerHTML = "<strong>Ура!</strong> Вы прочитали это важное сообщение.";

```
После этого кода у нас есть готовый DOM-элемент. Пока что он присвоен в переменную div, но не виден, так как никак не связан со страницей.

Добавление элемента: appendChild, insertBefore
-----------------------------------------------
Чтобы DOM-узел был показан на странице, его необходимо вставить в document.

Предположим, что вставлять будем в некий элемент parentElem, например var parentElem = document.body.

Для вставки внутрь parentElem есть следующие методы:
----------------------------------------------------
parentElem.appendChild(elem)
----------------------------
Добавляет elem в конец дочерних элементов parentElem.
Следующий пример добавляет новый элемент в конец ol:
```
<ol id="list">
  <li>0</li>
  <li>1</li>
  <li>2</li>
</ol>

<script>
  var newLi = document.createElement('li');
  newLi.innerHTML = 'Привет, мир!';

  list.appendChild(newLi);
</script>
```
parentElem.insertBefore(elem, nextSibling)
------------------------------------------
Вставляет elem в коллекцию детей parentElem, перед элементом nextSibling.

Следующий код вставляет новый элемент перед вторым li:
```
<ol id="list">
  <li>0</li>
  <li>1</li>
  <li>2</li>
</ol>
<script>
  var newLi = document.createElement('li');
  newLi.innerHTML = 'Привет, мир!';

  list.insertBefore(newLi, list.children[1]);
</script>
```
Для вставки элемента в начало достаточно указать, что вставлять будем перед первым потомком:
```
list.insertBefore(newLi, list.firstChild);
```
А что, если list вообще пустой, в этом случае ведь list.firstChild = null, произойдёт ли вставка?

Ответ — да, произойдёт.

Дело в том, что если вторым аргументом указать null, то insertBefore сработает как appendChild:
```
parentElem.insertBefore(elem, null);
// то же, что и:
parentElem.appendChild(elem)
```
Все методы вставки возвращают вставленный узел.
Например, parentElem.appendChild(elem) возвращает elem.

Пример использования
---------------------
Добавим сообщение в конец body:
```
<style>
.alert {
  padding: 15px;
  border: 1px solid #d6e9c6;
  border-radius: 4px;
  color: #3c763d;
  background-color: #dff0d8;
}
</style>

<body>
  <h3>Моя страница</h3>
</body>

<script>
  var div = document.createElement('div');
  div.className = "alert alert-success";
  div.innerHTML = "<strong>Ура!</strong> Вы прочитали это важное сообщение.";

  document.body.appendChild(div);
</script>
```
…А теперь — в начало body:
```
<style>
.alert {
  padding: 15px;
  border: 1px solid #d6e9c6;
  border-radius: 4px;
  color: #3c763d;
  background-color: #dff0d8;
}
</style>

<body>
  <h3>Моя страница</h3>
</body>

<script>
  var div = document.createElement('div');
  div.className = "alert alert-success";
  div.innerHTML = "<strong>Ура!</strong> Вы прочитали это важное сообщение.";

  document.body.insertBefore(div, document.body.firstChild);
</script>
```
Клонирование узлов: cloneNode
-------------------------------

Вызов elem.cloneNode(true) создаст «глубокую» копию элемента — вместе с атрибутами, включая подэлементы. Если же вызвать с аргументом false, то копия будет сделана без дочерних элементов. 

Пример со вставкой копии сообщения:
```
<style>
.alert {
  padding: 15px;
  border: 1px solid #d6e9c6;
  border-radius: 4px;
  color: #3c763d;
  background-color: #dff0d8;
}
</style>

<body>
  <h3>Моя страница</h3>
</body>

<script>
  var div = document.createElement('div');
  div.className = "alert alert-success";
  div.innerHTML = "<strong>Ура!</strong> Вы прочитали это важное сообщение.";

  document.body.insertBefore(div, document.body.firstChild);

  // создать копию узла
  var div2 = div.cloneNode(true);
  // копию можно подправить
  div2.querySelector('strong').innerHTML = 'Супер!';
  // вставим её после текущего сообщения
  div.parentNode.insertBefore(div2, div.nextSibling);
</script>
```
Обратите внимание на последнюю строку, которая вставляет div2 после div:
```
div.parentNode.insertBefore(div2, div.nextSibling);
```
Для вставки нам нужен будущий родитель. если нужно вставить рядом с div, то родителем определённо будет div.parentNode.
Мы хотели бы вставить после div, но метода insertAfter нет, есть только insertBefore, поэтому вставляем перед его правым соседом div.nextSibling.
Удаление узлов: removeChild
---------------------------
Для удаления узла есть два метода:

parentElem.removeChild(elem)
----------------------------
Удаляет elem из списка детей parentElem.

parentElem.replaceChild(newElem, elem)
--------------------------------------
Среди детей parentElem удаляет elem и вставляет на его место newElem.
Оба этих метода возвращают удаленный узел, то есть elem. Если нужно, его можно вставить в другое место DOM тут же или в будущем.

Если вы хотите переместить элемент на новое место — не нужно его удалять со старого.
Все методы вставки автоматически удаляют вставляемый элемент со старого места.

Например, поменяем элементы местами:
```
<div>Первый</div>
<div>Второй</div>
<script>
  var first = document.body.children[0];
  var last = document.body.children[1];

  // нет необходимости в предварительном removeChild(last)
  document.body.insertBefore(last, first); // поменять местами
</script>
```
Метод remove
------------
В современном стандарте есть также метод elem.remove(), который удаляет элемент напрямую, не требуя ссылки на родителя.

Он поддерживается во всех современных браузерах, кроме IE11-. Впрочем, легко подключить или даже сделать полифилл.

Удаление сообщения
-------------------
Сделаем так, что через секунду сообщение пропадёт:
```
<style>
.alert {
  padding: 15px;
  border: 1px solid #d6e9c6;
  border-radius: 4px;
  color: #3c763d;
  background-color: #dff0d8;
}
</style>

<body>
  <h3>Сообщение пропадёт через секунду</h3>
</body>

<script>
  var div = document.createElement('div');
  div.className = "alert alert-success";
  div.innerHTML = "<strong>Ура!</strong> Вы прочитали это важное сообщение.";

  document.body.appendChild(div);

  setTimeout(function() {
    div.parentNode.removeChild(div);
  }, 1000);
</script>
```
Текстовые узлы для вставки текста
---------------------------------
При работе с сообщением мы использовали только узлы-элементы и innerHTML.

Если текст для сообщения нужно показать именно как текст, а не как HTML, то можно обернуть его в текстовый узел.

Например:
```
<style>
.alert {
  padding: 15px;
  border: 1px solid #d6e9c6;
  border-radius: 4px;
  color: #3c763d;
  background-color: #dff0d8;
}
</style>

<script>
  var div = document.createElement('div');
  div.className = "alert alert-success";
  document.body.appendChild(div);

  var text = prompt("Введите текст для сообщения", "Жили были <a> и <b>!");

  // вставится именно как текст, без HTML-обработки
  div.appendChild(document.createTextNode(text));
</script>
```
В современных браузерах (кроме IE8-) в качестве альтернативы можно использовать присвоение textContent.


Особые ссылки для таблиц
------------------------
У конкретных элементов DOM могут быть свои дополнительные ссылки для большего удобства навигации.

рассмотрим таблицу, так как это важный частный случай.

TABLE
=====
- table.rows — коллекция строк TR таблицы.
- table.caption/tHead/tFoot — ссылки на элементы таблицы CAPTION, THEAD, TFOOT.
- table.tBodies — коллекция элементов таблицы TBODY, по спецификации их может быть несколько.

THEAD/TFOOT/TBODY
-----------------
- tbody.rows — коллекция строк TR секции.
TR
--
- tr.cells — коллекция ячеек TD/TH
- tr.sectionRowIndex — номер строки в текущей секции THEAD/TBODY
- tr.rowIndex — номер строки в таблице
TD/TH
------
- td.cellIndex — номер ячейки в строке
Пример использования:
```
<table>
  <tr>
    <td>один</td> <td>два</td>
  </tr>
  <tr>
    <td>три</td>  <td>четыре</td>
  </tr>
</table>

<script>
var table = document.body.children[0];

alert( table.rows[0].cells[0].innerHTML ) // "один"
</script>
```

Конечно же, таблицы — не исключение.

Аналогичные полезные свойства есть у HTML-форм, они позволяют из формы получить все её элементы, а из них — в свою очередь, форму. Мы рассмотрим их позже.

Добавление и удаление узлов
===========================

## HTML Table

```
var _table_ = document.createElement('table'),
    _tr_ = document.createElement('tr'),
    _th_ = document.createElement('th'),
    _td_ = document.createElement('td');

// Builds the HTML Table out of myList json data from Ivy restful service.
 function buildHtmlTable(arr) {
     var table = _table_.cloneNode(false),
         columns = addAllColumnHeaders(arr, table);
     for (var i=0, maxi=arr.length; i < maxi; ++i) {
         var tr = _tr_.cloneNode(false);
         for (var j=0, maxj=columns.length; j < maxj ; ++j) {
             var td = _td_.cloneNode(false);
                 cellValue = arr[i][columns[j]];
             td.appendChild(document.createTextNode(arr[i][columns[j]] || ''));
             tr.appendChild(td);
         }
         table.appendChild(tr);
     }
     return table;
 }

```

### parentElem.insertBefore(elem, nextSibling)

Вставляет elem в коллекцию детей parentElem, перед элементом nextSibling.
```
<ol id="list">
  <li>0</li>
  <li>1</li>
  <li>2</li>
</ol>
<script>
  var newLi = document.createElement('li');
  newLi.innerHTML = 'Привет, мир!';

  list.insertBefore(newLi, list.children[1]);
</script>
```
Для вставки элемента в начало достаточно указать, что вставлять будем перед первым потомком:
```
list.insertBefore(newLi, list.firstChild);
```
если вторым аргументом указать null, то insertBefore сработает как appendChild:
```
parentElem.insertBefore(elem, null);
// то же, что и:
parentElem.appendChild(elem)
```

## Метод Node.cloneNode()
Метод Node.cloneNode() возвращает дубликат узла, из которого этот метод был вызван.

var dupNode = node.cloneNode(deep);

- node - Узел который будет клонирован.
- dupNode - Новый узел который будет клоном node
- deep  - Необязательный - true если дети узла должны быть клонированы или false для того чтобы был клонирован только указанный узел.


Клонирование узлов копирует все атрибуты и их значения, в том числе собственных (в линию) перехватчиков. Это не копирует пререхватчики событий, добавленных используя addEventListener() или тех что назначены через свойства элемента (т.е node.onclick = fn).

Дубликат узла, возвращенного cloneNode() не является частью документа, пока не будет добавлен в другой узел, который является частью документа, используя Node.appendChild() или другой метот.Кроме того, не имеет родителя, пока не будет добавлен к другому узлу.

Если deep установлен как false, дочерние узлы не клонируются. Любой текст, который содержит узел также не клонируется, как и содержащийся в одном или более дочернем узле Text.

Если deep установлено как true, все поддеревья (включая текст, который может быть потомком узла Text) копируется тоже. Для пустых узлов (т.е img и input элементов) это не имеет значения установлен ли deep как true или false.

cloneNode() может привести к дублированию идентфикаторов элементов в документе.
Если исходный узел имеет идентфикатор и клон размещен в том же документе, идентификатор должен быть изменен, для того что бы быть уникальным. Имя атрибута также может нуждаться в изменении, в зависимости от будующего имени дубликата.

Чтобы клонировать узел, для добавления к другому документу используйте Document.importNode() вместо этого.

## document.createTextNode(text)

Создает новый текстовый узел с данным текстом:

```
function addAllColumnHeaders(arr, table)
 {
     var columnSet = [],
         tr = _tr_.cloneNode(false);
     for (var i=0, l=arr.length; i < l; i++) {
         for (var key in arr[i]) {
             if (arr[i].hasOwnProperty(key) && columnSet.indexOf(key)===-1) {
                 columnSet.push(key);
                 var th = _th_.cloneNode(false);
                 th.appendChild(document.createTextNode(key));
                 tr.appendChild(th);
             }
         }
     }
     table.appendChild(tr);
     return columnSet;
 }
```

## Метод hasOwnProperty

Вызов obj.hasOwnProperty(prop) возвращает true, если свойство prop принадлежит самому объекту obj, иначе false.

```
var VanillaRunOnDomReady = function() {

var _table_ = document.createElement('table'),
    _tr_ = document.createElement('tr'),
    _th_ = document.createElement('th'),
    _td_ = document.createElement('td');

// Builds the HTML Table out of myList json data from Ivy restful service.
 function buildHtmlTable(arr) {
     var table = _table_.cloneNode(false),
         columns = addAllColumnHeaders(arr, table);
     for (var i=0, maxi=arr.length; i < maxi; ++i) {
         var tr = _tr_.cloneNode(false);
         for (var j=0, maxj=columns.length; j < maxj ; ++j) {
             var td = _td_.cloneNode(false);
                 cellValue = arr[i][columns[j]];
             td.appendChild(document.createTextNode(arr[i][columns[j]] || ''));
             tr.appendChild(td);
         }
         table.appendChild(tr);
     }
     return table;
 }
 
 // Adds a header row to the table and returns the set of columns.
 // Need to do union of keys from all records as some records may not contain
 // all records
 function addAllColumnHeaders(arr, table)
 {
     var columnSet = [],
         tr = _tr_.cloneNode(false);
     for (var i=0, l=arr.length; i < l; i++) {
         for (var key in arr[i]) {
             if (arr[i].hasOwnProperty(key) && columnSet.indexOf(key)===-1) {
                 columnSet.push(key);
                 var th = _th_.cloneNode(false);
                 th.appendChild(document.createTextNode(key));
                 tr.appendChild(th);
             }
         }
     }
     table.appendChild(tr);
     return columnSet;
 }

    var persone  =  JSON.parse(USER_FILE);

    document.body.appendChild(buildHtmlTable(persone));
}

var alreadyrunflag = 0;

if (document.addEventListener)
    document.addEventListener("DOMContentLoaded", function(){
        alreadyrunflag=1; 
        VanillaRunOnDomReady();
    }, false);
else if (document.all && !window.opera) {
    document.write('<script type="text/javascript" id="contentloadtag" defer="defer" src="javascript:void(0)"></script>');
    var contentloadtag = document.getElementById("contentloadtag")
    contentloadtag.onreadystatechange=function(){
        if (this.readyState=="complete"){
            alreadyrunflag=1;
            VanillaRunOnDomReady();
        }
    }
}

window.onload = function(){
  setTimeout("if (!alreadyrunflag){VanillaRunOnDomReady}", 0);
}//]]> 

```
setTimeout и setInterval
=========================
Почти все реализации JavaScript имеют внутренний таймер-планировщик, который позволяет задавать вызов функции через заданный период времени.

В частности, эта возможность поддерживается в браузерах и в сервере Node.JS.

setTimeout
----------
Синтаксис:
```
var timerId = setTimeout(func / code, delay[, arg1, arg2...])
```
Параметры:
----------
- func/code
Функция или строка кода для исполнения. Строка поддерживается для совместимости, использовать её не рекомендуется.
- delay
Задержка в милисекундах, 1000 милисекунд равны 1 секунде.
- arg1, arg2…
Аргументы, которые нужно передать функции. Не поддерживаются в IE9-.

Исполнение функции произойдёт спустя время, указанное в параметре delay.

Например, следующий код вызовет func() через одну секунду:
```
function func() {
  alert( 'Привет' );
}

setTimeout(func, 1000);
```
С передачей аргументов (не сработает в IE9-):

```
function func(phrase, who) {
  alert( phrase + ', ' + who );
}

setTimeout(func, 1000, "Привет", "Вася"); // Привет, Вася
```
Если первый аргумент является строкой, то интерпретатор создаёт анонимную функцию из этой строки.

То есть такая запись тоже сработает:
```
setTimeout("alert('Привет')", 1000);
```
Однако, использование строк не рекомендуется, так как они могут вызвать проблемы при минимизации кода, и, вообще, сама возможность использовать строку сохраняется лишь для совместимости.

Вместо них используйте анонимные функции, вот так:
```
setTimeout(function() { alert('Привет') }, 1000);
```
Отмена исполнения clearTimeout
------------------------------
Функция setTimeout возвращает числовой идентификатор таймера timerId, который можно использовать для отмены действия.

Синтаксис:
```
var timerId = setTimeout(...);
clearTimeout(timerId);
```
В следующем примере мы ставим таймаут, а затем удаляем (передумали). В результате ничего не происходит.
```
var timerId = setTimeout(function() { alert(1) }, 1000);
alert(timerId); // число - идентификатор таймера

clearTimeout(timerId);
alert(timerId); // всё ещё число, оно не обнуляется после отмены
```
в браузере идентификатор таймера является обычным числом. Другие JavaScript-окружения, например Node.JS, могут возвращать объект таймера, с дополнительными методами.

setInterval
-----------
Метод setInterval имеет синтаксис, аналогичный setTimeout.
```
var timerId = setInterval(func / code, delay[, arg1, arg2...])
```
Смысл аргументов — тот же самый. Но, в отличие от setTimeout, он запускает выполнение функции не один раз, а регулярно повторяет её через указанный интервал времени. Остановить исполнение можно вызовом clearInterval(timerId).

Следующий пример при запуске станет выводить сообщение каждые две секунды, пока не пройдёт 5 секунд:
```
// начать повторы с интервалом 2 сек
var timerId = setInterval(function() {
  alert( "тик" );
}, 2000);

// через 5 сек остановить повторы
setTimeout(function() {
  clearInterval(timerId);
  alert( 'стоп' );
}, 5000);
``` 
Модальные окна замораживают время в Chrome/Opera/Safari
Что будет, если долго не жать OK на появившемся alert? Это зависит от браузера.
В браузерах Chrome, Opera и Safari внутренний таймер «заморожен» во время показа alert/confirm/prompt. А вот в IE и Firefox внутренний таймер продолжит идти.

Поэтому, если закрыть alert после небольшой паузы, то в Firefox/IE следующий alert будет показан сразу же (время подошло), а в Chrome/Opera/Safari — только через 2 секунды после закрытия.

Рекурсивный setTimeout
----------------------
Важная альтернатива setInterval — рекурсивный setTimeout:
```

/** вместо:
var timerId = setInterval(function() {
  alert( "тик" );
}, 2000);
*/

var timerId = setTimeout(function tick() {
  alert( "тик" );
  timerId = setTimeout(tick, 2000);
}, 2000);
```
В коде выше следующее выполнение планируется сразу после окончания предыдущего.

Рекурсивный setTimeout — более гибкий метод тайминга, чем setInterval, так как время до следующего выполнения можно запланировать по-разному, в зависимости от результатов текущего.

Например, у нас есть сервис, который в 5 секунд опрашивает сервер на предмет новых данных. В случае, если сервер перегружен, можно увеличивать интервал опроса до 10, 20, 60 секунд… А потом вернуть обратно, когда всё нормализуется.

Если у нас регулярно проходят грузящие процессор задачи, то мы можем оценивать время, потраченное на их выполнение, и планировать следующий запуск раньше или позже.

Рекурсивный setTimeout гарантирует паузу между вызовами, setInterval — нет.

Давайте сравним два кода. Первый использует setInterval:
```
var i = 1;
setInterval(function() {
  func(i);
}, 100);
```
Второй использует рекурсивный setTimeout:
```
var i = 1;
setTimeout(function run() {
  func(i);
  setTimeout(run, 100);
}, 100);
```
При setInterval внутренний таймер будет срабатывать чётко каждые 100 мс и вызывать func(i)

Реальная пауза между вызовами func при setInterval меньше, чем указана в коде!

Если функция и выполняется дольше, чем пауза setInterval, то вызовы будут происходить вообще без перерыва.

Исключением является IE, в котором таймер «застывает» во время выполнения JavaScript.

При рекурсивном setTimeout задержка всегда фиксирована и равна 100мс.

Это происходит потому, что каждый новый запуск планируется только после окончания текущего.

Управление памятью
-------------------
Сборщик мусора в JavaScript не чистит функции, назначенные в таймерах, пока таймеры актуальны.
При передаче функции в setInterval/setTimeout создаётся внутренняя ссылка на неё, через которую браузер её будет запускать, и которая препятствует удалению из памяти, даже если функция анонимна.
```
// Функция будет жить в памяти, пока не сработал (или не был очищен) таймер
setTimeout(function() {}, 100);
```
- Для setTimeout — внутренняя ссылка исчезнет после исполнения функции.
- Для setInterval — ссылка исчезнет при очистке таймера.

Минимальная задержка таймера
----------------------------
У браузерного таймера есть минимальная возможная задержка. Она меняется от примерно нуля до 4мс в современных браузерах. В более старых она может быть больше и достигать 15мс.

По стандарту, минимальная задержка составляет 4мс. Так что нет разницы между setTimeout(..,1) и setTimeout(..,4).

Почему минимальная задержка — 4мс, а не 1мс? Зачем она вообще существует?
Это — «привет» от прошлого. Браузер Chrome как-то пытался убрать минимальную задержку в своих ранних версиях, но оказалось, что существуют сайты, которые используют setTimeout(..,0) рекурсивно, создавая тем самым «асинхронный цикл». И, если задержку совсем убрать, то будет 100% загрузка процессора, такой сайт «подвесит» браузер.

Поэтому, чтобы не ломать существующие скрипты, решили сделать задержку. По возможности, небольшую. На время создания стандарта оптимальным числом показалось 4мс.

Реальная частота срабатывания
-----------------------------
В ряде ситуаций таймер будет срабатывать реже, чем обычно. Задержка между вызовами setInterval(..., 4) может быть не 4мс, а 30мс или даже 1000мс.

Большинство браузеров (десктопных в первую очередь) продолжают выполнять setTimeout/setInterval, даже если вкладка неактивна.
При этом ряд из них (Chrome, FF, IE10) снижают минимальную частоту таймера, до 1 раза в секунду. 

При работе от батареи, в ноутбуке — браузеры тоже могут снижать частоту, чтобы реже выполнять код и экономить заряд батареи. Особенно этим известен IE. Снижение может достигать нескольких раз, в зависимости от настроек.
При слишком большой загрузке процессора JavaScript может не успевать обрабатывать таймеры вовремя. При этом некоторые запуски setInterval будут пропущены.

