

window.addEventListener("load", function(){
  colorTheTriangles();
});


//deal with facet reload trigger
(function($) {
  document.addEventListener('facetwp-loaded', function() {
    colorTheTriangles();
   });
})(jQuery);



function colorTheTriangles(){
  if(document.querySelectorAll('polygon')){
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
}