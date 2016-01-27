<?php
 
// Get value of clicked button
$button = $_GET['button'];
 
// tables

$discont = array(
"Bike"=>array("Bike","The mug you've been dreaming about. One sip from this ceramic 16oz fluid delivery system and you'll never go back to red cups.",14,"/images/7.jpg",1,true,"2016 03 30"),
"Bow tie"=>array("Bow tie","These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",18,"/images/2.jpg",2,false,""),
"Bike Blue"=>array("Bike Blue","Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",16,"/images/9.jpg",3,false,""),
"Hat"=>array("Hat","Check it. Blacktocat is back with a whole new direction. He's exited stealth mode and is ready for primetime, now with a stylish logo.",25,"/images/4.jpg",4,true,"2016 03 30"),
"Bike Pink"=>array("Bike Pink","Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!",2,"/images/11.jpg",5,true,"2016 03 30"),
"Glasses"=>array("Glasses","Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",25,"/images/6.jpg",6,true,"2016 03 30"));

$clothes = array(
"Suit"=>array("Suit","The mug you've been dreaming about. One sip from this ceramic 16oz fluid delivery system and you'll never go back to red cups.",14,"/images/1.jpg",1,false,""),
"Bow tie"=>array("Bow tie","These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",18,"/images/2.jpg",2,false,""),
"Sweater"=>array("Sweater","Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",16,"/images/3.jpg",3,false,""),
"Hat"=>array("Hat","Check it. Blacktocat is back with a whole new direction. He's exited stealth mode and is ready for primetime, now with a stylish logo.",25,"/images/4.jpg",4,true,"2016 03 30"),
"Shoes"=>array("Shoes","Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!",2,"/images/5.jpg",5,false,""),
"Glasses"=>array("Glasses","Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",25,"/images/6.jpg",6,true,"2016 03 30"));

$bikes = array(
"Bike"=>array("Bike","The mug you've been dreaming about. One sip from this ceramic 16oz fluid delivery system and you'll never go back to red cups.",14,"/images/7.jpg",1,true,"2016 03 30"),
"Best Bike"=>array("Best Bike","These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",18,"/images/8.jpg",2,false,""),
"Bike Blue"=>array("Bike Blue","Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",16,"/images/9.jpg",3,false,""),
"Big Bike Blue"=>array("Bike Blue","Check it. Blacktocat is back with a whole new direction. He's exited stealth mode and is ready for primetime, now with a stylish logo.",25,"/images/10.jpg",4,false,""),
"Bike Pink"=>array("Bike Pink","Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!",2,"/images/11.jpg",5,true,"2016 03 30"),
"Best Pink Bike"=>array("Best Pink Bike","Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",25,"/images/12.jpg",6,false,""));


// Combine clothes and bikes tables into one multidimensional table
$stufftable = array(
  "clothes" => $clothes,
  "bikes" => $bikes,
);
 
// Finally depending on the button value, JSON encode our stufftable and print it
if ($button == "clothes") {
  print json_encode($clothes);
}
else if ($button == "bikes") {
  print json_encode($bikes);
}
else if ($button == "discont") {
  print json_encode($discont);
}
else {
  print json_encode($stufftable);
}
 
?>