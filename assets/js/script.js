let shoppingCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () =>{
    shoppingCart.classList.toggle('active');
}


var index=1;
changeimage = function()
{
    var imgs=["./assets/img/banner1.jpg","./assets/img/banner2.jpg","./assets/img/banner3.jpg","./assets/img/banner4.jpg","./assets/img/banner5.jpg","./assets/img/banner6.jpg"];
    document.getElementById('img').src = imgs[index];
    index++;
    if(index == 6)
    {
        index = 0;
    }
}
setInterval(changeimage,2000);


// var button1 = document.getElementById("btn1");
// var button2 = document.getElementById("btn2");
// var button3 = document.getElementById("btn3");

// var a = document.getElementById('btn1');
// var b = document.getElementById('btn2');
//  var c = document.getElementById('btn3');

// // Thiết lập click cho button 1
// button1.onclick = function () {
//     a.style.background = "red";
//     a.style.color = "white";
//     c.style.background = "none";
//     c.style.color = "black";
//     b.style.background = "none";
//     b.style.color = "black";
//     img.src="Picture/banner2.jpg";
// };

// // Thiết lập click cho button 2
// button2.onclick = function () {
//     b.style.background = "red";
//     b.style.color = "white";
//     a.style.background = "none";
//     a.style.color ="black";
//     c.style.background = "none";
//     c.style.color ="black";		

// };
//  button3.onclick = function () {
//     c.style.background = "red";
//     c.style.color = "white";
//     b.style.background = "none";
//     b.style.color ="black";
//     a.style.background = "none";
//     a.style.color ="black";
// };




const controls=document.querySelector(".controls");
const container=document.querySelector(".thumbnail-container");
const allBox=container.children;
const containerWidth=container.offsetWidth;
const margin=30;
var items=0;
var totalItems=0;
var jumpSlideWidth=0;


// item setup per slide

responsive=[
{breakPoint:{width:0,item:1}}, //if width greater than 0 (1 item will show) 
{breakPoint:{width:600,item:2}}, //if width greater than 600 (2  item will show) 
{breakPoint:{width:1000,item:4}} //if width greater than 1000 (4 item will show) 
]

function load(){
for(let i=0; i<responsive.length;i++){
if(window.innerWidth>responsive[i].breakPoint.width){
 items=responsive[i].breakPoint.item
}
}
start();
}

function start(){
var totalItemsWidth=0
for(let i=0;i<allBox.length;i++){
// width and margin setup of items
allBox[i].style.width=(containerWidth/items)-margin + "px";
allBox[i].style.margin=(margin/2)+ "px";
totalItemsWidth+=containerWidth/items;
totalItems++;
}

// thumbnail-container width set up
container.style.width=totalItemsWidth + "px";

// slides controls number set up
const allSlides=Math.ceil(totalItems/items);
const ul=document.createElement("ul");
for(let i=1;i<=allSlides;i++){
const li=document.createElement("li");
   li.id=i;
   li.innerHTML=i;
   li.setAttribute("onclick","controlSlides(this)");
   ul.appendChild(li);
   if(i==1){
       li.className="active";
   }
}
controls.appendChild(ul);
}

// when click on numbers slide to next slide
function controlSlides(ele){
// select controls children  'ul' element 
const ul=controls.children;

// select ul children 'li' elements;
const li=ul[0].children


var active;

for(let i=0;i<li.length;i++){
if(li[i].className=="active"){
   // find who is now active
   active=i;
   // remove active class from all 'li' elements
   li[i].className="";
}
}
// add active class to current slide
ele.className="active";

var numb=(ele.id-1)-active;
jumpSlideWidth=jumpSlideWidth+(containerWidth*numb);
container.style.marginLeft=-jumpSlideWidth + "px";
}

window.onload=load();





