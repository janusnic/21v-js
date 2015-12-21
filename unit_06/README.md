# 21v-js

Атрибуты и DOM-свойства
=======================
При чтении HTML браузер генерирует DOM-модель. При этом большинство стандартных HTML-атрибутов становятся свойствами соответствующих объектов.

Например, если тег выглядит как 
```
<div id="menu_body">,
```
то у объекта будет свойство div.id = "menu_body".

Свои DOM-свойства
==================
Узел DOM — это объект, поэтому, как и любой объект в JavaScript, он может содержать пользовательские свойства и методы.

Например, создадим в li новое свойство и запишем в него новую функцию:
```
            if (node.nodeName=="li") {
                  node.onmouseover=function() {
                      this.className+=" over";
                  }
             
```
пользовательские DOM-свойства:
------------------------------
- Могут иметь любое значение.
- Названия свойств чувствительны к регистру.
- Работают за счет того, что DOM-узлы являются объектами JavaScript.

Классы в виде строки: className
===============================
Атрибуту "class" соответствует свойство className.
--------------------------------------------------
Так как слово "class" является зарезервированным словом в Javascript, то при проектировании DOM решили, что соответствующее свойство будет называться className.

Например:
```
<body class="main page">
  <script>
    // прочитать класс элемента
    alert( document.body.className ); // main page

    // поменять класс элемента
    document.body.className = "class1 class2";
  </script>
</body>
```

Вертикальное выпадающее меню
============================
menu1.html
-----------

В данном выпадающем вертикальном меню, подменю открываются при наведении мыши на основной пункт меню.

1. CSS
```
 #menu_body li ul {
    display: none;
    }
#menu_body li:hover ul, #menu_body li.over ul {
    display: block;
    }
 #menu_body {
    background:#171717;
    width: 200px;
    }
#menu_body a {
    display: block;
    width: 185px;
    height: 24px;
    padding-left: 15px;
    } 

#menu_body ul li {
    list-style-type: none;
    border-bottom: 1px solid #fff;
    margin-left: -40px;
    padding-left: 0px;
    } 

#menu_body ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 115%;
    font-family: Georgia;
    } 

#menu_body ul li a:hover {
    color: #fff;
    text-decoration: none;
    background:#424242;
    } 

#menu_body ul li ul li {
    border: 0;
    list-style-type: none;
    color: #fff;
    list-style-position: inside;
    background:#7F7F7F;
    } 

#menu_body ul li ul{
    border-top: 1px solid #fff;
    margin-left: -10px;
    padding-left: 50px;
    }
```

str.replace(reg, str|func)
---------------------------
Швейцарский нож для работы со строками, поиска и замены любого уровня сложности.

поиск и замена подстроки в строке:
----------------------------------
```
// заменить " over" на ""
this.className=this.className.replace(" over","");
```
При вызове со строкой замены replace всегда заменяет только первое совпадение.

2. JavaScript

```
<script>
 startList = function() {
     if (document.all&&document.getElementById) {
         navRoot = document.getElementById("ul1");
         for (i=0; i<navRoot.childNodes.length; i++) {
              node = navRoot.childNodes[i];
              if (node.nodeName=="LI") {
                  node.onmouseover=function() {
                      this.className+=" over";
                  }
               node.onmouseout=function() {
               this.className=this.className.replace(" over","");
                  }
              }
         }
     }
}
window.onload=startList;
</script>
```
3. HTML
```
<div id="menu_body">
   <ul id="ul1">
          <li><a href="#">Пункт №1</a>
                <ul>
                    <li><a href="#">Подпункт №1</a></li>
                </ul>
         </li>
         <li><a href="#">Пункт №2</a>
                <ul>
                    <li><a href="#">Подпункт №1</a></li>
                    <li><a href="#">Подпункт №2</a></li>
                </ul>
         </li>
         <li><a href="#">Пункт №3</a>
                <ul>
                    <li><a href="#">Подпункт №1</a></li>
                    <li><a href="#">Подпункт №2</a></li>
                    <li><a href="#">Подпункт №3</a></li>
                </ul>
         </li>
   </ul>
</div>
```
menu2.html
-----------
В данном вертикальном меню, подменю открывается при клике на него.
1. CSS
```
#menu_body li ul {
    display: none;
    }
#menu_body li:hover ul, #menu_body li.over ul {
    display: block;
    }
 #menu_body {
    background:#171717;
    width: 200px;
    }
#menu_body a {
    display: block;
    width: 185px;
    height: 24px;
    padding-left: 15px;
    } 

#menu_body ul li {
    list-style-type: none;
    border-bottom: 1px solid #fff;
    margin-left: -40px;
    padding-left: 0px;
    } 

#menu_body ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 115%;
    font-family: Georgia;
    } 

#menu_body ul li a:hover {
    color: #fff;
    text-decoration: none;
    background:#424242;
    } 

#menu_body ul li ul li {
    border: 0;
    list-style-type: none;
    color: #fff;
    list-style-position: inside;
    background:#7F7F7F;
    } 

#menu_body ul li ul{
    border-top: 1px solid #fff;
    margin-left: -10px;
    padding-left: 50px;
    }
```
2. JavaScript
```

<script type="text/javascript">
// указать сколько у Вас будет раскрывающихся групп меню. 

var id_menu = new Array('sub_menu_1','sub_menu_2','sub_menu_3');
startList = function allclose() {
    for (i=0; i < id_menu.length; i++){
        document.getElementById(id_menu[i]).style.display = "none";
    }
}
function openMenu(id){
    for (i=0; i < id_menu.length; i++){
        if (id != id_menu[i]){
            document.getElementById(id_menu[i]).style.display = "none";
        }
    }
    if (document.getElementById(id).style.display == "block"){
        document.getElementById(id).style.display = "none";
    }else{
        document.getElementById(id).style.display = "block";
    }
}
window.onload=startList;
</script>
```

3. HTML
```
<div id="menu_body">
    <ul>
        <li><a href="#" onclick="openMenu('sub_menu_1');return(false)">Пункт №1</a>
            <ul id="sub_menu_1">
                <li><a href="#">Подпункт №1</a></li>
            </ul>
        </li>
        <li><a href="#" onclick="openMenu('sub_menu_2');return(false)">Пункт №2</a>
            <ul id="sub_menu_2">
                <li><a href="#">Подпункт №1</a></li>
                <li><a href="#">Подпункт №2</a></li>
            </ul>
        </li>
        <li><a href="#" onclick="openMenu('sub_menu_3');return(false)">Пункт №3</a>
            <ul id="sub_menu_3">
                <li><a href="#">Подпункт №1</a></li>
                <li><a href="#">Подпункт №2</a></li>
                <li><a href="#">Подпункт №3</a></li>
            </ul>
        </li>
    </ul>
</div>
```

Метод getElementsByTagName
---------------------------
Метод elem.getElementsByTagName(tag) ищет все элементы с заданным тегом tag внутри элемента elem и возвращает их в виде списка.

Регистр тега не имеет значения.

Например:
```
// получить все a-элементы
var a = m.getElementsByTagName("a");
```
метод getElementsByTagName может искать внутри любого элемента.

Например, найдём все элементы input внутри таблицы:
----------------------------------------------------
```
<table id="age-table">
  <tr>
    <td>Ваш возраст:</td>

    <td>
      <label>
        <input type="radio" name="age" value="young" checked> младше 18
      </label>
      <label>
        <input type="radio" name="age" value="mature"> от 18 до 50
      </label>
      <label>
        <input type="radio" name="age" value="senior"> старше 60
      </label>
    </td>
  </tr>

</table>

<script>
  var tableElem = document.getElementById('age-table');
  var elements = tableElem.getElementsByTagName('input');

  for (var i = 0; i < elements.length; i++) {
    var input = elements[i];
    alert( input.value + ': ' + input.checked );
  }
</script>
```
Можно получить всех потомков, передав звездочку '*' вместо тега:
```
// получить все элементы документа
document.getElementsByTagName('*');

// получить всех потомков элемента elem:
elem.getElementsByTagName('*');
```
Возвращается коллекция, а не элемент
------------------------------------
Коллекцию нужно или перебрать в цикле или получить элемент по номеру:
```
for (var i = 0; i < a.length; i++) {
    if (a[i].href && url.indexOf(a[i].href.toLowerCase()) != -1 && a[i].href.length > l) {
        k = i;
        l = a[i].href.length;
        console.log(l);
        }
              
    }
            
```
Объект location
----------------
Объект location содержит информацию о текущем URL страницы и позволяет перенаправить посетителя на новый URL.

```
var url = document.location.href.toLowerCase();
console.log(url);
```

Есть три способа назначения обработчиков событий:
-------------------------------------------------
1. Атрибут HTML: onclick="...".
2. Свойство: elem.onclick = function.
3. Специальные методы:
- Современные: elem.addEventListener( событие, handler[, phase]), удаление через removeEventListener.
- Для старых IE8-: elem.attachEvent( on+событие, handler ), удаление через detachEvent.

Horizontal Menus
=================
index1.html
-----------
```
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Javascript Menu: Horizontal Menus</title>
    <style type="text/css">
#wrapper 
{
    border: solid 1px black;
    background-color:#444;
    padding:0px;/*changing its value will give menu margins to its container*/
    text-align:center;
    border-radius: 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
}
#menu
{
    border-right: solid 1px #777;
    margin:0 auto;/*If you don't want the menu center aligned, remove this line and above text-align:center*/
    font-size:0;    
    box-sizing:content-box;
}
        
#menu ul, #menu li
{
    display: inline;
    list-style-type: none;padding: 0;margin: 0;border:0;background-image:none;
}
        
#menu a
{
    text-align: center;
    display: inline-block;
    font: normal 11px Verdana;
    background: url('bg.gif') no-repeat left top;
    padding: 10px 20px;/*This defines the size of each menu item*/
    color: white;
    text-decoration: none;
}
        
#menu a:hover, #menu a.current
{
    background-position: 0% -60px;
    color: white;
}
    </style>
    <script>
    var menu = function () {
      return {
        initMenu: function () {
            var m = document.getElementById('menu');
            if (!m) return;
            m.style.width = m.getElementsByTagName("ul")[0].offsetWidth + 1 + "px";
            var url = document.location.href.toLowerCase();
            console.log(url);
            var a = m.getElementsByTagName("a");
            var k = -1;
            var l = -1;
            
            for (var i = 0; i < a.length; i++) {
                if (a[i].href && url.indexOf(a[i].href.toLowerCase()) != -1 && a[i].href.length > l) {
                    k = i;
                    l = a[i].href.length;
                    console.log(l);
                }
              
            }
            
            if (k > -1) {
                a[k].className = 'current';
                console.log(k);
            }
            l = a.length;
            
            for (i = 0; i < l; i++) {
                a[i].onmouseover = function () {
                    for (j = 0; j < l; j++) {
                        a[j].className = '';
                    }
                    this.className = 'current';
                };
                a[i].onmouseout = function () {
                    for (j = 0; j < l; j++) {
                        a[j].className = '';
                        if (k > -1) {
                            a[k].className = 'current';
                        }
                    }
                };
            }
        }
    };
} ();

if (window.addEventListener) {
    window.addEventListener("load", menu.initMenu, false);
}
else if (window.attachEvent) {
    window.attachEvent("onload", menu.initMenu);
}
else {
    window["onload"] = menu.initMenu;
}
    </script>

</head>

<body>
<h2>1. Menu with Image Background</h2><br />

    <div id="wrapper">
        <div id="menu">
            <ul>
                <li><a href="?p=Javascript-Menus">Javascript Menus</a></li>
      <li><a href="?p=Horizontal-Menus">Horizontal Menus</a></li>
      <li><a href="?p=Web-Menus">Web Menus</a></li>
            </ul>
        </div>
    </div>
    <br/>


</body>
</html>

```

Vertical Menus
--------------
```
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Javascript Menu: Vertical Menus</title>

    <style type="text/css">

#menu-v li, #menu-v a {zoom:1;} /* Hacks for IE6, IE7 */
#menu-v, #menu-v ul
{
    width: 180px; /* Main Menu Item widths */
    border: 1px solid #ccc;
    border-top:none;
    position: relative; font-size:0;
    list-style: none; margin: 0; padding: 0; display:block;
    z-index:9;
}
                
/* Top level menu links style
---------------------------------------*/

#menu-v li
{
    background: #FFF url(bgv.gif) repeat-x 0 2px;
    list-style: none; margin: 0; padding: 0;
}
#menu-v li a
{
    font: normal 12px Arial;
    border-top: 1px solid #ccc;
    display: block;
    /*overflow: auto; force hasLayout in IE7 */
    color: black;
    text-decoration: none;
    line-height:26px;
    padding-left:26px;            
}
#menu-v ul li a
{
    line-height:30px;
}
                
#menu-v li a.arrow:hover
{
    background-image:url(arrowon.gif);
    background-repeat: no-repeat;
    background-position: 97% 50%;
}
        
/*Sub level menu items
---------------------------------------*/
#menu-v li ul
{
    position: absolute;
    width: 200px; /*Sub Menu Items width */
    visibility:hidden;
}
        
#menu-v a.arrow
{
    background-image:url(arrow.gif);
    background-repeat: no-repeat;
    background-position: 97% 50%;
}
#menu-v li:hover, #menu-v li.onhover
{
    background-position:0 -62px;
}
#menu-v ul li
{
    background: rgba(255, 255, 255, 0.86);
    background-image:none;
}
#menu-v ul li:hover, #menu-v ul li.onhover
{
    background: #FFF;
    background-image:none;
}
        
    </style>

 
    <script>
    
    var mcVM_options=
    {
    menuId:"menu-v",alignWithMainMenu:true
};

init_v_menu(mcVM_options);
function init_v_menu(a) {
    if(window.addEventListener)
        window.addEventListener("load",function() {
        start_v_menu(a);
        } ,false);
    else 
        window.attachEvent&&window.attachEvent("onload",function() {
            start_v_menu(a);
            }
         )
    }

function start_v_menu(i) {
    var e=document.getElementById(i.menuId),j=e.offsetHeight,b=e.getElementsByTagName("ul"),g=/msie|MSIE 6/.test(navigator.userAgent);
    if(g)
        
        for(var h=e.getElementsByTagName("li"), a=0, l=h.length; a<l; a++) {
        
            h[a].onmouseover=function() {
                this.className="onhover";
                };
            h[a].onmouseout=function() {
                this.className="";
                }
        }

    for(var k=function(a,b) {
        if(a.id==i.menuId) return b;
        else {
            b+=a.offsetTop;
            return k(a.parentNode.parentNode,b);
            }
        } ,a=0; a<b.length; a++) {
            var c=b[a].parentNode;
            c.getElementsByTagName("a")[0].className+=" arrow";
            b[a].style.left=c.offsetWidth+"px";
            b[a].style.top=c.offsetTop+"px";
            
            if(i.alignWithMainMenu)  {
                var d=k(c.parentNode,0);
                if(b[a].offsetTop+b[a].offsetHeight+d>j) {
                    var f;
                    if(b[a].offsetHeight>j) f=-d;
                    else f=j-b[a].offsetHeight-d;
                    b[a].style.top=f+"px";
                }
            }
            c.onmouseover=function() {
                if(g)
                    this.className="onhover";
                var a=this.getElementsByTagName("ul")[0];
                if(a) {
                    a.style.visibility="visible";
                    a.style.display="block";
                }
            };
            c.onmouseout=function() {
                if(g)
                    this.className="";
                this.getElementsByTagName("ul")[0].style.visibility="hidden";
                this.getElementsByTagName("ul")[0].style.display="none";
            }
        }
    for(var a=b.length-1; a>-1; a--)
        b[a].style.display="none";
    }

    </script>

</head>

<body>
<h2>1. Vertical Menu with Image Background</h2><br />

<ul id="menu-v">
    <li><a href="#">Item 1</a></li>
    <li><a href="#">Item 2</a>
        <ul class="sub">
            <li><a href="vertical-menu#1">Vertical Menu</a></li>
            <li><a href="vertical-menu#2">Vertical Menus</a></li>
        </ul>
    </li>
    <li><a href="#">Item 3</a>
        <ul class="sub">
            <li><a href="#">Sub Item 3.1</a></li>
            <li><a href="#">Sub Item 3.2</a></li>
            <li><a href="#">Sub Item 3.3</a></li>
            <li><a href="#">Sub Item 3.4</a></li>
            <li><a href="#">Sub Item 3.5</a></li>
        </ul>
    </li>
    <li><a href="#">Item 4</a></li>
    <li><a href="#">Item 5</a>
        <ul class="sub">
            <li><a href="#">Sub Item 5.1</a></li>
            <li><a href="#">Sub Item 5.2</a>
                <ul class="sub">
                    <li><a href="#521">Vertical Menu 5.2.1</a></li>
                    <li><a href="#522">Vertical Menu 5.2.2</a></li>
                    <li><a href="#523">Vertical Menu 5.2.3</a></li>
                    <li><a href="#524">Vertical Menu 5.2.4</a></li>
                    <li><a href="#525">Vertical Menu 5.2.5</a></li>
                </ul>
            </li>
            <li><a href="#">Sub Item 5.3</a>
                <ul class="sub">
                    <li><a href="#">Sub Item 5.3.1</a></li>
                    <li><a href="#">Sub Item 5.3.2</a></li>
                    <li><a href="#">Sub Item 5.3.3</a></li>
                    <li><a href="#">Sub Item 5.3.4</a></li>
                    <li><a href="#">Sub Item 5.3.5</a></li>
                    <li><a href="#">Sub Item 5.3.6</a></li>
                    <li><a href="#537">Vertical Menus 5.3.7</a></li>
                    <li><a href="#538">Vertical Menus 5.3.8</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li><a href="#">Item 6</a></li>
</ul>


</body>
</html>

```
Sliding Menu Effect
-------------------
index.html
----------
```
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sliding Menu Effect</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" language="javascript" src="script.js"></script>
</head>
<body onload="menuSlider.init('menu','slide')">
<div class="menu">
    <ul id="menu">
        <li><a href="#">JavaScript</a></li>
        <li><a href="#">Graphic Design</a></li>
        <li><a href="#">HTML</a></li>
        <li value="1"><a href="#">User Interface</a></li>
        <li><a href="#">CSS</a></li>
    </ul>
    <div id="slide"><!-- --></div>
</div>
</body>
</html>
```
style.css
---------
```
* {margin:0; padding:0}
body {font:14px Helvetica, sans-serif; font-weight:bold; background:#FFF}
.menu {position:relative; background:url(images/bg.gif) no-repeat; height:35px; width:459px}
.menu ul {list-style:none; z-index:10; position:absolute; z-index:100; padding:9px 5px}
.menu li {float:left}
.menu a, .menu a:active, .menu a:visited {text-decoration:none; color:#FFF; padding:10px}
.menu a:hover {color:#ebf0e6}
#slide {position:absolute; bottom:0; height:4px; background:#89957a; z-index:10}
```

script.js
----------
```
var menuSlider=function(){
    var m,e,g,s,q,i; e=[]; q=8; i=8;
    return{
        init:function(j,k){
            m=document.getElementById(j); 
            e=m.getElementsByTagName('li');
            var i,l,w,p; 
            i=0; 
            l=e.length;
            for(i;i<l;i++){
                var c,v; c=e[i]; v=c.value; 
                if(v==1){
                    s=c; 
                    w=c.offsetWidth; 
                    p=c.offsetLeft
                    }
                c.onmouseover=function(){
                    menuSlider.mo(this)
                    }; 
                c.onmouseout=function(){
                    menuSlider.mo(s)
                    };
            }
            g=document.getElementById(k); 
            g.style.width=w+'px'; 
            g.style.left=p+'px';
        },
        mo:function(d){
            clearInterval(m.tm);
            var el,ew; 
            el=parseInt(d.offsetLeft); 
            ew=parseInt(d.offsetWidth);
            m.tm=setInterval(function(){
                menuSlider.mv(el,ew)
                },i);
        },
        mv:function(el,ew){
            var l,w; 
            l=parseInt(g.offsetLeft); 
            w=parseInt(g.offsetWidth);
            if(l!=el||w!=ew){
                if(l!=el){
                    var ld,lr,li; 
                    ld=(l>el)?-1:1; 
                    lr=Math.abs(el-l); 
                    li=(lr<q)?ld*lr:ld*q; 
                    g.style.left=(l+li)+'px'
                    }
                if(w!=ew){
                    var wd,wr,wi; 
                    wd=(w>ew)?-1:1; 
                    wr=Math.abs(ew-w); 
                    wi=(wr<q)?wd*wr:wd*q; 
                    g.style.width=(w+wi)+'px'
                    }
            }else{clearInterval(m.tm)}
}};}();

```

Раскрывающиеся блоки (div)
==========================
горизонтальные раскрывающиеся блоки
------------------------------------
1. CSS
```
#slider {
    width: 508px;
    color: #fff;
    font-family: Georgia;
    font-size: 14px;
    }
.header {
    width: 488px;
    border: 2px solid #3F3F3F;
    padding: 8px;
    font-weight: bold;
    margin-top: 5px;
    cursor: pointer;
    background: url(images/header.png);
    text-align: center;
    }
.header:hover {
    background: url(images/header_over.png);
    color: #B7B7B7;
    }
.content {
    overflow: hidden;
    }
.text {
    width: 474px;
    border: 2px solid #3F3F3F;
    border-top: none;
    padding: 15px;
    text-align: left;
    background: #7F7F7F;
    }
```
2. JavaScript
```

<script type="text/javascript">
var array = new Array();
var speed = 10;
var timer = 10;

// Loop through all the divs in the slider parent div //
// Calculate seach content divs height and set it to a variable //
function slider(target,showfirst) {
  var slider = document.getElementById(target);
  var divs = slider.getElementsByTagName('div');
  var divslength = divs.length;
  for(i = 0; i < divslength; i++) {
    var div = divs[i];
    var divid = div.id;
    if(divid.indexOf("header") != -1) {
      div.onclick = new Function("processClick(this)");
    } else if(divid.indexOf("content") != -1) {
      var section = divid.replace('-content','');
      array.push(section);
      div.maxh = div.offsetHeight;
      if(showfirst == 1 && i == 1) {
        div.style.display = 'block';
      } else {
        div.style.display = 'none';
      }
    }
  }
}

// Process the click - expand the selected content and collapse the others //
function processClick(div) {
  var catlength = array.length;
  for(i = 0; i < catlength; i++) {
    var section = array[i];
    var head = document.getElementById(section + '-header');
    var cont = section + '-content';
    var contdiv = document.getElementById(cont);
    clearInterval(contdiv.timer);
    if(head == div && contdiv.style.display == 'none') {
      contdiv.style.height = '0px';
      contdiv.style.display = 'block';
      initSlide(cont,1);
    } else if(contdiv.style.display == 'block') {
      initSlide(cont,-1);
    }
  }
}

// Setup the variables and call the slide function //
function initSlide(id,dir) {
  var cont = document.getElementById(id);
  var maxh = cont.maxh;
  cont.direction = dir;
  cont.timer = setInterval("slide('" + id + "')", timer);
}

// Collapse or expand the div by incrementally changing the divs height and opacity //
function slide(id) {
  var cont = document.getElementById(id);
  var maxh = cont.maxh;
  var currheight = cont.offsetHeight;
  var dist;
  if(cont.direction == 1) {
    dist = (Math.round((maxh - currheight) / speed));
  } else {
    dist = (Math.round(currheight / speed));
  }
  if(dist <= 1) {
    dist = 1;
  }
  cont.style.height = currheight + (dist * cont.direction) + 'px';
  cont.style.opacity = currheight / cont.maxh;
  cont.style.filter = 'alpha(opacity=' + (currheight * 100 / cont.maxh) + ')';
  if(currheight < 2 && cont.direction != 1) {
    cont.style.display = 'none';
    clearInterval(cont.timer);
  } else if(currheight > (maxh - 2) && cont.direction == 1) {
    clearInterval(cont.timer);
  }
}
</script>
```
2.1 Подключение JavaScript

```
<body onload="slider('slider',0)">
```

3. HTML
```
<div id="slider">
    <div class="header" id="1-header">Первый блок</div>
    <div class="content" id="1-content">
        <div class="text">
            Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока.
        </div>
    </div>
    <div class="header" id="2-header">Второй блок</div>
    <div class="content" id="2-content">
        <div class="text">
            Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока.
        </div>
    </div>
    <div class="header" id="3-header">Третий блок</div>
    <div class="content" id="3-content">
        <div class="text">
            Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока. Пример раскрывающегося блока.
        </div>
    </div>
</div>
```

