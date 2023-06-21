$(document).ready(function () {
  
  $('.main-slider').slick({
    dots: false,
    Infinity:true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    speed: 1500,
    responsive: [
   
      {
        breakpoint: 768,
        settings: {
          arrows: false,
         slidesToShow: 1,
        }
      }
    ]
  });

  $('.product-main_slider-big').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.product-main_slider-min'
  });
  $('.product-main_slider-min').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    Infinity:true,
    
    focusOnSelect: true,
    autoplay: false,
    speed: 1500,
    arrows:false,
    asNavFor: '.product-main_slider-big',
  });

  $('.more-product_slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows:true,
    Infinity:true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          arrows: false,
          
         
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          
         
          slidesToShow: 1,
        }
      }
    ]
  });

  $('.news-slier').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows:false,
    Infinity:true,
    speed: 1500,
    autoplay:true,
    cssEase: "linear",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          arrows: false,
          
         
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          
         
          slidesToShow: 2,
        }
      }
    ]
  });
  
 /*  Fancybox.bind("[data-fancybox]", {}); */
 
 lightbox.option({
  'resizeDuration': 60,

})
$(".burger-img").click(function () {
  $(this).parent().toggleClass("burgeropen"),
    $(this).parent().toggleClass("rotate");
});
$('.burger-icon').click(function (e) { 
  $('.burger-menu').toggleClass('open'),
  $(this).toggleClass('open')
  
});
  
});


$(window).scroll(function(){

  if ($(this).scrollTop() > 1) {
     $('header').addClass('header-shadow');
  } else {
     $('header').removeClass('header-shadow');
  };


  const $element = $('header');

  if ($(window).scrollTop() === 0) {
 
    $element.removeClass('header-shadow');
  }
});



const  span= document.querySelector('.round');
const dropdown = document.querySelector('#sub-nav');
let isHovered = false;

dropdown.addEventListener('mousemove', function(event) {
  const dropdownRect = dropdown.getBoundingClientRect();
  const maxTop = dropdownRect.height - span.offsetHeight;
 

  const hoveredElement = document.elementFromPoint(event.clientX, event.clientY);

  if (hoveredElement !== dropdown && hoveredElement !== span) {
    const liRect = hoveredElement.getBoundingClientRect();
    span.style.top = Math.max(0, Math.min(maxTop, liRect.top - dropdownRect.top)) + 'px';
    isHovered = true;
  } else {
    isHovered = false;
  }

});
dropdown.addEventListener('mouseleave', function() {
  if (!isHovered) {
    span.style.top = 0;
  }
});





$(window).scroll(function() {
  var windowHeight = $(window).height();
  var scrollTop = $(window).scrollTop();

  $('.datacount').each(function() {
    var $this = $(this);
    var elementTop = $this.offset().top;

    if (elementTop <= (scrollTop + windowHeight)) {
      if (!$this.hasClass('counted')) {
        $this.addClass('counted');

        var countTo = $this.attr('data-count');

        $({ countNum: $this.text() }).animate({
          countNum: countTo
        }, {
          duration: 8000,
          easing: 'linear',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
          }
        });
      }
    }
  });
});



