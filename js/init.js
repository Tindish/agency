//MEDIA QUERIES
const media_xs = window.matchMedia( "(max-width: 575.98px)" );
const media_sm = window.matchMedia( "(max-width: 767.98px)" );
const media_md = window.matchMedia( "(max-width: 991.98px)" );
const media_lg = window.matchMedia( "(max-width: 1199.98px)" );


$(document).ready(function () {

  if (document.cookie.indexOf('cookies=true') == -1) {
    var c = $('<div class="cookies"><span>By using this website you are consenting to us using cookies to enhance your experience</span><div><a>OK</a></div></div>');
    c.find('a').click(function () {
      c.hide();
      document.cookie = 'cookies=true;'
    });
    $('body').append(c);
  }

});


//ACTIVE CLASS TOGGLER
$('.navbar-nav .nav-link').click(function(){
  $('.navbar-nav .nav-link').removeClass('active');
  $(this).addClass('active');
})

//CHANGING FIXED NAVBAR HEIGHT ON SCROLL
$(window).on("scroll touchmove", function () {
  $('#navbar-fixed').toggleClass('tiny', $(document).scrollTop() > 0);
});


// $('#nav-toggle').click(function () {
//   console.log('clicked');
//   if ($('.navbar-collapse .shows')) {
//     console.log('opening');
//     $('body').addClass('overflow');
//   } else {
//     console.log('closing');
//     $('body').removeClass('overflow');
//   }
// });

//FIX BODY CONTENT WHEN MOPILE NAV OPEN
// $('#navbarToggler').on('show.bs.collapse', function () {
//   $('body').toggleClass('overflow');
// });
// $('#navbarToggler').on('hide.bs.collapse', function () {
//   $('body').toggleClass('overflow');
// });


// ACTIVE ON SCROLL INTO VIEW AND KEEP
// $(window).on('scroll', function() {
//   $('.animateOnScroll').each(function() {
//     if (isScrolledIntoView($(this))) {
//       $(this).addClass('animated');
//     }
//   });
// });


// FAKING HOVER EFFECT ON MOBILE
$(window).on('scroll', function() {
  if (media_sm.matches) {
    $('.inview').each(function() {
      if (isScrolledIntoView($(this))) {
        $(this).addClass('hover');
      } else {
        $(this).removeClass('hover');
      }
    });
  }
});

function isScrolledIntoView(elem) {
  var docViewTop = $(window).scrollTop();
  var docViewBottom = docViewTop + $(window).height();
  var padding = $(window).height() / 3;
  var elemTop = $(elem).offset().top;
  var elemBottom = (elemTop + $(elem).height());
  return ((elemBottom <= (docViewBottom - padding)) && (elemTop >= (docViewTop + padding)));
}


//TOGGLE ICON
$(function() {    
  $(".list-group-item").on("click", function() {
    $(".fas", this)
      .toggleClass("fa-plus-square")
      .toggleClass("fa-minus-square");
  });
});


//CHANGING READMORE TEXT
$(".readmore").click(function(){
  var $this = $(this);
  $this.toggleClass("expanded");
  if ($this.hasClass("expanded")) {
    $this.html("Show less");
  } else {
    $this.html("Read more");
  }
});


//GENERIC TOGGLER
$(".list-filter").find('li').click(function(){
  $(this).toggleClass("active");
});


//CLEAR FILTERS
$("#filter-clear").click(function(){
  $('.list-filter').find('li').removeClass("active");
  $('.list-filter').find('.styled-checkbox').prop('checked', false);
  $('#sliderDistance').val(5);
  $('#sliderDistanceOutput').text(5);
});


//FANCYBOX
$('[data-fancybox="gallery"]').fancybox({
  slideShow: {
    autoStart: true,
    speed: 7000
  }
});