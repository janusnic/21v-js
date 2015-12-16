# 21v-js

js3
====
HTML
----
```
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="slider3.js"></script>
        <link rel="stylesheet" type="text/css" href="slider3.css">
    </head>

    <body>
        <div class="container">
            <div class="slider_wrapper">
                <ul id="image_slider">
                    <li><img src="../image/1.jpg"></li>
                    <li><img src="../image/4.jpg"></li>
                    <li><img src="../image/5.jpg"></li>
                    <li><img src="../image/1.jpg"></li>
                    <li><img src="../image/4.jpg"></li>
                    <li><img src="../image/5.jpg"></li>
                </ul>                   
                <span class="nvgt" id="prev"></span>
                <span class="nvgt" id="next"></span>        
            </div>
            <ul id="pager">
            </ul>
        </div>
    </body>
```
CSS
---
```
#pager{
    /* firefox has different center method. this doesn't work for fire fox */
    /* not in the center*/
    padding:0px;
    position:relative;
    height:50px;
    margin:auto;
    margin-top:10px;
}
#pager li{
    padding: 0px;
    margin:5px;
    width:20px;
    height:20px;
    border:1px solid white;
    color:white;
    list-style: none;
    opacity: 0.6;
    float:left;
    border-radius: 3px;
    cursor: pointer;
}
#pager li:hover{
    opacity:0.9;
}

```
DOM-элементы предоставляют следующие свойства.
----------------------------------------------
- Свойство style — это объект, в котором CSS-свойства пишутся вотТакВот. Чтение и изменение его свойств — это, по сути, работа с компонентами атрибута style.
- style.cssText — строка стилей для чтения или записи. Аналог полного атрибута style.
- Свойство currentStyle(IE8-) и метод getComputedStyle (IE9+, стандарт) позволяют получить реальное, применённое сейчас к элементу свойство стиля с учётом CSS-каскада и браузерных стилей по умолчанию.
При этом currentStyle возвращает значение из CSS, до окончательных вычислений, а getComputedStyle — окончательное, непосредственно применённое к элементу.

Document.defaultView
--------------------
В браузерах возраващает объект window, который связан с document текущей страницы или null если document не доступен.

Синтаксис
```
var win = document.defaultView;
```
Это свойство доступно только для чтения.

defaultView не поддерживается в IE до 9 версии.

JS
--
```
//1. set ul width 
//2. image when click prev/next button
var ul;
var liItems;
var imageNumber;
var imageWidth;
var prev, next;
var currentPostion = 0;
var currentImage = 0;

function init(){
    ul = document.getElementById('image_slider');
    liItems = ul.children;
    imageNumber = liItems.length;
    imageWidth = liItems[0].children[0].clientWidth;
    ul.style.width = parseInt(imageWidth * imageNumber) + 'px';
    prev = document.getElementById("prev");
    next = document.getElementById("next");
    generatePager(imageNumber);
    
    prev.onclick = function(){ onClickPrev();};
    next.onclick = function(){ onClickNext();};
}

function animate(opts){
    var start = new Date;
    var id = setInterval(function(){
        var timePassed = new Date - start;
        var progress = timePassed / opts.duration;
        if (progress > 1){
            progress = 1;
        }
        var delta = opts.delta(progress);
        opts.step(delta);
        if (progress == 1){
            clearInterval(id);
            opts.callback();
        }
    }, opts.delay || 17);
    
}

function slideTo(imageToGo){
    var direction;
    var numOfImageToGo = Math.abs(imageToGo - currentImage);
    
    direction = currentImage > imageToGo ? 1 : -1;
    currentPostion = -1 * currentImage * imageWidth;
    var opts = {
        duration:1000,
        delta:function(p){return p;},
        step:function(delta){
            ul.style.left = parseInt(currentPostion + direction * delta * imageWidth * numOfImageToGo) + 'px';
        },
        callback:function(){currentImage = imageToGo;}  
    };
    animate(opts);
}

function onClickPrev(){
    if (currentImage == 0){
        slideTo(imageNumber - 1);
    }       
    else{
        slideTo(currentImage - 1);
    }       
}

function onClickNext(){
    if (currentImage == imageNumber - 1){
        slideTo(0);
    }       
    else{
        slideTo(currentImage + 1);
    }       
}

function generatePager(imageNumber){    
    var pageNumber;
    var pagerDiv = document.getElementById('pager');
    for (i = 0; i < imageNumber; i++){
        var li = document.createElement('li');
        pageNumber = document.createTextNode(parseInt(i + 1));
        li.appendChild(pageNumber);
        pagerDiv.appendChild(li);
        // add event inside a loop, closure issue.
        li.onclick = function(i){
            return function(){
                slideTo(i);
            }
        }(i);
    }   
    var computedStyle = document.defaultView.getComputedStyle(li, null);
    
    var liWidth = parseInt(li.offsetWidth);
    var liMargin = parseInt(computedStyle.margin.replace('px',""));
    pagerDiv.style.width = parseInt((liWidth + liMargin * 2) * imageNumber) + 'px';
}
window.onload = init;

```

