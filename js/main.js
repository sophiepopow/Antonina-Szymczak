
// var button = document.getElementsByClassName('jsMenuButton');

var button = document.querySelector('.jsMenuButton');
var menu = document.querySelector('.jsMenu');

button.addEventListener('click', function(){
  console.log('klikniecie');
  menu.classList.toggle('menu-open');
})
console.log(button);
