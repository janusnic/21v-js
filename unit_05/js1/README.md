# 21v-js

1.html
=======
html
----
```
        <div class="container">
            <div class="image-slider-wrapper">
                <ul id="image_slider">
                    <li><img src="../image/1.jpg"></li>
                    <li><img src="../image/4.jpg"></li>
                    <li><img src="../image/5.jpg"></li>
                    <li><img src="../image/1.jpg"></li>
                    <li><img src="../image/4.jpg"></li>
                    <li><img src="../image/5.jpg"></li>
                </ul>           
                <div class="pager">
                </div>
            </div>
        </div>
```

CSS
----
```
          .container{
                width:800px;
                height:400px;
                padding:20px;
                border:1px solid gray;
                -webkit-box-sizing:border-box;
                -moz-box-sizing:border-box;
                box-sizing:border-box;
              background: black;
            }
            .image-slider-wrapper{
                overflow: hidden;
            }
            #image_slider{
                position: relative;
                overflow: hidden;
                height: 280px;
                padding:0;
                left:0;
            }
            #image_slider li{
                position:relative;
                max-width: 100%;
                float:left;
                list-style: none;
                left: 0;
            }
```

JS
---
```

var ul;
var li_items; 
var li_number;
var image_number = 0;
var slider_width = 0;
var image_width;
var current = 0;

function init(){    
    ul = document.getElementById('image_slider');
    li_items = ul.children;
    li_number = li_items.length;
    console.log('li_number= ',li_number);
    for (i = 0; i < li_number; i++){
        
            image_width = li_items[i].childNodes[0].clientWidth;
            slider_width += image_width;
            image_number++;
    }
    
    ul.style.width = parseInt(slider_width) + 'px';

    console.log('image_width= ',image_width,'slider_width= ',slider_width,'image_number=',image_number);

}

window.onload = init;

```
2.html
======

basics animation
----------------
```
var id = setInterval(function() {

    /* show the current frame */

    if (/* finished */) clearInterval(id)       

}, 10)
```

a1.html
-------
```
.example_path{
    position:relative;
    overflow:hidden;
    width:530px;
    height:30px;
    border:3px solid #000;}
.example_path .example_block{
    position:absolute;
    background-color:blue;
    width:30px;
    height:20px;
    padding-top:10px;
    text-align:center;
    color:#fff;
    font-size:10px;
    white-space:nowrap;}

    <!DOCTYPE HTML>
    <html>
    <head>
    <link type="text/css" rel="stylesheet" href="animate.css">
    <script>
    function move(elem) {

      var left = 0

      function frame() {
        
        left++  // update parameters 
        
        elem.style.left = left + 'px' // show frame 

        if (left == 100)  // check finish condition
          clearInterval(id)
      }

      var id = setInterval(frame, 10) // draw every 10ms
    }
    </script>
    </head>

    <body>
    <div onclick="move(this.children[0])" class="example_path">
        <div class="example_block"></div>
    </div>
    </body>
    </html>

```
function animate(opts)
----------------------
```
function animate(opts) {
  
  var start = new Date   

  var id = setInterval(function() {
    var timePassed = new Date - start
    var progress = timePassed / opts.duration

    if (progress > 1) progress = 1
    
    var delta = opts.delta(progress)
    opts.step(delta)
    
    if (progress == 1) {
      clearInterval(id)
    }
  }, opts.delay || 10)
  
}

function move(element, delta, duration) {
  var to = 500
  
  animate({
    delay: 10,
    duration: duration || 1000, // 1 sec by default
    delta: delta,
    step: function(delta) {
      element.style.left = to*delta + "px"    
    }
  })
  
}

```
a2.html
```
<script>

function move(element, delta, duration) {
  var to = 500
  
  animate({
    delay: 10,
    duration: duration || 1000, // 1 sec by default
    delta:function(p){return Math.max(0, -1 + 2 * p)},
    
    step: function(delta) {
      element.style.left = to*delta + "px"    
    }
  })
  
}
function animate(opts) {
  
  var start = new Date   

  var id = setInterval(function() {
    var timePassed = new Date - start
    var progress = timePassed / opts.duration

    if (progress > 1) progress = 1
    
    var delta = opts.delta(progress)
    opts.step(delta)
    
    if (progress == 1) {
      clearInterval(id)
    }
  }, opts.delay || 10)
  
}

</script>
</head>

<body>
<div onclick="move(this.children[0])" class="example_path">
    <div class="example_block"></div>
```
Коллбэки
========
Коллбэк (callback) — это функция, которую мы передаём куда-либо и ожидаем, что она будет вызвана при наступлении события.

JS
---
```
var ul;
var li_items; 
var li_number;
var image_number = 0;
var slider_width = 0;
var image_width;
var current = 0;

function init(){    
    ul = document.getElementById('image_slider');
    li_items = ul.children;
    li_number = li_items.length;
    
    for (i = 0; i < li_number; i++){
        
            image_width = li_items[i].childNodes[0].clientWidth;
            slider_width += image_width;
            image_number++;
    }
    
    ul.style.width = parseInt(slider_width) + 'px';

    slider(ul);
   
}

function slider(){      
        animate({
            delay:17,
            duration: 3000,
            delta:function(p){return Math.max(0, -1 + 2 * p)},
            step:function(delta){
                    ul.style.left = '-' + parseInt(current * image_width + delta * image_width) + 'px';
                },
            callback:function(){
                
            }
        });
}

function animate(opts){
    var start = new Date;
    var id = setInterval(function(){
        var timePassed = new Date - start;
        var progress = timePassed / opts.duration
        console.log('progress= ',progress);
        if(progress > 1){
            progress = 1;
        }
        var delta = opts.delta(progress);
        opts.step(delta);
        console.log('delta= ',delta);
        if (progress == 1){
            clearInterval(id);
            opts.callback();
        }
    }, opts.dalay || 17);
}

window.onload = init;
```

3.html
=======
```
function slider(){      
        animate({
            delay:17,
            duration: 3000,
            delta:function(p){return Math.max(0, -1 + 2 * p)},
            step:function(delta){
                    ul.style.left = '-' + parseInt(current * image_width + delta * image_width) + 'px';
                },
            callback:function(){
                current++;
                if(current < li_number-1){
                    slider();
                }
                else{
                    var left = (li_number - 1) * image_width;                   
                    
                    setTimeout(slider, 4000);
                }
            }
        });
}
```
4.html
======
```
function slider(){      
        animate({
            delay:17,
            duration: 3000,
            delta:function(p){return Math.max(0, -1 + 2 * p)},
            step:function(delta){
                    ul.style.left = '-' + parseInt(current * image_width + delta * image_width) + 'px';
                },
            callback:function(){
                current++;
                if(current < li_number-1){
                    slider();
                }
                else{
                    var left = (li_number - 1) * image_width;                   
                    setTimeout(function(){goBack(left)},2000);              
                    setTimeout(slider, 4000);
                }
            }
        });
}
function goBack(left_limits){
    current = 0;    
    setInterval(function(){
        if(left_limits >= 0){
            ul.style.left = '-' + parseInt(left_limits) + 'px';
            left_limits -= image_width / 10;
        }   
    }, 17);
}
```

