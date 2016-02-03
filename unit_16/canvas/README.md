# 21v-js

# canvas
canvas это HTML элемент, который может использоваться для рисования графики используя языки программирования (обычно это JavaScript). Он может, к примеру, использоваться для рисования графов, создания фото-коллажей или простой (и не очень) анимации. 

canvas был впервые представлен Apple для Mac OS X Dashboard и позже был реализован для Safari и Google Chrome.Браузеры основанные на  Gecko 1.8, такие как Firefox 1.5, так же поддерживают этот элемент. Тег canvas часть спецификации WhatWG Web applications 1.0 также известной как HTML5.

```
<script type="text/javascript" src="canvasapp1.js"></script>
```
### Canvas applications:
canvasapp1.js

```
window.addEventListener("load", eventWindowLoaded, false);
function eventWindowLoaded () {
   canvasApp();
}

function canvasApp() {
   drawScreen();

   ...

   function drawScreen() {

        ...

   }

}

```

Alternatively:
```
window.onload = function()
   {
      canvasApp();
   }
```   
or:
```
window.onload = canvasApp;
```

app1.html
```
<!doctype html>
<html>
    <head>
        <title>HTML5 Canvas “Hello World!”</title>
        <meta charset='utf-8' />
    </head>
    <body>
    
       <script type="text/javascript" src="canvasapp1.js"></script>

       <h1>HTML5 Canvas “Hello World!”</h1>

    </body>
</html>

   

```
canvasapp1.js
```

      window.addEventListener("load", eventWindowLoaded, false);
      
          function eventWindowLoaded () {
             canvasApp();
          }

        function canvasApp() {
           drawScreen();


           function drawScreen() {

             console.log('Hello Canvas!');

           }

        }
```


### Adding Canvas to the HTML Page

```
<canvas id="canvasOne" width="500" height="300">
 Your browser does not support HTML5 Canvas.
</canvas>

```

app2.html
```
<!doctype html>
<html>
    <head>
        <title>HTML5 Canvas “Hello World!”</title>
        <meta charset='utf-8' />
    </head>
    <body>
    
       <script type="text/javascript" src="canvasapp2.js"></script>

       <h1>HTML5 Canvas “Hello World!”</h1>

        <canvas id="canvasOne" width="500" height="300">
            Your browser does not support HTML5 Canvas.
        </canvas>

        <canvas height='320' width='480' id='example' style="border:1px solid #ff0000;">Обновите браузер</canvas>

        <canvas height='320' width='480' id='ex1' style="border:1px solid #00ff00;">Обновите браузер</canvas>

    </body>
</html>
 

```

canvasapp2.js
```
      window.onload = function()
       {
          canvasApp();
       }

        function canvasApp() {
           drawScreen();


           function drawScreen() {

             var theCanvas = document.getElementById("canvasOne");
             if (!theCanvas || !theCanvas.getContext) {
                   console.log('Hello Canvas One!');
                }
             

           }

        }
```



## Прямоугольники

Самой элементарной фигурой которую можно рисовать является прямоугольник. Предусмотрено три функции для отрисовки прямоугольников.
```

strokeRect(x, y, ширина, высота) // Рисует прямоугольник
fillRect(x, y, ширина, высота)   // Рисует закрашенный прямоугольник
clearRect(x, y, ширина, высота)  // Очищает область на холсте размер с прямоугольник заданного размера
```
## canvas1.html
```

<canvas id="a" width="300" height="225"></canvas>
```
Теперь легко можно обнаружить элемент canvas в DOM.
```
var a_canvas = document.getElementById("a");


/ / Теперь легко можно обнаружить элемент canvas в DOM. 
            var ex1 = document.getElementById('ex1'); 
            
// Каждый холст изначально пустой. 

            var example = document.getElementById("example"), 
                ctx     = example.getContext('2d'); 
                
                ctx.fillRect(0, 0, example.width, example.height); 
                ctx.fillStyle = "#FF0000"; 
                ctx.fillRect(30, 40, 300, 200);


function draw_ex1() { 
         // Первая строка функции находит элемент canvas в DOM. 
         var b_canvas = document.getElementById("ex1"); 
/* Каждый холст имеет контекст рисования. Как только вы нашли элемент canvas в DOM (с помощью document.getElementById() или любым другим способом), вызываете метод getContext(). Необходимо указать строку "2D" в методе getContext(). В спецификации HTML5 отмечено: «в будущих версиях данной спецификации, вероятно, будет определен 3D-контекст». */ 

         var b_context = b_canvas.getContext("2d"); 
         b_context.fillRect(50, 25, 150, 100); 
        } 

            var example = document.getElementById("example"), 
                ctx     = example.getContext('2d'); 
                
                ctx.fillRect(0, 0, example.width, example.height); 
                ctx.fillStyle = "#FF0000"; 
                ctx.fillRect(30, 40, 300, 200); 
```

Свойство fillStyle может быть цветом, рисунком или градиентом. По умолчанию fillStyle заливает сплошным черным цветом, но вы можете установить что угодно. Каждый контекст рисунка помнит свои собственные свойства при открытии страницы, пока вы ее не обновите.
```
fillRect(x, y, width, height) рисует прямоугольник, заполненный текущим стилем заливки.
```
Свойство strokeStyle как и fillStyle может быть цветом, рисунком или градиентом.

strokeRect(x, y, width, height) рисует прямоугольник с текущим стилем линии. StrokeRect не заливается внутри, он просто рисует границы.
```
clearRect(x, y, width, height) удаляет пиксели в указанном прямоугольнике.
function clear_ex1() { 
         // Первая строка функции находит элемент canvas в DOM. 
              var b_canvas = document.getElementById("ex1"); 
/* clearRect(x, y, width, height) удаляет пиксели в указанном прямоугольнике.  */ 
              var b_context = b_canvas.getContext("2d"); 
              b_context.clearRect(50, 25, 150, 100); 
            }
```
## Canvas2.html
### Координаты холста
Холст это двумерная сетка. Координата 0,0 находится в левом верхнем углу холста. Вдоль оси X значения растут к правому краю холста. По оси Y значения растут к нижнему краю холста.
Координатная сетка была нарисована с помощью canvas и включает в себя:
```
набор серых вертикальных линий;
набор серых горизонтальных линий;
две черные горизонтальные линии;
две черные вертикальные линии;
две маленькие черные диагональные линии, которые образуют стрелки;
две черные вертикальные линии;
две маленькие черные диагональные линии, которые образуют вторую стрелу;
букву «х»;
букву «у»;
текст «(0, 0)» вблизи левого верхнего угла;
текст «(500, 375)» в нижнем правом углу;
точку в левом верхнем углу и другую в нижнем правом углу.
```
Во-первых, нам необходимо определить сам элемент canvas, задать ему ширину и высоту, а также id, чтобы мы могли найти его позже.
```
<canvas id="c" width="500" height="375"></canvas>
```
Тогда мы должны найти сценарий canvas элемент в DOM и получить его в контекст рисования.
```
var c_canvas = document.getElementById("c");
var context = c_canvas.getContext("2d");
```
### Теперь мы можем рисовать линии.

Чтобы рисовать прямые линии карандашом, можно использовать следующие два метода:
```
1. moveTo(х, у) перемещает карандаш к указанной начальной точке.
2. lineTo(х, у) рисует линии до указанной конечной точки.
```
Чем чаще вы вызываете moveTo() и lineTo(), тем длиннее получается контур. Это «карандашные» методы — вы можете обращаться к ним так часто, насколько хотите, но вы ничего не увидите на холсте, пока не обратитесь к одному из «чернильных» методов.
### Рисование вертикальных линий
```
for (var x = 0.5; x < 500; x += 10) {
context.moveTo(x, 0);
context.lineTo(x, 375);
}
```
Рисование горизонтальных линий
```
for (var y = 0.5; y < 375; y += 10) {
context.moveTo(0, y);
context.lineTo(500, y);
}
```
### «чернильные» методы, чтобы сделать рисунок видимым.
```
context.strokeStyle = "#eee";
context.stroke();
stroke() является одним из «чернильных» методов. Он принимает сложный контур, заданный всеми вызовами moveTo() и lineTo(), и рисует его на холсте. StrokeStyle управляет цветом линии. Вот результат.
            ctx.moveTo(0,0); 
            ctx.lineTo(200,100); 
            ctx.stroke(); 
```
### Следующие атрибуты шрифта доступны в контексте рисования.
#### Font может содержать все, что вы бы добавили в свойство CSS font. Включает стиль шрифта, насыщенность, размер, межстрочное расстояние и семейство гарнитур.
#### TextAlign управляет выравниванием текста. Похоже на свойство CSS text-align, но не идентично ему. Возможные значения: start, end, left, right и center.
#### TextBaseline говорит где рисуется текст относительно начальной точки. Возможные значения: top, hanging, middle, alphabetic, ideographic и bottom.


### Контекст рисования холста поддерживает два типа градиента:
#### 1. createLinearGradient(x0, y0, x1, y1) рисует вдоль линии от (x0, y0) до (x1, y1).
#### 2. createRadialGradient(x0, y0, r0, x1, y1, r1) рисует по конусу между двумя окружностями. Первые три параметра определяют начальную окружность с центром (x0, y0) и радиусом r0. Последние три параметра представляют последнюю окружность с центром (x1, y1) и радиусом r1.
```
градиент от черного цвета к белому.
my_gradient.addColorStop(0, "black");
my_gradient.addColorStop(1, "white");
```
Стиль заполнения градиентом
```
context.fillStyle = my_gradient;
context.fillRect(0, 0, 300, 225);
```
градиент по диагонали.
Оба значения x и y меняются
```
var my_gradient = context.createLinearGradient(0, 0, 300, 225);
my_gradient.addColorStop(0, "black");
my_gradient.addColorStop(1, "white");
context.fillStyle = my_gradient;
context.fillRect(0, 0, 300, 225);
```
Draw Circular Gradient 
```
// Create gradient 
function rad_gradient() { 
         var my_gradient = context.createRadialGradient(175,50,50,190,60,100); 
                my_gradient.addColorStop(0, "red"); 
                my_gradient.addColorStop(1, "green"); 
                //Стиль заполнения градиентом 
                context.fillStyle = my_gradient; 
                context.fillRect(10, 10, 300, 300); 
         } 

```
### Контекст рисования холста определяет метод drawImage() для вывода изображений. Этот метод может иметь три, пять или девять аргументов.
#### drawImage(image, dx, dy) принимает изображение и выводит его на холст. Заданные координаты (dx, dy) соответствуют левому верхнему углу изображения, координаты (0, 0) выводят изображения в левом верхнем углу холста.
#### drawImage(image, dx, dy, dw, dh) принимает изображение, масштабирует его до ширины dw и высоты dh и выводит в точке с координатами (dx, dy).
#### drawImage(image, sx, sy, sw, sh, dx, dy, dw, dh) принимает изображение, обрезает его до прямоугольника (sx, sy, sw, sh), масштабирует до размеров (dw, dh) и выводит в точке с координатами (dx, dy).


## Спецификация HTML5 поясняет параметры drawImage():
Исходный прямоугольник это прямоугольник (в пределах исходного изображения), чьи углы это четыре точки (sx, sy), (sx+sw, sy), (sx+sw, sy+sh), (sx, sy+sh).
Прямоугольник назначения это прямоугольник (в холсте), чьи углы в четырех точках (dx, dy), (dx+dw, dy), (dx+dw, dy+dh), (dx, dy+dh).


Использование img
```
<img id="cat" src="images/cat.png" alt="Спящий кот" width="177" height="113">
<canvas id="e" width="177" height="113"></canvas>

window.onload = function() {
var canvas = document.getElementById("e");
var context = canvas.getContext("2d");
var cat = document.getElementById("cat");
context.drawImage(cat, 0, 0);
};
```

Использование объекта Image()
```
<canvas id="e" width="177" height="113"></canvas>

var canvas = document.getElementById("e");
var context = canvas.getContext("2d");
var cat = new Image();
cat.src = "images/cat.png";
cat.onload = function() {
context.drawImage(cat, 0, 0);
};
```
### Добавление изображения условно можно разделить на два шага: создание JavaScript объекта Image, а второй и заключительный шаг это отрисовка изображения на холсте при помощи функции drawImage. Рассмотрим оба шага подробнее.

Создание нового графического объекта: 
````
var img = new Image();  // Создание нового объекта изображения
img.src = 'image.png';  // Путь к изображению которое необходимо нанести на холст

drawImage(image, x, y) // Где x и y это координаты левого верхнего угла изображения, а первый параметр это изображение
```
## Линии и дуги

### Рисование фигур составленных из линий выполняется последовательно в несколько шагов:
```
beginPath()
closePath()
stroke()
fill()


var example = document.getElementById("example"), ctx = example.getContext('2d'); 
example.height = 480; 
example.width = 640; 
ctx.beginPath(); 
ctx.arc(80, 100, 56, 3/4 * Math.PI, 1/4 * Math.PI, true); ctx.fill(); // *14 
ctx.moveTo(40, 140); 
ctx.lineTo(20, 40); 
ctx.lineTo(60, 100); 
ctx.lineTo(80, 20); 
ctx.lineTo(100, 100); 
ctx.lineTo(140, 40); 
ctx.lineTo(120, 140); 
ctx.stroke(); // *22 
```
## Добавим цвета
```

fillStyle = color   // определяет цвет заливки 
strokeStyle = color // цвет линий цвет задается точно так же как и css, на примере все четыре способа задания цвета
```
Цвет задается точно так же как и css, на примере все четыре способа задания цвета
```
// все четыре строки задают оранжевый цвет заливки 
ctx.fillStyle = "orange"; 
ctx.fillStyle = "#FFA500"; 
ctx.fillStyle = "rgb(255,165,0)"; 
ctx.fillStyle = "rgba(255,165,0,1)"

```
## Аналогично задаётся и цвет для линий.
Возьмём пример с шахматной доской и добавим в него немного цвета:
```
var example = document.getElementById("example"), ctx = example.getContext('2d'); 
example.height = 480; 
example.width = 640; 
ctx.strokeStyle = '#B70A02'; // меняем цвет рамки ctx.strokeRect(15, 15, 266, 266); 
ctx.strokeRect(18, 18, 260, 260); 
ctx.fillStyle = '#AF5200'; // меняем цвет клеток 
ctx.fillRect(20, 20, 256, 256); 
for (i = 0; i < 8; i += 2) for (j = 0; j , 8; j += 2) { 
ctx.clearRect(20 + i * 32, 20 + j * 32, 32, 32); 
ctx.clearRect(20 + (i + 1) * 32, 20 + (j + 1) * 32, 32, 32); } 


canvas {
    border: 1px solid #ccc;
}


var example = document.getElementById('example'),
        ctx     = example.getContext('2d'),
        pic     = new Image();
    example.height = 300;
    example.height = 450;
    pic.src = 'http://habrahabr.ru/i/nocopypast.png';
    pic.onload = function () {
        // Иллюстрация для пример №1
        ctx.drawImage(pic, 0, 0);
        // Иллюстрация для пример №2
        ctx.drawImage(pic, 0, 130, 300, 150);
        // Иллюстрация для пример №3
        ctx.drawImage(pic, 25, 42, 85, 55, 0, 300, 170, 110);
    }


```

## SVG
```
<!DOCTYPE html>
<html>
  
  <head>
    <script type="text/javascript">
      // This function is called on page load.

      function drawOnCanvas() {

        // Get the canvas element.
        var canvas = document.getElementById("uIElement");

        // Make sure you got it.
        if (canvas.getContext)

        // If you have it, create a canvas user interface element.
        {
          // Specify 2d canvas type.
          var ctx = canvas.getContext("2d");

          // Draw gold UI element.
          // Start the path.
          ctx.beginPath();

          // Define the fill color in RGB for gold.
          ctx.fillStyle = "rgb(255 ,215 ,0)";

          // Draw the circle using an arc.
          ctx.arc(100, 100, 50, 0, 2 * Math.PI, true);

          // Fill the circle.
          ctx.fill();
        }
      }

      // This function is called when you click the canvas.

      function clickOnUI() {

        alert("You clicked the canvas UI element.");

      }
    </script>
  </head>
  
  <body onload="drawOnCanvas()">
    <h1>
      Canvas User Interface
    </h1>
    <!-- Create the Canvas element. -->
    <canvas id="uIElement" width="200" height="200" onclick="clickOnUI()">
    </canvas>
    <p>
      Click on the gold circular user interface element.
    </p>
  </body>

</html>
```
В этом примере кода Canvas используется стандартный заголовок HTML5, doctype html, по которому браузеры распознают спецификацию HTML5.
Тег canvas входит в тело. Вам нужно указать ширину и высоту. Тегу назначается атрибут ID, чтобы включить объект в модель DOM. Также необходимо указать, какая функция будет вызываться при щелчке мышью.
Раздел script страницы содержит два подраздела; в одном рисуется элемент пользовательского интерфейса (кнопка), в другом обрабатывается событие нажатия кнопки.
## Рисование элемента пользовательского интерфейса
Функция drawOnCanvas вызывается при загрузке страницы. Элемент пользовательского интерфейса рисуется попиксельно.
В модель DOM добавляется элемент Canvas и создается контекст рисования.
Отрисовка начинается с элемента beginPath. Цвет (золотой) задается с помощью метода fillStyle. Далее с помощью метода arc рисуется круг. Рисование контура завершается вызовом метода fill.
## Обработка события нажатия кнопки
Когда пользователь нажимает кнопку, вызывается функция clickOnUI. Выводится сообщение.

## Пример кода SVG
```
<!DOCTYPE html>
<html>
  
  <head>
    <script type="text/javascript">
      // This function is called when the circle is clicked.


      function clickMe() {

        // Display the alert.
        alert("You clicked the SVG UI element.");

      }
    </script>
  </head>
  
  <body>
    <h1>
      SVG User Interface
    </h1>
    <!-- Create the SVG pane. -->
    <svg height="200" width="200">
      <!-- Create the circle. -->
      <circle cx="100" cy="100" r="50" fill="gold" id="uIElement" onclick="clickMe();"
      />
    </svg>
    <p>
      Click on the gold circular user interface element.
    </p>
  </body>

</html>
```
В этом примере кода SVG используется стандартный заголовок HTML5, doctype html, по которому браузеры распознают спецификацию HTML5. Имейте в виду, что не все браузеры поддерживают данный аспект HTML5, когда теги SVG обрабатываются как теги HTML. Это называется встроенной обработкой SVG (inline SVG).
Тег svg входит в тело. Вам нужно указать ширину и высоту графического контейнера фигуры SVG. Внутри контейнера SVG необходимо добавить элемент фигуры circle. Тегу круга назначается атрибут ID, чтобы включить объект в модель DOM. Для круга необходимо указать координаты центра и радиус. Также необходимо указать, какая функция будет вызываться при щелчке круга мышью. Имейте в виду, что в отличие от технологии Canvas в технологии SVG обрабатываются только щелчки самого круга, а не всей области SVG. Все элементы пользовательского интерфейса создаются в теле без использования JavaScript.
В разделе сценария размещена только одна функция, выводящая сообщение при нажатии кнопки.



## rotaion

```

<!DOCTYPE html>

<html>
  <head>
    <title>Canvas Surface Rotation</title>
    <style>
      body {
        text-align: center;
      }
      
      canvas {
        border: 1px solid black;
      }
    </style>
    <script>   
      var constants = {
        canvasWidth: 600, // In pixels.
        canvasHeight: 600, // In pixels.
        leftArrow: 37,
        upArrow: 38,
        rightArrow: 39,
        downArrow: 40,
        xMin: -9, // These four max/min values define a square on the xy-plane that the surface will be plotted over.
        xMax: 9,
        yMin: -9,
        yMax: 9, 
        xDelta: 0.2, // Make smaller for more surface points. 
        yDelta: 0.2, // Make smaller for more surface points. 
        colorMap: ["#060", "#090", "#0C0", "#0F0", "#9F0", "#9C0", "#990", "#960", "#930", "#900", "#C00"], // There are eleven possible "vertical" color values for the surface, based on the last row of http://www.cs.siena.edu/~lederman/truck/AdvanceDesignTrucks/html_color_chart.gif
        pointWidth: 2, // The size of a rendered surface point (i.e., rectangle width and height) in pixels.
        dTheta: 0.05, // The angle delta, in radians, by which to rotate the surface per key press.
        surfaceScale: 24 // An empirically derived constant that makes the surface a good size for the given canvas size.
      };
      
      // These are constants too but I've removed them from the above constants literal to ease typing and improve clarity.
      var X = 0;
      var Y = 1;
      var Z = 2;

      // -----------------------------------------------------------------------------------------------------  

      var controlKeyPressed = false; // Shared between processKeyDown() and processKeyUp().
      var surface = new Surface(); // A set of points (in vector format) representing the surface.

      // -----------------------------------------------------------------------------------------------------

      function point(x, y, z)
      /*
        Given a (x, y, z) surface point, returns the 3 x 1 vector form of the point.
      */
      {       
        return [x, y, z]; // Return a 3 x 1 vector representing a traditional (x, y, z) surface point. This vector form eases matrix multiplication.
      }
      
      // -----------------------------------------------------------------------------------------------------
      
      function Surface()
      /*
        A surface is a list of (x, y, z) points, in 3 x 1 vector format. This is a constructor function.
      */
      {
        this.points = []; // An array of surface points in vector format. That is, each element of this array is a 3 x 1 array, as in [ [x1, y1, z1], [x2, y2, z2], [x3, y3, z3], ... ]
      }
      
      // -----------------------------------------------------------------------------------------------------  
      
      Surface.prototype.equation = function(x, y)
      /*
        Given the point (x, y), returns the associated z-coordinate based on the provided surface equation, of the form z = f(x, y).
      */
      {
        var d = Math.sqrt(x*x + y*y); // The distance d of the xy-point from the z-axis.
        
        return 4*(Math.sin(d) / d); // Return the z-coordinate for the point (x, y, z). 
      }
      
      // -----------------------------------------------------------------------------------------------------  
      
      Surface.prototype.generate = function()
      /*
        Creates a list of (x, y, z) points (in 3 x 1 vector format) representing the surface.
      */
      {
        var i = 0;
        
        for (var x = constants.xMin; x <= constants.xMax; x += constants.xDelta)
        {
          for (var y = constants.yMin; y <= constants.yMax; y += constants.yDelta)
          {
            this.points[i] = point(x, y, this.equation(x, y)); // Store a surface point (in vector format) into the list of surface points.              
            ++i;
          }
        }
      }

      // -----------------------------------------------------------------------------------------------------
            
      Surface.prototype.color = function()
      /*
        The color of a surface point is a function of its z-coordinate height.
      */
      {
        var z; // The z-coordinate for a given surface point (x, y, z).
        
        this.zMin = this.zMax = this.points[0][Z]; // A starting value. Note that zMin and zMax are custom properties that could possibly be useful if this code is extended later.
        for (var i = 0; i < this.points.length; i++)
        {            
          z = this.points[i][Z];
          if (z < this.zMin) { this.zMin = z; }
          if (z > this.zMax) { this.zMax = z; }
        }   
              
        var zDelta = Math.abs(this.zMax - this.zMin) / constants.colorMap.length; 

        for (var i = 0; i < this.points.length; i++)
        {
          this.points[i].color = constants.colorMap[ Math.floor( (this.points[i][Z]-this.zMin)/zDelta ) ];
        }
                
        /* Note that the prior FOR loop is functionally equivalent to the follow (much less elegant) loop:       
        for (var i = 0; i < this.points.length; i++)
        {
          if (this.points[i][Z] <= this.zMin + zDelta) {this.points[i].color = "#060";}
          else if (this.points[i][Z] <= this.zMin + 2*zDelta) {this.points[i].color = "#090";}
          else if (this.points[i][Z] <= this.zMin + 3*zDelta) {this.points[i].color = "#0C0";}
          else if (this.points[i][Z] <= this.zMin + 4*zDelta) {this.points[i].color = "#0F0";}
          else if (this.points[i][Z] <= this.zMin + 5*zDelta) {this.points[i].color = "#9F0";}
          else if (this.points[i][Z] <= this.zMin + 6*zDelta) {this.points[i].color = "#9C0";}
          else if (this.points[i][Z] <= this.zMin + 7*zDelta) {this.points[i].color = "#990";}
          else if (this.points[i][Z] <= this.zMin + 8*zDelta) {this.points[i].color = "#960";}
          else if (this.points[i][Z] <= this.zMin + 9*zDelta) {this.points[i].color = "#930";}
          else if (this.points[i][Z] <= this.zMin + 10*zDelta) {this.points[i].color = "#900";}          
          else {this.points[i].color = "#C00";}
        }
        */
      }
      
      // -----------------------------------------------------------------------------------------------------
      
      function appendCanvasElement()
      /*
        Creates and then appends the "myCanvas" canvas element to the DOM.
      */
      {
        var canvasElement = document.createElement('canvas');
        
        canvasElement.width = constants.canvasWidth;
        canvasElement.height = constants.canvasHeight;
        canvasElement.id = "myCanvas";

        canvasElement.getContext('2d').translate(constants.canvasWidth/2, constants.canvasHeight/2); // Translate the surface's origin to the center of the canvas.
        
        document.body.appendChild(canvasElement); // Make the canvas element a child of the body element.
      }

      //------------------------------------------------------------------------------------------------------

      Surface.prototype.sortByZIndex = function(A, B) 
      {
        return A[Z] - B[Z]; // Determines if point A is behind, in front of, or at the same level as point B (with respect to the z-axis).
      }
            
      // -----------------------------------------------------------------------------------------------------
            
      Surface.prototype.draw = function()
      {
        var myCanvas = document.getElementById("myCanvas"); // Required for Firefox.
        var ctx = myCanvas.getContext("2d");

        this.points = surface.points.sort(surface.sortByZIndex); // Sort the set of points based on relative z-axis position. If the points are visibly small, you can sort of get away with removing this step.

        for (var i = 0; i < this.points.length; i++)
        {
          ctx.fillStyle = this.points[i].color; 
          ctx.fillRect(this.points[i][X] * constants.surfaceScale, this.points[i][Y] * constants.surfaceScale, constants.pointWidth, constants.pointWidth);  
        }    
      }
      
      // -----------------------------------------------------------------------------------------------------
      
      Surface.prototype.multi = function(R)
      /*
        Assumes that R is a 3 x 3 matrix and that this.points (i.e., P) is a 3 x n matrix. This method performs P = R * P.
      */
      {
        var Px = 0, Py = 0, Pz = 0; // Variables to hold temporary results.
        var P = this.points; // P is a pointer to the set of surface points (i.e., the set of 3 x 1 vectors).
        var sum; // The sum for each row/column matrix product.
  
        for (var V = 0; V < P.length; V++) // For all 3 x 1 vectors in the point list.
        {
          Px = P[V][X], Py = P[V][Y], Pz = P[V][Z];
          for (var Rrow = 0; Rrow < 3; Rrow++) // For each row in the R matrix.
          {
            sum = (R[Rrow][X] * Px) + (R[Rrow][Y] * Py) + (R[Rrow][Z] * Pz);
            P[V][Rrow] = sum;
          }
        }     
      }
      
      // -----------------------------------------------------------------------------------------------------

      Surface.prototype.erase = function()
      {
        var myCanvas = document.getElementById("myCanvas"); // Required for Firefox.
        var ctx = myCanvas.getContext("2d");

        ctx.clearRect(-constants.canvasWidth/2, -constants.canvasHeight/2, myCanvas.width, myCanvas.height);
      }

      // -----------------------------------------------------------------------------------------------------

      Surface.prototype.xRotate = function(sign)
      /*
        Assumes "sign" is either 1 or -1, which is used to rotate the surface "clockwise" or "counterclockwise".
      */
      {
        var Rx = [ [0, 0, 0],
                   [0, 0, 0],
                   [0, 0, 0] ]; // Create an initialized 3 x 3 rotation matrix.
                           
        Rx[0][0] = 1;
        Rx[0][1] = 0; // Redundant but helps with clarity.
        Rx[0][2] = 0; 
        Rx[1][0] = 0; 
        Rx[1][1] = Math.cos( sign*constants.dTheta );
        Rx[1][2] = -Math.sin( sign*constants.dTheta );
        Rx[2][0] = 0; 
        Rx[2][1] = Math.sin( sign*constants.dTheta );
        Rx[2][2] = Math.cos( sign*constants.dTheta );
        
        this.multi(Rx); // If P is the set of surface points, then this method performs the matrix multiplcation: Rx * P
        this.erase(); // Note that one could use two canvases to speed things up, which also eliminates the need to erase.
        this.draw();
      }
         
      // -----------------------------------------------------------------------------------------------------
         
      Surface.prototype.yRotate = function(sign)
      /*
        Assumes "sign" is either 1 or -1, which is used to rotate the surface "clockwise" or "counterclockwise".
      */      
      {
        var Ry = [ [0, 0, 0],
                   [0, 0, 0],
                   [0, 0, 0] ]; // Create an initialized 3 x 3 rotation matrix.
                           
        Ry[0][0] = Math.cos( sign*constants.dTheta );
        Ry[0][1] = 0; // Redundant but helps with clarity.
        Ry[0][2] = Math.sin( sign*constants.dTheta );
        Ry[1][0] = 0; 
        Ry[1][1] = 1;
        Ry[1][2] = 0; 
        Ry[2][0] = -Math.sin( sign*constants.dTheta );
        Ry[2][1] = 0; 
        Ry[2][2] = Math.cos( sign*constants.dTheta );
        
        this.multi(Ry); // If P is the set of surface points, then this method performs the matrix multiplcation: Rx * P
        this.erase(); // Note that one could use two canvases to speed things up, which also eliminates the need to erase.
        this.draw();
      }
 
      // -----------------------------------------------------------------------------------------------------
         
      Surface.prototype.zRotate = function(sign)
      /*
        Assumes "sign" is either 1 or -1, which is used to rotate the surface "clockwise" or "counterclockwise".
      */      
      {
        var Rz = [ [0, 0, 0],
                   [0, 0, 0],
                   [0, 0, 0] ]; // Create an initialized 3 x 3 rotation matrix.
                           
        Rz[0][0] = Math.cos( sign*constants.dTheta );
        Rz[0][1] = -Math.sin( sign*constants.dTheta );        
        Rz[0][2] = 0; // Redundant but helps with clarity.
        Rz[1][0] = Math.sin( sign*constants.dTheta );
        Rz[1][1] = Math.cos( sign*constants.dTheta );
        Rz[1][2] = 0;
        Rz[2][0] = 0
        Rz[2][1] = 0;
        Rz[2][2] = 1;
        
        this.multi(Rz); // If P is the set of surface points, then this method performs the matrix multiplcation: Rx * P
        this.erase(); // Note that one could use two canvases to speed things up, which also eliminates the need to erase.
        this.draw();
      }
     
      // -----------------------------------------------------------------------------------------------------

      function processKeyDown(evt)
      {                    
        if (evt.ctrlKey)
        {
          switch (evt.keyCode)
          {
            case constants.upArrow: 
              // No operation other than preventing the default behavior of the arrow key.
              evt.preventDefault(); // This prevents the default behavior of the arrow keys, which is to scroll the browser window when scroll bars are present. The user can still scroll the window with the mouse.              
              break;
            case constants.downArrow:
              // No operation other than preventing the default behavior of the arrow key.
              evt.preventDefault();
              break;
            case constants.leftArrow:
              // console.log("ctrl+leftArrow");
              surface.zRotate(-1); // The sign determines if the surface rotates "clockwise" or "counterclockwise". 
              evt.preventDefault(); 
              break;
            case constants.rightArrow:
              // console.log("ctrl+rightArrow");
              surface.zRotate(1);
              evt.preventDefault(); 
              break;
          }
          return; // When the control key is pressed, only the left and right arrows have meaning, no need to process any other key strokes (i.e., bail now).
        }
        
        // Assert: The control key is not pressed.

        switch (evt.keyCode)
        {
          case constants.upArrow:
            // console.log("upArrow");
            surface.xRotate(1);
            evt.preventDefault(); 
            break;
          case constants.downArrow:
            // console.log("downArrow");
            surface.xRotate(-1); 
            evt.preventDefault(); 
            break;
          case constants.leftArrow:
            // console.log("leftArrow");
            surface.yRotate(-1);  
            evt.preventDefault(); 
            break;
          case constants.rightArrow:
            // console.log("rightArrow");
            surface.yRotate(1);   
            evt.preventDefault(); 
            break;
        }
      }
               
      // -----------------------------------------------------------------------------------------------------
      
      function onloadInit()
      {
        appendCanvasElement(); // Create and append the canvas element to the DOM.
        surface.draw(); // Draw the surface on the canvas.
        document.addEventListener('keydown', processKeyDown, false); // Used to detect if the control key has been pressed.
      }

      // -----------------------------------------------------------------------------------------------------
      
      surface.generate(); // Creates the set of points reprsenting the surface. Must be called before color().
      surface.color(); // Based on the min and max z-coordinate values, chooses colors for each point based on the point's z-ccordinate value (i.e., height).
      window.addEventListener('load', onloadInit, false); // Perform processing that must occur after the page has fully loaded.
    </script>
  </head>
  <body>
    <h1>Canvas Surface Rotation</h1>
    
    <!-- The canvas element is append to the DOM here. -->
  </body>
</html>
```

## Добавление текстур к фотографиям с помощью элемента Canvas
```
<!DOCTYPE html>
<html>
  
  <head>
    <script type="text/javascript">
    
      //Global variables
      var myImage = new Image(); // Create a new blank image.
      
      // Load the image and display it.
      function displayImage() {

        // Get the canvas element.
        canvas = document.getElementById("myCanvas");

        // Make sure you got it.
        if (canvas.getContext) {

          // Specify 2d canvas type.
          ctx = canvas.getContext("2d");

          // When the image is loaded, draw it.
          myImage.onload = function() {

            // Load the image into the context.
            ctx.drawImage(myImage, 0, 0);

            // Get and modify the image data.
            changeImage();
          }

          // Define the source of the image.
          myImage.src = "kestral.png";
        }
      }

      function changeImage() {

         // Draw snowflakes.
        for (i = 0; i <= 50; i++) {
          // Get random positions for flakes.
          var x = Math.floor(Math.random() * 199);
          var y = Math.floor(Math.random() * 199);

          // Make the flakes white
          ctx.fillStyle = "white";

          // Draw an individual flakes.
          ctx.beginPath();
          ctx.arc(x, y, 3, 0, Math.PI * 2, true);
          ctx.closePath();
          ctx.fill();
        }
      }
    </script>
  </head>
  
  <body onload="displayImage()">
    <h1>
      American Kestral
    </h1>
    <p>
      The original image is on the left and the modified image is on the right.
    </p>
    <img id="myPhoto" src="kestral.png">
    <canvas id="myCanvas" width="200" height="200">
    </canvas>
    <p>
      Public domain image courtesy of U.S. Fish and Wildlife Service.
    </p>
  </body>

</html>
```
### Код тега body
В теге body программы используется функция onload для вызова функции displayImage при загрузке страницы. Исходное изображение пустельги загружается внутри тега body, что позволяет сравнить его с изображением, которое будет изменено при помощи элемента Canvas. Тег canvas входит в тег body. В этом теге указывается исходная ширина и высота элемента Canvas, а также атрибут id. Атрибут ID необходим для добавления элемента Canvas в объектную модель страницы.
## Код сценария
Код сценария содержит две функции: displayImage и getColorData. Функция displayImage вызывается при загрузке страницы. Функция getColorData вызывается из функции displayImage. В начале раздела сценария создается глобальная переменная для создания пустого файла изображения, который будет использоваться позже.
### Функция displayImage
Эта функция вызывается при загрузке страницы. Она получает элемент Canvas с помощью ID элемента canvas, который указан в основном коде. Затем функция получает объект CanvasRenderingContext2D элемента Canvas, что позволяет подготовиться к отрисовке; для загрузки изображения в контекст используется функция DrawImage. После инициализации контекста как двумерного элемента Canvas можно начинать отрисовку.
В завершение в функции указывается путь к источнику изображения. Поскольку загрузка изображения может занимать некоторое время, задается событие, которое вызывает функцию по завершении загрузки изображения. После того как изображение загружено, оно отображается, и вызывается функция changeImage, которая выполняет отрисовку.
### Функция changeImage
На изображении с помощью метода arc отрисовывается 50 небольших окружностей. Вычисляются позиции всех пятидесяти звездочек. Атрибуту fillStyle присваивается значение "white". Далее рисуются снежинки с радиусом 3 пикселя и заполняются белым цветом. Для этого используются методы beginPath, arc, closePath и fill.

## Создание прозрачных фотографий

```
<!DOCTYPE html>
<html>
  
  <head>
    <script type="text/javascript">
    
      //Global variables
      var picWidth = 200; // width of the canvas
      var picHeight = 200; // height of the canvas
      var picLength = picWidth * picHeight; // number of chunks
      var myImage = new Image(); // Create a new blank image.
      
      // Load the image and display it.
      function displayImage() {

        // Get the canvas element.
        canvas = document.getElementById("myCanvas");

        // Make sure you got it.
        if (canvas.getContext) {

          // Specify 2d canvas type.
          ctx = canvas.getContext("2d");

          // When the image is loaded, draw it.
          myImage.onload = function() {
            // Load the image into the context.
            ctx.drawImage(myImage, 0, 0);

            // Get and modify the image data.
            getColorData();

            // Put the modified image back on the canvas.
            putColorData();
          }

          // Define the source of the image.
          // This file must be on your machine in the same folder as this web page.
          myImage.src = "kestral.png";
        }
      }

      function getColorData() {

        myImage = ctx.getImageData(0, 0, 200, 200);

        // Loop through data.
        for (var i = 0; i < picLength * 4; i += 4) {

          // First bytes are red bytes.        
          // Second bytes are green bytes.
          // Third bytes are blue bytes.
          // Fourth bytes are alpha bytes
          // Test of alpha channel at 50%.
          myImage.data[i + 3] = 128;
        }
      }

      function putColorData() {

        ctx.putImageData(myImage, 0, 0);
      }
      
      function noPhoto() {
      
        alert("Please put a .png file in this folder and name it kestral.png.");
        
        }
        
    </script>
  </head>
  
  <body onload="displayImage()">
    <h1>
      American Kestral
    </h1>
    <p>
      The original image is on the left and the modified image is on the right.
    </p>
    <img id="myPhoto" src="kestral.png" onerror="noPhoto()">
    <canvas id="myCanvas" width="200" height="200">
    </canvas>
    <p>
      Public domain image courtesy of U.S. Fish and Wildlife Service.
    </p>
  </body>

</html>
```
## Код тела программы
В теге body программы используется функция onload для вызова функции displayImage при загрузке страницы. Исходное изображение пустельги загружается в тело, что позволяет сравнивать с ним изображение, которое будет изменено с помощью Canvas. Событие onerror добавляется в элемент img и определяет факт загрузки изображения. Элемент canvas входит в состав тела. Указывается исходная ширина и высота элемента Canvas, а также атрибут id. Атрибут ID необходим для добавления элемента Canvas в объектную модель страницы.

##Код сценария
Код сценария содержит четыре функции: displayImage, getColorData, putColorData и noPhoto. Функция displayImage вызывается при загрузке страницы. Функции getColorData и putColorData вызываются из функции displayImage. Функция noPhoto вызывается в случае возникновения ошибки при загрузке фотографии. В начале раздела сценария создаются глобальные переменные для создания пустого файла изображения, который будет использоваться позже. Также создаются переменные, определяющие высоту и ширину элемента Canvas. Кроме того, вычисляется длина массива изображения на основе числа четырехбайтовых значений в массиве.

## Функция displayImage
Эта функция вызывается при загрузке страницы. Она получает объект Canvas по идентификатору (ID) элемента canvas в коде тела. Затем она получает объект CanvasRenderingContext2D элемента Canvas, что позволяет подготовиться к отрисовке; для загрузки изображения в контекст используется функция DrawImage. После инициализации контекста как двумерного элемента Canvas можно выполнить отрисовку.

В завершение в функции указывается путь к источнику изображения. Так как загрузка изображения может занимать некоторое время, определяется событие, которое вызывает функцию по завершении загрузки. После того как изображение загружено, оно выводится на экран и вызываются функции getColorData и putColorData, которые выполняют отрисовку.

изображение пустельги должно храниться на вашем компьютере. Вызов изображения из другого домена не поддерживается. Если источник пикселей для элемента Canvas находится в другом домене, изображение рассматривается как угроза безопасности и не подлежит изменению. Дополнительные сведения об угрозах безопасности между доменами см. в документации по canvas. Для выполнения сценария можно использовать любой файл с именем kestral.png. Чтобы использовать исходное изображение пустельги, щелкните правой кнопкой мыши левое изображение в первом разделе этого сценария и выберите команду Сохранить изображение как. Сохраните изображение в папку веб-страницы на вашем компьютере.

## Функция getColorData
Изображение копируется с помощью метода getImageData в myImage и обрабатывается путем перебора массива данных изображения и изменения значения альфа-разрядов на 128. Полной непрозрачности соответствует значение 255, а полной прозрачности — 0 (ноль). Массив для изображения размером 200 × 200 пикселей содержит 40 000 ячеек. Каждая ячейка содержит 4 байта данных, в результате чего общий размер массива составляет 160 000 байт. В программе цикл выполняется 160 000 раз. Каждый раз считывается 4 байта. В каждом проходе цикла четвертому байту присваивается значение 128. В результате все изображение становится полупрозрачным.
Примечание  Дополнительные сведения о цветах пикселей элемента Canvas см. в разделе Изменение цветов фотографий с помощью элемента Canvas.
 
## Функция putColorData
Эта функция записывает измененные данные изображения в элемент Canvas с помощью метода putImageData. Зачастую рекомендуется выполнять фактическую обработку второго изображения и отображать результат только после завершения обработки.
## Функция noPhoto
Эта функция вызывается, если элементу img не удается загрузить файл Kestral.png. Для пользователя выводится сообщение о том, что правильный файл не удалось загрузить.


## Создание рамок для фотографий
```
<!DOCTYPE html>
<html>
  
  <head>
    <script type="text/javascript">
    
      //Global variables
      var myImage = new Image(); // Create a new blank image.
      
      // Load the image and display it.
      function displayImage() {

        // Get the canvas element.
        canvas = document.getElementById("myCanvas");

        // Make sure you got it.
        if (canvas.getContext) {

          // Specify 2d canvas type.
          ctx = canvas.getContext("2d");

          // When the image is loaded, draw it.
          myImage.onload = function() {

            // Load the image into the context.
            ctx.drawImage(myImage, 0, 0);

            // Get and modify the image data.
            changeImage();
          }

          // Define the source of the image.
          myImage.src = "http://samples.msdn.microsoft.com/workshop/samples/canvas/kestral.png";
        }
      }

      function changeImage() {

        ctx.strokeStyle = "white";
        ctx.lineWidth = "100";
        ctx.beginPath();
        ctx.arc(100, 100, 150, 0, Math.PI * 2, true);
        ctx.closePath();
        ctx.stroke();
      }
    </script>
  </head>
  
  <body onload="displayImage()">
    <h1>
      American Kestral
    </h1>
    <p>
      The original image is on the left and the modified image is on the right.
    </p>
    <img id="myPhoto" src="http://samples.msdn.microsoft.com/workshop/samples/canvas/kestral.png">
    <canvas id="myCanvas" width="200" height="200">
    </canvas>
    <p>
      Public domain image courtesy of U.S. Fish and Wildlife Service.
    </p>
  </body>

</html>
```
## Основной код
В теге body программы используется функция onload для вызова функции displayImage при загрузке страницы. Исходное изображение пустельги загружается в тело, что позволяет сравнивать с ним изображение, которое будет изменено при помощи элемента Canvas. Тег canvas входит в тело программы. Указывается исходная ширина и высота полотна, а также атрибут id. Атрибут ID необходим для добавления элемента полотна в объектную модель страницы.
## Код сценария
Код сценария содержит две функции: displayImage и getColorData. Функция displayImage вызывается при загрузке страницы. Функция getColorData вызывается из функции displayImage. В начале раздела сценария создается глобальная переменная для создания пустого файла изображения, который будет использоваться позже.
## Функция displayImage
Эта функция вызывается при загрузке страницы. Она получает полотно при помощи ID элемента canvas в основном коде. Затем функция получает объект полотна CanvasRenderingContext2D, подготавливая его к обработке операциями рисования, и использует функцию DrawImage для загрузки изображения в контекст. После инициализации контекста как двухмерного полотна можно приступать к рисованию на полотне.
В завершение в функции указывается путь к источнику изображения. Поскольку загрузка изображения может занимать некоторое время, определяется событие, которое вызывает функцию по завершении загрузки. После того как изображение загружено, оно выводится на экран, а затем вызывается функция changeImage, которая завершает операции рисования.
## Функция changeImage
Изменение изображения путем создания окружности вокруг центра изображения выполняется при помощи метода arc. Размер изображения 200 × 200 пикселей. Радиус окружности — 150 пикселей. Поскольку центр окружности совпадает с центром изображения и граница окружности имеет толщину 100 пикселей, пиксели на внешних границах замещаются белым цветом. Окружность определяется при помощи свойств strokeStyle и lineWidth, а также методов beginPath, arc, closePath и stroke.

## Изменение цветов фотографий

```
<!DOCTYPE html>
<html>
  
  <head>
    <script type="text/javascript">
    
      //Global variables
      var picWidth = 200; // width of the canvas
      var picHeight = 200; // height of the canvas
      var picLength = picWidth * picHeight; // number of chunks
      var myImage = new Image(); // Create a new blank image.
      
      // Load the image and display it.
      function displayImage() {

        // Get the canvas element.
        canvas = document.getElementById("myCanvas");

        // Make sure you got it.
        if (canvas.getContext) {

          // Specify 2d canvas type.
          ctx = canvas.getContext("2d");

          // When the image is loaded, draw it.
          myImage.onload = function() {
            // Load the image into the context.
            ctx.drawImage(myImage, 0, 0);

            // Get and modify the image data.
            getColorData();

            // Put the modified image back on the canvas.
            putColorData();
          }

          // Define the source of the image.
          // This file must be on your machine in the same folder as this web page.
          myImage.src = "kestral.png";
        }
      }

      function getColorData() {

        myImage = ctx.getImageData(0, 0, 200, 200);

        // Loop through data.
        for (var i = 0; i < picLength * 4; i += 4) {

          // First bytes are red bytes.        
          // Remove all red.
          myImage.data[i] = 0;

          // Second bytes are green bytes.
          // Third bytes are blue bytes.
          // Fourth bytes are alpha bytes
        }
      }

      function putColorData() {

        ctx.putImageData(myImage, 0, 0);
      }
      
      function noPhoto() {
      
        alert("Please put a .png file in this folder and name it kestral.png.");
        
        }        

    </script>
  </head>
  
  <body onload="displayImage()">
    <h1>
      American Kestral
    </h1>
    <p>
      The original image is on the left and the modified image is on the right.
    </p>
    <img id="myPhoto" src="kestral.png" onerror="noPhoto()">
    <canvas id="myCanvas" width="200" height="200">
    </canvas>
    <p>
      Public domain image courtesy of U.S. Fish and Wildlife Service.
    </p>
  </body>

</html>
```
В теге body программы используется функция onload для вызова функции displayImage при загрузке страницы. Исходное изображение пустельги загружается в тег body, что позволяет сравнивать с ним изображение, которое будет изменено при помощи Canvas. Событие onerror добавляется в элемент img и определяет, загружено ли изображение. Элемент canvas входит в состав тега body. В этом теге указывается исходная ширина и высота элемента Canvas, а также атрибут id. Атрибут ID необходим для добавления элемента Canvas в объектную модель страницы.
## Код сценария
Код сценария содержит четыре функции: displayImage, getColorData, putColorData и noPhoto. Функция displayImage вызывается при загрузке страницы. Функции getColorData и putColorData вызываются из функции displayImage. Функция noPhoto вызывается, если при загрузке фотографии возникает ошибка. В начале раздела сценариев в коде создаются глобальные переменные для создания пустого файла изображения, который будет использоваться позже. Также создаются переменные, определяющие высоту и ширину элемента canvas. Кроме того, вычисляется длина массива изображения на основе числа 4-байтовых значений в массиве.
### Функция displayImage
Эта функция вызывается при загрузке страницы. Она получает элемент canvas при помощи ID элемента canvas в коде тега body. Затем получается объект CanvasRenderingContext2D Object элемента canvas, что позволяет подготовиться к отрисовке; для загрузки изображения в контекст используется функция DrawImage. После инициализации контекста как двумерного элемента canvas можно выполнить отрисовку.
Далее в функции указывается путь к источнику изображения. Поскольку загрузка изображения может занимать некоторое время, определяется событие, которое вызывает функцию по завершении загрузки. После того, как изображение загружено, оно отображается, и вызываются функции getColorData и putColorData, которые выполняют отрисовку.
В отличие от первых двух разделов этого руководства, изображение пустельги должно храниться на вашем компьютере. Вызов изображения из другого домена не поддерживается. Если источник пикселей для элемента canvas находится в другом домене, изображение рассматривается как угроза безопасности и не подлежит изменению. Дополнительные сведения об угрозах безопасности между доменами см. в документации по canvas. Для выполнения сценария можно использовать любой файл с именем kestral.png. Чтобы использовать исходное изображение пустельги, щелкните правой кнопкой мыши левое изображение в первом разделе этого сценария и выберите команду Save picture as .... Сохраните изображение в папку веб-страницы на вашем компьютере.
## Функция getColorData
Изображение копируется с помощью функции getImageData в объект myImage и обрабатывается перебором значений в массиве данных изображения и присвоения байтам, соответствующим красному цвету, нулевых значений. Массив для изображения размером 200 на 200 пикселей содержит 40 000 ячеек. Каждая ячейка содержит 4 байта данных, в результате чего общий размер массива составляет 160 000 байт. В программе цикл выполняется 160 000 раз. Каждый раз считывается 4 байта. В каждом проходе цикла первому байту присваивается нулевое значение. В результате из палитры изображения исключается красный цвет. Байты зеленого и синего цветов не изменяются.
Для чтения и записи пикселей на экране каждому пикселю необходимо присвоить цвет. Значение цвета состоит из четырех компонентов: красный, зеленый, синий и альфа-канал. Например, белый пиксель состоит из 100% красного, 100% зеленого, 100% синего и 100% альфа-канала. (Альфа-канал отражает степень прозрачности цвета.) Значение цвета для каждого пикселя в элементе canvas хранится в виде массива размером 4 байта. Все пиксели элемента canvas хранятся в одном массиве. Отсчет начинается с верхнего левого и заканчивается в правом нижнем углу. Размер массива определяется перемножением высоты элемента canvas на его ширину и на число 4 (размер массива для одного пикселя).
Четыре байта соответствуют процентным значениям красного, зеленого, синего цвета и альфа-канала для каждого пикселя. (Значения байтов находятся в диапазоне от 0 до 255 для десятичных чисел и от #0 до #FF для шестнадцатеричных.) В коде, приведенном в данном разделе, показано, как в мгновенном режиме Canvas выполняется запись цвета пикселей на экране.
## Функция putColorData
Эта функция записывает измененные данные изображения в элемент canvas с помощью метода putImageData. Зачастую рекомендуется выполнять фактическую обработку второго изображения и отображать результат только после завершения обработки.
## Функция noPhoto
Эта функция вызывается в том случае, если в элемент img не удается загрузить файл kestral.png. Отображается предупреждение о том, что не удалось загрузить нужный файл.

## Преобразование цветных фотографий в черно-белые
```
<!DOCTYPE html>
<html>
  
  <head>
    <script type="text/javascript">
    
      //Global variables
      var picWidth = 200; // width of the canvas
      var picHeight = 200; // height of the canvas
      var picLength = picWidth * picHeight; // number of chunks
      var myImage = new Image(); // Create a new blank image.
      
      // Load the image and display it.
      function displayImage() {

        // Get the canvas element.
        canvas = document.getElementById("myCanvas");

        // Make sure you got it.
        if (canvas.getContext) {

          // Specify 2d canvas type.
          ctx = canvas.getContext("2d");

          // When the image is loaded, draw it.
          myImage.onload = function() {
            // Load the image into the context.
            ctx.drawImage(myImage, 0, 0);

            // Get and modify the image data.
            getColorData();

            // Put the modified image back on the canvas.
            putColorData();
          }

          // Define the source of the image.
          // This file must be on your machine in the same folder as this web page.
          myImage.src = "kestral.png";
        }
      }

      function getColorData() {

        myImage = ctx.getImageData(0, 0, 200, 200);

        // Loop through data.
        for (var i = 0; i < picLength * 4; i += 4) {

          // First bytes are red bytes.        
          // Get red value.
          var myRed = myImage.data[i];

          // Second bytes are green bytes.
          // Get green value.
          var myGreen = myImage.data[i + 1];

          // Third bytes are blue bytes.
          // Get blue value.
          var myBlue = myImage.data[i + 2];

          // Fourth bytes are alpha bytes
          // We don't care about alpha here.
          // Add the three values and divide by three.
          // Make it an integer.
          myGray = parseInt((myRed + myGreen + myBlue) / 3);

          // Assign average to red, green, and blue.
          myImage.data[i] = myGray;
          myImage.data[i + 1] = myGray;
          myImage.data[i + 2] = myGray;
        }
      }

      function putColorData() {

        ctx.putImageData(myImage, 0, 0);
      }
      
      function noPhoto() {
      
        alert("Please put a .png file in this folder and name it kestral.png.");
        
        }
      
    </script>
  </head>
  
  <body onload="displayImage()">
    <h1>
      American Kestral
    </h1>
    <p>
      The original image is on the left and the modified image is on the right.
    </p>
    <img id="myPhoto" src="kestral.png" onerror="noPhoto()">
    <canvas id="myCanvas" width="200" height="200">
    </canvas>
    <p>
      Public domain image courtesy of U.S. Fish and Wildlife Service.
    </p>
  </body>

</html>
```
## Основной код
В теге body программы используется функция onload для вызова функции displayImage при загрузке страницы. Исходное изображение пустельги загружается в основную часть программы, чтобы можно было сравнивать с ним изображение, которое будет изменено при помощи элемента canvas. Событие onerror добавляется в элемент img и определяет, загружено ли изображение. Элемент canvas входит в основную часть программы. Указывается исходная ширина и высота элемента canvas, а также атрибут id. Атрибут ID необходим для добавления элемента полотна в объектную модель страницы.
## Код сценария
Код сценария содержит четыре функции: displayImage, getColorData, putColorData и noPhoto. Функция displayImage вызывается при загрузке страницы. Функции getColorData и putColorData вызываются из функции displayImage. Функция noPhoto вызывается в случае возникновения ошибки при загрузке фотографии. В начале раздела сценариев создаются глобальные переменные для создания пустого файла изображения, который будет использоваться позже. Также создаются переменные, определяющие высоту и ширину элемента canvas. Кроме того, вычисляется длина массива изображения, определяя число 4-байтовых значений в массиве.
### Функция displayImage
Эта функция вызывается при загрузке страницы. Она получает canvas, используя идентификатор (ID) элемента canvas в коде основной части программы. Затем получается объект CanvasRenderingContext2D Object элемента canvas, что позволяет подготовиться к отрисовке. Для загрузки изображения в контекст используется функция DrawImage. После инициализации контекста как двумерного элемента canvas можно выполнить отрисовку.
В завершение в функции указывается путь к источнику изображения. Поскольку загрузка изображения может занимать некоторое время, определяется событие, которое вызывает функцию по завершении загрузки. После загрузки изображения оно отображается, и вызываются функции getColorData и putColorData, которые завершают отрисовку.
В отличие от первых двух разделов этого руководства, здесь изображение пустельги должно храниться на вашем компьютере. Вызов изображения из другого домена не поддерживается. Если источник пикселей для элемента canvas находится в другом домене, изображение рассматривается как угроза безопасности и не подлежит изменению. Подробнее об угрозах безопасности между доменами см. в документации по canvas. Для выполнения сценария можно использовать любой файл с именем kestral.png. Чтобы использовать исходное изображение пустельги, щелкните правой кнопкой мыши левое изображение в первом разделе этого сценария и выберите команду Save picture as .... Сохраните изображение в папку веб-страницы на вашем компьютере.
## Функция getColorData
Изображение копируется с помощью метода getImageData в объект myImage и обрабатывается перебором значений в массиве данных изображения и получением значений первых трех байтов, соответствующих красному, зеленому и синему цвету (альфа-фактор не учитывается). Далее извлеченные значения складываются, а их сумма делится на три. Результат приводится к целому числу и записывается в значения соответствующих трех байтов. Это значение соответствует цветовому оттенку, но представляет оттенок серого от 0 до 255. В результате получается черно-белое изображение, которое выглядит, как исходное цветное.

 
### Функция putColorData
Эта функция записывает измененные данные изображения в элемент canvas с помощью метода putImageData. Зачастую рекомендуется выполнять фактическую обработку второго изображения и отображать результат только после завершения обработки.
## Функция noPhoto
Эта функция вызывается, если элемент img не может загрузить файл Kestral.png. Появляется оповещение, информирующее средство просмотра о том, что правильный файл не был загружен.


## Программирование игр


### Основной код
Функция drawGameCanvas вызывается при загрузке страницы. Тег canvas входит в тег body, и в нем указываются первоначальные ширина и высота, а также атрибут ID. Атрибут ID необходим для добавления элемента canvas в объектную модель страницы.
### Код сценария
Сценарный код имеет набор глобальных переменных и три функции: drawGameCanvas, drawBall и whatKey. Глобальные переменные инициализируются при загрузке страницы, а также функции drawGameCanvas. Функция drawBall вызывается ближе к концу выполнения функции drawGameCanvas и подключается к таймеру событий gameLoop. Функция drawBall вызывается каждые 16 миллисекунд. Третья функция, whatKey, подключается к прослушивателю событий и ожидает события keydown, которое активируется при каждом нажатии клавиши.
### Глобальные переменные
В этом разделе инициализируются несколько переменных, используемых в игре.
ballX и ballY определяют первоначальное положение мяча в центре площадки (150, 150).
ballDX и ballDy инициализируют первоначальную скорость изменения положения мяча.
boardX и boardY инициализируют высоту и ширину площадки (300 x 300).
paddleX определяет первоначальное положение ракетки по оси X (x сверху слева) (150).
paddleH определяет абсолютную высоту ракетки (10).
paddleD определяет первоначальное положение ракетки по оси Y (y сверху слева) (290).
paddleW определяет ширину ракетки (150).
canvas, ctx и gameLoop создаются как глобальные переменные и поэтому доступны из любого места в коде сценария.
### Функция drawGameCanvas
Эта функция вызывается при загрузке страницы. Она получает canvas, используя идентификатор элемента canvas в основном коде. Затем она получает контекст canvas и подготавливает его к рисованию.
Затем настраивается цикл игры с помощью вызова setInterval для функции drawBall. Эту функция вызывается каждые 16 миллисекунд. В большинстве игр есть цикл, который вызывается через определенные интервалы для воспроизведения анимаций.
И в завершение настраивается прослушиватель событий клавиатуры whatKey для обработки любых событий нажатий клавиш.
#### Функция drawBall
Эта функция вызывается по таймеру событий каждые 16 миллисекунд. При каждом вызове этой функции выполняются следующие функции:
Игровая площадка очищается и закрашивается. clearRect вызывается для очистки полотна, затем указывается цвет (бледно-лиловый). Определяется и закрашивается прямоугольный контур.
Мяч рисуется в текущем положении с указанием fillStyle, beginPath, arc, closePath и fill. Положение мяча определяется с помощью переменных ballX и ballY, которые будут изменяться в зависимости от столкновений со стенами и ракеткой.
Затем таким же образом рисуется ракетка, но с указанием paddleX, paddleD, paddleW и paddleH.
Местонахождение мяча изменяется для последующего рисования на основании изменений ballDX и ballDY. При этом предполагается, что мяч не попадает по краю или в ракетку.
Если мяч попадает в левый или правый край, восстанавливается предыдущее значение ballDX мяча и в результате он возвращается в противоположном направлении.
Если мяч попадает в верхний край, восстанавливается предыдущее значение ballDY мяча и в результате он возвращается в противоположном направлении.
Если мяч попадает в нижний край, выполняется проверка, не попал ли он в ракетку. Если это так, то восстанавливается предыдущее значение ballDY мяча и он возвращается. Однако если мяч попал в нижний край, но не в ракетку, игра окончена.
Если игра окончена, gameLoop очищается (мяч останавливается) и выводится сообщение об окончании игры.
Функция whatKey
### Функция whatKey настраивает прослушиватель событий таким образом, что он ожидает передачи данных события keydown с помощью оператора switch. Для этого он ищет два кода клавиш.
При нажатии стрелки влево распознается код клавиши 37 и значение paddleX ракетки уменьшается на 20 пикселей. Но если координаты левого края ракетки меньше нуля, она не будет перемещаться, поскольку значение ракетки будет равно 0 (нулю).
При нажатии стрелки вправо распознается код клавиши 39 и значение paddleX ракетки уменьшается на 20 пикселей. Но если координаты правого края ракетки больше, чем ширина площадки, ракетка не будет перемещаться, поскольку значение ракетки будет равно значению правого края площадки.

```
<!DOCTYPE html>
<html>
  
  <head>
    <script type="text/javascript">
      // Global variables.
      var ballX = 150; // Ball x position.
      var ballY = 150; // Ball y position.
      var ballDX = 2; // Change in ball x position.
      var ballDY = 4; // Change in ball y position.
      var boardX = 300; // Board width.
      var boardY = 300; // Board height.
      var paddleX = 150; // Initial paddle location.
      var paddleH = 10; // Paddle height.
      var paddleD = boardY - paddleH; // Paddle depth.
      var paddleW = 150; // Paddle width.
      var canvas; // Canvas element.
      var ctx; // Canvas context.
      var gameLoop; // Game loop time interval.
      // This function is called on page load.


      function drawGameCanvas() {

        // Get the canvas element.
        canvas = document.getElementById("gameBoard");

        // Make sure you got it.
        if (canvas.getContext) {
          // Specify 2d canvas type.
          ctx = canvas.getContext("2d");

          // Play the game until the ball stops.
          gameLoop = setInterval(drawBall, 16);

          // Add keyboard listener.
          window.addEventListener('keydown', whatKey, true);

        }
      }

      function drawBall() {

        // Clear the board.
        ctx.clearRect(0, 0, boardX, boardY);

        // Fill the board.
        ctx.fillStyle = "thistle";
        ctx.beginPath();
        ctx.rect(0, 0, boardX, boardY);
        ctx.closePath();
        ctx.fill();

        // Draw a ball.
        ctx.fillStyle = "tomato";
        ctx.beginPath();
        ctx.arc(ballX, ballY, 15, 0, Math.PI * 2, true);
        ctx.closePath();
        ctx.fill();

        // Draw the paddle.
        ctx.fillStyle = "navy";
        ctx.beginPath();
        ctx.rect(paddleX, paddleD, paddleW, paddleH);
        ctx.closePath();
        ctx.fill();

        // Change the ball location.
        ballX += ballDX;
        ballY += ballDY;

        // Bounce on a left or right edge.
        if (ballX + ballDX > boardX - 15 || ballX + ballDX < 15) ballDX = -ballDX;

        // If ball hits the top, bounce it. 
        if (ballY + ballDY < 15) ballDY = -ballDY;
        // If the ball hits the bottom, check see if it hits a paddle.
        else if (ballY + ballDY > boardY - 15) {
          // If the ball hits the paddle, bounce it.
          if (ballX > paddleX && ballX < paddleX + paddleW) ballDY = -ballDY;
          // Otherwise the game is over.
          else {
            clearInterval(gameLoop);
            alert("Game over!");
          }
        }
      }

      // Get key press.


      function whatKey(evt) {

        switch (evt.keyCode) {
          // Left arrow.
        case 37:
          paddleX = paddleX - 20;
          if (paddleX < 0) paddleX = 0;
          break;

          // Right arrow.
        case 39:
          paddleX = paddleX + 20;
          if (paddleX > boardX - paddleW) paddleX = boardX - paddleW;
          break;
        }
      }
    </script>
  </head>
  
  <body onload="drawGameCanvas()">
    <h1>
      Canvas Racquetball
    </h1>
    <div>
      <canvas id="gameBoard" width="300" height="300">
      </canvas>
    </div>
  </body>

</html>
```


spacegame.html

```
<!DOCTYPE html>
<html>
  
  <head>
    <script type="text/javascript">
      // Global variables
      var shipX = 0; // X position of ship
      var shipY = 0; // Y position of ship
      var canvas; // canvas
      var ctx; // context
      var back = new Image(); // storage for new background piece
      var oldBack = new Image(); // storage for old background piece
      var ship = new Image(); // ship
      var shipX = 0; // current ship position X
      var shipY = 0; // current ship position Y
      var oldShipX = 0; // old ship position Y
      var oldShipY = 0; // old ship position Y
      // This function is called on page load.


      function canvasSpaceGame() {

        // Get the canvas element.
        canvas = document.getElementById("myCanvas");

        // Make sure you got it.
        if (canvas.getContext)

        // If you have it, create a canvas user interface element.
        {
          // Specify 2d canvas type.
          ctx = canvas.getContext("2d");

          // Paint it black.
          ctx.fillStyle = "black";
          ctx.rect(0, 0, 300, 300);
          ctx.fill();

          // Save the initial background.
          back = ctx.getImageData(0, 0, 30, 30);

          // Paint the starfield.
          stars();

          // Draw space ship.
          makeShip();
        }

        // Play the game until the until the game is over.
        gameLoop = setInterval(doGameLoop, 16);

        // Add keyboard listener.
        window.addEventListener('keydown', whatKey, true);

      }

      // Paint a random starfield.


      function stars() {

        // Draw 50 stars.
        for (i = 0; i <= 50; i++) {
          // Get random positions for stars.
          var x = Math.floor(Math.random() * 299);
          var y = Math.floor(Math.random() * 299);

          // Make the stars white
          ctx.fillStyle = "white";

          // Give the ship some room by painting black stars.
          if (x < 30 || y < 30) ctx.fillStyle = "black";

          // Draw an individual star.
          ctx.beginPath();
          ctx.arc(x, y, 3, 0, Math.PI * 2, true);
          ctx.closePath();
          ctx.fill();

          // Save black background.
          oldBack = ctx.getImageData(0, 0, 30, 30);
        }
      }

      function makeShip() {

        // Draw saucer bottom.
        ctx.beginPath();
        ctx.moveTo(28.4, 16.9);
        ctx.bezierCurveTo(28.4, 19.7, 22.9, 22.0, 16.0, 22.0);
        ctx.bezierCurveTo(9.1, 22.0, 3.6, 19.7, 3.6, 16.9);
        ctx.bezierCurveTo(3.6, 14.1, 9.1, 11.8, 16.0, 11.8);
        ctx.bezierCurveTo(22.9, 11.8, 28.4, 14.1, 28.4, 16.9);
        ctx.closePath();
        ctx.fillStyle = "rgb(222, 103, 0)";
        ctx.fill();

        // Draw saucer top.
        ctx.beginPath();
        ctx.moveTo(22.3, 12.0);
        ctx.bezierCurveTo(22.3, 13.3, 19.4, 14.3, 15.9, 14.3);
        ctx.bezierCurveTo(12.4, 14.3, 9.6, 13.3, 9.6, 12.0);
        ctx.bezierCurveTo(9.6, 10.8, 12.4, 9.7, 15.9, 9.7);
        ctx.bezierCurveTo(19.4, 9.7, 22.3, 10.8, 22.3, 12.0);
        ctx.closePath();
        ctx.fillStyle = "rgb(51, 190, 0)";
        ctx.fill();

        // Save ship data.
        ship = ctx.getImageData(0, 0, 30, 30);

        // Erase it for now.
        ctx.putImageData(oldBack, 0, 0);

      }

      function doGameLoop() {

        // Put old background down to erase shipe.
        ctx.putImageData(oldBack, oldShipX, oldShipY);

        // Put ship in new position.
        ctx.putImageData(ship, shipX, shipY);

      }

      // Get key press.


      function whatKey(evt) {

        // Flag to put variables back if we hit an edge of the board.
        var flag = 0;

        // Get where the ship was before key process.
        oldShipX = shipX;
        oldShipY = shipY;
        oldBack = back;

        switch (evt.keyCode) {

          // Left arrow.
        case 37:
          shipX = shipX - 30;
          if (shipX < 0) {
            // If at edge, reset ship position and set flag.
            shipX = 0;
            flag = 1;
          }
          break;

          // Right arrow.
        case 39:
          shipX = shipX + 30;
          if (shipX > 270) {
            // If at edge, reset ship position and set flag.
            shipX = 270;
            flag = 1;
          }
          break;

          // Down arrow
        case 40:
          shipY = shipY + 30;
          if (shipY > 270) {
            // If at edge, reset ship position and set flag.
            shipY = 270;
            flag = 1;
          }
          break;

          // Up arrow 
        case 38:
          shipY = shipY - 30;
          if (shipY < 0) {
            // If at edge, reset ship position and set flag.
            shipY = 0;
            flag = 1;
          }
          break;

        }

        // If flag is set, the ship did not move.
        // Put everything back the way it was.
        if (flag) {
          shipX = oldShipX;
          shipY = oldShipY;
          back = oldBack;
        } else {
          // Otherwise, get background where the ship will go
          // So you can redraw background when the ship
          // moves again.
          back = ctx.getImageData(shipX, shipY, 30, 30);
        }
      }
    </script>
  </head>
  
  <body onload="canvasSpaceGame()">
    <h1>
      Canvas Space Game
    </h1>
    <canvas id="myCanvas" width="300" height="300">
    </canvas>
  </body>

</html>
```

## Код сценария
Код сценария содержит несколько блоков кода из первой задачи сценария, "Рисование фона и космического корабля". Однако в каждый блок внесены изменения и добавлено несколько новых блоков. В код сценария в данном примере входят следующие функции:
### Глобальные переменные
- Функция canvasSpaceGame
- Функция stars
- Функция makeShip
- Функция doGameLoop
- Функция whatKey
Глобальные переменные вызываются при загрузке страницы. Функция canvasSpaceGame вызывается из атрибута onload тега body. Остальные функции вызываются из функции canvasSpaceGame.
### Глобальные переменные
В этой программе глобальная переменная используется для данных, доступ к которым осуществляется из разных функций. Применяются переменные из следующего списка:
canvas и context — их можно сделать глобальными для большинства программ Canvas, поскольку они используются во многих функциях.
- back, oldBack — изображения, в которых хранятся новые и старые моментальные снимки фона размером 30 x 30 пикселей.
- ship — изображение, в котором хранятся пиксели, образующие космический корабль.
- shipX, shipY — координаты X и Y для космического корабля.
- oldShipX, oldShipY — координаты X и Y последнего положения космического корабля.
#### Функция canvasSpaceGame

Эта функция основана на одноименной функции из первой задачи сценария, "Рисование фона и космического корабля". В нее были внесены следующие изменения:

Создание моментального снимка 30 x 30 пикселей с помощью метода getImageData и сохранение его в переменной back. Эта переменная используется затем при перемещении корабля.

Вызов метода setInterval, который запускает функцию doGameLoop каждые 16 миллисекунд. Этот интервал будет отменен в конце игры с помощью метода gameLoop.
Настройка обработчика событий с помощью addEventListener. Он вызывает функцию whatKey каждый раз при возникновении события keydown.

#### Функция stars
Эта функция аналогична функции stars в первой задаче, "Рисование фона и космического корабля". Единственное отличие заключается в том, что в переменной изображения oldBack для последующего использования сохраняется моментальный снимок фона размером 30 x 30 пикселей.

### Функция makeShip
Эта функция аналогична функции makeShip в первой задаче сценария, "Рисование фона и космического корабля". Единственное отличие заключается в том, что в изображение ship для последующего использования сохраняется моментальный снимок корабля размером 30 x 30 пикселей.

##### Функция doGameLoop
Эта функция вызывается каждые 16 миллисекунд таймером gameLoop. Игровые циклы весьма обычны для игр, поскольку выполняют основные задачи анимации через одинаковые промежутки времени.

#### Игровой цикл вызывает две задачи анимации:
Erasing the ship — если корабль перемещается и оставляет после себя копию своего изображения на фоне, необходимо восстановить прежний фон. При этом используется метод putImageData. Если этого не сделать, при каждом перемещении корабля на экране будет оставаться его прежнее изображение. Чтобы стереть изображение ушедшего корабля и восстановить исходный фон, необходимо знать, что находилось под кораблем до перемещения, и скопировать это изображение.
Moving the ship — вы должны скопировать изображение корабля в новое положение. Поскольку при этом прежнее изображение будет затерто, необходимо заранее сохранить фон.

#### Функция whatKey
Эта функция вызывается при каждом нажатии клавиши. Она определяет, куда игрок хочет переместить корабль. Важно отметить, что само перемещение в этой функции не выполняется. Здесь следующий ход вычисляется, а отрисовка нового изображения корабля выполняется в функции doGameLoop.

#### Функция whatKey содержит следующие действия:
Для определения реакции на достижение кораблем края экрана используется флаг.
Перед перемещением корабля вы должны сохранить координаты X и Y его положения и фон под кораблем. Это нужно потому, что мгновенный режим не сохраняет пиксели на экране автоматически.

Затем оператор switch обрабатывает событие и выполняет поиск кода клавиши события. Коды клавиш соответствуют клавишам со стрелками для перемещения на клавиатуре.

Для каждого подходящего случая кода клавиши рассчитываются новые координаты X и Y. Если новое положение корабля должно выйти за пределы полотна, перемещение отменяется и устанавливается флаг.
Если флаг установлен, переменные корабля и фона возвращаются в исходное состояние.
Если флаг не установлен, применяется метод getImageData для сохранения текущего моментального снимка фона.

### Анимация Canvas
Canvas позволяет создавать анимацию двумя способами. Первый способ — это наиболее распространенный тип анимации, когда при каждом движении перерисовывается весь экран. Этот способ эффективен при малой площади полотна и быстром компьютере. Однако для больших экранов и более сложных типов анимации такой способ использовать не рекомендуется. Второй способ создания анимации в Canvas показан в примере кода в данном разделе. Этот способ рекомендуется для больших экранов и сложных типов анимации. Этот стиль анимации более прогрессивный. Хотя для его реализации требуется больше кода, он работает гораздо быстрее, чем традиционный стиль анимации. Высокая скорость работы достигается благодаря тому, что при каждом движении изменяется лишь несколько отдельных пикселей, а не весь экран. Приведенный в данном примере более быстрый стиль анимации состоит из перечисленных ниже этапов. Эти этапы повторяются в цикле для каждого движения.
Стирание корабля путем отрисовки поверх него моментального снимка прежнего фона размером 30 x 30 пикселей.
Получение нового моментального снимка фона, который будет закрыт при движении корабля.

##### Рисование корабля в новом положении.
Поскольку этот цикл выполняется каждые 16 миллисекунд, человеческий глаз не замечает исчезновения корабля, а видит только, как корабль перемещается. Это позволяет избежать мерцания изображения между перемещениями, поскольку каждый раз перерисовывается только небольшая часть экрана.

