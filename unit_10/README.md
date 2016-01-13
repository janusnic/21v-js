# 21v-js
Скролл-анимация с помощью JQuery
================================
scrollLeft() scrollTop() 
------------------------
Получает значение отступа прокрутки слева или сверху для первого из элементов, содержащихся в объекте jQuery

scrollLeft(значение) scrollTop(значение)
----------------------------------------
Устанавливает значение отступа прокрутки слева или сверху для всех элементов, содержащихся в объекте jQuery

Скролл до элемента (jQuery)
---------------------------
Вертикальный скролл страницы в jQuery выполняется при помощи метода .scrollTop(value).
value — число, значение скролла в пикселях.

1 Вертикальный скролл страницы
-------------------------------
```
<!DOCTYPE HTML>
<html>
<head>
  <script src="jquery.min.js"></script>

  <script>
  $(document).ready(function(){
    var p = $("p:first");
    $("p:last").text( "scrollTop:" + p.scrollTop() );

  });
  </script>

  <style>
  p { margin:10px;padding:5px;border:2px solid #666; }
  </style>
</head>
<body>
  <p>Hello</p><p></p>

</body>
</html>
```

scrollTop(значение)
----------------------
Устанавливает значение отступа прокрутки сверху для всех элементов набора.
Этот метод работает с видимыми и скрытыми элементами.

```
    <!DOCTYPE HTML>
    <html>
        <head>
              <script src="jquery.min.js"></script>
              <script>
                    $(document).ready(function(){
                        $("div.demo").scrollTop(300);
                    });
              </script>
              <style>
                div.demo {
                background:#CCCCCC none repeat scroll 0 0;
                border:3px solid #666666;
                margin:5px;
                padding:5px;
                position:relative;
                width:200px;
                height:100px;
                overflow:auto;
                }
                p { margin:10px;padding:5px;border:2px solid #666;width:1000px;height:1000px; }
              </style>
    </head>

    <body>
      <div class="demo"><h1>lalala</h1><p>Hello</p></div>
    </body>
    </html>
```

2 Пример необходимо проскроллить страницу до элемента с id="scroll_to_id".
--------------------------------------------------------------------------
```
    <script>
        $(document).ready(function () {
            $('#button-scroll').click(function () {
                // сперва получаем позицию элемента относительно документа
                var scrollTop = $('#scroll_to_id').offset().top;
                // скроллим страницу на значение равное позиции элемента
                $(document).scrollTop(scrollTop);
            });
        });
    </script>

    <style type="text/css">
        
        #button-scroll {
            font-size: 50px;
            padding: 10px 20px;
        }
    
        #scroll_to_id {
            border: red 1px solid;
            background-color:#FEE;
            padding: 5px 10px;
        }
        
    </style>

    <p><input type="button" id="button-scroll" value="Проскроллить до элемента"></p>

```
offset() 
--------
Возвращает координаты первого из элементов, содержащихся в объекте jQuery, относительно начала документа

position() 
----------
Возвращает координаты первого из элементов, содержащихся в объекте jQuery, относительно его родительского элемента, у которого задан тип позиционирования

Методы offset() и position()
----------------------------
возвращают объект, имеющий свойства top и left, которые указывают положение элемента. 
Пример использования метода position().
---------------------------------------
```
$(document).ready(function() {
    var pos = $('im g').p osit ion( );
    console.log("Position top: " + pos.top +" left: " + pos.left);
    });
```
Этот сценарий выводит на консоль значения свойств top и left объекта, возвращаемого данным методом.

3 offset().top
--------------
```
<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'>

<style>
.one,.two,.three,.four {
  position:relative;
  background-color:tomato;
  width:40%;
  height:80px;
  margin: 0 auto;
  text-align:center;
  line-height:250%;
  color:#fff;
  font-family: sans-serif;
  font-size:2em;
  margin-bottom:500px;
  cursor:pointer;
}</style></head><body>
<div class="one">1 click here</div>
<div class="two">2</div>
<div class="three">3</div>
<div class="four">4</div>
<script src='jquery.min.js'></script>

<script>
$('.one').click(function () {
    $('html, body').animate({ scrollTop: $('.two').offset().top }, 1000);
});
$('.two').click(function () {
    $('html, body').animate({ scrollTop: $('.three').offset().top }, 1000);
});
$('.three').click(function () {
    $('html, body').animate({ scrollTop: $('.four').offset().top }, 1000);
});
$('.four').click(function () {
    $('html, body').animate({ scrollTop: $('.one').offset().top }, 700);
});

</script>
</body></html>
```

4 scroll down/up
----------------
В данном скрипте работает прокрутка, как вверх, так и вниз.
```
<script type="text/javascript">

$(document).ready(function () {
    $("a").click(function () {
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        if ($.browser.safari) {
            $('body').animate({ scrollTop: destination }, 1100); //1100 - скорость прокрутки
        } else {
            $('html').animate({ scrollTop: destination }, 1100);
        }
        return false; 
    });
});

</script>
</head>
<body>

<a href="#botDiv">scroll down</a>
<div id="topDiv">div</div>

<a href="#topDiv">scroll up</a>
<div id="botDiv">div</div>

```

5 создать Scroll to Top кнопку для длинных страниц. 
----------------------------------------------------
CSS стили кнопки «Наверх»
```
<style>
#scroller{
    position: fixed;    
    /** позиция кнопки scroll to top **/
    bottom: 30px;   
    /** картинка кнопки наверх**/
    background: transparent url(arrow.png) no-repeat left top;  
    width: 32px;
    height: 32px;
    cursor: pointer;
    /** скрываем кнопку в начале **/
    display:none;
}
</style>
```
мы установили фиксированную позицию блока. Далее мы устанавливаем фоном нашу стрелку. В конце, скрываем кнопку, чтобы ее не было видно, когда страница только загружена.

JavaScript код кнопки «Наверх»
```
<script>
$(document).ready(function(){   
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('#scroller').fadeIn();
        } else {
            $('#scroller').fadeOut();
        }
    });
    $('#scroller').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500); //Число 500 — это время, в течение которого происходит анимация (прокрутка), в данном случае это полсекунды.
        return false;
    });
});
</script>
```
В начале мы вызываем функцию по загрузке страницы:
```
$(document).ready(function(){
});
```
В первой части функции, мы устанавливаем событие на scroll событие. Когда происходит скроллинг окна значение переменной scrollTop более 0, в это время мы выводим кнопку «Наверх», когда скроллинг не происходит, мы ее прячем.

Во второй части функции, мы цепляем обработчик события click на кнопку scroll to top (наверх), когда она нажата, мы анимируем скроллинг к тегу body. То есть происходит скроллинг в начало страницы.

Метод scrollBy 
--------------
прокручивает содержимое окна на указанное количество пикселей.

Синтаксис
```
окно.scrollBy(x,y)

или

scrollBy(x,y)
```
- x   Является обязательным параметром. Количество пикселей, на которое будет прокручено содержимое окна по горизонтали.
- y   Является обязательным параметром. Количество пикселей, на которое будет прокручено содержимое окна по вертикали.

Пример
-------
```
function scrolldown() {
    scrollBy(0,100);
    }
function scrollup() {
    scrollBy(0,-100);
    }
```
Скрипт для плавной прокрутки на верх страницы (на JavaScript)
-------------------------------------------------------------
```
var t;
function up() {
  var top = Math.max(document.body.scrollTop,
      document.documentElement.scrollTop);
  if(top > 0) {
    window.scrollBy(0,-100);
    t = setTimeout('up()',20);
  } else clearTimeout(t);
  return false;
}
```
Число -100 — это количество пикселей, которое прокручивается вверх через каждые 0,02 секунды (число 20).

В подходящее место html-кода страницы необходимо добавить такую ссылку:
```
<a href="#" onclick="return up()">наверх</a>

```
Размеры и прокрутка страницы
============================
С точки зрения HTML, документ – это document.documentElement. У этого элемента, соответствующего тегу html, есть все стандартные свойства и метрики.

Ширина/высота видимой части окна
---------------------------------
Свойства clientWidth/Height для элемента document.documentElement – это ширина/высота видимой области окна.

Все браузеры, кроме IE8-, также поддерживают свойства window.innerWidth/innerHeight. Они хранят текущий размер окна браузера.

Свойства clientWidth/Height, если есть полоса прокрутки, возвращают ширину/высоту внутри неё, доступную для документа, а window.innerWidth/Height – игнорируют её наличие.

Если справа часть страницы занимает полоса прокрутки, то эти строки выведут разное:
```
alert( window.innerWidth ); // вся ширина окна
alert( document.documentElement.clientWidth ); // ширина минус прокрутка
```
Ширина/высота страницы с учётом прокрутки
------------------------------------------
видимая часть страницы – это documentElement.clientWidth/Height, а полный размер с учётом прокрутки – по аналогии, documentElement.scrollWidth/scrollHeight.

определить размер страницы с учетом прокрутки можно, взяв максимум из нескольких свойств:
-----------------------------------------------------------------------------------------
```
var scrollHeight = Math.max(
  document.body.scrollHeight, document.documentElement.scrollHeight,
  document.body.offsetHeight, document.documentElement.offsetHeight,
  document.body.clientHeight, document.documentElement.clientHeight
);

alert( 'Высота с учетом прокрутки: ' + scrollHeight );
```
Получение текущей прокрутки
---------------------------
У обычного элемента текущую прокрутку можно получить в scrollLeft/scrollTop.

специальные свойства window.pageXOffset/pageYOffset:
----------------------------------------------------
```
alert( 'Текущая прокрутка сверху: ' + window.pageYOffset );
alert( 'Текущая прокрутка слева: ' + window.pageXOffset );
```

Кросс-браузерный вариант с учётом IE8 предусматривает откат на documentElement:
-------------------------------------------------------------------------------
```
var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

alert( "Текущая прокрутка: " + scrollTop );
```
Изменение прокрутки: scrollTo, scrollBy, scrollIntoView
-------------------------------------------------------
Чтобы прокрутить страницу при помощи JavaScript, её DOM должен быть полностью загружен.

На обычных элементах свойства scrollTop/scrollLeft можно изменять, и при этом элемент будет прокручиваться.

специальные методы прокрутки страницы window.scrollBy(x,y) и window.scrollTo(pageX,pageY).
------------------------------------------------------------------------------------------
- Метод scrollBy(x,y) прокручивает страницу относительно текущих координат.

- Метод scrollTo(pageX,pageY) прокручивает страницу к указанным координатам относительно документа. Он эквивалентен установке свойств scrollLeft/scrollTop.

Чтобы прокрутить в начало документа, достаточно указать координаты (0,0).
```
window.scrollTo(0,0)
```
scrollIntoView
---------------
Метод elem.scrollIntoView(top) вызывается на элементе и прокручивает страницу так, чтобы элемент оказался вверху, если параметр top равен true, и внизу, если top равен false. Причем, если параметр top не указан, то он считается равным true.

Запрет прокрутки
----------------

Чтобы запретить прокрутку страницы, достаточно поставить document.body.style.overflow = "hidden".

При этом страница замрёт в текущем положении.

```
document.body.style.overflow = 'hidden'

document.body.style.overflow = ''
```
Вместо document.body может быть любой элемент, прокрутку которого необходимо запретить.

6 Animated Fixed Header (Scroll Down)
-------------------------------------
```
<!DOCTYPE html>
<html class=''>
<head>
<meta charset='UTF-8'>

<style>
.header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #cc5350;
    color:#fff;
    z-index: 1000;
    height: 200px;
    overflow: hidden;
    -webkit-transition: height 0.3s;
    -moz-transition: height 0.3s;
    transition: height 0.3s;
    text-align:center;
    line-height:160px;

}
.header.shrink {
    height: 100px;
    line-height:80px;
}
.header h1
{
    font-size:30px;
    font-weight:normal;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}

.header.shrink h1
{
    font-size:24px;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}
.content
{
height:2000px;

}</style></head><body>
<div class="header">
  <h1>Animated Fixed Header (Scroll Down)</h1>
</div>
<div class="content">
</div>

<script src="jquery.min.js"></script>

<script>
$(function () {
    var shrinkHeader = 300;
    $(window).scroll(function () {
        var scroll = getCurrentScroll();
        if (scroll >= shrinkHeader) {
            $('.header').addClass('shrink');
        } else {
            $('.header').removeClass('shrink');
        }
    });
    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }
});

</script>

</body></html>
```

7 fixed-header
--------------
```
<script>
$(window).scroll(function () {
    if ($(window).scrollTop() >= 300) {
        $('nav').addClass('fixed-header');
    } else {
        $('nav').removeClass('fixed-header');
    }
});

</script>

```

8 STICKY MENU ON SCROLL
-----------------------
```
// Create a clone of the menu, right next to original.
$('.menu').addClass('original').clone().insertAfter('.menu').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

scrollIntervalID = setInterval(stickIt, 10);


function stickIt() {

  var orgElementPos = $('.original').offset();
  orgElementTop = orgElementPos.top;               

  if ($(window).scrollTop() >= (orgElementTop)) {
    // scrolled past the original position; now only show the cloned, sticky element.

    // Cloned element should always have same left position and width as original element.     
    orgElement = $('.original');
    coordsOrgElement = orgElement.offset();
    leftOrgElement = coordsOrgElement.left;  
    widthOrgElement = orgElement.css('width');
    $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
    $('.original').css('visibility','hidden');
  } else {
    // not scrolled past the menu; only show the original menu.
    $('.cloned').hide();
    $('.original').css('visibility','visible');
  }
}

```

9 smooth-scrolling
------------------
```
function scrollNav() {
    $('.nav a').click(function () {
        $('.active').removeClass('active');
        $(this).closest('li').addClass('active');
        var theClass = $(this).attr('class');
        $('.' + theClass).parent('li').addClass('active');
        $('html, body').stop().animate({ scrollTop: $($(this).attr('href')).offset().top - 160 }, 400);
        return false;
    });
    $('.scrollTop a').scrollTop();
}
scrollNav();

```
10 parallax
------------
```
$(window).scroll(function (e) {
    parallax();
});
function parallax() {
    var scrolled = $(window).scrollTop();
    $('.background').css('top', -(scrolled * 0.15) + 'px');
}

```
11 Scroll Fun
-------------
```
$.fn.scrollFun = function () {
    $(this).click(function (e) {
        var h = $(this).attr('href'), target;
        if (h.charAt(0) == '#' && h.length > 1 && (target = $(h)).length > 0) {
            var pos = Math.max(target.offset().top, 0);
            e.preventDefault();
            $('body,html').animate({ scrollTop: pos }, 'slow', 'swing');
        }
    });
};
$('.scroll').scrollFun();

```

12 paralax
-----------
```
function scrollFooter(scrollY, heightFooter) {
    console.log(scrollY);
    console.log(heightFooter);
    if (scrollY >= heightFooter) {
        $('footer').css({ 'bottom': '0px' });
    } else {
        $('footer').css({ 'bottom': '-' + heightFooter + 'px' });
    }
}
$(window).load(function () {
    var windowHeight = $(window).height(), footerHeight = $('footer').height(), heightDocument = windowHeight + $('.content').height() + $('footer').height() - 20;
    $('#scroll-animate, #scroll-animate-main').css({ 'height': heightDocument + 'px' });
    $('header').css({
        'height': windowHeight + 'px',
        'line-height': windowHeight + 'px'
    });
    $('.wrapper-parallax').css({ 'margin-top': windowHeight + 'px' });
    scrollFooter(window.scrollY, footerHeight);
    window.onscroll = function () {
        var scroll = window.scrollY;
        $('#scroll-animate-main').css({ 'top': '-' + scroll + 'px' });
        $('header').css({ 'background-position-y': 50 - scroll * 100 / heightDocument + '%' });
        scrollFooter(scroll, footerHeight);
    };
});

```
13 scroll-line
---------------

```
$(window).scroll(function () {
    var wintop = $(window).scrollTop(), 
        docheight = $(document).height(), 
        winheight = $(window).height();
    var scrolled = wintop / (docheight - winheight) * 100;
    $('.scroll-line').css('width', scrolled + '%');
});

```

Явное указание this: "call"
===========================
this – это текущий объект при вызове «через точку» и новый объект при конструировании через new.

Метод call
----------
```
func.call(context, arg1, arg2, ...)
```
вызывается функция func, первый аргумент call становится её this, а остальные передаются «как есть».

Вызов func.call(context, a, b...) – то же, что обычный вызов func(a, b...), но с явно указанным this(=context).

14 menuToggle
--------------
```
var $root = $('html'), 
    $nav_header = $('.banner'), 
    $navicon = $('[data-navicon="button"]'), 
    header_height = $('.banner').height(), 
    hero_height = $('.hero').height(), 
    offset_val = hero_height - header_height, 
    eventType = document.ontouchstart !== null ? 'click' : 'touchstart';
function navSlide() {
    var scroll_top = $(window).scrollTop();
    if (scroll_top >= offset_val) {
        $nav_header.addClass('is-sticky');
    } else {
        $nav_header.removeClass('is-sticky');
    }
}
function menuToggle() {
    if ($nav_header.hasClass('is-open')) {
        $root.removeClass('pinned');
        $nav_header.removeClass('is-open');
        $navicon.removeClass('is--closed');
    } else {
        $root.addClass('pinned');
        $nav_header.addClass('is-open');
        $navicon.addClass('is--closed');
    }
}
function openNav() {
    if ($nav_header.hasClass('is-open')) {
        $nav_header.removeClass('is-open');
        $root.removeClass('pinned');
        $navicon.removeClass('is--closed');
    }
}
function anchorScroll(event) {
    var id = $(this).attr('href'), 
        offset = header_height, 
        target = $(id).offset().top - offset;
    $('html, body').animate({ scrollTop: target }, 500);
    event.preventDefault();
}
$('.scrollto').on(eventType, function () {
    anchorScroll.call(this, event);
});
$navicon.on(eventType, menuToggle);
$('.banner a').on(eventType, openNav);
$(window).scroll(navSlide);
```

15 Zoom on Scroll Image
-----------------------
```
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    $('.zoom-me img').css({
        width: 100 + scroll / 5 + '%',
        top: -(scroll / 10) + '%',
        '-webkit-filter': 'blur(' + scroll / 200 + 'px)',
        filter: 'blur(' + scroll / 200 + 'px)'
    });
});

```
16 OPACITY ON SCROLL
--------------------
```
var header = $('header');
var range = 200;
$(window).on('scroll', function () {
    var scrollTop = $(this).scrollTop();
    var offset = header.offset().top;
    var height = header.outerHeight();
    offset = offset + height / 2;
    var calc = 1 - (scrollTop - offset + range) / range;
    header.css({ 'opacity': calc });
    if (calc > '1') {
        header.css({ 'opacity': 1 });
    } else if (calc < '0') {
        header.css({ 'opacity': 0 });
    }
});
```

17 background-position-y
------------------------
```
$(document).scroll(function () {
    $('#header').css({ 'background-position-y': -$(this).scrollTop() / 20 });
});

```

18 Scroll down
---------------
```
var scrollTimer = null;
$(window).scroll(function () {
    var viewportHeight = $(this).height(), 
        scrollbarHeight = viewportHeight / $(document).height() * viewportHeight, 
        progress = $(this).scrollTop() / ($(document).height() - viewportHeight), 
        distance = progress * (viewportHeight - scrollbarHeight) + scrollbarHeight / 2 - $('#scrollbubble').height() / 2;
    ;
    $('#scrollbubble').css('top', distance).text('Progress (' + Math.round(progress * 100) + '%)').fadeIn(100);
    ;
    if (scrollTimer !== null) {
        clearTimeout(scrollTimer);
    }
    scrollTimer = setTimeout(function () {
        $('#scrollbubble').fadeOut();
    }, 500);
});
```
.find()
=======
Осуществляет поиск элементов внутри уже выбранных элементов. Метод имеет три вариант использования:

.find(selector):
----------------
Ищет элементы, соответствующие заданному селектору, внутри выбранных элементов.

.find(jQuery object):
---------------------
Осуществляет поиск элементов внутри выбранных элементов, оставляя те, которые содержатся в заданном объекте jQuery.

.find(element):
---------------
Осуществляет поиск элемента element внутри выбранных элементов. Параметр element задается в виде DOM-элемента.

Примеры использования:
----------------------
```
$("div").find("span")  // вернет все элементы span, находящиеся внутри div-элементов.
$("div").find(".bigBlock") // вернет все элементы с классом bigBlock, находящиеся внутри div-элементов.
$("div").find( $(".bigBlock") ) // вернет все элементы с классом bigBlock, находящиеся внутри div-элементов.
$('div span') // искать span-элементы, лежащие внутри div'ов
```
 
.find() удобно использовать, когда некоторые элементы уже найдены, и вам необходимо осуществить поиск элементов внутри них:
```

// найдем все ul-элементы на странице
var $ulElements = $('ul');
 
// ----- какой то код ... -----
 
// найдем li-элементы с классом userBox, внутри $ulElements
$ulElements.find('li.userBox');
```
Так же, .find() удобен для использования в цепочках методов:

```
$('ul') // найдем все ul-элементы на странице
  .addClass('listElements') // добавим ul'ам класс listElements
.find('li.userBox') // найдем li-элементы с классом userBox, внутри ul'ов
  .remove(); // и удалим их
```
Работа метода .find() схожа с .children(), который осуществляет поиск подходящих дочерних элементов. Отличие заключается в том, что .find() проводит поиск не только среди дочерних элементов, но и внутри них тоже (т.е. поиск проходит на всех вложенных уровнях иерархии DOM, в то время как .children() ищет только на одном уровне).

пример
-------
Внутри каждого ul-элемента, найдем первый li-элемент и последний p-элемент:
```
// найдем и сохраним все ul-элементы
var $matched = $('ul');
 
// выделим их
$matched
  .addClass('matched');
```

jQuery.map(массив, вызов)
=========================

Переводит все элементы массива в другой массив элементов.
Представленная в данном методе функция перевода вызывается для каждого элемента, ей передается два аргумента: элемент для перевода и индекс в рамках массива.
Функция может вернуть значение ‘null’ (для удаления элемента) или массив значений, которые будут встроены в полный массив.
Данный метод также может работать с массиво-подобными объектами, которые имеют свойство длины.
 
```

<!DOCTYPE HTML>
<html>
<head>
  <script src="jquery.min.js"></script>

  <script>
  $(document).ready(function(){

    var arr = [ "a", "b", "c", "d", "e" ]
    $("div").text(arr.join(", "));

    arr = jQuery.map(arr, function(n, i){
      return (n.toUpperCase() + i);
    });
    $("p").text(arr.join(", "));

    arr = jQuery.map(arr, function (a) { return a + a; });
    $("span").text(arr.join(", "));

  });
  </script>

  <style>
  div { color:blue; }
  p { color:green; margin:0; }
  span { color:red; }
  </style>
</head>
<body>
  <div></div>
  <p></p>

  <span></span>

</body>
</html>
```

Трансформирует исходный массив в новый добавляя при этом 4 к каждому значению.
```
$.map( [0,1,2], function(n){
  return n + 4;
});
[4, 5, 6]
```

Трансформирует исходный массив в новый добавляя при этом 1 к каждому значению, которое больше 0 (иначе значение удаляется).
```
$.map( [0,1,2], function(n){
  return n > 0 ? n + 1 : null;
});
[2, 3]
```

Трансформирует исходный массив в новый. В новом массиве совместно содержатся старые значения и они же увеличенные на единицу.
```
$.map( [0,1,2], function(n){
  return [ n, n + 1 ];
});
[0, 1, 1, 2, 2, 3]
```

Трансформирует исходный массив в новый. В новом массиве все значения возведены в квадрат.
```
$.map( [0,1,2,3], function (a) { return a * a; } );
[0, 1, 4, 9]
```

19 landing page
----------------
```
var lastId, 
    topMenu = $('#topNav'), 
    topMenuHeight = topMenu.outerHeight(), 
    menuItems = topMenu.find('a'), 
    scrollItems = menuItems.map(function () {
            var item = $($(this).attr('href'));
            if (item.length) {
                return item;
            }
        });

menuItems.click(function (e) {
    var href = $(this).attr('href'), o = href === '#' ? 0 : $(href).offset().top - topMenuHeight + 15;
    $('html, body').stop().animate({ scrollTop: o }, 300);
    e.preventDefault();
});

$(window).scroll(function () {
    var fromTop = $(this).scrollTop() + topMenuHeight;
    var cur = scrollItems.map(function () {
        if ($(this).offset().top < fromTop)
            return this;
    });
    cur = cur[cur.length - 1];
    var id = cur && cur.length ? cur[0].id : '';
    if (lastId !== id) {
        lastId = id;
        menuItems.parent().removeClass('active').end().filter('[href=#' + id + ']').parent().addClass('active');
    }
});

```

20 landing page
----------------

```
(function () {
    var sectionHeight;
    sectionHeight = $(window).height();
    $('section').css('height', sectionHeight);
    $(window).resize(function () {
        sectionHeight = $(window).height();
        return $('section').css('height', sectionHeight);
    });
    $('nav ul li:first-child a').attr('id', 'current');
    $('body section:first-of-type').attr('class', 'onScreen');
    $('nav a').click(function () {
        $('nav a').removeAttr('id');
        return $(this).attr('id', 'current');
    });
    $(function () {
        return $('nav a[href*=#]:not([href=#])').click(function () {
            var target;
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({ scrollTop: target.offset().top - 61 }, 333);
                    return false;
                }
            }
        });
    });
    $(window).on('scroll', function () {
        var onScreen;
        onScreen = '';
        $('nav a').removeAttr('id');
        $('section').removeAttr('class');
        return $('section').each(function () {
            var positionY, ref, scrollDist, sectionOffsetBottom, vpHeight, vpThreshhold;
            vpHeight = $(window).innerHeight();
            vpThreshhold = vpHeight / 3;
            scrollDist = $('body').scrollTop();
            positionY = $(this).position().top;
            sectionHeight = $(this).outerHeight();
            sectionOffsetBottom = positionY + sectionHeight;
            if (0 <= (ref = positionY - scrollDist) && ref <= vpThreshhold) {
                onScreen = $(this).children('h1').attr('id');
                $('nav ul li:nth-child(' + onScreen + ') > a').attr('id', 'current');
                return $('body section:nth-of-type(' + onScreen + ')').attr('class', 'onScreen');
            }
        });
    });
}.call(this));

```