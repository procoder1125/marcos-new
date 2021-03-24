window.requestAnimFrame = (function () {
   return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (callback) {
     window.setTimeout(callback, 1000 / 60);
   };
 })();
 
 function Scene() {
   this.animation = undefined;
   this.canvas = undefined;
   this.height = 0;
   this.width = 0;
   this.context = undefined;
   this.paused = false;
 }
 Scene.prototype = {
   constructor: Scene,
   setup: function (canvas, animation, width, height) {
     this.canvas = canvas;
     this.animation = animation;
     this.height = this.canvas.height = height;
     this.width = this.canvas.width = width;
     this.canvas.style.marginTop = -(height/2)+'px';
     this.canvas.style.marginLeft = -(width/2+10)+'px';
     this.context = this.canvas.getContext('2d');
   },
   animate: function () {
    if (!this.paused) { requestAnimFrame(this.animate.bind(this));
                      }
     this.animation(this); 
   }
 };
 
 var scene = new Scene(),
   height = document.body.offsetHeight,
   width = document.body.offsetWidth;
particles = [];
var len = 10000;
  if($(window).width() < 991){
    len = 3000;
  }
//  Particle.destroy();
 function Particle(orbit) {
   this.x = 0;
   this.y = 0;
   this.size = 0;
   this.depth = 0;
   this.vy = 0;
   
   this.height = 0.05;
   this.width = 0.05;
   
 
   this.velocity = Math.floor((Math.random() * 24200) + 18500) ;
 
 
     var rands = [];
     rands.push(Math.random() * 100 + 1);
     rands.push(Math.random() * 10 + 241);
 
     var choice2 = Math.random() * 4;
     
     var rands2 = [];
     rands2.push(Math.random() * 100 + 1);
     rands2.push(Math.random() * 180 + 211);
     
     this.orbit = Math.random() * 5 + 1;
     this.distance = (rands.reduce(function(p, c) {
         return p + c;
     }, 0) / rands.length);
 
     this.distance2 = (rands2.reduce(function(p, c) {
         return p + c;
     }, 0) / rands2.length);
   
   
     this.increase = Math.PI * 2 / this.width;
 
     this.distancefix = this.distance;
     this.distance2fix = this.distance2;
     this.increase = Math.PI * 2 / this.width;
 
     this.distancefix = this.distance;
     this.distance2fix = this.distance2;
 
 
     this.bx = Math.random() * 20 + 1;
     this.by = Math.random() * 20 + 1;
 }
 Particle.prototype = {
   constructor: Particle,
   update: function (width, height) {
     
     //////////////////////// loop
     
     if (this.y > height) {
       this.y = 1 - this.size;
     }
     if (this.orbit >= 4) {
         this.x = this.bx + this.distance * Math.cos(this.angle / this.velocity) + window.innerWidth / 2;
         this.y = this.by + this.distance * Math.sin(this.angle / this.velocity) + window.innerHeight / 2;
       this.alpha = 93;
     } else {
         this.x = this.bx + this.distance2 * Math.cos(this.angle / this.velocity) + window.innerWidth / 2;
         this.y = this.by + this.distance2 * Math.sin(this.angle / this.velocity) + window.innerHeight / 2;
       this.alpha = 42;
     }
     this.angle += this.increase;
   }
 };
 for (var i = 0; i < len; i++) {
   let particle = new Particle();
   particle.x = 0;
   particle.y = 0;
   particle.depth = 0.05;
   
   particle.size = 0.005;
   particle.vy = (particle.depth * .25) + 1 / Math.random();
   particle.height = 0.05;
   particle.width = 0.05;
   
   particle.orbit = 3;
 
 
     particle.angle = (Math.PI * 2 / particle.width) * Math.floor((Math.random() * window.innerWidth*4) + 10);
     var choice = Math.random() * 5;
 
     var rands = [];
     rands.push(Math.random() * 100 + 1);
     rands.push(Math.random() * 10 + 241);
 
     var choice2 = Math.random() * 4;
     
     var rands2 = [];
     rands2.push(Math.random() * 100 + 1);
     rands2.push(Math.random() * 180 + 211);
     
     particle.orbit = Math.random() * 5 + 1;
     particle.distance = (rands.reduce(function(p, c) {
         return p + c;
     }, 0) / rands.length);
 
     particle.distance2 = (rands2.reduce(function(p, c) {
         return p + c;
     }, 0) / rands2.length);
   
   
     particle.increase = Math.PI * 2 / particle.width;
 
     particle.distancefix = particle.distance;
     particle.distance2fix = particle.distance2;
   
 if(particle.orbit <= 2){
   
   particle.velocity = Math.floor((Math.random() * 32200) + 24500) * particle.orbit;
   } else if(particle.orbit <= 4){
   particle.velocity = Math.floor((Math.random() * 32200) + 24500) * (particle.orbit / 2);
   } else{
     particle.velocity = Math.floor((Math.random() * 32200) + 24500);
   }
 
   particles.push(particle);
 }
 
 function falling_particles() {
   var idata = this.context.createImageData(this.width, this.height);
   for (var i = 0, l = particles.length; i < l; i++) {
     // thanks Loktar ;)
     var particle = particles[i];
     for (var w = 0; w < particle.size; w++) {
       for (var h = 0; h < particle.size; h++) {
         var pData = (~~(particle.x + w) + (~~(particle.y + h) * this.width)) * 4;
         
          idata.data[pData] = 255;
          idata.data[pData + 1] = 255;
          idata.data[pData + 2] = 255;  
         idata.data[pData + 3] = particle.alpha;
       }
     }
     particle.update(this.width, this.height);
   }
   this.context.putImageData(idata, 0, 0);
 }
 scene.setup(document.getElementById('orbit'), falling_particles, width, height, !0);
 scene.animate();
 
 window.onresize = function () {
   height = scene.height = scene.canvas.height = window.innerHeight;
   width = scene.width = scene.canvas.width = window.innerWidth;
   scene.canvas.style.marginTop = -(window.innerHeight/2)+'px';
   scene.canvas.style.marginLeft = -(window.innerWidth/2+10)+'px';
 };
 window.onload = function () {
   height = scene.height = scene.canvas.height = window.innerHeight;
   width = scene.width = scene.canvas.width = window.innerWidth;
   scene.canvas.style.marginTop = -(window.innerHeight/2)+'px';
   scene.canvas.style.marginLeft = -(window.innerWidth/2+10)+'px';
 };
 