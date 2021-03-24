window.onload = function() {
   if ( window.innerWidth > 1200) {      
      var s=skrollr.init({forceHeight: false});    
   }
};
$(document).ready(function(){
   
   $('.accordion').click(function(){
      if($(this).hasClass('active')){
         $(this).removeClass('active');
         $(this).next().slideUp();
      }
      else{
         $('.accordion.active').next().slideUp();
         $('.accordion.active').removeClass('active');
         $(this).addClass('active');
         $(this).next().slideDown();
      }
   })

   $('.myCollapse').click(function(){
      $('body').toggleClass('hidden');
      $('.overlay').toggleClass('in');
      $('nav .menu').toggleClass('in');
   });
   
   var navbar = $('nav');
   var stop = $(document).scrollTop();
   if(stop > 10){
      navbar.addClass('bg');
   }
   else{
      navbar.removeClass('bg');
   }
   var c = 0;
   var windowWidth = $(window).width();
   if(windowWidth > 991){
      $(document).scroll(function(){
         var s = $(document).scrollTop();
         $('.relative .back').css('background-position', s*0.1+'px ' + s*0.3+'px');
         $('.statistics').css('background-position', -s*0.1+'px ' + s*0.3+'px');
         $('.paragraph i').css('transform', 'rotate(' + s*0.3 + 'deg)');
         if(s > 10){
            navbar.addClass('bg');
         }
         else{
            navbar.removeClass('bg');
         }
         var a = s;
         var b = navbar.height();
         currentScrollTop = s;
         if (c < currentScrollTop && a > b) {
            navbar.addClass("scrollUp");
         } else if (c > currentScrollTop && !(a <= b)) {
            navbar.removeClass("scrollUp");
         }
         c = currentScrollTop;
      });
   }
   else{
      $(document).scroll(function(){
         var s = $(document).scrollTop();
         $('.relative .back').css('background-position', s*0.1+'px ' + s*0.3+'px');
         $('.statistics').css('background-position', s*0.1+'px ' + s*0.3+'px');
         $('.paragraph i').css('transform', 'rotate(' + s*0.1 + 'deg)');
         if(s > 10){
            navbar.addClass('bg');
         }
         else{
            navbar.removeClass('bg');
         }
      });
   }
   $('.services .service').each(function(i){
      $('.services .service .svg-icon').eq(i).children('svg').clone().appendTo($(this));
   });
   Waves.attach('.button', ['waves-button']);
   Waves.init();
   new WOW().init({offset: 60, mobile: false, delay: 1000});

   setTimeout(function(){
      $('.myalert').fadeOut(1000);
   }, 2000);
});