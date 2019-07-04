jQuery(document).ready(function($){

  // Foundation.
  $(document).foundation();

  // Smooth Scroll.
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
      || location.hostname == this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 50
        }, 1000);
        return false;
      }
    }
  });

  // Video Slick.
  $('.videos').slick({
    infinite: true,
    mobileFirst: true,
    arrows: false,
    dots: true,
    responsive: [
      {
        breakpoint: 640,
        settings: {
          slidesToShow: 3,
          centerMode: true,
        }
      }
    ]
  });

  // Sticky Nav.
  var nav = $('.page-nav-wrapper');
  var header = $('.page-header');
  var sticky = nav.offset().top;

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if ( scroll > sticky ) {
      nav.addClass('sticky');
      header.addClass('sticky');
    } else {
      nav.removeClass('sticky');
      header.removeClass('sticky');
    }
  });

});