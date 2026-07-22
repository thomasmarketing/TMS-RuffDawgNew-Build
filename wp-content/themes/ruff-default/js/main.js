//Responsive Navigation
$(document).ready(function() {
  $('body').addClass('js');
  var $menu = $('.site-nav-container'),
    $menulink = $('.menu-link'),
    $menuTrigger = $('.menu-item-has-children > a'),
    $siteSearch = $('.search-module'),
    $siteWrap = $('.site-wrap');


  $menulink.click(function(e) {
    e.preventDefault();
    $menulink.toggleClass('active');
    $menu.toggleClass('active');
     $('body').toggleClass('active');
    $siteWrap.toggleClass('nav-active');
  });

  $(window).on('load', function() {
      $menuTrigger.each(function(){
        var menuHref = $(this).attr('href');
        if (menuHref == '#' || !menuHref) {
          $(this).attr('href', 'javascript:void(0)');
        }
      });
    });

  $("<span class='m-subnav-arrow'></span>").insertAfter(".menu-item-has-children > a");

  // $('.sn-li-l1 > .m-subnav-arrow').click(function() {
  //   $(this).toggleClass('active');
  //   var $this = $(this).next(".sn-level-2");
  //   $(this).parent('.menu-item-has-children').toggleClass('active');
  //   $this.toggleClass('active').next('ul').toggleClass('active');
  // });

  
function toggleLevel1Menu($trigger) {

    var $currentArrow;
    
    // detect whether click came from arrow or text
    if ($trigger.hasClass('m-subnav-arrow')) {
        $currentArrow = $trigger;
    } else {
        $currentArrow = $trigger.siblings('.m-subnav-arrow');
    }

    var $currentMenu = $currentArrow.siblings('.sn-level-2');
    var $currentItem = $currentArrow.parent('.menu-item-has-children');

    // close others
    $('.sn-level-2').not($currentMenu).slideUp().removeClass('active');
    $('.sn-li-l1 .m-subnav-arrow').not($currentArrow).removeClass('active');
    $('.sn-li-l1.menu-item-has-children').not($currentItem).removeClass('active');

    // toggle current
    $currentArrow.toggleClass('active');
    $currentItem.toggleClass('active');

    $currentMenu.stop(true, true).slideToggle();
}

// Arrow click
$('.sn-li-l1 > .m-subnav-arrow').click(function () {
    toggleLevel1Menu($(this));
});

// Text click
$('.sn-li-l1.menu-item-has-children > .sn-main-menu-link').click(function (e) {
   if ($(window).width() < 1000) {
    e.preventDefault();
    toggleLevel1Menu($(this));
    }
});


function toggleLevel2Menu($trigger) {

    var $currentArrow = $trigger;
    var $currentMenu = $currentArrow.siblings('.sn-level-3');
    var $currentItem = $currentArrow.parent('.menu-item-has-children');
    var $parentLevel2 = $currentItem.closest('.sn-level-2');

    // close siblings only
    $parentLevel2.find('> li > .sn-level-3')
        .not($currentMenu)
        .slideUp();

    $parentLevel2.find('> li > .m-subnav-arrow')
        .not($currentArrow)
        .removeClass('active');

    $parentLevel2.find('> li.menu-item-has-children')
        .not($currentItem)
        .removeClass('active');

    // toggle current
    $currentArrow.toggleClass('active');
    $currentItem.toggleClass('active');

    $currentMenu.stop(true, true).slideToggle();
}

$('.sn-li-l2 > .m-subnav-arrow').click(function () {
    toggleLevel2Menu($(this));
});


  $('.sn-li-l3 > .m-subnav-arrow').click(function() {
    $(this).toggleClass('active');
    var $this = $(this).next(".sn-level-4");
    $(this).parent('.menu-item-has-children').toggleClass('active');
    $this.toggleClass('active').next('ul').toggleClass('active');
  });
  $('.side-nav .m-subnav-arrow').click(function() {
    //$('.side-nav .m-subnav-arrow').removeClass('active');
    $(this).toggleClass('active');
    //$('.side-nav .m-subnav-arrow').parent('.menu-item-has-children').removeClass('active');
    $(this).parent('.menu-item-has-children').toggleClass('active');
    //$('.side-nav .m-subnav-arrow').parent('.menu-item-has-children').children('ul').removeClass('active');
    $(this).parent('.menu-item-has-children').children('ul').toggleClass('active');
  });

  $('.sn-nav .menu-item-has-children > a').focus(function() {
    $(this).next('.m-subnav-arrow').trigger('click');
  })

  //for toggle on li clicks
  $('.menu-item-has-children > a').on('click', function(e) {
   var menuHref = $(this).attr('href');
   if (menuHref == '#' || menuHref == "javascript:void(0)" || !menuHref) {
     e.preventDefault();
     $(this).siblings('.m-subnav-arrows').trigger('click');
   }
  });

  $('.nolink-nav a').click(function() {
  $(this).toggleClass('active');
  var $this = $(this).parent('li').children(".sn-level-2");
  $this.toggleClass('active');

  var $this1 = $(this).parent().children(".m-subnav-arrow");
  $this1.toggleClass('active');
  });

});

$(document).ready(function() {
    // When clicking the element with the class '.sh-ico-search'
    $('.sh-ico-search').click(function(e) {
        e.preventDefault(); // Prevent default link behavior, if it's a link
        $(this).addClass('remove-br');
    });

    // When clicking any other link (adjust the selector for your case)
    $('a').not('.sh-ico-search').click(function() {
        $('.sh-ico-search').removeClass('remove-br');
    });
});


//adding tabindex -1 to unwanted a tag in sitemap
$(document).ready(function() {
  $('.no-link > a').attr('tabindex',-1);
});


//Magnific Popup
$(document).ready(function() {
  $('.lightbox').magnificPopup({
    type: 'image',
    removalDelay: 500, //Delaying the removal in order to fit in the animation of the popup
    mainClass: 'mfp-fade', //The actual animation
    overflowY: 'hidden',
    fixedContentPos: true,
    fixedBgPos: true,
    callbacks: {
      open: function(){
        $('body').addClass('mfp-zoom-out-cur ');
      },
    close: function() {
      $('body').removeClass('mfp-zoom-out-cur');
      $('body').addClass('no-transition');
      setTimeout(function () { 
        $('body').removeClass('no-transition');
      }, 2000);
      /$(this.ev).addClass('tse-remove-border');/
      $.each(this.items, function( index, value ) {
        if (value.el) {
          $(value.el[0]).addClass('tse-remove-border');
        } else {
          $(value).removeClass('tse-remove-border');
        }
      });
    },
  },
  });
});
$(document).ready(function() {
  $('.popup-youtube, .popup-vimeo, .popup-gmaps,.popup-mp4,.popup-link').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 500,
    preloader: false,
    overflowY: 'hidden',
    fixedContentPos: true,
    fixedBgPos: true,
    callbacks: {
      open: function(){
        $('body').addClass('mfp-zoom-out-cur ');
      },
    close: function() {
      $('body').removeClass('mfp-zoom-out-cur');
      $('body').addClass('no-transition');
      setTimeout(function () { 
        $('body').removeClass('no-transition');
      }, 2000);
      /$(this.ev).addClass('tse-remove-border');/
      $.each(this.items, function( index, value ) {
        if (value.el) {
          $(value.el[0]).addClass('tse-remove-border');
        } else {
          $(value).removeClass('tse-remove-border');
        }
      });
    },
  },
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
          id: 'v=', // String that splits URL in a two parts, second part should be %id%
          // Or null - full URL will be returned
          // Or a function that should return %id%, for example:
          // id: function(url) { return 'parsed id'; }

          src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0' // URL that will be set as a source for iframe.
        }
      },
      srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
    }
  });

$('.popup-gallery').each(function() {

    $(this).magnificPopup({
        delegate: '.gallery-trigger',
        type: 'image',
        mainClass: 'mfp-with-zoom',

        gallery: {
            enabled: true,
            preload: [0,1]
        },

        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',

            opener: function(openerElement) {
                return openerElement
                    .closest('.goOnZoom')
                    .find('img');
            }
        },

        image: {
            titleSrc: function(item) {
                var markup = '';

                if (item.el[0].hasAttribute('data-title')) {
                    markup += '<h3>' + item.el.attr('data-title') + '</h3>';
                }

                if (item.el[0].hasAttribute('data-description')) {
                    markup += '<p>' + item.el.attr('data-description') + '</p>';
                }

                return markup;
            }
        },

        callbacks: {
            open: function() {
                $(this).addClass('tse-remove-border');

                $('.input-group-append.search-close').trigger('click');

                if ($(window).height() < $(document).height()) {
                    $('html').addClass('mfg-popup-open');
                }
            },

            close: function() {
                $('html').removeClass('mfg-popup-open');
                $(this).addClass('tse-remove-border');
            }
        }
    });

});

  $('.popup-inline').magnificPopup({
      type: 'inline',
      midClick: true,

      callbacks: {
        open: function() {
          $('.input-group-append.search-close').trigger('çlick');
          if ($( window ).height() < $( document ).height()) {
            $('html').addClass('mfg-popup-open');
          }
        },
        close: function() {
          $('html').removeClass('mfg-popup-open');
          $(this.items).each(function() {
           if ($(this.el)) {
             $(this.el).addClass('tse-remove-border');
           }
          });
        },
      },
  });
});


$(document).ready(function () {
  if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
      backToTop = function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > scrollTrigger) {
          $('#back-to-top').addClass('show');
        } else {
          $('#back-to-top').removeClass('show');
        }
      };
      backToTop();
      $(window).on('scroll', function () {
        backToTop();
      });
      $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
          scrollTop: 0
        }, 700);
      });
    }
});
  



//Delayed Popup with localstorage to show popup only once
$(document).ready(function() {
  var findPopupId = $('#delayed-popup').length; // if #delayed-popup exists, findPopupId = 1;
  if (findPopupId > 0) { // only run when #delayed-popup exists
    var wWidth = $(window).width(); // set variable of window width
    if (wWidth >= 640) { //only trigger on tablet or larger to prevent mobile private browsers who don't allow cookies (safari)
      if (localStorage.getItem('popup_show') === null && localStorage.getItem('exitintent_show') === null ) { // check if key is present in local storage to prevent re-triggering
        setTimeout(function() {
          window.$.magnificPopup.open({
            items: {
              src: '#delayed-popup' //ID of inline element
            },
            type: 'inline',
            removalDelay: 500, // delaying the removal in order to fit in the animation of the popup
            mainClass: 'mfp-fade mfp-fade-side', // The actual animation
          });
          localStorage.setItem('popup_show', 'true'); // set the key in local storage
        }, 11000); // delay in millliseconds until the modal triggers
      }
    }
  }
});




// Exit-Intent Modal
$(document).ready(function() {
  // Exit intent
  function addEvent(obj, evt, fn) {
    if (obj.addEventListener) {
      obj.addEventListener(evt, fn, false);
    } else if (obj.attachEvent) {
      obj.attachEvent("on" + evt, fn);
    }
  }
  // Exit intent trigger
  var findExitId = $('#exit-popup').length; // if #exit-popup exists, findExitId will contain a value of 1 (or more);
    if(findExitId > 0){ // if findExitId is greater than 0, it means that element exits on the page, therefore execute this code;
    addEvent(document, 'mouseout', function(evt) {
      if (evt.toElement === null && evt.relatedTarget === null && !localStorage.getItem('exitintent_show')) {
      //alert('test');
        window.$.magnificPopup.open({
          items: {
            src: '#exit-popup' //ID of inline element
          },
          type: 'inline',
          removalDelay: 500, //Delaying the removal in order to fit in the animation of the popup
          mainClass: 'mfp-fade mfp-fade-side', //The actual animation
        });
        localStorage.setItem('exitintent_show', 'true'); // Set the flag in localStorage
      }
    });
  }
});


//Show More
$(document).ready(function() {
  $(".showmore").after("<p><a href='#' class='show-more-link'>More</a></p>");
  var $showmorelink = $('.showmore-link');
  $showmorelink.click(function() {
    var $this = $(this);
    var $showmorecontent = $('.showmore');
    $this.toggleClass('active');
    $showmorecontent.toggleClass('active');
    return false;
  });
});

//Click to Expand
$(document).ready(function() {
  var $expandlink = $('.ce-header');
  $expandlink.click(function() {
    var $this = $(this);
    var $showmorecontent = $('.showmore');


    $this.parent().toggleClass('active'); 
    $showmorecontent.toggleClass('active');
    return false;
  });
  
  $($expandlink).keyup(function(e){
      if(e.which === 13){ //13 is the char code for Enter
          $(this).click();
      }
  });
});


// Accordion Tabs
$(document).ready(function () {
  $('.accordion-tabs').each(function(index) {
    $(this).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
  });
  $('.accordion-tabs').on('click focus', 'li > a.tab-link', function(event) {
    if (!$(this).hasClass('is-active')) {
      event.preventDefault();
      var accordionTabs = $(this).closest('.accordion-tabs');
      accordionTabs.find('.is-open').removeClass('is-open').hide();

      $(this).next().toggleClass('is-open').toggle();
      accordionTabs.find('.is-active').removeClass('is-active');
      $(this).addClass('is-active');
    } else {
      event.preventDefault();
    }
  });
});


//destination page slider    
$(document).ready(function(){
  $('.slider-for').each(function(key, item) {
    var sliderIdName = 'slider' + key;
    var sliderNavIdName = 'sliderNav' + key;
    this.id = sliderIdName;
    $('.slider-nav')[key].id = sliderNavIdName;
    var sliderId = '#' + sliderIdName;
    var sliderNavId = '#' + sliderNavIdName;
    $(sliderId).slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      fade: true,
      asNavFor: sliderNavId
    });
    $(sliderNavId).slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: sliderId,
      prevArrow: '<a class="slick-prev" href="javascript:void(0)" aria-label="Previous">Prev</a>',
      nextArrow: '<a class="slick-next" href="javascript:void(0)" aria-label="Next"></a>',
      dots: false,
      focusOnSelect: true,
      accessibility: true,
      responsive: [
      {
        breakpoint: 640,
        settings: {
          slidesToShow: 4
        }
      },
    ]
    });
  });

  $('.icwt-slider').slick({
    dots: true,
    infinite: false,
    arrows: false,
    slidesToShow: 1,
    autoplay:false,
    prevArrow: '<a class="slick-prev" href="javascript:void(0)" aria-label="Previous">Prev</a>',
    nextArrow: '<a class="slick-next" href="javascript:void(0)" aria-label="Next"></a>',
    accessibility: true,
  });
  
  //$('.tm-carousel .slick-dots li button').attr('tabindex', -1);

  $('.icwt-slider .slick-dots li button').on('click contextmenu drag auxclick',function() {
    $('a, button, input').removeClass('tse-remove-border');
    $(this).addClass('tse-remove-border');
  }).on('blur', function() {
    $(this).removeClass('tse-remove-border');
  });
});


// Hero Slider
$(document).on('ready', function() {
  $('.si-slider').slick({
    dots: false,
    infinite: true,
    arrows: true,
    slidesToShow: 1,
    fade: true,
    cssEase: 'linear',
    speed: 800,
    autoplay: true,
    accessibility: true,
  });
  $('.si-slider .slick-slide:not(:last-child) .si-content a:last-of-type').blur(function() {
    $('.si-slider .slick-next').trigger('click');
    setTimeout(function() {
      $('.si-slider .slick-current').find('a').focus();
    }, 500);
  });

  //$('.si-slider .slick-dots li button').attr('tabindex', -1);

  $('.si-slider .slick-dots li button').on('click contextmenu drag auxclick',function() {
       $('a, button, input').removeClass('tse-remove-border');
       $(this).addClass('tse-remove-border');
     }).on('blur', function() {
       $(this).removeClass('tse-remove-border');
  });
});



//Sticky Nav
$(function() {

  var findEl = $('.sh-sticky-wrap').length;
  if (findEl <= 0) {
      // do nothing
  } else {


    //Set the height of the sticky container to the height of the nav
    //var navheight = $('.site-nav-container').height();
    // grab the initial top offset of the navigation 
    var sticky_navigation_offset_top = $('.sh-sticky-wrap').offset().top;
    //var sticky_navigation_offset_top = $('.sh-sticky-wrap').outerHeight();
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(){
      var scroll_top = $(window).scrollTop(); // our current vertical position from the top
      // if we've scrolled more than the navigation, change its position to fixed to stick to top,
      // otherwise change it back to relative
      if (scroll_top > sticky_navigation_offset_top) { 
        $('.sh-sticky-wrap').addClass('stuck');
        //$('footer').css('padding-bottom',sticky_navigation_offset_top+'px');
        //$('.sh-sticky-inner-wrap').css('height', '187px');
      } else if(scroll_top <= sticky_navigation_offset_top) {
        $('.sh-sticky-wrap').removeClass('stuck'); 
        //$('footer').css('padding-bottom','0');
        // $('.site-header').css('height', 'auto');
      }   
    };
    // run our function on load
    sticky_navigation();
    // and run it again every time you scroll
    $(window).scroll(function() {
      sticky_navigation();
    });

  }
});

// ipad hover issue
$(document).ready(function() {
  if (!("ontouchstart" in document.documentElement)) {
    document.documentElement.className += " no-touch";
  }

  $(window).on('load orientationchange', function() {
    var wWidth = $(window).width();
    if (wWidth > 960) {
      /*make filters hover behavior switch to tap/clcik on touch screens*/
      if (!$('html').hasClass('no-touch')) { /*Execute code only on a touch screen device*/
        console.log('toucheee');
       
          /*hide  drop-down if it was open*/
          $('.sn-level-1 .menu-item-has-children').bind('touchstart', function(e) {
              $(".sn-level-1 .menu-item-has-children .sub-menu").hide();
              $(this).children(".sub-menu").toggle();
              e.stopPropagation(); //Make all touch events stop at the  container element
          });

           
          $(document).bind('touchstart', function(e) {
            $(".sn-level-1 .menu-item-has-children .sub-menu").fadeOut(300); /*Close filters drop-downs if user taps ANYWHERE in the page*/
          }); 
           
          $('.sn-level-1 .menu-item-has-children .sub-menu').bind('touchstart', function(event){
            event.stopPropagation(); /*Make all touch events stop at the #filter1 ul.children container element*/
          });
       
      }
    }
  });
});


//Smooth Scroll - Detects a #hash on-page link and will smooth scroll to that position. Will not affect regular links.
$(function() {
  $('.smooth-scroll').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});



//Slide in CTA
$(function() {
    var findEl = $('#slidebox').length;
    if (findEl <= 0) {
        // do nothing
    } else {
        var slidebox = $('#slidebox');
        if (slidebox) {
            $(window).scroll(function() {
                var distanceTop = $('#last').offset().top - $(window).height();
                if ($(window).scrollTop() > distanceTop)
                    slidebox.animate({
                        'right': '0px'
                    }, 300);
                else
                    slidebox.stop(true).animate({
                        'right': '-430px'
                    }, 100);
            });
            $('#slidebox .close').on('click', function() {
                $(this).parent().remove();
            });
        }
    }
});


// include span tags around all navigation elements
$("#hs_menu_wrapper_primary_nav ul li a").each(function( index ) {
  var navText = $( this ).html(); $( this ).html("<span>" + navText + "</span>");
});


//Styles
// $(document).ready(function() {
//  $('.site-content *').removeAttr("style");
// });

$('.main-content').addClass('more height');

var wWidth = $(window).width();
if(wWidth <= 639 ){
  $( ".main-content" ).after( "<div class='link'><a id='readmore' href='javascript:changeheight()'>Show More</a></div>" );
}

$(window).resize(function() {
  var wWidth = $(window).width();
  if (wWidth < 640) {
    var addedDiv = $(".link");
    var length1= addedDiv.length;
    if (addedDiv.length == 0) {
      $(".link").remove();
      $( ".main-content" ).after( "<div class='link'><a id='readmore' href='javascript:changeheight()'>Show More</a></div>" );
    }
  }
  else if (wWidth > 639){
    $(".link").remove();
  }
   $(function() {
       var curHeight = $('.more').height();
       if (curHeight == 250)
           $('#readmore').show();
       else
           $('#readmore').hide();
   });
});
$(function() {
   var curHeight = $('.more').height();
   if (curHeight == 250)
       $('#readmore').show();
   else
       $('#readmore').hide();
});
$(window).on('resize', function() {
   $(function() {
       var curHeight = $('.more').height();
       if (curHeight == 250)
           $('#readmore').show();
       else
           $('#readmore').hide();
   });
});

function changeheight() {
   var readmore = $('#readmore');
   if (readmore.text() == 'Show More') {
       readmore.text("Show Less");
   } else {
       readmore.text("Show More");
   }

   $('.height').toggleClass("heightAuto");
};



$(document).ready(function() {
  $(function() {
    if ($('section').hasClass('internal-links-nav')) {
      var pillar_navigation_offset_top = $('.internal-links-nav').offset().top - $('.internal-links-nav').height();
      var pillar_nav_height = $('.internal-links-nav').outerHeight();

      // Cache selectors
      var lastId,
      topMenu = $(".internal-links-nav"),
      topMenuHeight = topMenu.outerHeight()+15,
      // All list items
      menuItems = topMenu.find("a"),
      // Anchors corresponding to menu items
      scrollItems = menuItems.map(function(){
        var item = $($(this).attr("href"));
        if (item.length) { return item; }
      });

      var pillar_sticky_navigation = function(){
        var wWidth = $(window).width();
        var scroll_position = 0;
        var scroll_top = $(window).scrollTop(); 
        var header_height = $('.sh-sticky-wrap').outerHeight();

        if (scroll_top > pillar_navigation_offset_top) { 
          $('.internal-links-nav').addClass('stuck').css('top', header_height+'px');
          $('.additional-content').addClass('pillar-stuck').css('padding-top',pillar_nav_height+'px');
        } else if(scroll_top <= pillar_navigation_offset_top) {
          $('.internal-links-nav').removeClass('stuck').css('top', '0px'); 
          $('.additional-content').removeClass('pillar-stuck').css('padding-top','0');
        }

        if (wWidth >= 960) {
          scroll_position = topMenuHeight + header_height
        } else {
          scroll_position = 0;
        }

        // Get container scroll position
        var fromTop = $(this).scrollTop()+ (scroll_position);
         
        // Get id of current scroll item
        var cur = scrollItems.map(function(){
           if ($(this).offset().top < fromTop)
             return this;
        });
        // Get the id of the current element
        cur = cur[cur.length-1];
        var id = cur && cur.length ? cur[0].id : topMenu.closest('section').next().attr('id');
         
        if (lastId !== id) {
             lastId = id;
             // Set/remove active class
             menuItems
               //.parent().removeClass("pillar-active")
               //.end().filter("[href='#"+id+"']").parent().addClass("pillar-active");
        }          
      };

      // run our function on load
      pillar_sticky_navigation();
      // and run it again every time you scroll
      $(window).scroll(function() {
        pillar_sticky_navigation();
      });
    }

  });
});


$('.internal-links-nav a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      var header_height = $('.sh-sticky-wrap').height();
      var pillar_nav_height = $('.internal-links-nav').outerHeight();
      var wWidth = $(window).width();
      var smoothtop = 0;
      if (wWidth >= 960) {
        smoothtop = pillar_nav_height ? (header_height + pillar_nav_height) : header_height;
      }
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top - smoothtop
        }, 1000);
        return false;
      }
    }
});

$(document).ready(function() {
  $('.internal-links-nav li').removeClass('pillar-active');
  $('.internal-links-nav a').click(function(e) {
    e.preventDefault();
    $('.internal-links-nav li').removeClass('pillar-active');
    $(this).parent('li').addClass('pillar-active');
  });
});



// Accessible Website
/*============== Focus on tab =============*/
(function($) {
  $(document).on('keyup keydown', function(e) {
    var code = e.keyCode || e.which;
    if (code == '9') {
         
            $('.site-nav .menu-item-has-children > a').focus(function() {
            $(this)
                .closest('.menu-item-has-children')
                .children('.sub-menu')
                .css({
                    'opacity': '1',
                    'visibility': 'visible'
                })
                .show();
        });

       $('.site-nav .menu-item-has-children > .sub-menu li:last-of-type > a').blur(function(){

          if (!$(this).parent().children().hasClass('sub-menu') && $(this).parent().is(':last-child')) {
            $(this).parent().parent('.sub-menu').hide();
            if ($(this).parent('li').parent('.sub-menu').parent('li').next().length <= 0) {
                $(this).parent('li').parent('.sub-menu').parent('li').parent('.sub-menu').hide();
            }
            
            if ($(this).parent().next().length <= 0 && $(this).parent('li').parent('.sub-menu').parent('li').next().length <= 0 && $(this).parent('li').parent('.sub-menu').hasClass('sn-level-3')) {
              $('.sub-menu').hide();
            }
          }
          
       });

       if (code == '9' && e.shiftKey) {
         if ($(document.activeElement).parent().hasClass('menu-item-has-children')) {
           $(document.activeElement).parent().children('.sub-menu').hide();
         }
         $('.site-nav .menu-item-has-children > .sub-menu li:last-of-type a').blur(function(){
           $(this).closest('.sub-menu').show();
         });
   
       }

       $(document).click(function(e) {
          if (!$(e.target).is('.site-nav .menu-item-has-children a')) {
            $('.site-nav .sub-menu').hide();
          }
          if (!$(e.target).is('a') || !$(e.target).is('button') || !$(e.target).is('input')) {

            $('a, button, input').removeClass('tse-remove-border');
          }
       });
    }
  });

  
  $(document).ready(function () {
    $("#skipToContent").on('click', function(e){
      $('body').toggleClass('changeCursor');
      e.stopPropagation();
      e.preventDefault();
        $('.site-header').after('<a href="javascript:void(0)" tabindex="-1" id="siteContentFocusable"></a>');
        $(this).blur();
        if ( window.location.pathname == '/' ){
          $('html, body').animate({
              scrollTop: $("#siteContentFocusable").offset().top
          }, 1000);
        } else {
            $('html, body').animate({
              scrollTop: 0
          }, 1000);
        }
        $('#siteContentFocusable').trigger('focus');
    });

    $('body').on('click contextmenu drag auxclick', 'a, button, input, select', function() {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function(e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      } 
    });

    $('[tabindex="0"], .super-smooth').on('click contextmenu drag auxclick', function() {
      $('a, button, input, select, [tabindex="0"], .super-smooth').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function(e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      } 
    });

    $('select, button, input').on('mousemove', function(event) {
      $('a, button, input, select').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    });

    $("a[href*='tel'], [href*='mailto']").on('click contextmenu drag auxclick', function() {
      $('a, button, input').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function() {
      $(this).addClass('tse-remove-border');
    });

    $("a:not([href*='tel']), a:not([href*='mailto'])").on('blur', function() {
      $("[href*='mailto'], [href*='tel']").removeClass('tse-remove-border');
    });

    $('button').on('click contextmenu drag auxclick', '.slick-arrow', function() {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function(e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      } 
    });

  });    

    $(window).on('blur', function() {
        $(document.activeElement).addClass('tse-remove-border');
    });

    $(window).on('load', function() {
    setTimeout(function() {
      $('.slick-slide.slick-cloned *[tabindex="0"], .slick-slide.slick-cloned a').attr('tabindex', '-1');
    }, 1000);
  });
  
}(jQuery));

$(document).ready(function () {
  $('.ginput_recaptcha').parent('.gfield').children('.gfield_label').append('<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span>');
});


// Animation on Scroll
var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  });
  wow.init();
$(document).on('keydown', function(e) {
    if (e.key === 'Tab' || e.keyCode === 9) {
        // Disable WOW.js functionality (if already initialized)
        if (typeof WOW !== 'undefined' && WOW.prototype) {
            // Empty function to override the init
            WOW.prototype.init = function() {};
 
            // If WOW instance exists, reset it
            if (typeof wow !== 'undefined') {
                wow.stop(); // Stop any running animations
                wow.sync(); // Reset the instance
            }
        }
 
        // Iterate over all elements with the 'wow' class
        $('.wow').each(function() {
            // Get all classes of the current element and split them into an array
            let classes = $(this).attr('class').split(/\s+/);
            console.log(classes);
 
            // Remove the 'wow' class and 'animated' class from the current element
            $(this).removeClass('wow animated');
 
            // Find and remove the next class in the class list, if it exists
            let nextClassIndex = classes.indexOf('wow') + 1; // Get the next class after 'wow'
            if (nextClassIndex < classes.length) {
                let nextClass = classes[nextClassIndex]; // Get the next class
                $(this).removeClass(nextClass); // Remove the next class
                console.log('Removed next class:', nextClass);
            }
 
            // Remove all inline CSS styles
            $(this).removeAttr('style');
        });
    }
});

// Zoom Effect on Image

$('.slider-for').on('mousemove touchmove', '.goOnZoom', function(e) {

    // Don't zoom when hovering the popup icon
    if ($(e.target).closest('.gallery-trigger').length) {
        return;
    }

    var zoomer = this;

    var offsetX, offsetY;

    if (e.type === 'touchmove') {
        var touch = e.originalEvent.touches[0];
        var rect = zoomer.getBoundingClientRect();

        offsetX = touch.clientX - rect.left;
        offsetY = touch.clientY - rect.top;
    } else {
        offsetX = e.offsetX;
        offsetY = e.offsetY;
    }

    var x = (offsetX / zoomer.offsetWidth) * 100;
    var y = (offsetY / zoomer.offsetHeight) * 100;

    zoomer.style.backgroundPosition = x + '% ' + y + '%';
});

$(document).on('mouseenter', '.gallery-trigger', function() {
    $(this).closest('.goOnZoom').addClass('zoom-paused');
});

$(document).on('mouseleave', '.gallery-trigger', function() {
    $(this).closest('.goOnZoom').removeClass('zoom-paused');
});



// Search
document.addEventListener('DOMContentLoaded', function () {
  var siteHeader = document.querySelector('.site-header');
  var searchLinks = document.querySelectorAll('.search-link');
  var searchInput = document.querySelector('.sh-search-input');

  if (!siteHeader || !searchLinks.length) return;

  searchLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var isActive = siteHeader.classList.toggle('search-active');
      if (isActive && searchInput) searchInput.focus();
    });
  });

  document.addEventListener('click', function (e) {
    if (
      siteHeader.classList.contains('search-active') &&
      !e.target.closest('.sh-search-form') &&
      !e.target.closest('.search-link')
    ) {
      siteHeader.classList.remove('search-active');
    }
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && siteHeader.classList.contains('search-active')) {
      siteHeader.classList.remove('search-active');
    }
  });
});


// Shop by play style
document.querySelectorAll('.badge').forEach(badge => {
  const naturalWidth = badge.getBoundingClientRect().width;
  badge.style.setProperty('--badge-w', naturalWidth + 'px');
});


// Real dogs. Real reviews.

$(function() {

  var $stage      = $('#siReviewStage');
  var $photo      = $('#stagePhoto');
  var $text       = $('#stageText');
  var $img         = $('#photoImg');
  var $quote       = $('#textQuote');
  var $name        = $('#textName');
  var $role        = $('#textRole');
  var $dots        = $('#dots');
  var $slides      = $('#siReviewData > li');
  var moveDur      = 600;   // keep in sync with --move-dur in CSS
  var swapDur      = 180;
  var settleDur    = 200;

  var current      = 0;
  var animating    = false;
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function slideData(i) {
    var $li = $slides.eq(i);
    return {
      side: $li.data('side') || 'left',
      img:  $li.data('img'),
      alt:  $li.data('alt') || '',
      name: $li.data('name') || '',
      role: $li.data('role') || '',
      quote: $li.find('p').first().text().trim()
    };
  }

  function buildDots() {
    $slides.each(function(i) {
      var $b = $('<button></button>').attr('aria-label', 'Go to review ' + (i + 1));
      $b.on('click', function() { goTo(i); });
      $dots.append($b);
    });
  }

  function updateDots() {
    $dots.children().each(function(i) {
      $(this).toggleClass('active', i === current);
    });
  }

  function isMobile() {
    return $(window).width() <= 700;
  }

  function layoutFor(side, animate) {
    if (isMobile()) {
      $photo.css({ left: '' });
      $text.css({ left: '', width: '' });
      $photo.toggleClass('side-left', side === 'left').toggleClass('side-right', side === 'right');
      return;
    }

    var stageWidth = $stage.width();
    var imgWidth = 190, gap = 40;
    var textWidth = stageWidth - imgWidth - gap;
    var photoLeft = side === 'left' ? 0 : (stageWidth - imgWidth);
    var textLeft  = side === 'left' ? (imgWidth + gap) : 0;

    if (!animate) {
      $photo.css('transition', 'none');
      $text.css('transition', 'none');
    }

    $photo.css('left', photoLeft + 'px');
    $text.css({ left: textLeft + 'px', width: textWidth + 'px' });
    $photo.toggleClass('side-left', side === 'left').toggleClass('side-right', side === 'right');

    if (!animate) {
      // force reflow so "none" applies before we hand transitions back to CSS
      $photo[0].offsetWidth;
      $photo.css('transition', '');
      $text.css('transition', '');
    }
  }

  function fillContent(i) {
    var s = slideData(i);
    $img.attr({ src: s.img, alt: s.alt });
    $quote.text(s.quote);
    $name.text(s.name);
    $role.text(s.role);
  }

  function goTo(index) {
    if (animating || index === current) return;
    var next = ((index % $slides.length) + $slides.length) % $slides.length;
    var nextSlide = slideData(next);

    if (isMobile() || reduceMotion) {
      current = next;
      fillContent(current);
      layoutFor(nextSlide.side, false);
      updateDots();
      return;
    }

    animating = true;

    // STEP 1: photo + text glide (still showing the OLD photo/copy) from
    // their current side to the new side, inside the static card.
    layoutFor(nextSlide.side, true);

    // STEP 2: once the glide has landed, swap in the new photo/copy with
    // a quick reveal.
    setTimeout(function() {
      $stage.addClass('content-fade');
      setTimeout(function() {
        current = next;
        fillContent(current);
        updateDots();
        $stage.removeClass('content-fade');
        setTimeout(function() { animating = false; }, settleDur);
      }, swapDur);
    }, moveDur);
  }

  $('.arrow.next').on('click', function() { goTo(current + 1); });
  $('.arrow.prev').on('click', function() { goTo(current - 1); });

  $(window).on('resize', function() {
    layoutFor(slideData(current).side, false);
  });

  buildDots();
  fillContent(current);
  layoutFor(slideData(current).side, false);
  updateDots();
});