
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

//FIX BODY CONTENT WHEN MOPILE NAV OPEN
$('#navbarToggler').on('show.bs.collapse', function () {
  $('body').toggleClass('overflow');
});
$('#navbarToggler').on('hide.bs.collapse', function () {
  $('body').toggleClass('overflow');
});

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