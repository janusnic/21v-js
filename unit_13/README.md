# 21v-js

JSON
=====

Объект JSON содержит методы для разбора объектной нотации JavaScript (JavaScript Object Notation — сокращённо JSON) и преобразования значений в JSON. Его нельзя вызвать как функцию или сконструировать как объект, и кроме своих двух методов он не содержит никакой интересной функциональности.

Объектная нотация JavaScript
----------------------------
JSON является синтаксисом для сериализации объектов, массивов, чисел, строк логических значений и значения null. Он основывается на синтаксисе JavaScript, однако всё же отличается от него: не каждый код на JavaScript является JSON, и не каждый JSON является кодом на JavaScript.

Различия между JavaScript и JSON
--------------------------------

Объекты и массивы   
------------------
Имена свойств должны быть строками, заключёнными в двойные кавычки; конечные запятые запрещены.

Числа
------
Ведущие нули запрещены; перед десятичной запятой обязательно должна быть хотя бы одна цифра.
Строки
-------  
Только ограниченный набор символов может быть заэкранирован; некоторые управляющие символы запрещены; разрешены юникодные символы разделительной линии (U+2028) и разделительного параграфа (U+2029); строки должны быть заключены в двойные кавычки. 
```
var code = '"\u2028\u2029"';
JSON.parse(code); // работает
```
Формат JSON
============
Данные в формате JSON (RFC 4627 http://tools.ietf.org/html/rfc4627) представляют собой:

1. JavaScript-объекты { ... } или
2. Массивы [ ... ] или
3. Значения одного из типов:
- строки в двойных кавычках,
- число,
- логическое значение true/false,
- null.
Почти все языки программирования имеют библиотеки для преобразования объектов в формат JSON.

1  Объекты и массивы   
--------------------
```
<div id="placeholder"></div>

<script>
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

    document.getElementById("placeholder").innerHTML=products.Glasses[1];

```

placeholder1
------------
```
<div id="placeholder1"></div>

document.getElementById("placeholder1").innerHTML=products['Glasses'][1];
```
placeholder2
------------
```
<div id="placeholder2"></div>

document.getElementById("placeholder2").innerHTML=products['Glasses'][0] +' '+ products['Glasses'][1] +' Best Price: '+ products['Glasses'][2] ;
```
placeholder3
------------
```
<div id="placeholder3"></div>

var output="<ul>";
    
        output+="<li>" + products.Glasses[0] + " " + products.Glasses[1] + "--" + products.Glasses[2]+ ' <img src=' + products.Glasses[3]+'>'+ "</li>";
    
    output+="</ul>";

    document.getElementById("placeholder3").innerHTML=output;
```
placeholder4
------------
```
<div id="placeholder4"></div>


    var output="<ul>";

    for (var i in products) {
        console.log(i);
        output+="<li>" + i +'>'+ "</li>";
    }    
    output+="</ul>";
    document.getElementById("placeholder4").innerHTML=output;

```
placeholder5
-------------
```
<div id="placeholder5"></div>

var output="<ul>";
//for (var i in Object.keys(products)) {
for (var i in products) {
    console.log(i);
    var product = products[i];
    console.log(products[i]);

    output+="<li>" + product[0] + " " + product[1] + "--" + product[2]+ ' <img src=' + product[3]+'>'+ "</li>";
}    
    output+="</ul>";

    document.getElementById("placeholder5").innerHTML=output;

```

Основные методы для работы с JSON в JavaScript
-----------------------------------------------
1. JSON.parse – читает объекты из строки в формате JSON.
2. JSON.stringify – превращает объекты в строку в формате JSON, используется, когда нужно из JavaScript передать данные по сети.

Метод JSON.parse
----------------
Вызов JSON.parse(str) превратит строку с данными в формате JSON в JavaScript-объект/массив/значение.

```
var numbers = "[0, 1, 2, 3]";

numbers = JSON.parse(numbers);

alert( numbers[1] ); // 1
```

Данные могут быть сколь угодно сложными, объекты и массивы могут включать в себя другие объекты и массивы. Главное чтобы они соответствовали формату.

JSON-объекты ≠ JavaScript-объекты
----------------------------------
```
{
  name: "Вася",       // ошибка: ключ name без кавычек!
  "surname": 'Петров',// ошибка: одинарные кавычки у значения 'Петров'!
  "age": 35,           // .. а тут всё в порядке.
  "isAdmin": false    // и тут тоже всё ок
}
```
Кроме того, в формате JSON не поддерживаются комментарии. Он предназначен только для передачи данных.

JSON.parse()
=============

Метод JSON.parse() разбирает строку JSON, возможно с преобразованием получаемого в процессе разбора значения.

Пример: использование метода JSON.parse()
-----------------------------------------
```
JSON.parse('{}');              // {}
JSON.parse('true');            // true
JSON.parse('"foo"');           // "foo"
JSON.parse('[1, 5, "false"]'); // [1, 5, "false"]
JSON.parse('null');            // null

```
1 Метод JSON.parse
-------------------
```
var prodstr = '{"Suit":["Suit","The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.",14,"../images/1.jpg",1],"Bow tie":["Bow tie","These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",18,"../images/2.jpg",2],"Sweater":["Sweater","Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",16,"../images/3.jpg",3],"Hat":["Hat","Check it. Blacktocat is back with a whole new direction. He\'s exited stealth mode and is ready for primetime, now with a stylish logo.",25,"../images/4.jpg",4],"Shoes":["Shoes","Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!",2,"../images/5.jpg",5],"Glasses":["Glasses","Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",25,"../images/6.jpg",6]}';
products = JSON.parse(prodstr);

console.log( products['Bow tie'][1] ); 

```


1 Happy Shopping
----------------
```
 <header>
    <a class='logo' href='#'>
      Happy <span class="brandico-github"></span> Shopping
    </a>
       <a class='logo' href='#' id='prod1'>
      Stuff <span class="brandico-github"></span> Shopping
    </a>
       <a class='logo' href='#' id='prod2'>
      Bikes <span class="brandico-github"></span> Shopping
    </a>
    
...
   for (var item in products) {
        var itemName = products[item][0], 
            itemDescription = products[item][1], 
            itemPrice = products[item][2], 
            itemImg = products[item][3], 
            itemId = products[item][4], 
        
            $template = $($('#productTemplate').html());
        
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

  </header>
```
2 init(products)
----------------
```
$('#prod1').on('click',function(){
    
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
    init(products);
  }); 
 function init(products){
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
  }

```

3 $shop.empty()
----------------
```
$('#prod2').on('click',function(){
    $shop.empty();
    var products = {
```
4 #prod0
---------
```
$('#prod0').on('click',function(){
    $shop.empty();

    init(products);
  });
```

5 banner
---------
```
.banner {
  font-family: Raleway;
  font-size: 1.5vw;
  text-align: center;
  display: block;
  width: 10vw;
  margin: 0 auto;
  padding: 0.9vw 1vw 0.8vw;
  background: tomato;
  color: white;
  text-shadow: 0 2px rgba(0, 0, 0, 0.3);
  position: relative;
}


<script id='productTemplate' type='text/template'>
  <div class="product">
  <h2></h2>
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

var products = {
        'Bike': [
            'Bike',
            'The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.',
            14,
            '../images/7.jpg',
            1,
            true
        ],
function init(products){
    for (var item in products) {
    
        var itemName = products[item][0], 
            itemDescription = products[item][1], 
            itemPrice = products[item][2], 
            itemImg = products[item][3], 
            itemId = products[item][4], 
            itemDc = products[item][5], 
        $template = $($('#productTemplate').html());
        if(itemDc){
            $template.find('h2').text('BEST PRICE');
            $template.find('h2').addClass('banner');

        }
        
        // itemPriceDc = (itemDc)?itemPrice*0.7:itemPrice;
        itemPriceDc = (itemDc)?(itemPrice*0.7).toFixed(2):itemPrice;
        $template.find('h1').text(itemName);
        $template.find('p').text(itemDescription);
        $template.find('.price').text('$' + itemPriceDc);
        (itemDc)?$template.find('.discont').text('$' + itemPrice):'';
        $template.css('background-image', 'url(' + itemImg + ')');
        $template.data('id', itemId);
        $template.data('name', itemName);
        $template.data('price', itemPrice);
        $template.data('discont', itemDc);
        $template.data('image', itemImg);
        $shop.append($template);
    }
  }
```

JSON.parse(str, reviver)
-------------------------
Метод JSON.parse поддерживает и более сложные алгоритмы разбора.

Например, мы получили с сервера объект с данными события event.
дата события
------------
```
var prodstr =  {"Bike": [
            "Bike",
            "The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.",
            14,
            "../images/7.jpg",
            1,
            true,
            "2016-02-30T12:00:00.000Z"
        ],
    }
```

Попробуем вызвать для этого JSON.parse:
```
products = JSON.parse(prodstr);

console.log( products['Bike'][6] ); // 2016-02-30T12:00:00.000Z
console.log( products['Bike'][6].getDate() ) ); // ошибка! 
```
Для восстановления из строки у JSON.parse(str, reviver) есть второй параметр reviver, который является функцией function(key, value).

Если она указана, то в процессе чтения объекта из строки JSON.parse передаёт ей по очереди все создаваемые пары ключ-значение и может возвратить либо преобразованное значение, либо undefined, если его нужно пропустить.
2.html
------
```
var prodstr = '{"Suit":["Suit","The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.",14,"../images/1.jpg",1],"Bow tie":["Bow tie","These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",18,"../images/2.jpg",2],"Sweater":["Sweater","Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",16,"../images/3.jpg",3],"Hat":["Hat","Check it. Blacktocat is back with a whole new direction. He\'s exited stealth mode and is ready for primetime, now with a stylish logo.",25,"../images/4.jpg",4],"Shoes":["Shoes","Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!",2,"../images/5.jpg",5],"Glasses":["Glasses","Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",25,"../images/6.jpg",6,true,"2016 03 30"]}';
var products = JSON.parse(prodstr);

console.log( products['Glasses'][6] ); // 2016 03 30

var products = JSON.parse(prodstr, function(key, value) {
  if (key == 6) return new Date(value);
  return value;
});

console.log( products['Glasses'][6]); //Wed Mar 30 2016 00:00:00 GMT+0300 (EEST)

/**/
products['Glasses'][6] = new Date(products['Glasses'][6]); //Wed Mar 30 2016 00:00:00 GMT+0300 (EEST)

console.log( products['Glasses'][6]);
console.log( products['Glasses'][6].getDate() ); // 30!

```

6.html
-------

```
$(document).ready(function () {
    var $shop = $('.shop');
    var $cart = $('.cart-items');

    var product0 = '{"Bike":["Bike","The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.",14,"../images/7.jpg",1,true,"2016 03 30"],"Bow tie":["Bow tie","These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",18,"../images/2.jpg",2,false,""],"Bike Blue":["Bike Blue","Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",16,"../images/9.jpg",3,false,""],"Hat":["Hat","Check it. Blacktocat is back with a whole new direction. He\'s exited stealth mode and is ready for primetime, now with a stylish logo.",25,"../images/4.jpg",4,true,"2016 03 30"],"Bike Pink":["Bike Pink","Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!",2,"../images/11.jpg",5,true,"2016 03 30"],"Glasses":["Glasses","Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",25,"../images/6.jpg",6,true,"2016 03 30"]}';
    
    var product1 = '{"Suit":["Suit","The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.",14,"../images/1.jpg",1,false,""],"Bow tie":["Bow tie","These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",18,"../images/2.jpg",2,false,""],"Sweater":["Sweater","Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",16,"../images/3.jpg",3,false,""],"Hat":["Hat","Check it. Blacktocat is back with a whole new direction. He\'s exited stealth mode and is ready for primetime, now with a stylish logo.",25,"../images/4.jpg",4,true,"2016 03 30"],"Shoes":["Shoes","Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!",2,"../images/5.jpg",5,false,""],"Glasses":["Glasses","Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",25,"../images/6.jpg",6,true,"2016 03 30"]}';
    
    var product2 = '{"Bike":["Bike","The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.",14,"../images/7.jpg",1,true,"2016 03 30"],"Best Bike":["Best Bike","These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",18,"../images/8.jpg",2,false,""],"Bike Blue":["Bike Blue","Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",16,"../images/9.jpg",3,false,""],"Big Bike Blue":["Bike Blue","Check it. Blacktocat is back with a whole new direction. He\'s exited stealth mode and is ready for primetime, now with a stylish logo.",25,"../images/10.jpg",4,false,""],"Bike Pink":["Bike Pink","Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!",2,"../images/11.jpg",5,true,"2016 03 30"],"Best Pink Bike":["Best Pink Bike","Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",25,"../images/12.jpg",6,false,""]}';
    
  init(JSON.parse(product0));
    
  $('#prod0').on('click',function(){
      $shop.empty();
      init(JSON.parse(product0));
  });
  
  $('#prod1').on('click',function(){
    $shop.empty();
    init(JSON.parse(product1));
  });
  
  $('#prod2').on('click',function(){
    $shop.empty();
    init(JSON.parse(product2));
  });
  
  function init(products){
    for (var item in products) {
    
        var itemName = products[item][0], 
            itemDescription = products[item][1], 
            itemPrice = products[item][2], 
            itemImg = products[item][3], 
            itemId = products[item][4], 
            itemDc = products[item][5], 
        $template = $($('#productTemplate').html());
        if(itemDc){
            $template.find('h2').text('BEST PRICE');
            $template.find('h2').addClass('banner');

        }
        
        itemPriceDc = (itemDc)?(itemPrice*0.7).toFixed(2):itemPrice;
        $template.find('h1').text(itemName);
        $template.find('p').text(itemDescription);
        $template.find('.price').text('$' + itemPriceDc);
        (itemDc)?$template.find('.discont').text('$' + itemPrice):'';
        $template.css('background-image', 'url(' + itemImg + ')');
        $template.data('id', itemId);
        $template.data('name', itemName);
        $template.data('price', itemPrice);
        $template.data('discont', itemDc);
        $template.data('image', itemImg);
        $shop.append($template);
    }
  }
});

```
Основы XMLHttpRequest
=====================
Объект XMLHttpRequest (XHR) дает возможность из JavaScript делать HTTP-запросы к серверу без перезагрузки страницы.

Несмотря на слово XML в названии, XMLHttpRequest может работать с любыми данными, а не только с XML.

Как правило, XMLHttpRequest используют для загрузки данных.

пример использования, который загружает файл test.txt из текущей директории и выдаёт его содержимое:

```
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>

  <button onclick="loadTest()">Загрузить test.txt!</button>

  <script>
    function loadTest() {
      var xhr = new XMLHttpRequest();

      xhr.open('GET', 'test.txt', false);
      xhr.send();

      if (xhr.status != 200) {
        // обработать ошибку
        alert('Ошибка ' + xhr.status + ': ' + xhr.statusText);
      } else {
        // вывести результат
        alert(xhr.responseText);
      }
    }
  </script>

</body>

</html>

```

метод open
----------
Синтаксис:
```
xhr.open(method, URL, async, user, password)
```
Этот метод — вызывается первым после создания объекта XMLHttpRequest.

Задаёт основные параметры запроса:
----------------------------------
- method — HTTP-метод. Как правило, используется GET либо POST, хотя доступны и более экзотические, вроде TRACE/DELETE/PUT и т.п.
- URL — адрес запроса. Можно использовать не только http/https, но и другие протоколы, например ftp:// и file://.
При этом есть ограничения безопасности, называемые «Same Origin Policy»: запрос со страницы можно отправлять только на тот же протокол://домен:порт, с которого она пришла. 

- async — если установлено в false, то запрос производится синхронно, если true — асинхронно.
«Синхронный запрос» означает, что после вызова xhr.send() и до ответа сервера главный поток будет «заморожен»: посетитель не сможет взаимодействовать со страницей — прокручивать, нажимать на кнопки и т.п. После получения ответа выполнение продолжится со следующей строки.

«Асинхронный запрос» означает, что браузер отправит запрос, а далее результат нужно будет получить через обработчики событий, которые мы рассмотрим далее.

- user, password — логин и пароль для HTTP-авторизации, если нужны.

Вызов open не открывает соединение
-----------------------------------
Он лишь настраивает запрос, а коммуникация инициируется методом send.

Отослать данные: send
---------------------
Синтаксис:
```
xhr.send([body])
```
Именно этод метод открывает соединение и отправляет запрос на сервер.

В body находится тело запроса. Не у всякого запроса есть тело, например у GET-запросов тела нет, а у POST — основные данные как раз передаются через body.

Отмена: abort
--------------
Вызов xhr.abort() прерывает выполнение запроса.

Ответ: status, statusText, responseText
-----------------------------------------
Основные свойства, содержащие ответ сервера:

- status
HTTP-код ответа: 200, 404, 403 и так далее. Может быть также равен 0, если сервер не ответил или при запросе на другой домен.
- statusText
Текстовое описание статуса от сервера: OK Not Found, Forbidden и так далее.
- responseText
Текст ответа сервера.
- responseXML
Если сервер вернул XML, снабдив его правильным заголовком Content-type: text/xml, то браузер создаст из него XML-документ. По нему можно будет делать запросы xhr.responseXml.querySelector("...") и другие.
Оно используется редко, так как обычно используют не XML, а JSON. То есть, сервер возвращает JSON в виде текста, который браузер превращает в объект вызовом JSON.parse(xhr.responseText).

Синхронные и асинхронные запросы
---------------------------------
Если в методе open установить параметр async равным false или просто забыть его указать, то запрос будет синхронным.

Синхронные вызовы используются чрезвычайно редко, так как блокируют взаимодействие со страницей до окончания загрузки. Посетитель не может даже прокручивать её. Никакой JavaScript не может быть выполнен, пока синхронный вызов не завершён — в общем, в точности те же ограничения как alert.
```
// Синхронный запрос
xhr.open('GET', 'test.txt', false);

// Отсылаем его
xhr.send();
// ...весь JavaScript "подвиснет", пока запрос не завершится
```
Если синхронный вызов занял слишком много времени, то браузер предложит закрыть «зависшую» страницу.

Из-за такой блокировки получается, что нельзя отослать два запроса одновременно. Кроме того ряд продвинутых возможностей, таких как возможность делать запросы на другой домен и указывать таймаут, в синхронном режиме не работают.

Для того, чтобы запрос стал асинхронным, укажем параметр async равным true.

2.html:

```
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>

  <button  id="button" onclick="loadTest()">Загрузить test.txt!</button>

  <script>
    function loadTest() {
      var xhr = new XMLHttpRequest();

      xhr.open('GET', 'test.txt', true);
      xhr.send(); // (1)

      xhr.onreadystatechange = function() { // (3)
          if (xhr.readyState != 4) return;

          button.innerHTML = 'Готово!';

          if (xhr.status != 200) {
            // обработать ошибку
            alert('Ошибка ' + xhr.status + ': ' + xhr.statusText);
          } else {
            // вывести результат
            alert(xhr.responseText);
          }

        }
      button.innerHTML = 'Загружаю...'; //2
      button.disabled = true;

    }
  </script>

</body>
</html>

```

Если в open указан третий аргумент true, то запрос выполняется асинхронно. Это означает, что после вызова xhr.send() код не «зависает», а преспокойно продолжает выполняться.

Событие readystatechange
------------------------
Событие readystatechange происходит несколько раз в процессе отсылки и получения ответа. При этом можно посмотреть «текущее состояние запроса» в свойстве xhr.readyState.

## Все состояния, по спецификации:
```
const unsigned short UNSENT = 0; // начальное состояние
const unsigned short OPENED = 1; // вызван open
const unsigned short HEADERS_RECEIVED = 2; // получены заголовки
const unsigned short LOADING = 3; // загружается тело (получен очередной пакет данных)
const unsigned short DONE = 4; // запрос завершён
```
json
-----
3.html
```
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>

  <button onclick="loadPhones()" id="button">Загрузить phones.json!</button>
  <script>
    function loadPhones() {

      // 1. Создаём новый объект XMLHttpRequest
      var xhr = new XMLHttpRequest();

      // 2. Конфигурируем его: GET-запрос на URL 'phones.json'
      xhr.open('GET', 'phones.json', true);


      // 3. Отсылаем запрос
      xhr.send();


      xhr.onreadystatechange = function() {
        if (xhr.readyState != 4) return;

        button.innerHTML = 'Готово!';

        // 4. Если код ответа сервера не 200, то это ошибка
        if (xhr.status != 200) {
          // обработать ошибку
          alert(xhr.status + ': ' + xhr.statusText);
        } else {
          // вывести результат
          alert(xhr.responseText);
        }

      }

      button.innerHTML = 'Загружаю...';
      button.disabled = true;
    }
  </script>

</body>

</html>
```

index.html
----------
```
  $(document).ready(function () {
    var $shop = $('.shop');
    var $cart = $('.cart-items');
    

    var xmlhttp = new XMLHttpRequest();
    var url = "data0.json";

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var product0 = xmlhttp.responseText;
 
            console.log(JSON.parse(product0));
            init(JSON.parse(product0));  
          }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();


  $('#prod0').on('click',function(){
      $shop.empty();
      var url = "data0.json";

      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var product = xmlhttp.responseText;
 
            init(JSON.parse(product));  
          }
      };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  });
  
  $('#prod1').on('click',function(){
    $shop.empty();
      var url = "data1.json";

      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var product = xmlhttp.responseText;
 
            init(JSON.parse(product));  
          }
      };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

  });
  
  $('#prod2').on('click',function(){
    $shop.empty();
      var url = "data2.json";

      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var product = xmlhttp.responseText;
 
            init(JSON.parse(product));  
          }
      };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

  });


```

Refactoring
------------
```
 $(document).ready(function () {
    var $shop = $('.shop');
    var $cart = $('.cart-items');

    var xmlhttp = new XMLHttpRequest();

    var url = "data0.json";
    getDate(url);

  $('#prod0').on('click',function(){
      var url = "data0.json";
      getDate(url);
  });
  
  $('#prod1').on('click',function(){

      var url = "data1.json";
      getDate(url);
  });
  
  $('#prod2').on('click',function(){
    var url = "data2.json";
    getDate(url);
  });

  function getDate(url){
    $shop.empty();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var product = xmlhttp.responseText;
 
            init(JSON.parse(product));  
          }
      };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
  }
  
```
