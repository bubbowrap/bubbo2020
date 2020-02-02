//------------------------------------------
// 	 AOS
//------------------------------------------

AOS.init({
    once: true,
    duration: 1200
});


$(document).ready(function() {

//------------------------------------------
// 	 Scroll Jump To
//------------------------------------------

    'use strict';

    // changes how jump to works depending if you're on the homepage or not
    if ($("body").hasClass("home")) {
        $('a[href^="/#"]').click(function(e) {
        // Prevent the jump and the #hash from appearing on the address bar
        e.preventDefault();
        $(window).stop(true).scrollTo(this.hash, {duration:700, interrupt:true});
    });
    }
    else {
        $('a[href^="#"]').click(function(e) {
            // Prevent the jump and the #hash from appearing on the address bar
            e.preventDefault();
            $(window).stop(true).scrollTo(this.hash - 200, {duration:1000, interrupt:true});
        });
    }

     //------------------------------------------
    // 	 Mobile Menu
    //------------------------------------------

    //toggles active states of overlay/hamburger menu/menu
    $(".hamburger, .overlay, .navigation-mobile__list-item").click(function(){
        $(".hamburger").toggleClass("is-active");
      $('body').toggleClass("no-scroll");
      $(".navigation-mobile").toggleClass("is-active");
      $(".overlay").toggleClass("is-active");
    });

    //------------------------------------------
    // 	 Sticky Header
    //------------------------------------------

    //sticky header, shows on scroll up hides on scroll down
    var c, currentScrollTop = 0,
        navbar = $('.site-header');
 
    $(window).scroll(function () {
       var a = $(window).scrollTop();
       var b = navbar.height();
      
       currentScrollTop = a;
        //adjust navbar height on scroll
       if (a >= 50) {
           navbar.addClass("is-active");
       } else {
           navbar.removeClass("is-active");
       }
       if (c + 5 < currentScrollTop && a > b + b) {
         navbar.addClass("is-hidden");
       } else if (c > currentScrollTop && !(a <= b)) {
         navbar.removeClass("is-hidden");
       }
       c = currentScrollTop;
   });
   



  });

