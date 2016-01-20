# 21v-js

Навигация только по элементам
=============================

- children – только дочерние узлы-элементы, то есть соответствующие тегам.
- firstElementChild, lastElementChild – соответственно, первый и последний дети-элементы.
- previousElementSibling, nextElementSibling – соседи-элементы.
- parentElement – родитель-элемент.


Свойство elem.parentNode возвращает родитель элемента.
-------------------------------------------------------
Оно всегда равно parentElement, кроме одного исключения:
```
alert( document.documentElement.parentNode ); // document
alert( document.documentElement.parentElement ); // null
```

children вместо childNodes.
---------------------------
выводить не все узлы, а только узлы-элементы:
```
<!DOCTYPE HTML>
<html>

<body>
  <div>Начало</div>

  <ul>
    <li>Информация</li>
  </ul>

  <div>Конец</div>

  <script>
    for (var i = 0; i < document.body.children.length; i++) {
      alert( document.body.children[i] ); // DIV, UL, DIV, SCRIPT
    }
  </script>
  </body>

</html>
```
Всегда верны равенства:
-----------------------
```
elem.firstElementChild === elem.children[0]
elem.lastElementChild === elem.children[elem.children.length - 1]
```
В IE8- поддерживается только children


HTMLCollection
==============
Интерфейс HTMLCollection является обобщённой коллекцией (объектом, ведущим себя подобно массиву) элементов (в порядке упоминания в документе) и предоставляет методы и свойства для получения хранящихся в нём элементов.

HTMLCollection, хранящая элементы DOM, является динамической. При изменении документа она моментально отражает все произведённые изменения.

HTMLCollection.length Read only
-------------------------------
Возвращает количество элементов в коллекции.

Метод HTMLCollection.item()
---------------------------
Возвращает узел с порядковым номером index; отсчёт ведётся от нуля. Возвращает null, если index выходит за границы допустимого диапазона.

Метод HTMLCollection.namedItem()
--------------------------------
Возвращает узел, идентификатор или имя (в целях совместимости) которого совпадает со строкой, переданной в аргументе name. Соответствие имени проверяется в самую последнюю очередь, только для HTML элементов и только для тех из них, которые поддерживают свойство name. Возвращает null , если искомый элемент отсутствует.

HTMLCollection предоставляет своё содержимое как собственные свойства, доступные как по имени, так и по индексу (как в массиве). Это связано с тем, что идентификаторы HTML элементов, содержащие точки и двоеточие (допустимо в HTML5), адресуемы исключительно через синтаксис доступа к массиву. Однако, при числовых идентификаторах невозможно определить, производится ли запрос по индексу или по идентификатору, неявно приведённому к числу.

Пусть в документе присутствует элемент form с id, равным «myForm»:
```
var elem1, elem2;

// document.forms имеет тип HTMLCollection

elem1 = document.forms[0];
elem2 = document.forms.item(0);

alert(elem1 === elem2); // выводит "true"

elem1 = document.forms.myForm;
elem2 = document.forms.namedItem("myForm");

alert(elem1 === elem2); // выводит "true"

elem1 = document.forms["named.item.with.periods"];
```

HTMLCollection.namedItem() 
---------------------------
возвращает элемент по его имени

Этот метод отыскивает и возвращает элемент из HTMLCollection, имеющий указанное имя. Если какой либо элемент имеет атрибут id, значение которого равно указанному имени, то возвращается этот элемент. Если такой элемент не найден, возвращается элемент, атрибут name которого равен указанному значению. Если такого элемента не существует, namedItem() возвращает null.

атрибут id может быть задан для любого HTMLэлемента, но только определенные HTMLэлементы, такие как формы, элементы формы, изображения и якоря, могут иметь атрибут name.

В JavaScript проще рассматривать объект HTMLCollection как ассоциативный массив и задавать имя между квадратными скобками, используя нотацию массива.

Пример
```
var forms = document.forms; // HTML-коллекция форм
var address = forms.namedItem("address"); // Найти <form name="address">
var payment = forms["payment"] // Проще: находит тег
// <form name="payment">
var login = forms.login; // Тоже работает: находит тег <form name="login">

```
Свойство Node.childElementCount 
-------------------------------
предназначено только для чтения и возвращает число дочерних элементов узла.
```
var elCount = Node.childElementCount; 
```
elCount - целое число, количество дочерних элементов узла Node.

querySelectorAll
----------------
Вызов elem.querySelectorAll(css) возвращает все элементы внутри elem, удовлетворяющие CSS-селектору css.

Это один из самых часто используемых и полезных методов при работе с DOM.

Он есть во всех современных браузерах, включая IE8+ (в режиме соответствия стандарту).

Следующий запрос получает все элементы LI, которые являются последними потомками в UL:
```
<ul>
  <li>Этот</li>
  <li>тест</li>
</ul>
<ul>
  <li>полностью</li>
  <li>пройден</li>
</ul>
<script>
  var elements = document.querySelectorAll('ul > li:last-child');

  for (var i = 0; i < elements.length; i++) {
    alert( elements[i].innerHTML ); // "тест", "пройден"
  }
</script>
```
Псевдо-классы в CSS-селекторе, в частности :hover и :active, также поддерживаются. Например, document.querySelectorAll(':hover') вернёт список, в порядке вложенности, из текущих элементов под курсором мыши.

querySelector
--------------
Вызов elem.querySelector(css) возвращает не все, а только первый элемент, соответствующий CSS-селектору css.

Иначе говоря, результат – такой же, как и при elem.querySelectorAll(css)[0], но в последнем вызове сначала ищутся все элементы, а потом берётся первый, а в elem.querySelector(css) ищется только первый, то есть он эффективнее.

Этот метод часто используется, когда мы заведомо знаем, что подходящий элемент только один, и хотим получить в переменную сразу его.


1 Native JS 
===========

```
<!DOCTYPE html>
<html class=''>
<head>
<meta charset='UTF-8'>

<link rel='stylesheet prefetch' href='../css/reset.css'>
<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700,600);
* {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent;
  -moz-transition: all 0.5s ease;
  -webkit-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

h1 {
  padding: 18px 24px;
  font-size: 18px;
  font-weight: 700;
  border-bottom: 1px solid #dadada;
}

h2 {
  font-size: 18px;
  font-weight: 600;
  padding-bottom: 15px;
}

h3 {
  font-size: 12px;
  font-weight: 700;
  padding-bottom: 5px;
  text-transform: uppercase;
}

html,
body {
  min-width: 786px;
  font-family: 'Open Sans';
  color: #212121;
  background-color: #f2f2f2;
}

.goods {
  position: absolute;
  width: 67.5%;
  min-width: 385px;
  height: 89%;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  transform: translate(0px, 0);
}

.product {
  width: 27.796%;
  border-top: 5px solid #ff5722;
  box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.15);
  background-color: #fff;
  margin: 2.7%;
  float: left;
}

span.info {
  position: relative;
  display: block;
  border-bottom: 1px solid #dadada;
}

.goods img {
  width: 100%;
}

.product button {
  width: 100%;
  height: 48px;
  font-family: 'Open Sans';
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 1px;
  color: #727272;
  text-transform: uppercase;
  cursor: pointer;
}

.product button:hover {
  color: #212121;
  background-color: rgba(239, 239, 239, 0.23);
}

.product button:active {
  color: #ff5722;
}

span.text {
  position: absolute;
  width: calc(100% - 48px);
  height: calc(100% - 48px);
  top: 0;
  padding: 24px;
  background-color: rgba(255, 255, 255, 0.9);
  opacity: 0;
}

.description {
  height: calc(100% - 100px);
  padding-bottom: 20px !important;
  font-size: 12px;
  line-height: 17px;
}

.info p {
  padding-bottom: 10px;
  font-size: 12px;
}

.info:hover .text {
  opacity: 1;
}

ul {
  position: absolute;
}

input[type="radio"] {
  display: none;
}

ul li {
  display: inline-block;
  width: 12px;
  height: 12px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  -moz-transition: none;
  -webkit-transition: none;
  -o-transition: none;
  transition: none;
}

li#color_one {
  background-color: #f2f2f2;
}

li#color_two {
  background-color: #727272;
}

li#color_three {
  background-color: #ff5a26;
}

li#color_four {
  background-color: #52d8b4;
}

span.price {
  float: right;
  font-weight: 600;
  font-size: 14px;
  color: #ff5a26;
}

.cart {
  position: fixed;
  width: 25%;
  height: 100%;
  min-width: 350px;
  right: 0;
  box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.3);
  background-color: #ffF;
  transform: translate(400px, 0px)
}

#all {
  height: calc(100% - 152px);
  overflow-x: hidden;
}

.item {
  position: relative;
  padding: 11px 24px;
  font-size: 14px;
  font-weight: 600;
  color: #727272;
  border-bottom: 1px solid #dadada;
  transform: translate(400px, 0px);
}

.price {
  color: #ff5a26;
}

.del {
  position: absolute;
  width: 20px;
  height: 20px;
  top: 15px;
  right: 24px;
  display: block;
  cursor: pointer;
  background: url('data:image/svg+xml,%3Csvg%20version=%221.1%22%20id=%22%D0%A1%D0%BB%D0%BE%D0%B9_1%22%20xmlns=%22http://www.w3.org/2000/svg%22%20xmlns:xlink=%22http://www.w3.org/1999/xlink%22%20x=%220px%22%20y=%220px%22%0A%09%20viewBox=%22-285%20408.9%2024%2024%22%20enable-background=%22new%20-285%20408.9%2020%2020%22%20xml:space=%22preserve%22%3E%0A%3Cpath%20fill=%22#7D7D7D%22%20d=%22M-266,412.9h-3.5l-1-1h-5l-1,1h-3.5v2h14%20M-279,427.9c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2v-12h-12V427.9z%22/%3E%0A%3C/svg%3E%0A');
}

.del:hover {
  background: url('data:image/svg+xml,%3Csvg%20version=%221.1%22%20id=%22%D0%A1%D0%BB%D0%BE%D0%B9_1%22%20xmlns=%22http://www.w3.org/2000/svg%22%20xmlns:xlink=%22http://www.w3.org/1999/xlink%22%20x=%220px%22%20y=%220px%22%0A%09%20viewBox=%22-285%20408.9%2024%2024%22%20enable-background=%22new%20-285%20408.9%2020%2020%22%20xml:space=%22preserve%22%3E%0A%3Cpath%20fill=%22#212121%22%20d=%22M-266,412.9h-3.5l-1-1h-5l-1,1h-3.5v2h14%20M-279,427.9c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2v-12h-12V427.9z%22/%3E%0A%3C/svg%3E%0A');
}

.total {
  height: 26px;
  padding: 11px 24px;
  border-bottom: 1px solid #dadada;
}

.total h2 {
  position: absolute;
}

.right {
  padding: 3px 0 0 0;
  float: right;
  font-weight: 600;
}

#cart button {
  width: 100%;
  height: 48px;
  font-family: 'Open Sans';
  font-size: 15px;
  font-weight: 600;
  letter-spacing: 1px;
  color: #fff;
  text-transform: uppercase;
  cursor: pointer;
  background-color: rgb(255, 90, 38);
}

#cart button:hover {
  color: #212121;
  background-color: rgba(239, 239, 239, 0.23);
}

@media screen and (max-width: 1320px) {
  .product {
    width: 44.6%;
  }
  .cart {
    width: 24.5%;
    min-width: 260px;
  }
  @media screen and (max-width: 1048px) {
    .goods {
      width: 50%;
    }
    .product {
      width: 94.6%;
    }
    .cart {
      width: 24.5%;
      min-width: 260px;
    }</style></head><body>
<div id="goods" class="goods">
  <div name="product" class="product">
    <span name="info" class="info">
                <div name="index">
                    <img src="../images/1.jpg" alt="" class="pic">
                </div>
                <span name="text" class="text">
                    <h2 name="name">Suit</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ornare facilisis ante, nec rutrum tellus. Vivamus ante augue.</p>
                    <h3>Colors</h3>
                    <ul>
                    <li id="color_one"></li>
                    <li id="color_two"></li>
                    <li id="color_three"></li>
                    <li id="color_four"></li>
                    </ul>
                    <span class="price" name="price">$<span name="num">229</span></span>
    </span>
    </span>
    <button>Add to cart</button>
  </div>
  <div name="product" class="product">
    <span name="info" class="info">
                <div name="index">
                    <img src="../images/2.jpg" alt="" class="pic">
                </div>
                <span name="text" class="text">
                    <h2 name="name">Bow tie</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ornare facilisis ante, nec rutrum tellus. Vivamus ante augue.</p>
                    <h3>Colors</h3>
                    <ul>
                    <li id="color_one"></li>
                    <li id="color_two"></li>
                    <li id="color_three"></li>
                    <li id="color_four"></li>
                    </ul>
                    <span class="price" name="price">$<span name="num">25</span></span>
    </span>
    </span>
    <button>Add to cart</button>
  </div>
  <div name="product" class="product">
    <span name="info" class="info">
                <div name="index">
                    <img src="../images/3.jpg" alt="" class="pic">
                </div>
                <span name="text" class="text">
                    <h2 name="name">Sweater</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ornare facilisis ante, nec rutrum tellus. Vivamus ante augue.</p>
                    <h3>Colors</h3>
                    <ul>
                    <li id="color_one"></li>
                    <li id="color_two"></li>
                    <li id="color_three"></li>
                    <li id="color_four"></li>
                    </ul>
                    <span class="price" name="price">$<span name="num">69.50</span></span>
    </span>
    </span>
    <button>Add to cart</button>
  </div>
  <div name="product" class="product">
    <span name="info" class="info">
                <div name="index">
                    <img src="../images/4.jpg" alt="" class="pic">
                </div>
                <span name="text" class="text">
                    <h2 name="name">Hat</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ornare facilisis ante, nec rutrum tellus. Vivamus ante augue.</p>
                    <h3>Colors</h3>
                    <ul>
                    <li id="color_one"></li>
                    <li id="color_two"></li>
                    <li id="color_three"></li>
                    <li id="color_four"></li>
                    </ul>
                    <span class="price" name="price">$<span name="num">34</span></span>
    </span>
    </span>
    <button>Add to cart</button>
  </div>
  <div name="product" class="product">
    <span name="info" class="info">
                <div name="index">
                    <img src="../images/5.jpg" alt="" class="pic">
                </div>
                <span name="text" class="text">
                    <h2 name="name">Shoes</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ornare facilisis ante, nec rutrum tellus. Vivamus ante augue.</p>
                    <h3>Colors</h3>
                    <ul>
                    <li id="color_one"></li>
                    <li id="color_two"></li>
                    <li id="color_three"></li>
                    <li id="color_four"></li>
                    </ul>
                    <span class="price" name="price">$<span name="num">120</span></span>
    </span>
    </span>
    <button>Add to cart</button>
  </div>
  <div name="product" class="product">
    <span name="info" class="info">
                <div name="index">
                    <img src="../images/6.jpg" alt="" class="pic">
                </div>
                <span name="text" class="text">
                    <h2 name="name">Glasses</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ornare facilisis ante, nec rutrum tellus. Vivamus ante augue.</p>
                    <h3>Colors</h3>
                    <ul>
                    <li id="color_one"></li>
                    <li id="color_two"></li>
                    <li id="color_three"></li>
                    <li id="color_four"></li>
                    </ul>
                    <span class="price" name="price">$<span name="num">25</span></span>
    </span>
    </span>
    <button>Add to cart</button>
  </div>
</div>
<div id="cart" class="cart">
  <h1>Cart</h1>
  <div id="all">
  </div>
  <div class="total">
    <h2>Total</h2>
    <span class="right price">$<span id="total"></span></span>
  </div>
  <button>Checkout</button>
</div>

</body></html>
```
2.html
======
```
<script>
var grid = document.getElementById('goods');
var btn = document.querySelectorAll('.product button');
var btnLen = btn.length;
var delBtn;
var delBtnLen;
var j = 1;
var newP = function (newName, name, newPrice, price, prod, del, dollar) {
    newName.className = 'name';
    prod.appendChild(newName);
    newName.innerHTML = name;
    newPrice.id = 'nam';
    newPrice.className = 'price';
    prod.appendChild(newPrice);
    newPrice.innerHTML = dollar;
    del.className = 'del';
    prod.appendChild(del);
};

for (var i = 0; i < btnLen; i++) {
    
    btn[i].onclick = function (e) {
        var btnVal = this.innerHTML;
        var cart = document.getElementById('cart');
        var goods = document.getElementById('all');
        var newDiv = document.createElement('div');
        var newName = document.createElement('p');
        var newPrice = document.createElement('p');
        var del = document.createElement('span');
        var product = this.parentNode.children;
        var info = product.namedItem('info').children;
        var text = info.namedItem('text').children;
        var name = text.namedItem('name').innerHTML;
        var price = text.namedItem('price').children;
        var nam = price.namedItem('num').innerHTML;
        var dollar = '$' + nam;
        var total = document.getElementById('total').innerHTML;
        if (btnVal) {
            newDiv.id = 'product' + j;
            newDiv.className = 'item';
            goods.appendChild(newDiv);
            var prod = document.getElementById('product' + j);
            newP(newName, name, newPrice, price, prod, del, dollar);
            document.getElementById('total').innerHTML = +total + +nam;
            var a = cart.childElementCount;
            if (a > 1) {
                cart.style.transform = 'translate(0px, 0)';
                var trans = function () {
                    var g = 0;
                    prod.style.transform = 'translate(0px, 0)';
                    if (g < 1) {
                        setTimeout(trans, 0);
                        g++;
                    }
                };
                setTimeout(trans, 100);
                grid.style.transform = 'translate(-18.5%, 0)';
            }
        }
        j++;
        
    };
}

</script>
```
index
======
```
<script>
var grid = document.getElementById('goods');
var btn = document.querySelectorAll('.product button');
var btnLen = btn.length;
var delBtn;
var delBtnLen;
var j = 1;
var newP = function (newName, name, newPrice, price, prod, del, dollar) {
    newName.className = 'name';
    prod.appendChild(newName);
    newName.innerHTML = name;
    newPrice.id = 'nam';
    newPrice.className = 'price';
    prod.appendChild(newPrice);
    newPrice.innerHTML = dollar;
    del.className = 'del';
    prod.appendChild(del);
};
var upd = function () {
    delBtn = document.querySelectorAll('#all span');
    delBtnLen = delBtn.length;
    for (var n = 0; n < delBtnLen; n++) {
       
        delBtn[n].onclick = function () {
            var total = document.getElementById('total').innerHTML;
            var namDollar = this.parentNode.children.namedItem('nam').innerHTML;
            var nam = namDollar.substr(1);
            document.getElementById('total').innerHTML = +total - +nam;
            this.parentNode.parentNode.removeChild(this.parentNode);
            var a = document.getElementById('all').childElementCount;
            if (a == 0) {
                cart.style.transform = 'translate(400px, 0)';
                grid.style.transform = 'translate(0px, 0)';
            }
        };
    }
    
};
for (var i = 0; i < btnLen; i++) {
    
    btn[i].onclick = function (e) {
        var btnVal = this.innerHTML;
        var cart = document.getElementById('cart');
        var goods = document.getElementById('all');
        var newDiv = document.createElement('div');
        var newName = document.createElement('p');
        var newPrice = document.createElement('p');
        var del = document.createElement('span');
        var product = this.parentNode.children;
        var info = product.namedItem('info').children;
        var text = info.namedItem('text').children;
        var name = text.namedItem('name').innerHTML;
        var price = text.namedItem('price').children;
        var nam = price.namedItem('num').innerHTML;
        var dollar = '$' + nam;
        var total = document.getElementById('total').innerHTML;
        if (btnVal) {
            newDiv.id = 'product' + j;
            newDiv.className = 'item';
            goods.appendChild(newDiv);
            var prod = document.getElementById('product' + j);
            newP(newName, name, newPrice, price, prod, del, dollar);
            document.getElementById('total').innerHTML = +total + +nam;
            var a = cart.childElementCount;
            if (a > 1) {
                cart.style.transform = 'translate(0px, 0)';
                var trans = function () {
                    var g = 0;
                    prod.style.transform = 'translate(0px, 0)';
                    if (g < 1) {
                        setTimeout(trans, 0);
                        g++;
                    }
                };
                setTimeout(trans, 100);
                grid.style.transform = 'translate(-18.5%, 0)';
            }
        }
        j++;
        upd();
    };
}

</script>

```

JQuery Shop 1.html
===================
```

<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'>

<script src="../js/modernizr.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel='stylesheet prefetch' href='../css/normalize.css'>
<script src='../js/prefixfree.min.js'></script>
<style>
@import url(http://fonts.googleapis.com/css?family=Lato:400,700);
/* Iconfonts
 * ============================ */
@import "http://weloveiconfonts.com/api/?family=fontawesome";
@import "http://weloveiconfonts.com/api/?family=brandico";
[class*="fontawesome-"]:before {
  font-family: "FontAwesome", sans-serif;
}

[class*="brandico-"]:before {
  font-family: "brandico", sans-serif;
}

/* Variables
 * ============================ */
/* Body
 * ============================ */
body {
  position: relative;
  font-family: "Lato", sans-serif;
  font-weight: 300;
  font-size: 1em;
  color: #cccccc;
}

/* Header
 * ============================ */
header {
  width: 100%;
  border-bottom: 1px solid #7cbae6;
  background: #1e1e1e;
}
header a.logo {
  margin-left: 1em;
  text-transform: uppercase;
  text-decoration: none;
  color: #7cbae6;
  line-height: 4em;
}
header a.logo span {
  margin: 0 3px 0 3px;
  color: #9cdaf0;
}
header a.cart-link {
  float: right;
  padding-left: 1em;
  margin-right: 1em;
  border-left: 1px dotted #515151;
  line-height: 4em;
  text-decoration: none;
  color: #fff;
  transition: color 150ms ease-out;
}
header a.cart-link:hover {
  color: #7cbae6;
}
header a.cart-link:active, header a.cart-link .active {
  color: #9cdaf0;
}
header span.cart-text:before {
  margin: 5px;
}
header span.cart-text:before > span {
  display: block;
}
header span.cart-quantity {
  position: relative;
  top: -2px;
  left: 5px;
  display: inline-block;
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: #f63;
  font-size: 0.6em;
  line-height: 20px;
  text-align: center;
  color: #fff;
}
header .cart-quantity.empty {
  display: none;
}
header .returnToShop {
  display: none;
}
header a.cart-link.active {
  border: 0;
  /* Cart link gets hidden */
  /* Back button is displayed */
}
header a.cart-link.active span.cart-text {
  display: none;
}
header a.cart-link.active span.cart-quantity {
  display: none;
}
header a.cart-link.active span.returnToShop {
  position: absolute;
  right: -75px;
  display: block;
  padding: 0 10px;
  background: #1e1e1e;
  border-right: 1px dotted #444444;
}

/* Sliding Cart
 * ============================ */
.wrap {
  position: relative;
  right: 0;
  box-shadow: 10px -10px 20px -10px rgba(0, 0, 0, 0.8);
  transition: all 200ms ease-out;
}

.wrap.active {
  right: 18em;
}

#cart {
  clear: both;
  overflow: hidden;
}

.js #cart {
  position: absolute;
  top: 0;
  right: 0;
  width: 18em;
  height: 100%;
}

/* Footer
 * ============================ */
footer {
  background: #111;
  font-size: 0.85em;
  color: #fff;
}
footer p {
  margin: 0 1em;
  line-height: 3em;
  color: #515151;
}

/* Shop & Product Items
 * ============================ */
.product {
  position: relative;
  z-index: 1;
  float: left;
  width: 27.796%;
  height: 300px;
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  border-top: 5px solid #ff5722;
  box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.15);
  background-color: #fff;
  margin: 2.7%;
}
.product > * {
  margin: 20px 25px;
  opacity: 0;
  transition: opacity 200ms ease-out;
}
.product:hover:before {
  position: absolute;
  z-index: -1;
  top: 0;
  display: inline-block;
  width: 100%;
  height: 300px;
  background: rgba(0, 0, 0, 0.8);
  content: "";
}
.product > * {
  margin: 20px 25px;
  opacity: 0;
  transition: opacity 200ms ease-out;
}
.product:hover > *, .product .active {
  opacity: 1;
}
.product h1 {
  padding: 15px 0;
  border-bottom: 1px dotted gray;
  font-weight: normal;
  font-size: 1.6em;
  color: #7cbae6;
}
.product p {
  margin-bottom: 30px;
  line-height: 1.5em;
}
.product .button {
  position: relative;
  display: block;
  width: 150px;
  height: 50px;
  text-align: center;
  perspective: 1000px;
  /* Button magic */
}
.product .button .price {
  position: absolute;
  z-index: 1;
  top: 2px;
  display: block;
  width: 50px;
  height: 46px;
  border-right: 1px solid #9cdaf0;
  border-radius: 2px 0 0 2px;
  background: #fff;
  line-height: 45px;
  color: #515151;
  transform: rotateY(0deg) translateZ(25px);
}
.product .button .addtocart {
  position: absolute;
  left: 48px;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d;
  transform: translateZ(-100px);
  transition: transform 300ms;
  cursor: pointer;
}
.product .button .addtocart > div {
  position: absolute;
  display: block;
  width: 150px;
  height: 50px;
  border-radius: 0 2px 2px 0;
  line-height: 50px;
}
.product .button .addtocart > .add {
  background: #fff;
  color: #7cbae6;
  transform: rotateY(0deg) translateZ(25px);
  transition: background 150ms ease-out;
}
.product .button .addtocart > .add:hover {
  background: #7cbae6;
  color: #fff;
}
.product .button .addtocart > .added {
  background: #f63;
  color: #fff;
  transform: rotateX(90deg) translateZ(25px);
}
.product .button .addtocart.active {
  animation-name: rotate;
  animation-duration: 1s;
}

/* Cart & Cart Items
 * ============================ */
#cart {
  background: #222;
}

#cart > h2 {
  height: 64px;
  padding-right: 1em;
  border-left: 1px dotted #515151;
  border-bottom: 1px solid #7cbae6;
  margin: 0;
  background: #2d2d2d;
  font-weight: normal;
  font-size: 1.2em;
  text-align: right;
  line-height: 64px;
}

/* Styles for each cart item */
.cart-items {
  padding: 0;
}

.cart-items > li {
  margin: 30px 20px 30px;
  border: 1px solid #333;
  background: #202020;
  list-style: none;
}

.cart-product {
  position: relative;
  display: inline-block;
  height: 75px;
  width: 75px;
  
  background-size: cover;
  vertical-align: top;
}
.cart-product input.quantity {
  width: 75px;
  height: 75px;
  padding: 0;
  border: 0;
  border-right: 1px solid #333;
  background: rgba(0, 0, 0, 0.5);
  font-size: 2.5em;
  line-height: 75px;
  text-align: center;
  color: #fff;
}

.cart-description {
  display: inline-block;
  height: 75px;
  width: 160px;
  margin-left: 10px;
  text-align: right;
  vertical-align: top;
}
.cart-description h3 {
  margin: 8px;
  font-size: 1em;
  color: #7cbae6;
}
.cart-description .subtotal {
  position: relative;
  display: inline-block;
  margin: 8px;
  font-size: 0.8em;
}

/* Styling for Total Costs */
.total {
  margin-top: 50px;
}

.total > * {
  display: block;
  padding-bottom: 10px;
  margin: 0 20px 10px 20px;
  font-size: 0.8em;
  text-align: left;
}

.total span {
  float: right;
  text-align: right;
}

.subtotalTotal {
  border-bottom: 1px dotted #515151;
}

.shipping {
  border-bottom: 1px dotted #515151;
}

.finalTotal {
  font-size: 1em;
  color: #7cbae6;
}

a.checkout {
  height: 35px;
  padding: 0;
  margin-top: 30px;
  border-radius: 3px;
  background: #247ebe;
  font-size: 1em;
  text-align: center;
  text-transform: uppercase;
  line-height: 35px;
  transition: background 150ms ease-out;
  cursor: pointer;
}
a.checkout:hover {
  background: #3c98da;
}
a.checkout.active {
  animation-name: shake;
  animation-duration: 800ms;
}

.error {
  display: none;
  text-align: center;
}

.error:after {
  display: block;
  font-size: 0.9em;
  text-transform: none;
  content: "Sorry, the Octocat is busy!";
}

/* Media Queries
 * ============================ */
@media (max-width: 720px) {
  .product {
    width: 100%;
  }
}
@media (max-width: 420px) {
  /* Hide text in the cart link to save room */
  .cart-text > span {
    display: none;
  }
}
/* Keyframe Animations
 * ============================ */
@keyframes rotate {
  35% {
    transform: translateZ(-100px) rotateX(-90deg);
  }
  72% {
    transform: translateZ(-100px) rotateX(-90deg);
  }
  100% {
    transform: translateZ(-100px);
  }
}
@keyframes shake {
  0%, 100% {
    transform: translateX(0);
  }
  10%, 30%, 50%, 70%, 90% {
    transform: translateX(-5px);
  }
  20%, 40%, 60%, 80% {
    transform: translateX(5px);
  }
}
</style></head><body>
<div id='cart'>
  <h2>Your Shopping Cart</h2>
  <ul class='cart-items'></ul>
  <div class='total'>
    <div class='subtotalTotal'>
      Subtotal
      <span>$0.00</span>
    </div>
    <div class='taxes'>
      Tax
      <span>$0.00</span>
    </div>
    <div class='shipping'>
      Shipping
      <span>$0.00</span>
    </div>
    <div class='finalTotal'>
      Total
      <span>$0.00</span>
    </div>
    <a class='checkout'>
      Check Out
    </a>
    <p class='error'></p>
  </div>
</div>
<div class='wrap' id='wrap'>
  <header>
    <a class='logo' href='#'>
      Octocat <span class="brandico-github"></span> Outfitters
    </a>
    <a class='cart-link' href='#menu'>
      <span class='cart-text fontawesome-shopping-cart'>
        <span>Cart</span>
      </span>
      <span class='returnToShop'>&larr; Back</span>
      <span class='cart-quantity empty'>0</span>
    </a>
  </header>
  <section class='shop'></section>
  <footer>
    <p>Crafted for the Pattern Rodeo (rodeo-007). Images belong to Github.</p>
  </footer>
</div>
<!-- / Product Templates for Shop & Cart -->
<script id='productTemplate' type='text/template'>
  <div class="product">
  <h1></h1>
  <p></p>
  <div class="button">
  <div class="price"></div>
  <a class="addtocart">
  <div class="add">Add to Cart</div>
  <div class="added">Added!</div>
  </a>
  </div>
  </div>
</script>
<script id='cartItem' type='text/template'>
  <li><div class="cart-product">
  <input class="quantity" value="1">
  </div><div class="cart-description">
  <h3></h3>
  <span class="subtotal"></span>
  </div></li>
</script>
```
JQuery Shop 2.html
===================
```
<script>
$(document).ready(function () {
    var products = {
        'Suit': [
            'Suit',
            'The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.',
            14,
            '../images/1.jpg',
            1
        ],
        'Bow tie': [
            'Bow tie',
            'These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.',
            18,
            '../images/2.jpg',
            2
        ],
        'Sweater': [
            'Sweater',
            'Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.',
            16,
            '../images/3.jpg',
            3
        ],
        'Hat': [
            'Hat',
            'Check it. Blacktocat is back with a whole new direction. He\'s exited stealth mode and is ready for primetime, now with a stylish logo.',
            25,
            '../images/4.jpg',
            4
        ],
        'Shoes': [
            'Shoes',
            'Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!',
            2,
            '../images/5.jpg',
            5
        ],
        'Glasses': [
            'Glasses',
            'Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline',
            25,
            '../images/6.jpg',
            6
        ]
    };
    var $shop = $('.shop');
    var $cart = $('.cart-items');
    for (var item in products) {
        var itemName = products[item][0], itemDescription = products[item][1], itemPrice = products[item][2], itemImg = products[item][3], itemId = products[item][4], $template = $($('#productTemplate').html());
        $template.find('h1').text(itemName);
        $template.find('p').text(itemDescription);
        $template.find('.price').text('$' + itemPrice);
        $template.css('background-image', 'url(' + itemImg + ')');
        $template.data('id', itemId);
        $template.data('name', itemName);
        $template.data('price', itemPrice);
        $template.data('image', itemImg);
        $shop.append($template);
    }


});

</script>

```

JQuery Shop 3.html
===================
```
    $('body').on('click', '.product .add', function () {
        var items = $cart.children(), $item = $(this).parents('.product'), $template = $($('#cartItem').html()), $matched = null, quantity = 0;
        $matched = items.filter(function (index) {
            var $this = $(this);
            return $this.data('id') === $item.data('id');
        });
        if ($matched.length) {
            quantity = +$matched.find('.quantity').val() + 1;
            $matched.find('.quantity').val(quantity);

        } else {
            $template.find('.cart-product').css('background-image', 'url(' + $item.data('image') + ')');
            $template.find('h3').text($item.data('name'));
            $template.find('.subtotal').text('$' + $item.data('price'));
            $template.data('id', $item.data('id'));
            $template.data('price', $item.data('price'));
            $template.data('subtotal', $item.data('price'));
            $cart.append($template);
        }

    });
    var $cartlink = $('.cart-link'), $wrap = $('#wrap');
    $cartlink.on('click', function () {
        $cartlink.toggleClass('active');
        $wrap.toggleClass('active');
        return false;
    });
    $wrap.on('click', function (e) {
        if (!$(e.target).is('.add')) {
            $wrap.removeClass('active');
            $cartlink.removeClass('active');
        }
    });

    $('.addtocart').on('click', function () {
        $(this).addClass('active');
        setTimeout(function () {
            $('.addtocart').removeClass('active');
        }, 1000);
    });

```

JQuery Shop 4.html
===================
```
   $('body').on('click', '.product .add', function () {
        var items = $cart.children(), $item = $(this).parents('.product'), $template = $($('#cartItem').html()), $matched = null, quantity = 0;
        $matched = items.filter(function (index) {
            var $this = $(this);
            return $this.data('id') === $item.data('id');
        });
        if ($matched.length) {
            quantity = +$matched.find('.quantity').val() + 1;
            $matched.find('.quantity').val(quantity);
            calculateSubtotal($matched);
        } else {
            $template.find('.cart-product').css('background-image', 'url(' + $item.data('image') + ')');
            $template.find('h3').text($item.data('name'));
            $template.find('.subtotal').text('$' + $item.data('price'));
            $template.data('id', $item.data('id'));
            $template.data('price', $item.data('price'));
            $template.data('subtotal', $item.data('price'));
            $cart.append($template);
        }
        updateCartQuantity();
        calculateAndUpdate();
    });
    function calculateSubtotal($item) {
        var quantity = $item.find('.quantity').val(), price = $item.data('price'), subtotal = quantity * price;
        $item.find('.subtotal').text('$' + subtotal);
        $item.data('subtotal', subtotal);
    }
    var $cartlink = $('.cart-link'), $wrap = $('#wrap');
    $cartlink.on('click', function () {
        $cartlink.toggleClass('active');
        $wrap.toggleClass('active');
        return false;
    });
    $wrap.on('click', function (e) {
        if (!$(e.target).is('.add')) {
            $wrap.removeClass('active');
            $cartlink.removeClass('active');
        }
    });
    function calculateAndUpdate() {
        var subtotal = 0, items = $cart.children(), shipping = items.length > 0 ? 5 : 0, tax = 0;
        items.each(function (index, item) {
            var $item = $(item), price = $item.data('subtotal');
            subtotal += price;
        });
        $('.subtotalTotal span').text(formatDollar(subtotal));
        tax = subtotal * 0.05;
        $('.taxes span').text(formatDollar(tax));
        $('.shipping span').text(formatDollar(shipping));
        $('.finalTotal span').text(formatDollar(subtotal + tax + shipping));
    }
    function updateCartQuantity() {
        var quantities = 0, $cartQuantity = $('span.cart-quantity'), items = $cart.children();
        items.each(function (index, item) {
            var $item = $(item), quantity = +$item.find('.quantity').val();
            quantities += quantity;
        });
        if (quantities > 0) {
            $cartQuantity.removeClass('empty');
        } else {
            $cartQuantity.addClass('empty');
        }
        $cartQuantity.text(quantities);
    }
    function formatDollar(amount) {
        return '$' + parseFloat(Math.round(amount * 100) / 100).toFixed(2);
    }
    $('body').on('keypress', '.cart-items input', function (ev) {
        var keyCode = window.event ? ev.keyCode : ev.which;
        if (keyCode < 48 || keyCode > 57) {
            if (keyCode != 0 && keyCode != 8 && keyCode != 13 && !ev.ctrlKey) {
                ev.preventDefault();
            }
        }
    });
    $('.addtocart').on('click', function () {
        $(this).addClass('active');
        setTimeout(function () {
            $('.addtocart').removeClass('active');
        }, 1000);
    });

```

JQuery Shop 5.html
===================
```
    $('body').on('blur', '.cart-items input', function() {
        var $this = $(this), $item = $this.parents('li');
        if (+$this.val() === 0) {
            $item.remove();
        } else {
            calculateSubtotal($item);
        }
        updateCartQuantity();
        calculateAndUpdate();
    });

```

JQuery Shop index.html
======================
```

<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'>

<script src="../js/modernizr.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel='stylesheet prefetch' href='../css/normalize.css'>
<script src='../js/prefixfree.min.js'></script>
<style>
@import url(http://fonts.googleapis.com/css?family=Lato:400,700);
/* Iconfonts
 * ============================ */
@import "http://weloveiconfonts.com/api/?family=fontawesome";
@import "http://weloveiconfonts.com/api/?family=brandico";
[class*="fontawesome-"]:before {
  font-family: "FontAwesome", sans-serif;
}

[class*="brandico-"]:before {
  font-family: "brandico", sans-serif;
}

/* Variables
 * ============================ */
/* Body
 * ============================ */
body {
  position: relative;
  font-family: "Lato", sans-serif;
  font-weight: 300;
  font-size: 1em;
  color: #cccccc;
}

/* Header
 * ============================ */
header {
  width: 100%;
  border-bottom: 1px solid #7cbae6;
  background: #1e1e1e;
  /* Logo */
  /* Cart link */
  /* Quantity Notification */
  /* Quantity Notification hidden when no items */
  /* Back button hidden by default */
  /* State changes when cart is active */
}
header a.logo {
  margin-left: 1em;
  text-transform: uppercase;
  text-decoration: none;
  color: #7cbae6;
  line-height: 4em;
}
header a.logo span {
  margin: 0 3px 0 3px;
  color: #9cdaf0;
}
header a.cart-link {
  float: right;
  padding-left: 1em;
  margin-right: 1em;
  border-left: 1px dotted #515151;
  line-height: 4em;
  text-decoration: none;
  color: #fff;
  transition: color 150ms ease-out;
}
header a.cart-link:hover {
  color: #7cbae6;
}
header a.cart-link:active, header a.cart-link .active {
  color: #9cdaf0;
}
header span.cart-text:before {
  margin: 5px;
}
header span.cart-text:before > span {
  display: block;
}
header span.cart-quantity {
  position: relative;
  top: -2px;
  left: 5px;
  display: inline-block;
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: #f63;
  font-size: 0.6em;
  line-height: 20px;
  text-align: center;
  color: #fff;
}
header .cart-quantity.empty {
  display: none;
}
header .returnToShop {
  display: none;
}
header a.cart-link.active {
  border: 0;
  /* Cart link gets hidden */
  /* Back button is displayed */
}
header a.cart-link.active span.cart-text {
  display: none;
}
header a.cart-link.active span.cart-quantity {
  display: none;
}
header a.cart-link.active span.returnToShop {
  position: absolute;
  right: -75px;
  display: block;
  padding: 0 10px;
  background: #1e1e1e;
  border-right: 1px dotted #444444;
}

/* Sliding Cart
 * ============================ */
.wrap {
  position: relative;
  right: 0;
  box-shadow: 10px -10px 20px -10px rgba(0, 0, 0, 0.8);
  transition: all 200ms ease-out;
}

.wrap.active {
  right: 18em;
}

#cart {
  clear: both;
  overflow: hidden;
}

.js #cart {
  position: absolute;
  top: 0;
  right: 0;
  width: 18em;
  height: 100%;
}

/* Footer
 * ============================ */
footer {
  background: #111;
  font-size: 0.85em;
  color: #fff;
}
footer p {
  margin: 0 1em;
  line-height: 3em;
  color: #515151;
}

/* Shop & Product Items
 * ============================ */
.product {
  position: relative;
  z-index: 1;
  float: left;
  width: 27.796%;
  height: 300px;
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  border-top: 5px solid #ff5722;
  box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.15);
  background-color: #fff;
  margin: 2.7%;
  /* Hide product descriptions */
  /* On hover, adds overlay on top of product image */
  /* On hover, fade in product descriptions */
  /* Styles for each shop item */
  /* "Add to Cart" Buttom with 3D transforms and keyframe animation (Works best in Chrome) */
}
.product > * {
  margin: 20px 25px;
  opacity: 0;
  transition: opacity 200ms ease-out;
}
.product:hover:before {
  position: absolute;
  z-index: -1;
  top: 0;
  display: inline-block;
  width: 100%;
  height: 300px;
  background: rgba(0, 0, 0, 0.8);
  content: "";
}
.product > * {
  margin: 20px 25px;
  opacity: 0;
  transition: opacity 200ms ease-out;
}
.product:hover > *, .product .active {
  opacity: 1;
}
.product h1 {
  padding: 15px 0;
  border-bottom: 1px dotted gray;
  font-weight: normal;
  font-size: 1.6em;
  color: #7cbae6;
}
.product p {
  margin-bottom: 30px;
  line-height: 1.5em;
}
.product .button {
  position: relative;
  display: block;
  width: 150px;
  height: 50px;
  text-align: center;
  perspective: 1000px;
  /* Button magic */
}
.product .button .price {
  position: absolute;
  z-index: 1;
  top: 2px;
  display: block;
  width: 50px;
  height: 46px;
  border-right: 1px solid #9cdaf0;
  border-radius: 2px 0 0 2px;
  background: #fff;
  line-height: 45px;
  color: #515151;
  transform: rotateY(0deg) translateZ(25px);
}
.product .button .addtocart {
  position: absolute;
  left: 48px;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d;
  transform: translateZ(-100px);
  transition: transform 300ms;
  cursor: pointer;
}
.product .button .addtocart > div {
  position: absolute;
  display: block;
  width: 150px;
  height: 50px;
  border-radius: 0 2px 2px 0;
  line-height: 50px;
}
.product .button .addtocart > .add {
  background: #fff;
  color: #7cbae6;
  transform: rotateY(0deg) translateZ(25px);
  transition: background 150ms ease-out;
}
.product .button .addtocart > .add:hover {
  background: #7cbae6;
  color: #fff;
}
.product .button .addtocart > .added {
  background: #f63;
  color: #fff;
  transform: rotateX(90deg) translateZ(25px);
}
.product .button .addtocart.active {
  animation-name: rotate;
  animation-duration: 1s;
}

/* Cart & Cart Items
 * ============================ */
#cart {
  background: #222;
}

#cart > h2 {
  height: 64px;
  padding-right: 1em;
  border-left: 1px dotted #515151;
  border-bottom: 1px solid #7cbae6;
  margin: 0;
  background: #2d2d2d;
  font-weight: normal;
  font-size: 1.2em;
  text-align: right;
  line-height: 64px;
}

/* Styles for each cart item */
.cart-items {
  padding: 0;
}

.cart-items > li {
  margin: 30px 20px 30px;
  border: 1px solid #333;
  background: #202020;
  list-style: none;
}

.cart-product {
  position: relative;
  display: inline-block;
  height: 75px;
  width: 75px;
  
  background-size: cover;
  vertical-align: top;
}
.cart-product input.quantity {
  width: 75px;
  height: 75px;
  padding: 0;
  border: 0;
  border-right: 1px solid #333;
  background: rgba(0, 0, 0, 0.5);
  font-size: 2.5em;
  line-height: 75px;
  text-align: center;
  color: #fff;
}

.cart-description {
  display: inline-block;
  height: 75px;
  width: 160px;
  margin-left: 10px;
  text-align: right;
  vertical-align: top;
}
.cart-description h3 {
  margin: 8px;
  font-size: 1em;
  color: #7cbae6;
}
.cart-description .subtotal {
  position: relative;
  display: inline-block;
  margin: 8px;
  font-size: 0.8em;
}

/* Styling for Total Costs */
.total {
  margin-top: 50px;
}

.total > * {
  display: block;
  padding-bottom: 10px;
  margin: 0 20px 10px 20px;
  font-size: 0.8em;
  text-align: left;
}

.total span {
  float: right;
  text-align: right;
}

.subtotalTotal {
  border-bottom: 1px dotted #515151;
}

.shipping {
  border-bottom: 1px dotted #515151;
}

.finalTotal {
  font-size: 1em;
  color: #7cbae6;
}

a.checkout {
  height: 35px;
  padding: 0;
  margin-top: 30px;
  border-radius: 3px;
  background: #247ebe;
  font-size: 1em;
  text-align: center;
  text-transform: uppercase;
  line-height: 35px;
  transition: background 150ms ease-out;
  cursor: pointer;
}
a.checkout:hover {
  background: #3c98da;
}
a.checkout.active {
  animation-name: shake;
  animation-duration: 800ms;
}

.error {
  display: none;
  text-align: center;
}

.error:after {
  display: block;
  font-size: 0.9em;
  text-transform: none;
  content: "Sorry, the Octocat is busy!";
}

/* Media Queries
 * ============================ */
@media (max-width: 720px) {
  .product {
    width: 100%;
  }
}
@media (max-width: 420px) {
  /* Hide text in the cart link to save room */
  .cart-text > span {
    display: none;
  }
}
/* Keyframe Animations
 * ============================ */
@keyframes rotate {
  35% {
    transform: translateZ(-100px) rotateX(-90deg);
  }
  72% {
    transform: translateZ(-100px) rotateX(-90deg);
  }
  100% {
    transform: translateZ(-100px);
  }
}
@keyframes shake {
  0%, 100% {
    transform: translateX(0);
  }
  10%, 30%, 50%, 70%, 90% {
    transform: translateX(-5px);
  }
  20%, 40%, 60%, 80% {
    transform: translateX(5px);
  }
}
</style></head><body>
<div id='cart'>
  <h2>Your Shopping Cart</h2>
  <ul class='cart-items'></ul>
  <div class='total'>
    <div class='subtotalTotal'>
      Subtotal
      <span>$0.00</span>
    </div>
    <div class='taxes'>
      Tax
      <span>$0.00</span>
    </div>
    <div class='shipping'>
      Shipping
      <span>$0.00</span>
    </div>
    <div class='finalTotal'>
      Total
      <span>$0.00</span>
    </div>
    <a class='checkout'>
      Check Out
    </a>
    <p class='error'></p>
  </div>
</div>
<div class='wrap' id='wrap'>
  <header>
    <a class='logo' href='#'>
      Octocat <span class="brandico-github"></span> Outfitters
    </a>
    <a class='cart-link' href='#menu'>
      <span class='cart-text fontawesome-shopping-cart'>
        <span>Cart</span>
      </span>
      <span class='returnToShop'>&larr; Back</span>
      <span class='cart-quantity empty'>0</span>
    </a>
  </header>
  <section class='shop'></section>
  <footer>
    <p>Crafted for the Pattern Rodeo (rodeo-007). Images belong to Github.</p>
  </footer>
</div>
<!-- / Product Templates for Shop & Cart -->
<script id='productTemplate' type='text/template'>
  <div class="product">
  <h1></h1>
  <p></p>
  <div class="button">
  <div class="price"></div>
  <a class="addtocart">
  <div class="add">Add to Cart</div>
  <div class="added">Added!</div>
  </a>
  </div>
  </div>
</script>
<script id='cartItem' type='text/template'>
  <li><div class="cart-product">
  <input class="quantity" value="1">
  </div><div class="cart-description">
  <h3></h3>
  <span class="subtotal"></span>
  </div></li>
</script>
<script src='../js/jquery.min.js'></script>
<script>
$(document).ready(function () {
    var products = {
        'Suit': [
            'Suit',
            'The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.',
            14,
            '../images/1.jpg',
            1
        ],
        'Bow tie': [
            'Bow tie',
            'These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.',
            18,
            '../images/2.jpg',
            2
        ],
        'Sweater': [
            'Sweater',
            'Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.',
            16,
            '../images/3.jpg',
            3
        ],
        'Hat': [
            'Hat',
            'Check it. Blacktocat is back with a whole new direction. He\'s exited stealth mode and is ready for primetime, now with a stylish logo.',
            25,
            '../images/4.jpg',
            4
        ],
        'Shoes': [
            'Shoes',
            'Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!',
            2,
            '../images/5.jpg',
            5
        ],
        'Glasses': [
            'Glasses',
            'Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline',
            25,
            '../images/6.jpg',
            6
        ]
    };
    var $shop = $('.shop');
    var $cart = $('.cart-items');
    for (var item in products) {
        var itemName = products[item][0], itemDescription = products[item][1], itemPrice = products[item][2], itemImg = products[item][3], itemId = products[item][4], $template = $($('#productTemplate').html());
        $template.find('h1').text(itemName);
        $template.find('p').text(itemDescription);
        $template.find('.price').text('$' + itemPrice);
        $template.css('background-image', 'url(' + itemImg + ')');
        $template.data('id', itemId);
        $template.data('name', itemName);
        $template.data('price', itemPrice);
        $template.data('image', itemImg);
        $shop.append($template);
    }

    $('body').on('blur', '.cart-items input', function () {
        var $this = $(this), $item = $this.parents('li');
        if (+$this.val() === 0) {
            $item.remove();
        } else {
            calculateSubtotal($item);
        }
        updateCartQuantity();
        calculateAndUpdate();
    });
    $('body').on('click', '.product .add', function () {
        var items = $cart.children(), $item = $(this).parents('.product'), $template = $($('#cartItem').html()), $matched = null, quantity = 0;
        $matched = items.filter(function (index) {
            var $this = $(this);
            return $this.data('id') === $item.data('id');
        });
        if ($matched.length) {
            quantity = +$matched.find('.quantity').val() + 1;
            $matched.find('.quantity').val(quantity);
            calculateSubtotal($matched);
        } else {
            $template.find('.cart-product').css('background-image', 'url(' + $item.data('image') + ')');
            $template.find('h3').text($item.data('name'));
            $template.find('.subtotal').text('$' + $item.data('price'));
            $template.data('id', $item.data('id'));
            $template.data('price', $item.data('price'));
            $template.data('subtotal', $item.data('price'));
            $cart.append($template);
        }
        updateCartQuantity();
        calculateAndUpdate();
    });
    function calculateSubtotal($item) {
        var quantity = $item.find('.quantity').val(), price = $item.data('price'), subtotal = quantity * price;
        $item.find('.subtotal').text('$' + subtotal);
        $item.data('subtotal', subtotal);
    }
    var $cartlink = $('.cart-link'), $wrap = $('#wrap');
    $cartlink.on('click', function () {
        $cartlink.toggleClass('active');
        $wrap.toggleClass('active');
        return false;
    });
    $wrap.on('click', function (e) {
        if (!$(e.target).is('.add')) {
            $wrap.removeClass('active');
            $cartlink.removeClass('active');
        }
    });
    function calculateAndUpdate() {
        var subtotal = 0, items = $cart.children(), shipping = items.length > 0 ? 5 : 0, tax = 0;
        items.each(function (index, item) {
            var $item = $(item), price = $item.data('subtotal');
            subtotal += price;
        });
        $('.subtotalTotal span').text(formatDollar(subtotal));
        tax = subtotal * 0.05;
        $('.taxes span').text(formatDollar(tax));
        $('.shipping span').text(formatDollar(shipping));
        $('.finalTotal span').text(formatDollar(subtotal + tax + shipping));
    }
    function updateCartQuantity() {
        var quantities = 0, $cartQuantity = $('span.cart-quantity'), items = $cart.children();
        items.each(function (index, item) {
            var $item = $(item), quantity = +$item.find('.quantity').val();
            quantities += quantity;
        });
        if (quantities > 0) {
            $cartQuantity.removeClass('empty');
        } else {
            $cartQuantity.addClass('empty');
        }
        $cartQuantity.text(quantities);
    }
    function formatDollar(amount) {
        return '$' + parseFloat(Math.round(amount * 100) / 100).toFixed(2);
    }
    $('body').on('keypress', '.cart-items input', function (ev) {
        var keyCode = window.event ? ev.keyCode : ev.which;
        if (keyCode < 48 || keyCode > 57) {
            if (keyCode != 0 && keyCode != 8 && keyCode != 13 && !ev.ctrlKey) {
                ev.preventDefault();
            }
        }
    });
    $('.addtocart').on('click', function () {
        $(this).addClass('active');
        setTimeout(function () {
            $('.addtocart').removeClass('active');
        }, 1000);
    });
    $('.checkout').on('click', function () {
        $(this).addClass('active');
        $('.error').css('display', 'block');
        setTimeout(function () {
            $('.checkout').removeClass('active');
            $('.error').css('display', 'none');
        }, 1000);
    });
});

</script>

</body></html>
```
