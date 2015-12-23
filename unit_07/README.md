# 21v-js

Классы в виде объекта: classList
================================

Свойство classList — это объект для работы с классами.

Оно поддерживается в IE начиная с IE10, но его можно эмулировать в IE8+, подключив мини-библиотеку classList.js.

Методы classList:
-----------------
- elem.classList.contains("class") — возвращает true/false, в зависимости от того, есть ли у элемента класс class.
- elem.classList.add/remove("class") — добавляет/удаляет класс class
- elem.classList.toggle("class") — если класса class нет, добавляет его, если есть — удаляет.
Кроме того, можно перебрать классы через for, так как classList — это псевдо-массив.

Например:
---------
```
var hasClass, addClass, removeClass, eventType, $q, mobileMenu, navigation, navTrigger, toggleNav;


// проверить наличие класса
hasClass = function (elem, c) {
    return elem.classList.contains(c);
};
// добавить класс
addClass = function (elem, c) {
    elem.classList.add(c);
};

// удалить класс
removeClass = function (elem, c) {
    elem.classList.remove(c);
};

function toggleClass(elem, c) {
    var fn = hasClass(elem, c) ? removeClass : addClass;
    fn(elem, c);
}
```

Поиск querySelector*
=====================
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
-------------
Вызов elem.querySelector(css) возвращает не все, а только первый элемент, соответствующий CSS-селектору css.

результат такой же, как и при elem.querySelectorAll(css)[0], но в последнем вызове сначала ищутся все элементы, а потом берётся первый, а в elem.querySelector(css) ищется только первый, то есть он эффективнее.

Этот метод часто используется, когда мы заведомо знаем, что подходящий элемент только один, и хотим получить в переменную сразу его.

```
$q = function (selector) {
    return document.querySelector(selector);
};

mobileMenu = $q('.navigation-mobile-link'), navigation = $q('.navigation');
```
Modernizr
==========
https://modernizr.com/
----------------------
Modernizr - библиотека на JavaScript с открытым исходным кодом, позволяющая определять поддержку различных свойств . Modernizr предоставляет широкий спектр решений для веб-дизайнеров и разработчиков, чтобы пользоваться новыми возможностями HTML5 и CSS3, несмотря на различную поддержку браузерами.

Установка Modernizr
-------------------
Доступны два варианта для скачивания, либо полная версия Modernizr, либо создание пользовательской версии, которая будет включать в себя только те функции, которые вы собираетесь использовать. Поскольку эту библиотеку необходимо размещать в начале страницы, лучше осуществлять ручную настройку при скачивании. 

Чтобы установить Modernizr необходимо добавить скрипт для каждой страницы, которая будет его использовать. Вот основной документ HTML5:
```
<meta charset="utf-8">
<title>Hello Modernizr</title>
<script src="js/modernizr.js"></script> 
```
Этот скрипт надо загружать именно в head документа, а не в нижней части страницы, где обычно располагаются скрипты для осуществления большей производительности. Для правильной работы modernizr.js располагаем в секции head.

Ввод классов в HTML с помощью Modernizr
---------------------------------------
В разметке тегу html присвоен класс “no-js”. Во время загрузки страницы Modernizr заменит этот класс на “js”. Затем, вместе с классом js библиотека добавит классы для всех функций, которые браузер поддерживает, а также классы функций, которые браузер не поддерживает.

Например, вот как выглядит тег html для текущей версии Chrome:
```
<НTML class="js no-touch postmessage history multiplebgs boxshadow opacity cssanimations csscolumns cssgradients csstransforms csstransitions fontface localstorage sessionstorage svg inlinesvg blobbuilder blob bloburls download formdata">
```
А вот как выглядит этот тег для браузера Internet Explorer 7:
```
  <НTML class="js no-touch postmessage no-history no-multiplebgs no-boxshadow no-opacity no-cssanimations no-csscolumns no-cssgradients no-csstransforms no-csstransitions fontface localstorage sessionstorage no-svg no-inlinesvg wf-loading no-blobbuilder no-blob no-bloburls no-download no-formdata">
```
Вы можете использовать эти классы в CSS для создания специфических стилей для браузеров не поддерживающих какие-либо новый свойства. Например, вы хотите придать стиль кнопке с частичной прозрачностью:
```
  .button {
    background: #000;
    opacity: 0.75;
 }
```
Если браузер не поддерживает CSS свойство opacity, кнопка отобразится с чёрным фоном вместо серого полупрозрачного.

Используя класс добавленный modernizr, можно переопределить начальный стиль:
```
  .no-opacity .button {
    background: #444;
 }
```
Вы также можете сначала задать стиль для старых браузеров, а потом для браузеров с поддержкой opacity:
```
 .button {
    background: #444;
 }
.opacity .button {
    background: #000;
    opacity: 0.75;
 }
```
Также всегда стоит проверять, как выглядит тот или иной стиль, если javascript отключен.

Обнаружение поддержки свойств с помощью Javascript
--------------------------------------------------
В дополнение к классам в тег html, modernizr также создаёт Javascript объект к вашему документу под названием Modernizr. Этот объект позволяет проверить каждую функцию на наличие поддержки браузером.
```
Modernizr.cssgradients; //True в Chrome, False в IE7
Modernizr.fontface; //True в Chrome, True в IE7
Modernizr.geolocation; //True в Chrome, False в IE7
```
Следущая проверка может быть использована для создания логических ветвей:
```
if (Modernizr.canvas){
// можем рисовать!
 } else {
// в противном случае выполняем fallback
 }
   
if (Modernizr.touch){
 // можем использовать rollover/rollouts события
 } else {
    // 
 }
```
Определение типа события
------------------------
```
eventType = Modernizr.touch ? 'touchstart' : 'click';
```

Однако, этот подход создаёт довольно раздутый код. Лучшим вариантом является условная загрузка ресурсов в зависимости от результатов теста Modernizr.

Загрузчик Modernizr
-------------------
В комплект к библиотеке modernizr входит условный загрузчик ресурсов. Этот загрузчик позволяет указать какой файл Javascript или CSS следует загрузить в зависимости от результатов пройденного теста. Вот пример:
```
 Modernizr.load({
   test :        Modernizr.localstorage,
   yep  :        'localStorage.js',
   nope :        'alt-storageSystem.js'   Complete :    function () { enableStorgeSaveUI();}
 });
```
В приведённом выше примере, загрузчик определяет, поддерживает ли браузер LocalStorage. Если да, то произойдет асинхронная загрузка файла localStorage.js. Если поддержки не будет обнаружено, то вместо этого будет загружен файл alt-storageSystem.js.

Вы можете использовать этот механизм для загрузки только необходимого Javascript и CSS кода для использования на сенсорных устройствах:
```
 Modernizr.load({
   test : Modernizr.touch,
   Yep :  ['js/touch.js', 'css/touchStyles.css'] });
```
Использование Shims и Polyfills
-------------------------------
Вы можете использовать Modernizr.load() чтобы ”пропатчить” браузер с помощью shims (это кусочки кода, которые имитируют отсутствие функциональности браузера) и polyfills (определённые классы shims, которые служат для репликации недостающей функциональности). Таким образом, если shim или polyfill для функции доступны, вы можете исправить любые недостающие функции в браузере пользователя, если, например, клиент потребует, чтобы внешний вид и функциональность была максимально одинаковый во всех браузерах.

Использование Shims и Polyfills
--------------------------------
Есть хороший резервный метод с ипользованием jquery ui и polyfill. С помощью загрузчика Modernizr мы можем загрузить 4 файла, необходимых для воссоздания выбора даты для неподдерживаемых браузеров:
```
 Modernizr.load({
   test :     Modernizr.inputtype && Modernizr.inputtypes.date,
   nope :     [‘js/jquery.js’, ‘js/jquery-ui.js’, ‘css/jquery-ui.css’, ‘js/datepicker.js’] });
```

Ещё одним преимущество Modernizr в том, что html5shim включен в библиотеку. Библиотека html5shim позволяет корректно обрабатывать новые теги HTML5 старыми браузерами IE.

Работа Modernizr с Internet Explorer
------------------------------------
В помощь к бибилиотеке html5shim в работе с IE, Modernizr также обеспечивает набор условных классов. Эти классы позволяют устанавливать CSS правила, которые ориентированы на конкретные версии IE. Для вызова классов для IE достаточно разместить перед html такой код:
```
 <!--[if lt IE 7]>     <html class="no-js ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
 <!--[if IE 7]>        <html class="no-js ie lt-ie9 lt-ie8"> <![endif]-->
 <!--[if IE 8]>        <html class="no-js ie lt-ie9">
  <![endif]-->
 <!--[if IE 9]>        <html class="no-js ie lt-ie10"> <![endif]-->
```
Например, если в вашем дизайне активно используется свойство bpx-shadow, которое не поддерживается IE6-IE8, определить стили для этих браузеров можно так:
```
 body.lt-ie7 #box, body.lt-ie8 #box, body.lt-ie9 #box {
    zoom: 1;
    filter: progid:DXImageTransform.Microsoft.DropShadow(OffX=5, OffY=5, Color=#ff0000);
}
```

nav1.html
----------

```
<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'>

<script src="../js/modernizr.js" type="text/javascript"></script>

<link rel='stylesheet prefetch' href='../css/reset.css'>

<style class="cp-pen-styles">body {
  font-size: 100%;
  line-height: 1.5em;
  font-family: Verdana, sans-serif;
}

* {
  box-sizing: border-box;
}

.header {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  -webkit-box-flex: 1;
  -webkit-flex: 1 0 100%;
      -ms-flex: 1 0 100%;
          flex: 1 0 100%;
  -webkit-flex-wrap: wrap;
      -ms-flex-wrap: wrap;
          flex-wrap: wrap;
  background-color: #fff;
}
@media all and (min-width: 30em) {
  .header {
    border-bottom: 1px solid #eee;
  }
}

.logo {
  position: relative;
  z-index: 902;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 2;
  -webkit-flex: 2 0 20%;
      -ms-flex: 2 0 20%;
          flex: 2 0 20%;
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
      -ms-flex-pack: start;
          justify-content: flex-start;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 1em;
  border-bottom: 1px solid #eee;
  text-decoration: none;
  background-color: #ccc;
  color: #222;
}
@media all and (min-width: 30em) {
  .logo {
    -webkit-box-flex: 1;
    -webkit-flex: 1 0 5em;
        -ms-flex: 1 0 5em;
            flex: 1 0 5em;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
        -ms-flex-pack: center;
            justify-content: center;
    border-bottom: none;
  }
}

.navigation-mobile {
  background-color: #fff;
  position: relative;
  z-index: 902;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 auto;
      -ms-flex: 1 1 auto;
          flex: 1 1 auto;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}
@media all and (min-width: 30em) {
  .navigation-mobile {
    display: none;
    visibility: hidden;
  }
}

.navigation-mobile a {
  border-left: 1px solid #eee;
  border-bottom: 1px solid #eee;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -webkit-flex: 1 0 auto;
      -ms-flex: 1 0 auto;
          flex: 1 0 auto;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: start;
  -webkit-align-items: flex-start;
      -ms-flex-align: start;
          align-items: flex-start;
  position: relative;
  padding: 1em;
  font-size: 1em;
  z-index: 991;
  width: 100%;
  color: #111;
  text-decoration: none;
  cursor: pointer;
  -webkit-transition: background-color 0.4s ease-in-out;
  transition: background-color 0.4s ease-in-out;
}
.navigation-mobile a:before {
  content: " ";
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 2em;
      -ms-flex: 0 0 2em;
          flex: 0 0 2em;
  height: 1.5em;
  background: url("icon_black.svg") no-repeat 0 0;
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
      -ms-flex-pack: start;
          justify-content: flex-start;
  -webkit-box-align: start;
  -webkit-align-items: flex-start;
      -ms-flex-align: start;
          align-items: flex-start;
}
.navigation-mobile a:hover, .navigation-mobile a:active, .navigation-mobile a:focus {
  background-color: #eee;
  color: #666;
}

.navigation-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -webkit-flex: 1 0 100%;
      -ms-flex: 1 0 100%;
          flex: 1 0 100%;
}
@media all and (min-width: 30em) {
  .navigation-container {
    -webkit-box-flex: 1;
    -webkit-flex: 1 1 90%;
        -ms-flex: 1 1 90%;
            flex: 1 1 90%;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -webkit-flex-direction: row;
        -ms-flex-direction: row;
            flex-direction: row;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
        -ms-flex-pack: end;
            justify-content: flex-end;
  }
}

.navigation {
  display: block;
  position: absolute;
  z-index: 900;
  width: 100%;
  -webkit-transition: -webkit-transform 0.4s ease-in-out;
  transition: -webkit-transform 0.4s ease-in-out;
  transition: transform 0.4s ease-in-out;
  transition: transform 0.4s ease-in-out, -webkit-transform 0.4s ease-in-out;
  -webkit-transform: translateY(-100%);
          transform: translateY(-100%);
}
@media all and (min-width: 30em) {
  .navigation {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    position: relative;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
    -webkit-flex: 1 0 auto;
        -ms-flex: 1 0 auto;
            flex: 1 0 auto;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -webkit-flex-direction: row;
        -ms-flex-direction: row;
            flex-direction: row;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
        -ms-flex-pack: end;
            justify-content: flex-end;
  }
}

.navigation.navigation-open {
  -webkit-transform: translateY(0);
          transform: translateY(0);
}

.navigation-item {
  display: block;
  width: 100%;
  border-bottom: 1px solid #eee;
}
@media all and (min-width: 30em) {
  .navigation-item {
    border-bottom: none;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: nowrap;
        -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
    -webkit-box-flex: 1;
    -webkit-flex: 1 0 auto;
        -ms-flex: 1 0 auto;
            flex: 1 0 auto;
    width: auto;
  }
}

.navigation-item a {
  display: block;
  width: 100%;
  padding: 1em 1.5em;
  text-align: center;
  border-left: 1px solid #eee;
  background-color: #fff;
  color: #222;
  text-decoration: none;
  -webkit-transition: background-color 0.4s ease-in-out;
  transition: background-color 0.4s ease-in-out;
}
.navigation-item a:hover {
  background-color: #eee;
}
</style></head><body>
<div class="container">

            <header class="header">
                <a href="#" class="logo">Logo</a>
                <nav role="navigation" class="navigation-mobile">
                    <a href="#" class="navigation-mobile-link">Menu</a>
                </nav>

                <nav role="navigation" class="navigation-container">

                    <ul class="navigation navigation-open">
                        <li class="navigation-item navigation-active">
                            <a href="#">First</a>
                        </li>
                        <li class="navigation-item">
                            <a href="#">Second</a>
                        </li>
                        <li class="navigation-item">
                            <a href="#">Third</a>
                        </li>
                        <li class="navigation-item">
                            <a href="#">Fourth</a>
                        </li>
                    </ul>

                </nav>
            </header>

        </div>

<script>
var hasClass, addClass, removeClass, eventType, $q, mobileMenu, navigation, navTrigger, toggleNav;
hasClass = function (elem, c) {
    return elem.classList.contains(c);
};
addClass = function (elem, c) {
    elem.classList.add(c);
};
removeClass = function (elem, c) {
    elem.classList.remove(c);
};
function toggleClass(elem, c) {
    var fn = hasClass(elem, c) ? removeClass : addClass;
    fn(elem, c);
}
$q = function (selector) {
    return document.querySelector(selector);
};

eventType = Modernizr.touch ? 'touchstart' : 'click';

if (window.navigator.msMaxTouchPoints) {
    eventType = 'pointerdown';
}

mobileMenu = $q('.navigation-mobile-link'), navigation = $q('.navigation'), navTrigger = 'navigation-open';

toggleNav = function (event) {
    event.preventDefault();
    toggleClass(navigation, navTrigger);
};

mobileMenu.addEventListener(eventType, toggleNav);

</script>

</body></html>
```

Генерация событий на элементах
===============================
Можно не только назначать обработчики на события, но и генерировать их самому.

Конструктор Event
-----------------
Синтаксис:
```
var event = new Event(тип события[, флаги]);
```
Где:

- Тип события — может быть как своим, так и встроенным, к примеру "click".
- Флаги — объект вида { bubbles: true/false, cancelable: true/false }, где свойство bubbles указывает, всплывает ли событие, а cancelable — можно ли отменить действие по умолчанию.
- Флаги по умолчанию: {bubbles: false, cancelable: false}.

Метод dispatchEvent
--------------------
чтобы инициировать событие, запускается elem.dispatchEvent(event).

При этом событие срабатывает наравне с браузерными, то есть обычные браузерные обработчики на него отреагируют. Если при создании указан флаг bubbles, то оно будет всплывать.

Отмена действия по умолчанию
----------------------------
На сгенерированном событии, как и на встроенном браузерном, обработчик может вызвать метод event.preventDefault(). Тогда dispatchEvent возвратит false.

Обычно preventDefault() вызов предотвращает действие браузера. В случае, если событие придумано нами, имеет нестандартное имя — никакого действия браузера, конечно, нет.

Но код, который генерирует событие, может предусматривать какие-то ещё действия после dispatchEvent.

Вызов event.preventDefault() является возможностью для обработчика события сообщить в сгенерировавший событие код, что эти действия продолжать не надо.

```
function toggleHandler(toggle) {
      toggle.addEventListener( "click", function(e) {
        e.preventDefault();
        (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
      });
    }
```

При создании события браузер автоматически ставит следующие свойства:
---------------------------------------------------------------------
- isTrusted: false — означает, что событие сгенерировано скриптом, это свойство изменить невозможно.
- target: null — это свойство ставится автоматически позже при dispatchEvent.
- type: тип события — первый аргумент new Event.
- bubbles, cancelable — по второму аргументу new Event.

Другие свойства события, если они нужны, например координаты для события мыши — можно присвоить в объект события позже, например:
```
var event = new Event("click", {bubbles: true, cancelable: false});
event.clientX = 100;
event.clientY = 100;
```
Hamburger Menu Icons
--------------------
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  
  <title>Hamburger Menu Icons</title>
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  
<header class="o-header">
  <nav class="o-header-nav">
    
  </nav>
  <div class="o-container">
    <h1 class="o-header__title">Hamburger Menu Icons</h1>
  </div>
</header>

<main class="o-content">
  <div class="o-container">
    
    <div class="o-grid">
      <div class="o-grid__item">
        <button class="c-hamburger c-hamburger--rot">
          <span>toggle menu</span>
        </button>
      </div>
      <div class="o-grid__item">
        <button class="c-hamburger c-hamburger--htx">
          <span>toggle menu</span>
        </button>
      </div>
      <div class="o-grid__item">
        <button class="c-hamburger c-hamburger--htla">
          <span>toggle menu</span>
        </button>
      </div>
      <div class="o-grid__item">
        <button class="c-hamburger c-hamburger--htra">
          <span>toggle menu</span>
        </button>
      </div>
    </div>

    <div id="github-icons"></div>
  </div>
</main>

<footer class="o-footer">
  <div class="o-container">
    <small>&copy; 2015</small>
  </div>
</footer>

<script>
  (function() {

    "use strict";

    var toggles = document.querySelectorAll(".c-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
      var toggle = toggles[i];
      toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
      toggle.addEventListener( "click", function(e) {
        e.preventDefault();
        (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
      });
    }

  })();
</script>

</body>
</html>
```

Responsive Tabs
---------------
```

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Responsive Tabs</title>
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.min.css">
  
</head>
<body>
  
<header class="o-header">
  <nav class="o-header-nav">
    
  </nav>
  <div class="o-container">
    <h1 class="o-header__title">Responsive Tabs</h1>
  </div>
</header>

<main class="o-main">
  <div class="o-container">

    <div class="o-section">
      <div id="tabs" class="c-tabs no-js">
        <div class="c-tabs-nav">
          <a href="#" class="c-tabs-nav__link is-active">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a>
          <a href="#" class="c-tabs-nav__link">
            <i class="fa fa-book"></i>
            <span>Books</span>
          </a>
          <a href="#" class="c-tabs-nav__link">
            <i class="fa fa-heart"></i>
            <span>Favourites</span>
          </a>
          <a href="#" class="c-tabs-nav__link">
            <i class="fa fa-calendar"></i>
            <span>Calendar</span>
          </a>
          <a href="#" class="c-tabs-nav__link">
            <i class="fa fa-cog"></i>
            <span>Settings</span>
          </a>
        </div>
        <div class="c-tab is-active">
          <div class="c-tab__content">
            <h2>Welcome home!</h2>
            <p>Home ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quo minus voluptate unde tempore eveniet consequuntur in, quod animi libero rem similique pariatur quos, et eum nisi ducimus, architecto voluptatibus!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto aspernatur natus dolorem fuga cumque optio saepe corrupti earum. Ipsam quaerat asperiores similique omnis excepturi temporibus ab eum magnam ipsa, odio.</p>
          </div>
        </div>
        <div class="c-tab">
          <div class="c-tab__content">
            <h2>All Books</h2>
            <p>Books ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quo minus voluptate unde tempore eveniet consequuntur in, quod animi libero rem similique pariatur quos, et eum nisi ducimus, architecto voluptatibus!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto aspernatur natus dolorem fuga cumque optio saepe corrupti earum. Ipsam quaerat asperiores similique omnis excepturi temporibus ab eum magnam ipsa, odio.</p>
          </div>
        </div>
        <div class="c-tab">
          <div class="c-tab__content">
            <h2>Your Favourites!</h2>
            <p>Favourites ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quo minus voluptate unde tempore eveniet consequuntur in, quod animi libero rem similique pariatur quos, et eum nisi ducimus, architecto voluptatibus!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto aspernatur natus dolorem fuga cumque optio saepe corrupti earum. Ipsam quaerat asperiores similique omnis excepturi temporibus ab eum magnam ipsa, odio.</p>
          </div>
        </div>
        <div class="c-tab">
          <div class="c-tab__content">
            <h2>Stay Busy</h2>
            <p>Calendar ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quo minus voluptate unde tempore eveniet consequuntur in, quod animi libero rem similique pariatur quos, et eum nisi ducimus, architecto voluptatibus!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto aspernatur natus dolorem fuga cumque optio saepe corrupti earum. Ipsam quaerat asperiores similique omnis excepturi temporibus ab eum magnam ipsa, odio.</p>
          </div>
        </div>
        <div class="c-tab">
          <div class="c-tab__content">
            <h2>Change It Up</h2>
            <p>Settings ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quo minus voluptate unde tempore eveniet consequuntur in, quod animi libero rem similique pariatur quos, et eum nisi ducimus, architecto voluptatibus!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto aspernatur natus dolorem fuga cumque optio saepe corrupti earum. Ipsam quaerat asperiores similique omnis excepturi temporibus ab eum magnam ipsa, odio.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="o-section">
      <div id="github-icons"></div>
    </div>
  </div>
</main>

<footer class="o-footer">
  <div class="o-container">
    <small>&copy; 2015</small>
  </div>
</footer>

<script>
  (function() {

  'use strict';

  var tabs = function(options) {

    var el = document.querySelector(options.el);
    var tabNavigationLinks = el.querySelectorAll(options.tabNavigationLinks);
    var tabContentContainers = el.querySelectorAll(options.tabContentContainers);
    var activeIndex = 0;
    var initCalled = false;

    /**
     * init
     *
     * @description Initializes the component by removing the no-js class from
     *   the component, and attaching event listeners to each of the nav items.
     *   Returns nothing.
     */
    var init = function() {
      if (!initCalled) {
        initCalled = true;
        el.classList.remove('no-js');
        
        for (var i = 0; i < tabNavigationLinks.length; i++) {
          var link = tabNavigationLinks[i];
          handleClick(link, i);
        }
      }
    };

    /**
     * handleClick
     *
     * @description Handles click event listeners on each of the links in the
     *   tab navigation. Returns nothing.
     * @param {HTMLElement} link The link to listen for events on
     * @param {Number} index The index of that link
     */
    var handleClick = function(link, index) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        goToTab(index);
      });
    };

    /**
     * goToTab
     *
     * @description Goes to a specific tab based on index. Returns nothing.
     * @param {Number} index The index of the tab to go to
     */
    var goToTab = function(index) {
      if (index !== activeIndex && index >= 0 && index <= tabNavigationLinks.length) {
        tabNavigationLinks[activeIndex].classList.remove('is-active');
        tabNavigationLinks[index].classList.add('is-active');
        tabContentContainers[activeIndex].classList.remove('is-active');
        tabContentContainers[index].classList.add('is-active');
        activeIndex = index;
      }
    };

    /**
     * Returns init and goToTab
     */
    return {
      init: init,
      goToTab: goToTab
    };

  };

  /**
   * Attach to global namespace
   */
  window.tabs = tabs;

})();

</script>
<script>
  var myTabs = tabs({
    el: '#tabs',
    tabNavigationLinks: '.c-tabs-nav__link',
    tabContentContainers: '.c-tab'
  });

  myTabs.init();
</script>

</body>
</html>
```

Circular Fly-Out Navigation Menu
---------------------------------
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Circular Fly-Out Navigation Menu</title>
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/circle-menu.css">
</head>
<body>
  
<header class="demo-header">
  <nav class="demo-header-nav">
  
  </nav>
  <div class="container">
    <h1 class="demo-header__title">Circular Fly-Out Navigation Menu</h1>
  </div>
</header>

<main class="demo-content">
  <div class="container">
    <p class="leader-text">This is a circular flyout menu made with Sass and CSS3 transitions, transforms, and animations. </p>

  </div>
</main>

<footer class="demo-footer">
  <div class="container">
    <small>&copy; 2015</small>
  </div>
</footer>

<nav id="c-circle-nav" class="c-circle-nav">
  <button id="c-circle-nav__toggle" class="c-circle-nav__toggle">
    <span>Toggle</span>
  </button>
  <ul class="c-circle-nav__items">
    <li class="c-circle-nav__item">
      <a href="#" class="c-circle-nav__link">
        <img src="img/house.svg" alt="">
      </a>
    </li>
    <li class="c-circle-nav__item">
      <a href="#" class="c-circle-nav__link">
        <img src="img/photo.svg" alt="">
      </a>
    </li>
    <li class="c-circle-nav__item">
      <a href="#" class="c-circle-nav__link">
        <img src="img/pin.svg" alt="">
      </a>
    </li>
    <li class="c-circle-nav__item">
      <a href="#" class="c-circle-nav__link">
        <img src="img/search.svg" alt="">
      </a>
    </li>
    <li class="c-circle-nav__item">
      <a href="#" class="c-circle-nav__link">
        <img src="img/tools.svg" alt="">
      </a>
    </li>
  </ul>
</nav>

<script src="js/circleMenu.js"></script>


</body>
</html>
```
js/circleMenu.js
----------------
```
(function() {

  "use strict";

  /**
   * Cache variables
   */
  var menu = document.querySelector("#c-circle-nav");
  var toggle = document.querySelector("#c-circle-nav__toggle");
  var mask = document.createElement("div");
  var activeClass = "is-active";

  /**
   * Create mask
   */
  mask.classList.add("c-mask");
  document.body.appendChild(mask);

  /**
   * Listen for clicks on the toggle
   */
  toggle.addEventListener("click", function(e) {
    e.preventDefault();
    toggle.classList.contains(activeClass) ? deactivateMenu() : activateMenu();
  });

  /**
   * Listen for clicks on the mask, which should close the menu
   */
  mask.addEventListener("click", function() {
    deactivateMenu();
    console.log('click');
  });

  /**
   * Activate the menu 
   */
  function activateMenu() {
    menu.classList.add(activeClass);
    toggle.classList.add(activeClass);
    mask.classList.add(activeClass);
  }

  /**
   * Deactivate the menu 
   */
  function deactivateMenu() {
    menu.classList.remove(activeClass);
    toggle.classList.remove(activeClass);
    mask.classList.remove(activeClass);
  }

})();
```
