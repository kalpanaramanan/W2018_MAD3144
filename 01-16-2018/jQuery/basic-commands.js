// Command to output things to the console
console.log("hello world!");
console.log(3+4/2);

var a = 25;
var b = "mark smith"
console.log(a);
console.log(b);

// making basic variables (string,int, double, boolean)
var cat = "hello"
var dog = 35;
var mouse = 2.415;
var rabbit = true;
var elephant = false;

console.log("----- COMPLEX VARIABLES -----");

// making more complicated variables (array, json dictionaries)
var c = [2, 5, 1, 3, 9];
var item = c[4];
var item2 = c[10];
console.log(item2);

var d = {
  "name":"mayuri",
  "gpa":2.7,
  "id":"C715023"
};
var item3 = d.mayuri;
console.log(d.gpa + 1.0);

console.log("----- SIMPLE IF STATEMENT -----");

// simple if statement in java
var price = 25
if (price > 10 ) {
  price = price - 20;
  console.log(price);
}

console.log("----- COMPLICATED IF STATEMENT -----");

// complicated if statement
var hour = 20;
if (hour < 12) {
  console.log("morning");
}
else if (hour > 1 && hour < 6) {
  console.log("afternoon");
}
else {
  console.log("evening");
}

console.log("----- FOR LOOPS -----");

// for loop
for (i = 0; i < 5; i++) {
    console.log("hello");
}

// looping through an array
var cars = ["toyota", "honda", "5 bangles", "mitsubishi"];
for (i = 0; i < cars.length; i++) {
  console.log(cars[i]);
}

var pokemon = ["pikachu", "squirtle", "charmander"];
pokemon.forEach(function(x){
  console.log("My favorite pokemon is: " + x);
})

console.log("----- FUNCTIONS -----");

// function with no paramater
function eating() {
  console.log("I like eating!");
}

// function with parameter
function triangle(base, height) {
  var area = base * height / 2;
  console.log("Area of your triangle is: " + area);
}

triangle(3, 4);
eating();
