

window.addEventListener("load", function(){
    console.log('tri tri tri loaded')
if(document.querySelectorAll('polygon')){
  console.log('tri tri tri')
  const paths = document.querySelectorAll('polygon');

  paths.forEach((path) => {
    const color = randomColor();
    path.classList.add(color)
    });

  function randomColor(){
    const classes = ['red','green','blue','yellow','black']
    const number = Math.floor(Math.random()*classes.length);
    return classes[number]
  }
}
});