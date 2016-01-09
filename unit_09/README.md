# 21v-js

attr Атрибуты элементов
=======================

Управление атрибутами элементов
-------------------------------
Возможность управлять значениями атрибутов элементов объектной модели документа позволяет изменять визуальное представление этих элементов, заменять значения элементов форм программным способом, управлять их состоянием и т. п.

attr - позволяет как получить значение указанного атрибута:
```
$(document).ready(function(){
    $('p').each(function(){
        alert($(this).attr('class'));
    });
});
```
Так и указать его для выбранного элемента:
```
$(document).ready(function(){
    $('.paragraph').attr('class', 'red_border');
});
```
removeAttr - удаляет значение атрибута
```
$(document).ready(function(){
    $('.paragraph').attr('class', 'red_border');
    $('.red_border').removeAttr('class');
});
```

ЗАДАЧА
------
Необходимо получить значение атрибута href элемента a и установить его в качестве значения атрибута title.

Решение
-------
Для решения задачи используем метод attr(), который поможет сначала получить, а затем установить значение требуемого атрибута по его имени.

1. Использование метода attr()
------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-1</title>
<meta charset="utf-8">
</head>
<body>
<a href="http://jquery.com">Официальный сайт jQuery</a>
<script src="jquery.min.js"></script>
<script>
$(function(){
    var href = $("a").attr("href"); // получаем значение атрибута
    $("a").attr("title", href); // устанавливаем значение атрибута
});
</script>
</body>
</html>

```

После выполнения этого кода, при наведении указателя мыши на ссылку, будет появляться стандартная всплывающая подсказка с текстом "http://jquery.com", хотя изначально в HTML-разметке ссылка была вообще без атрибута title.
Передача методу attr() одного аргумента (названия атрибута) позволяет получить значение этого атрибута. А использование метода с двумя параметрами дает возможность устанавливать значение атрибута.
Аналогично можно работать с любыми атрибутами любых элементов DOM.

ЗАДАЧА
------
Для элемента a необходимо установить значения атрибутов alt, title и href, которые отсутствуют в HTML-разметке.

Решение
-------
Решим задачу с помощью метода attr(), воспользовавшись возможностью передать ему в качестве единственного аргумента объект, свойствами которого являются названия атрибутов, а значениями этих свойств — значения атрибутов элемента.
2. Использование метода attr(map)
---------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-2</title>
<meta charset="utf-8">
</head>
<body>
<a href="#">Официальный сайт библиотеки jQuery</a>
<script src="jquery.min.js"></script>
<script>
$(function(){
    $("a").attr({
        "alt": "Официальный сайт jQuery",
        "title": "jQuery.Com",
        "href": "http://jquery.com"
        }).click(function(){
            console.log($(this).attr("href"));
            console.log($(this).attr("title"));
            console.log($(this).attr("alt"));
            return false;
        });
});
</script>

</body>
</html>
```
В HTML-коде присутствует ссылка только с одним атрибутом href, значением которого является символ # . Сначала находим ссылку — элемент a , затем с помощью метода attr(map) устанавливаем одновременно несколько атрибутов — alt , title и href. Продолжаем цепочку вызовов, связывая вызов callback-функции с событием click на элементе a.

ЗАДАЧА
------
Для всех элементов p, обнаруженных на веб-странице, необходимо установить значение атрибута name, вычисленное на основании положения элемента.

Решение
-------
Для решения задачи используем метод attr(name, function(index,attr))

3. Использование метода attr(name, function(index,attr))
---------------------------------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-3</title>
<meta charset="utf-8" />
</head>
<body>
<p>Первый параграф</p>
<p>Второй параграф</p>
<p>Третий параграф</p>
<p>Четвертый параграф</p>
<script src="jquery.min.js"></script>
<script>
$(function(){
    $("p").attr("name", function(n){
    return "pName-" + n;
    }).click(function(){
    console.log("name = " + $(this).attr("name"));
    });
});
</script>
</body>
</html>
```

Сначала будут найдены все элементы p на странице, затем с помощью метода attr(name, function(index,attr)) будет установлен атрибут name для всех выбранных параграфов. Функция, передаваемая методу вторым аргументом, принимает индекс элемента в массиве объектов jQuery (отсчет начинается с нуля). Функция вызывается для каждого элемента, попавшего в набор, и должна вернуть значение атрибута name для текущего элемента.
Функция, которая вызывается при наступлении события click, просто отобразит значение атрибута name.


carousel
========
```
<!DOCTYPE html>
<html class=''>
<head>
<meta charset='UTF-8'>

<link rel='stylesheet prefetch' href='normalize.css'>

<style>
@import url(http://fonts.googleapis.com/css?family=Lato:300|Oswald);
.container {
  width: 90%;
  max-width: 60em;
  margin: 0 auto;
  padding-bottom: 5em;
  perspective: 100em;
}

.carousel {
  position: relative;
  width: 15em;
  height: 15em;
  margin: 0 auto;
  transform-style: preserve-3d;
  transition: transform 0.5s ease;
}
.carousel[data-slide="1"] {
  transform: rotateY(0deg);
}
.carousel[data-slide="2"] {
  transform: rotateY(-90deg);
}
.carousel[data-slide="3"] {
  transform: rotateY(-180deg);
}
.carousel[data-slide="4"] {
  transform: rotateY(-270deg);
}

.carousel__slide {
  position: absolute;
  width: 15em;
  height: 15em;
  background: white;
}
.carousel__slide img {
  width: 100%;
}

.back, .carousel__slide:nth-child(3) {
  transform: translateZ(-7.5em) rotateY(180deg);
}

.right, .carousel__slide:nth-child(2) {
  transform: rotateY(-270deg) translateX(7.5em);
  transform-origin: top right;
}

.left, .carousel__slide:nth-child(4) {
  transform: rotateY(270deg) translateX(-7.5em);
  transform-origin: center left;
}

.front, .carousel__slide:nth-child(1) {
  transform: translateZ(7.5em);
}

.next, .prev {
  position: absolute;
  top: 50%;
  right: 0;
  width: 7em;
  margin-top: -2.5em;
  border-radius: 3px;
  background: #44cc00;
  text-align: center;
  line-height: 3;
  color: white;
  transform: translateY(-50%);
  cursor: pointer;
}

.prev {
  left: 0;
}

/** PAGE STYLES **/
*, *:before, *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

html, body {
  width: 100%;
  height: 100%;
}

html {
  font-size: 62.5%;
}

body {
  background: #99ff66;
  font-family: 'Lato', sans-serif;
  font-size: 2em;
  line-height: 1.5;
}

.container {
  width: 90%;
  max-width: 1200px;
  margin: 0 auto;
}

h1 {
  margin: 0;
  padding: 0.5em;
  font-family: 'Oswald', sans-serif;
  font-size: 4em;
  text-transform: uppercase;
  text-align: center;
  color: #339900;
}

/**
 * For modern browsers
 * 1. The space content is one way to avoid an Opera bug when the
 *    contenteditable attribute is included anywhere else in the document.
 *    Otherwise it causes space to appear at the top and bottom of elements
 *    that are clearfixed.
 * 2. The use of `table` rather than `block` is only necessary if using
 *    `:before` to contain the top-margins of child elements.
 */
.cf:before, .carousel__slide:before,
.cf:after,
.carousel__slide:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}

.cf:after, .carousel__slide:after {
  clear: both;
}

/**
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */
.cf, .carousel__slide {
  *zoom: 1;
}
</style></head><body>
<h1>Carousel<sup>3</sup></h1>

<div class="container">
  <div class="carousel" data-slide="1">
    <div class="carousel__slide">
      <img src="slide01.jpg" />
    </div>
    <div class="carousel__slide">
      <img src="slide02.jpg" />
    </div>
    <div class="carousel__slide">
      <img src="slide03.jpg" />
    </div>
    <div class="carousel__slide">
      <img src="slide02.jpg" />
    </div>
  </div>
  <div class="next">next</div>
  <div class="prev">previous</div>
</div>
<script src='jquery.min.js'></script>
<script>
var $carousel = $('.carousel'), currentSlide, nextSlide;
$('.next').click(function () {
    currentSlide = $carousel.attr('data-slide');
    nextSlide = +currentSlide === 4 ? 1 : +currentSlide + 1;
    $carousel.attr('data-slide', nextSlide);
});
$('.prev').click(function () {
    currentSlide = $carousel.attr('data-slide');
    nextSlide = +currentSlide === 1 ? 4 : +currentSlide - 1;
    $carousel.attr('data-slide', nextSlide);
});

</script>

</body></html>
```

Ширина и высота элементов
=========================
ЗАДАЧА
-------
На разрабатываемой веб-странице подразумевается активная работа с размерами элементов. Необходимо получать и устанавливать размеры выбранных элементов.
Решение
--------

4. Использование методов width(), height() и др.
------------------------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-4</title>
<meta charset="utf-8" />

<style type="text/css">
div {
width:120px; height:110px;
margin:15px; padding:10px;
border:1px dotted #f00;
overflow:hidden;
}
button { width:170px; }
</style>
</head>

<body>
<button>Получить width</button>
<button>Получить height</button>
<button>Получить innerWidth</button>
<button>Получить innerHeight</button>
<button>Получить outerWidth</button>
<button>Получить outerHeight</button>
<br /><br />
<input type="text" />
<button>Установить width</button>
<button>Установить height</button>
<div>Элемент div</div>

<script src="jquery.min.js"></script>
<script type="text/javascript">

$(function(){
    $("button:eq(0)").click(function(){
       $("input").val($("div").width());
    });

    $("button:eq(1)").click(function(){
        $("input").val($("div").height());
    });
        $("button:eq(2)").click(function(){
    $("input").val($("div").innerWidth());
    });
    $("button:eq(3)").click(function(){
        $("input").val($("div").innerHeight());
    });
    $("button:eq(4)").click(function(){
        $("input").val($("div").outerWidth(true));
    });
    $("button:eq(5)").click(function(){
        $("input").val($("div").outerHeight());
    });
    $("button:eq(6)").click(function(){
        $("div").width($("input").val()*1);
    });
    $("button:eq(7)").click(function(){
        $("div").height($("input").val()*1);
    });
});
</script>
</body>
</html>

```
Код JavaScript: для каждой кнопки определен обработчик события click. При наступлении события вызывается callback-функция, которая получает ширину (высоту) элемента div и вставляет это значение в поле ввода input . Отличаются только обработчики события для двух последних кнопок — они, наоборот, получают значение, содержащееся в поле ввода input , и устанавливают ширину (высоту) элемента div.

1. Метод width() получает ширину содержимого элемента, т. е. не учитывает ширину отступов (padding ), рамок ( border ) и полей ( margin ). 
2. Метод innerWidth() учитывает ширину содержимого плюс отступы ( padding ). 
3. Метод outerWidth() — ширину содержимого, отступов ( padding ), рамок ( border ) и полей ( margin ). 
4. Аналогично обстоит дело и с методами, применяемыми для получения высоты элементов: height(), innerHeight() и outerHeight().


Создание анимации
==================
animate - через заданный промежуток времени меняет значения указанных свойст CSS. Можно также запускать цепочки анимации.
```
// animate(properties, [duration], [easing], [callback])
$(document).ready(function(){
    $('button').click(function(){
        $('.red_border').animate({'fontSize':'30px', 'borderLeftWidth':'10px', 'padding':'20px'}, 5000, 'linear').animate({'opacity':0.5}, 1000, function(){console.log("Animation complite")});
    });
});
```

ЗАДАЧА
-------
Необходимо создать простую анимацию для элемента div — при нажатии кнопок элемент должен сдвигаться влево или вправо на 50 пикселов.

5. Использование метода animate()
----------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-5</title>
<meta charset="utf-8" />
<style type="text/css">
div {
position:absolute;
background-color:#369;
left:100px;
width:90px;
height:90px;
margin:5px;
}
</style>

</head>
<body>
<button id="left">влево</button><button id="right">вправо</button>
<div class="block"></div>
<script src="jquery.min.js"></script>
<script>
$(function(){
    $("#right").click(function(){
        $(".block").animate({"left": "+=50px"}, "slow");
    });
    $("#left").click(function(){
        $(".block").animate({"left": "-=50px"}, "slow");
    });
});
</script>

</body>
</html>
```

Обработчики события click для кнопок очень похожи. В обоих случаях мы выбираем элемент по имени его класса — block и применяем метод animate() . Этот метод в состоянии принимать до четырех аргументов, из которых мы используем только два.
В первом аргументе передаем объект, состоящий из пар ключ/значение, которые определяют различные CSS-свойства элемента. В нашем случае мы пользуемся только свойством left, задавая его значение на 50 пикселов больше (или меньше) предыдущей величины.
Во втором аргументе передаем скорость выполнения эффекта в виде строкового значения. Можно указать и число (в миллисекундах), определяющее длительность эффекта.
В качестве третьего и четвертого аргументов можно передать название эффекта и функцию, вызываемую по окончании анимации.

ЗАДАЧА
-------
При нажатии кнопки необходимо выполнить анимацию только одного элемента div, но в процессе анимации должны измениться значения многих его CSS-свойств и по завершении анимации необходимо выдать сообщение о ее окончании. В процессе выполнения анимации может появиться необходимость в ее остановке.

6. Использование методов animate() и stop()
-------------------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-6</title>
<meta charset="utf-8" />

<style type="text/css">
div {
width:100px;
border:1px solid #369;
padding:5px;
}
</style>
</head>
<body>
<button id="go">Выполнить</button>
<button id="stop">Остановить</button>
<div id="block">Hello!</div>

<script src="jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $("#go").click(function(){
        $("#block").animate({
            "width": "70%",
            "opacity": 0.3,
            "marginLeft": "5em",
            "fontSize": "3em",
            "borderWidth": "10px"
            }, 2500, function(){ alert("Сделано!"); 
        });
    });
    $("#stop").click(function(){
    $("#block").stop();
    });
});
</script>
</body>
</html>
```
метод animate(). 
1. Первый аргумент метода — объект, где мы описываем CSS-свойства элемента и их значения, которые они должны получить по окончании анимации.
свойства, названия которых состоят из двух слов, пишут не через дефис, как принято в CSS, а вместе, причем второе слово — с большой буквы. Жаргонное название такой формы записи — camel case.
2. Второй аргумент метода — длительность выполнения анимации, заданная в миллисекундах. 
3. Третий аргумент — функция, которая будет вызвана при завершении анимации и покажет окно предупреждения с надписью "Готово!".

Связываем обработчик события click с кнопкой #stop.
При наступлении этого события находим нужный элемент div по его идентификатору #block и вызываем метод stop(), который остановит анимацию.

ЗАДАЧА
------
Необходимо построить анимацию, где некоторые свойства элемента будут меняться одновременно с другими, а некоторые — в порядке очереди.

Для решения задачи подходит все тот же метод animate(), но мы воспользуемся возможностью передать ему в качестве аргументов два объекта. Первый объект содержит названия и значения CSS-свойств, второй — дополнительные настройки.
7. Использование метода animate()
----------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-7</title>
<meta charset="utf-8" />

<style type="text/css">
div {
position:absolute;
background-color:#69c;
left:100px;
width:90px;
height:90px;
margin:5px;
border:1px solid #369;
}
</style>

</head>
<body>
<button id="go">Выполнить</button>
<div class="block"></div>
<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $("#go").click(function(){
        $("div").animate({ width:"300px" }, { queue:false, duration:3000 })
        .animate( { height:"400px" }, 1500 )
        .animate( { borderWidth:"15px" }, 1500);
    });
});
</script>
</body>
</html>
```

Функция-обработчик, вызываемая при наступлении события, сначала отыщет элемент div , к которому мы применим цепочку из нескольких вызовов метода animate(), реализовав, таким образом, последовательное выполнение эффектов. Но если эффекты увеличения высоты и ширины рамки действительно выполняются строго друг за другом в течение полутора секунд каждый, то эффект увеличения ширины выполняется параллельно с ними в течение трех секунд. Мы добились такого поведения, передав во втором аргументе объект с настройками анимации — опция queue:false исключила эффект из общей очереди, а опция duration:3000 задала время выполнения эффекта, равное трем секундам.
Также в этом объекте возможны и некоторые другие свойства. Например, в свойстве step можно определить функцию, которая будет вызываться после каждого шага анимации, а в свойстве complete — функцию, которая будет вызвана по завершении всей очереди.

ЗАДАЧА
-------
При выполнении анимации необходимо задать некоторую задержку между двумя шагами очереди.

8. Использование метода delay()
-------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-8</title>
<meta charset="utf-8" />

<style type="text/css">
div { width: 60px; height: 60px; float: left; }
.first { background-color: #3f3; }
.second { background-color: #33f;}
</style>
</head>
<body>
<p><button>Run</button></p>
<div class="first"></div>
<div class="second"></div>

<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $("button").click(function() {
        $("div.first").slideUp(700).fadeIn(1500);
        $("div.second").slideUp(700).delay(1000).fadeIn(1500);
    });
});
</script>

</body>
</html>
```

С кнопкой связан обработчик события click, который выполняет анимацию для двух элементов. Разница в том, что для первого элемента div метод fadeIn() будет вызван сразу же после метода slideUp() . А во втором случае между этими методами "вклинится" задержка в 1 секунду.


after - добавить определённый текст или html-код, после указанного элемента.
```
$(document).ready(function(){
    $('.paragraph').after('<p>hello, world</p>');
});
```
before - то же самое но уже перед указанным элементом.

append - вставляет указанный элемент в конец определённого элемента.
```
$(document).ready(function(){
    $('.paragraph').append('<code>This is new code</code>');
});
```
prepend - то же самое только элемент будет добавлен в конец.

empty - очищает содержимое элементов.
```
$(document).ready(function(){
    $('p').empty();
});
```
remove - удаляет элемент.

$(document).ready(function(){
    $('p').remove();
});
```

Basic Slider
=============
```
<!DOCTYPE html>
<html class=''>
<head>
<meta charset='UTF-8'>

<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600); 

html {
  border-top: 5px solid #fff;
  background: #DDDDAF;
  color: #333;
}

html, body {
  margin: 0;
  padding: 0;
  font-family: 'Open Sans';
}

h1 {
  color: #00f;
  text-align: center;
  font-weight: 300;
}

#slider {
  position: relative;
  overflow: hidden;
  margin: 20px auto 0 auto;
  border-radius: 4px;
}

#slider ul {
  position: relative;
  margin: 0;
  padding: 0;
  height: 200px;
  list-style: none;
}

#slider ul li {
  position: relative;
  display: block;
  float: left;
  margin: 0;
  padding: 0;
  width: 500px;
  height: 300px;
  background: #ccc;
  text-align: center;
  line-height: 300px;
}

a.control_prev, a.control_next {
  position: absolute;
  top: 40%;
  z-index: 999;
  display: block;
  padding: 4% 3%;
  width: auto;
  height: auto;
  background: #2a2a2a;
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  font-size: 18px;
  opacity: 0.8;
  cursor: pointer;
}

a.control_prev:hover, a.control_next:hover {
  opacity: 1;
  -webkit-transition: all 0.2s ease;
}

a.control_prev {
  border-radius: 0 2px 2px 0;
}

a.control_next {
  right: 0;
  border-radius: 2px 0 0 2px;
}

.slider_option {
  position: relative;
  margin: 10px auto;
  width: 160px;
  font-size: 18px;
}
</style></head><body>
<h1>Basic Slider</h1>
<div id="slider">
  <a href="#" class="control_next">></a>
  <a href="#" class="control_prev"><</a>
  <ul>
    <li style="background: url('slide01.jpg') #aaa;">SLIDE 1</li>
    <li style="background: url('slide02.jpg') #aaa;">SLIDE 2</li>
    <li style="background: url('slide03.jpg') #aaa;">SLIDE 3</li>
    <li style="background: url('slide02.jpg') #aaa;">SLIDE 4</li>
  </ul>  
</div>

<script src='jquery.min.js'></script>
<script>
jQuery(document).ready(function ($) {
 
    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;
    
    $('#slider').css({ width: slideWidth, height: slideHeight });
    
    $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
    
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});    
</script>
</body></html>

```

События и их обработка
======================
ЗАДАЧА
------
Необходимо разрешить редактирование элемента input, которое было запрещено с помощью присвоения значения disabled атрибуту disabled.
Решение
--------
Решим задачу простым удалением атрибута, применив для этого метод removeAttr(name).

9. Использование метода removeAttr(name)
----------------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-4</title>
<meta charset="utf-8" />
</head>
<body>
<a href="#">Разрешить редактирование</a>
<input type="text" disabled="disabled" value="Не редактируется" />

<script src="jquery.min.js"></script>
<script>
$(function(){
    $("a").click(function() {
        $(this).next().removeAttr("disabled").focus().val("Редактируется");
    });
});
</script>

</body>
</html>
```
Сначала мы отыщем элемент a, чтобы связать с ним событие click, при наступлении которого будет вызываться функция, снимающая запрет редактирования. Нам нужно работать со следующим элементом — input , поэтому в цепочку вызовов добавляем вызов метода next(), который поможет отыскать элемент input . Следующий метод в цепочке — removeAttr(name), с помощью которого мы удаляем атрибут disabled элемента input. Дальше просто для наглядности передаем в input фокус, вызывая метод focus(), и вставляем текст "Редактируется".

focus(), focus(handler(eventObject)) 
-------------------------------------
Метод focus() вызывает событие focus для каждого выбранного элемента. Метод focus(handler(eventObject)) связывает функцию handler(eventObject) с событием focus для каждого выбранного элемента. Событие focus возникает, когда элемент принимает фокус через указатель мыши или
через нажатие клавиши Tab

blur(), blur(handler(eventObject)) 
----------------------------------
Метод blur() вызывает событие blur для каждого выбранного элемента. Метод blur(handler(eventObject)) связывает функцию handler(eventObject) с событием blur для каждого выбранного элемента. Событие blur возникает, когда элемент теряет фокус через указатель мыши или через
нажатие клавиши Tab

focusin(handler(eventObject)) 
------------------------------
Метод focusin(handler(eventObject)) связывает функцию handler(eventObject) с событием focus
для каждого выбранного элемента или элемента внутри него

focusout(handler(eventObject)) 
------------------------------
Метод focusout(handler(eventObject)) связывает функцию handler(eventObject) с событием blur для каждого выбранного элемента или элемента внутри него

change() change(handler(eventObject)) 
-------------------------------------
Метод change() вызывает событие change для каждого выбранного элемента. Метод change(handler(eventObject)) связывает функцию handler(eventObject) с событием change для каждого выбранного элемента. Событие change возникает, когда элемент теряет фокус, и его значение было изменено по
сравнению с моментом получения фокуса

Autoplay Slider
===============
```
<h1>Autoplay Slider</h1>
<div id="slider">
  <a href="#" class="control_next">></a>
  <a href="#" class="control_prev"><</a>
  <ul>
    <li style="background: url('slide01.jpg') #aaa;">SLIDE 1</li>
    <li style="background: url('slide02.jpg') #aaa;">SLIDE 2</li>
    <li style="background: url('slide03.jpg') #aaa;">SLIDE 3</li>
    <li style="background: url('slide02.jpg') #aaa;">SLIDE 4</li>
  </ul>  
</div>

<div class="slider_option">
  <input type="checkbox" id="checkbox">
  <label for="checkbox">Autoplay Slider</label>
</div> 
<script src='jquery.min.js'></script>

<script>
jQuery(document).ready(function ($) {

  $('#checkbox').change(function(){
    setInterval(function () {
        moveRight();
    }, 3000);
  });
  
    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;
    
    $('#slider').css({ width: slideWidth, height: slideHeight });
    
    $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
    
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});    

</script>

```

Метод each
==========
позволяет применить к каждому выбранному элементу указанную функцию.

```
$(document).ready(function(){
    $('.paragraph').each(function(){
        alert(this.innerHTML);
    });
});
```

ЗАДАЧА
-------
В набор jQuery необходимо выбрать элементы с помощью селектора, получить для каждого из них внутреннее содержимое в виде текста и завершить работу при обнаружении в наборе элемента с определенным идентификатором.

Для решения задачи применим один из наиболее полезных методов — each(function(index, Element)), который позволяет совершать итерации по набору элементов и выполнять функцию, переданную в качестве аргумента в контексте каждого элемента набора. 

10. Использование метода each()
-------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-10</title>
<meta charset="utf-8" />

<style type="text/css">
div {
width:60px; height:60px;
margin:5px; float:left;
border:1px solid #369;
}
.test {
background-color:#369;
}
br { clear:left; }
</style>

</head>
<body>
<p>&nbsp;</p>
<div>Один</div>
<div class="test">Два</div>
<div>Три</div>
<div class="test">Четыре</div>
<div id="stop" class="test">Пять</div>
<div>Шесть</div>
<div class="test">Семь</div><br />
<button>Применить</button>

<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $("button").click(function(){
        var a = new Array();
        $("div.test").each(function(i){
            a.push(i + "-" + $(this).text());
            if($(this).is("#stop")) {
                $("p").text(a.join(", "));
                return false;
            }
        });
    });
});
</script>
</body>
</html>
```
Семь элементов div, четыре из которых имеют класс с именем test и в свою очередь один из этих элементов обладает еще и атрибутом id со значением stop. Мы должны будем выбрать все элементы с классом test, получить внутреннее содержимое каждого элемента в виде текста и сохранить его в массиве a . Но, как только в наборе нам встретится элемент div с идентификатором stop, мы должны будем прекратить обход оставшихся элементов, объединить содержимое массива a в строку и поместить
результат в параграф p.

Внутри функции-обработчика объявляем массив a, где будем хранить полученные данные. Затем с помощью указанного в селекторе выражения div.test выбираем все интересующие нас элементы и применяем к ним метод each(). Единственный аргумент метода — функция, которая будет выполняться в контексте каждого элемента набора.

Функция, которая будет выполняться для каждого элемента набора, может принимать аргумент i, являющийся индексом элемента в наборе (отсчет начинается от нуля).
Внутри функции мы для каждого элемента набора вставляем в массив a его индекс i и, через дефис, содержимое элемента в виде текста. Затем с помощью метода is() проверяем условие — если очередной элемент набора имеет идентификатор #stop, то мы объединяем массив в строку с помощью метода join(), вставляем результат в параграф p и завершаем обход набора элементов, возвращая false.
в результате в параграф p будет вставлен текст "0-Два, 1-Четыре, 2-Пять".

ЗАДАЧА
------
Требуется выбрать единственный элемент из набора по значению его индекса, необходимо также иметь возможность узнать индекс любого элемента набора.

Для решения этой задачи применим методы eq(index) и index(element)

11. Использование методов eq() и index()
----------------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-11</title>
<meta charset="utf-8" />

<style type="text/css">
div {
width:60px; height:60px;
margin:5px; float:left;
border:1px solid #369;
}
br { clear:left; }
</style>

</head>
<body>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>

<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $("div").eq(2).css("background-color", "#f00");
    $("div").click(function(){
        alert("Индекс элемента в наборе: " + $("div").index(this));
    });
});
</script>
</body>
</html>
```

HTML-разметка — это просто семь элементов div, которые оформлены с помощью CSS-свойств и имеют размеры, рамку и белый цвет фона, установленный по умолчанию. 
При готовности DOM выбираем все элементы div , которые имеются на странице, и применяем к этому набору метод eq() , передавая в качестве аргумента число 2.
После этого в наборе останется единственный элемент div, тот самый, имевший индекс 2 в исходном наборе, или просто третий по счету (отсчет начинается от нуля).
Чтобы иметь возможность узнать индекс любого элемента div при щелчке на нем мышью, свяжем с набором этих элементов обработчик события click . Функция-обработчик этого события будет выводить в окне предупреждения индекс соответствующего элемента, полученный с помощью метода index(), и поясняющий текст.


Gummy slider
============
```
<!DOCTYPE html>
<html class=''>
<head>
<meta charset='UTF-8'>

<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>

<style>
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

body {
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
}

.nav {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 9;
  padding: 40px;
  color: white;
}
.nav h1 {
  font-weight: 300;
  font-size: 3rem;
}
.nav .author {
  text-align: right;
}

.loading {
  background-color: #2ecc71;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  height: 600px;
  line-height: 600px;
  text-align: center;
  color: white;
  font-size: 2rem;
}

.slider {
  background-color: white;
  position: relative;
  width: 100%;
  height: 600px;
  overflow: hidden;
  display: none;
}

.slider-inner {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  -webkit-transition-timing-function: cubic-bezier(0.22, 1.61, 0.65, 1);
          transition-timing-function: cubic-bezier(0.22, 1.61, 0.65, 1);
  -webkit-transition-duration: 1s;
          transition-duration: 1s;
  background-visibility: hidden;
  -webkit-transition-delay: .75s;
          transition-delay: .75s;
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
}

.slide {
  position: absolute;
  top: 0;
  height: 100%;
  background-color: #f1c40f;
  background-visibility: hidden;
  -webkit-transition-timing-function: cubic-bezier(0.25, 0.5, 0.25, 1.25);
          transition-timing-function: cubic-bezier(0.25, 0.5, 0.25, 1.25);
  -webkit-transform: translateZ(0) scale(0.8, 0.8);
          transform: translateZ(0) scale(0.8, 0.8);
  -webkit-transition-duration: .5s;
          transition-duration: .5s;
  text-align: center;
  line-height: 600px;
  font-size: 5rem;
  color: white;
}
.slide.active {
  -webkit-transform: scale(1, 1);
          transform: scale(1, 1);
  -webkit-transition-delay: 2s;
          transition-delay: 2s;
}
.slide:nth-child(2n) {
  background-color: #2ecc71;
}
.slide:nth-child(3n) {
  background-color: #3498db;
}
.slide:nth-child(4n) {
  background-color: #9b50ba;
}

.slider-nav {
  position: absolute;
  bottom: 0;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  padding: 20px;
  text-align: center;
}
.slider-nav > div {
  float: left;
  width: 10px;
  height: 10px;
  border: 1px solid white;
  z-index: 2;
  display: inline-block;
  margin: 0 10px;
  cursor: pointer;
  border-radius: 50%;
  opacity: .5;
  -webkit-transition-duration: .25s;
          transition-duration: .25s;
  background-color: gray;
}
.slider-nav > div:hover {
  opacity: 1;
  background-color: red;
}
.slider-nav > div.active {
  background-color: white;
  -webkit-transform: scale(2);
          transform: scale(2);
  opacity: 1;
}
</style></head><body>
<nav class="nav">
    <h1>Gummy slider</h1>
</nav>

<div class="loading">
    Loading...
</div>

<div class="slider">
    <div class="slider-inner">
        <div class="slide active">1 <img src='slide01.jpg'></div>
        <div class="slide">2 <img src='slide02.jpg'> </div>
        <div class="slide">3 <img src='slide03.jpg'></div>
        <div class="slide">4 <img src='slide02.jpg'></div>
        <div class="slide">5 <img src='slide01.jpg'></div>
        <div class="slide">6 <img src='slide03.jpg'></div>
        <div class="slide">7 <img src='slide01.jpg'></div>
        <div class="slide">8 <img src='slide02.jpg'></div>
    </div>
    
    <nav class="slider-nav">
        <div class="active"></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </nav>
</div>
<script src='jquery.min.js'></script>
<script>
$(document).ready(function () {
    var slide = $('.slide');
    var viewWidth = $(window).width();
    var sliderInner = $('.slider-inner');
    var childrenNo = sliderInner.children().length;
    sliderInner.width(viewWidth * childrenNo);
    $(window).resize(function () {
        viewWidth = $(window).width();
    });
    function setWidth() {
        slide.each(function () {
            $(this).width(viewWidth);
            $(this).css('left', viewWidth * $(this).index());
        });
    }
    function setActive(element) {
        var clickedIndex = element.index();
        $('.slider-nav .active').removeClass('active');
        element.addClass('active');
        sliderInner.css('transform', 'translateX(-' + clickedIndex * viewWidth + 'px) translateZ(0)');
        $('.slider-inner .active').removeClass('active');
        $('.slider-inner .slide').eq(clickedIndex).addClass('active');
    }
    setWidth();
    $('.slider-nav > div').on('click', function () {
        setActive($(this));
    });
    $(window).resize(function () {
        setWidth();
    });
    setTimeout(function () {
        $('.slider').fadeIn(500);
    }, 2000);
});
</script>
</body></html>

```
событие scroll
==============
scroll(handler(eventObject)) 
----------------------------
Метод scroll(handler(eventObject)) связывает функцию handler(eventObject) с событием scroll для каждого выбранного элемента. Событие scroll возникает, когда прокручивается область просмотра документа

Для какого-либо элемента, использующего горизонтальную и вертикальную полосы прокрутки для отображения всего содержимого, необходимо при загрузке переместить вертикальную полосу прокрутки на 150 пикселов, а горизонтальную — на 300.

методы и для решения такой задачи — scrollTop() и scrollLeft().

12. Использование методов scrollTop() и scrollLeft()
-----------------------------------------------------
```
<!DOCTYPE html>
<html>
<head>
<title>example-12</title>
<meta charset="utf-8" />

<style type="text/css">
#demo {
width:300px; height:200px;
overflow:auto;
border:1px solid #369;
}
p {
width:1000px;
background-color:#ddd;
border-bottom:1px dotted #69c;
}
</style>
</head>
<body>
<div id="demo">
<p>Он поднял палец ... приближался.</p>
<p>Кровь застыла ... взором зверя,</p>
<p>попавшего в ... сучьями,</p>
<p>и все это ... самоотверженных.</p>
<p>Воздух вокруг ... поворачиваться,</p>
<p>и тут свершилось ... самые глаза.</p>
<p>Лавр Федотович ... осинника.</p>
<p>Справа от меня... действием.</p>
</div>
<button>Получить scrollTop и scrollLeft</button>
<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $("#demo").scrollTop(150).scrollLeft(300);
    $("button").click(function(){
        var d = $("#demo");
        alert("scrollTop = " + d.scrollTop() + ", scrollLeft = " + d.scrollLeft());
    });
});
</script>
</body>
</html>
```

HTML-код — это элемент div с идентификатором #demo, для которого с помощью CSS-свойств width и height заданы фиксированные значения ширины и высоты (300 и 200 пикселов соответственно). Значение auto, установленное для свойства overflow , определит появление вертикальной и горизонтальной полос прокрутки при необходимости. А такая необходимость будет, поскольку содержимое элемента div — несколько параграфов p шириной 1000 пикселов, что заведомо превышает размеры элемента div и по вертикали, и по горизонтали.
При загрузке страницы с помощью JavaScript-кода выбираем элемент #demo и применяем к нему методы scrollTop() и scrollLeft() , передавая им в виде аргументов числа 150 и 300. Когда страница загрузится, видим, что и вертикальная и горизонтальная полосы прокрутки находятся в требуемых положениях.
С помощью кнопки button , с которой связан обработчик события click , мы можем получить текущие значения. 

5 scroll
========
```
<!DOCTYPE html>
<html class=''>
<head>
<meta charset='UTF-8'>
<style>
@import url(http://fonts.googleapis.com/css?family=Josefin+Slab:100);

.slider-wrap {
  width: 300px;
  height: 500px;
  margin: 20px auto;
}
.slider {
  overflow-x: scroll;
}
.holder {
  width: 300%;
}
.slide {
  float: left;
  width: 300px;
  height: 500px;
  position: relative;
  background-position: -100px 0;
}
.temp {
  position: absolute;
  color: white;
  font-size: 100px;
  bottom: 15px;
  left: 15px;
  font-family: 'Josefin Slab', serif;
  font-weight: 100;
}
#slide-0 {
  background-image: url(slide01.jpg);
}
#slide-1 {
  background-image: url(slide02.jpg);
}
#slide-2 {
  background-image: url(slide03.jpg);
}
.slide:before {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 40%;
  background: linear-gradient(transparent, black);
}
.slider-nav {
  text-align: center;
  margin: 10px 0 0 0;
}
.slider-nav a {
  width: 10px;
  height: 10px;
  display: inline-block;
  background: #ddd;
  overflow: hidden;
  text-indent: -9999px;
  border-radius: 50%;
}
.slider-nav a.active {
  background: #999;
}</style></head><body>
<div class="slider-wrap">
  <div class="slider" id="slider">
    <div class="holder">
      <div class="slide" id="slide-0"><span class="temp">74°</span></div>
      <div class="slide" id="slide-1"><span class="temp">64°</span></div>
        <div class="slide" id="slide-2"><span class="temp">82°</span></div>
    </div>
  </div>
  <nav class="slider-nav">
    <a href="#slide-0" class="active">Slide 0</a> 
    <a href="#slide-1">Slide 1</a> 
    <a href="#slide-2">Slide 2</a> 
  </nav>
</div>
<script src='jquery.min.js'></script>
<script>
var slider = {
    el: {
        slider: $('#slider'),
        allSlides: $('.slide'),
        sliderNav: $('.slider-nav'),
        allNavButtons: $('.slider-nav > a')
    },
    timing: 800,
    slideWidth: 300,
    init: function () {
        this.bindUIEvents();
    },
    bindUIEvents: function () {
        this.el.slider.on('scroll', function (event) {
            slider.moveSlidePosition(event);
        });
        this.el.sliderNav.on('click', 'a', function (event) {
            slider.handleNavClick(event, this);
        });
    },
    moveSlidePosition: function (event) {
        this.el.allSlides.css({ 'background-position': $(event.target).scrollLeft() / 6 - 100 + 'px 0' });
    },
    handleNavClick: function (event, el) {
        event.preventDefault();
        var position = $(el).attr('href').split('-').pop();
        this.el.slider.animate({ scrollLeft: position * this.slideWidth }, this.timing);
        this.changeActiveNav(el);
    },
    changeActiveNav: function (el) {
        this.el.allNavButtons.removeClass('active');
        $(el).addClass('active');
    }
};
slider.init();
</script>
</body></html>

```

bootstrap
=========
```
<!DOCTYPE html>
<html class=''>
<head>
<meta charset='UTF-8'>

<link rel='stylesheet prefetch' href='normalize.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css'>
<style class="cp-pen-styles">.carousel-fade .carousel-inner .item {
  -webkit-transition-property: opacity;
  transition-property: opacity;
}
.carousel-fade .carousel-inner .item,
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  opacity: 0;
}
.carousel-fade .carousel-inner .active,
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}
.carousel-fade .carousel-inner .next,
.carousel-fade .carousel-inner .prev,
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}
.carousel-fade .carousel-control {
  z-index: 2;
}
html,
body,
.carousel,
.carousel-inner,
.carousel-inner .item {
  height: 100%;
}
.item:nth-child(1) {
  background: #74C390;
}
.item:nth-child(2) {
  background: #51BCE8;
}
.item:nth-child(3) {
  background: #E46653;
}
</style></head><body>
<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="active item"></div>
        <div class="item"></div>
        <div class="item"></div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
</div>

<script src='jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.js'></script>
<script>
$('.carousel').carousel();

</script>

</body></html>
```