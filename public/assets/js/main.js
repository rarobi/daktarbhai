var $ = jQuery.noConflict();

(function($) {
    "use strict";

    var width  =  $(window).width();

    /*-------------------------------------------------*/
    /* =  Mobile Hover
    /*-------------------------------------------------*/
    var mobileHover = function () {
        $('*').on('touchstart', function () {
            $(this).trigger('hover');
        }).on('touchend', function () {
            $(this).trigger('hover');
        });
    };

    mobileHover();
    /*-------------------------------------------------*/
    /* =  loader
    /*-------------------------------------------------*/
    Pace.on("done", function(){
        $("#myloader").fadeOut(800);
    });
    /*-------------------------------------------------*/
    /* =  Menu
    /*-------------------------------------------------*/
    try {
        $('.menu-button').on("click",function() {

            //menu classic, menu sidemenu, menu basic
            var menu = $('#menu');
            var menuClassic = $('#menu-classic');
            var sidemenu = $('#sidemenu');
            var menuResponsiveSidemenu = $('#menu-responsive-sidemenu');
            var menuResponsiveClassic = $('#menu-responsive-classic');

            menu.toggleClass('open');
            menuClassic.toggleClass('open');
            sidemenu.addClass('sidemenu open');
            menuResponsiveSidemenu.toggleClass('open');
            menuResponsiveClassic.toggleClass('open');
            menu.addClass('animated slideInDown');
            $('.submenu', menuClassic).each(function() {
                $('.submenu', menuClassic).removeClass( "open" );
            });
            if ( sidemenu.hasClass( "slideInRight" ) ) {
                sidemenu.removeClass('animated slideInRight');
                sidemenu.addClass('animated slideOutRight');
                setTimeout(function(){
                    sidemenu.toggleClass('sidemenu open');
                    sidemenu.removeClass('animated slideOutRight');
                },1000);
            } else {
                sidemenu.addClass('animated slideInRight');
            }
            if(width<991){
                $('body').toggleClass('no-scroll');
            }
        });
        $('.menu-holder ul > li:not(.submenu) > a').on("click",function(){
            $('#menu').removeClass('open');
            $('body').removeClass('no-scroll');
        });
        //basic menu mobile
        $('.close-menu').on("click",function() {

            var menu = $('#menu');

            menu.removeClass('animated slideInDown');
            menu.addClass('animated fadeOutUp');
            setTimeout(function(){
                menu.toggleClass('open');
                menu.removeClass('animated fadeOutUp');
            },1000);
            if(width<991){
                $('body').toggleClass('no-scroll');
            }
        });
        //megamenu mobile
        if(width<991){

            var menuClassicSubmenu = $('.submenu', '#menu-classic');

            menuClassicSubmenu.on("click",function() {
                var open = false;
                if($(this).hasClass('open')) {
                        open = true;
                }
                menuClassicSubmenu.each(function() {
                    menuClassicSubmenu.removeClass( "open" );
                });
                if(open) {
                    $(this).addClass('open');
                }
                $(this).toggleClass('open');
            });
        }
    } catch(err) {

    };
    /*-------------------------------------------------*/
    /* =  Sticky menu
    /*-------------------------------------------------*/
    $(window).on('scroll', function (){

        var scroll  =  $(window).scrollTop();
        var height  =  $(window).height();
        var stickyHeader = $('header.fixed.transparent');

        if( scroll >= 90 ) {
            stickyHeader.addClass("fixed-top animated fadeInDown").delay( 2000 ).fadeIn();
        } else if ( scroll <= height ) {
            stickyHeader.removeClass("fixed-top fadeInDown");
        } else {
            stickyHeader.removeClass("fixed-top animated fadeInDown");
        }
    });
    /*-------------------------------------------------*/
    /* =  Search Box Menu
    /*-------------------------------------------------*/
    try {
        $('.menu-holder .search').on("click",function() {
            $('#search-box').toggleClass('active');
            $('body').toggleClass('no-scroll');
        });
        $('.close-search-box').on("click",function() {
            $('#search-box').toggleClass('active');
            $('body').toggleClass('no-scroll');
        });
    } catch(err) {

    };
    /*-------------------------------------------------*/
    /* =  Slider
    /*-------------------------------------------------*/
    try {
        $('#flexslider').flexslider({
            animation: "fade",
            controlNav: false,
            directionNav: false,
            useCSS: false
        });
        $('#flexslider-nav').flexslider({
            animation: "slide",
            easing: "swing",
            controlNav: false,
            animationSpeed: 1000,
            controlsContainer: $(".slider-controls-container"),
            customDirectionNav: $(".slider-navigation a"),
            before: function(slider){
                $(slider).find(".flex-animation").each(function(){
                    $(this).removeClass("animated fadeInUp");
                    $(this).addClass("no-opacity");
                });
            },
            after: function(slider){
                $(slider).find(".flex-animation").addClass("animated fadeInUp");
            },
        });
    } catch(err) {

    }
    /*-------------------------------------------------*/
    /* =  Isotope
    /*-------------------------------------------------*/
    try {
        //projects
        var $mainContainer=$('.section[data-isotope="load-more"] .projects-items');
        $mainContainer.imagesLoaded( function(){

                /*-------------------------------------------------*/
                /* =  Load More
                /*-------------------------------------------------*/

                //get all project
                var projectsContent = $('section[data-isotope="load-more"] .projects-items').contents();

                function getElements(content) {
                    var projectsItems = [];

                    //divide item in node of three elements (dimension of my code)
                    $.each( content, function( index, value ){
                        if(index % 2 == 0) {
                            projectsItems.push(content.slice(index,index + 3));
                        }
                    });

                    return projectsItems;
                }

                //remove all project items
                projectsContent.remove();

                var itemToShow = $('#projects').attr("data-isotope-show") - 1;

                //add some project items (ex. 8)
                $.each( getElements(projectsContent), function( index, value ){
                    if(index <= itemToShow ) {
                        $('section[data-isotope="load-more"] .projects-items').append(getElements(projectsContent)[index]);
                    }
                });

                //create isotope gallery
                var $container = $('.projects-items').isotope({itemSelector:'.one-item', layoutMode: 'fitRows'});
                var $filters = $('.filters');

                $filters.on('click','li',function(){
                    var filterValue=$(this).attr('data-filter');$container.isotope({
                        filter:filterValue});
                });
                $filters.each(function(i,buttonGroup){
                    var $buttonGroup=$(buttonGroup);
                    $buttonGroup.on('click','li',function(){
                        $buttonGroup.find('.is-checked').removeClass('is-checked');
                        $(this).addClass('is-checked');
                    });
                });

                //on click on filter add all the items
                $filters.on('click','li',function(){

                    var projectsContentNow = $('section[data-isotope="load-more"] .projects-items').contents();
                    var itemToShow = $('#projects').attr("data-isotope-show");

                    //compare dimension of this project to the original dimensione of project
                    if(getElements(projectsContentNow).length < getElements(projectsContent).length) {
                        var projectsItemsAppend = [];


                        //get the array minus the elements that i have add before
                        var $items = getElements(projectsContent).slice(itemToShow,getElements(projectsContent).length);

                        //append each element
                        $.each( $items, function( index, value ){
                            $container.append($(this)).isotope( 'appended', $(this) );
                        });

                        //hidden the button
                        $('.load-more').hide();
                    }

                });


                $('#btn-load').on( 'click', function() {

                    var projectsItemsAppend = [];
                    var itemToShow = $('#projects').attr("data-isotope-show");

                    //get the array minus the elements that i have add before
                    var $items = getElements(projectsContent).slice(itemToShow,getElements(projectsContent).length);

                    //append each element
                    $.each( $items, function( index, value ){
                        $container.append($(this)).isotope( 'appended', $(this) );
                    });
                    //hidden the button
                    $('.load-more').hide();
                });
        });

        var $mainContainerSimple=$('section[data-isotope="load-simple"] .projects-items');
        $mainContainerSimple.imagesLoaded( function(){

            var $container=$('.projects-items').isotope({itemSelector:'.one-item', layoutMode: 'fitRows'});
            var $simpleFilters = $('#projects .filters');

            $simpleFilters.on('click','li',function(){
                var filterValue=$(this).attr('data-filter');$container.isotope({
                    filter:filterValue});
            });
            $simpleFilters.each(function(i,buttonGroup){
                var $buttonGroup=$(buttonGroup);
                $buttonGroup.on('click','li',function(){
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });

        });

        var $masonryContainerSimple=$('section[data-isotope="load-simple"] .masonry-items');
        $masonryContainerSimple.imagesLoaded( function(){

            var $container=$('.masonry-items').isotope({itemSelector:'.one-item', layoutMode: 'masonry'});
            var $masonryFilters = $('#masonry-filters');

            $masonryFilters.on('click','li',function(){
                var filterValue=$(this).attr('data-filter');$container.isotope({
                    filter:filterValue});
            });
            $masonryFilters.each(function(i,buttonGroup){
                var $buttonGroup=$(buttonGroup);
                $buttonGroup.on('click','li',function(){
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });

        });

    } catch(err) {

    }

    //blog masonry
    try {
        var $blogContainer = $('.news-items');
        $blogContainer.imagesLoaded( function(){
            $blogContainer.isotope({itemSelector: '.one-item', layoutMode: 'fitRows' });
            $blogContainer.isotope('layout');
        });
    } catch(err) {

    }
    /*-------------------------------------------------*/
    /* =  Responsive
    /*-------------------------------------------------*/

    var parentHeightKey = [];

    $('div[data-responsive="parent-height"]').each(function() {
        parentHeightKey.push({id:$(this).attr('data-responsive-id'),height:$(this).outerHeight(true)});
    });
    $('div[data-responsive="child-height"]').each(function() {
        var childHeight;
        var childId = $(this).attr('data-responsive-id');

        for(var i=0;i<parentHeightKey.length;i++){
            if(parentHeightKey[i].id == childId) {
                childHeight = parentHeightKey[i].height;
            }
        }
        $(this).css({'height': childHeight + 'px'})
    });
    $(window).resize(function () {

        var currentWidth  =  $(window).width();

        if(currentWidth>767){
            $('div[data-responsive="parent-height"]').each(function() {
                parentHeightKey.push({id:$(this).attr('data-responsive-id'),height:$(this).outerHeight(true)});
            });
            $('div[data-responsive="child-height"]').each(function() {
                var childHeight;
                var childId = $(this).attr('data-responsive-id');

                for(var i=0;i<parentHeightKey.length;i++){
                    if(parentHeightKey[i].id == childId) {
                        childHeight = parentHeightKey[i].height;
                    }
                }
                $(this).css({'height': childHeight + 'px'})
            });
        }
    });
    /*-------------------------------------------------*/
    /* =  Magnific popup
    /*-------------------------------------------------*/
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        closeBtnInside: false,
        fixedContentPos: true
    });
    $('.project-images').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: '.lightbox',
            type: 'image',
            fixedContentPos: true,
            gallery: {
                enabled:true
            },
            closeBtnInside: false
        });
    });
    $('.lightbox-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled:true
        },
        closeBtnInside: false
    });
    /*-------------------------------------------------*/
    /* =  Menu
    /*-------------------------------------------------*/
    try {
        $('#post-wrap').on("click",'#share',function() {
            $('#post-wrap #share .share-icons').show();
            $('#post-wrap #share .share-icons').toggleClass('open');
        });

    } catch(err) {

    }
    /*-------------------------------------------------*/
    /* =  Count increment
    /*-------------------------------------------------*/
    try {
        $('#counters').appear(function() {
            $('#counters .statistic span').countTo({
                speed: 4000,
                refreshInterval: 60,
                formatter: function (value, options) {
                    return value.toFixed(options.decimals);
                }
            });
        });
    } catch(err) {

    }
    /*-------------------------------------------------*/
    /* =  Appear
    /*-------------------------------------------------*/
    try {
        $('#flexslider-nav #text').appear(function() {
            $('#counters .statistic span').countTo({
                speed: 4000,
                refreshInterval: 60,
                formatter: function (value, options) {
                    return value.toFixed(options.decimals);
                }
            });
        });
    } catch(err) {

    }
    /*-------------------------------------------------*/
    /* =  My color
    /*-------------------------------------------------*/
    try {
        $('span.mycolor').each(function() {
            var bColor = $(this).attr('data-color');

            $(this).css({'background-color': bColor})
        });
    } catch(err) {

    }
    /*-------------------------------------------------*/
    /* =  Contact Form
    /*-------------------------------------------------*/

    /*-------------------------------------------------*/
    /* =  Typing
    /*-------------------------------------------------*/
    try {
        var firstSentence = $("#typed").attr('data-typed-first');
        var secondSentence = $("#typed").attr('data-typed-second');
        $("#typed").typed({
            strings: [firstSentence, secondSentence],
            loop: true,
            typeSpeed: 150
        });
    } catch(err) {

    }
})(jQuery);

$(document).ready(function($) {
    "use strict";

    var is_mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    /*-------------------------------------------------*/
    /* =  fullpage
    /*-------------------------------------------------*/
    $('#fullpage').fullpage({
        navigation: true,
        paddingTop: '130px',
    });
    /*-------------------------------------------------*/
    /* =  Carousel
    /*-------------------------------------------------*/
    try {
        $(".news-carousel").owlCarousel({
            loop:true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            items:1,
            autoplay:true,
            autoplayHoverPause:false,
            mouseDrag:false,
            dots:false
        });
        $(".testimonials-carousel").owlCarousel({
            loop:true,
            animateOut: 'fadeOut',
            animateIn: 'slideInUp',
            items:1,
            autoplay:true,
            mouseDrag:true,
            dots:true
        });
        $(".testimonials-carousel-simple").owlCarousel({
            loop:true,
            items:2,
            autoplay:true,
            dots:true,
            autoplayTimeout:10000,
            responsive : {
                0 : {
                    items:1
                },
                650 : {
                    items:1
                },
                991 : {
                    items:1
                }
            }
        });
        $(".showcase-carousel").owlCarousel({
            loop:true,
            items:3,
            margin:0,
            autoplay:false,
            dots:false,
            nav:true,
            navSpeed:1000,
            dotsSpeed:1000,
            navText: ["<i class='ion-chevron-left'>","<i class='ion-chevron-right'>"],
            responsive : {
                0 : {
                    items:1
                },
                650 : {
                    items:2
                },
                991 : {
                    items:3
                }
            }
        });
        
        $(".post-gallery").owlCarousel({
            center: true,
            items:1,
            loop:true,
            margin:50,
            responsive:{
                991:{
                    items:1,
                    stagePadding: 300,
                }
            }
        });
        $(".image-carousel").owlCarousel({
            loop:true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            items:1,
            autoplay:false,
            autoplayHoverPause:false,
            dots:true,
            nav:true,
            navText: ['<span><i class="icon ion-ios-arrow-left"></i></span>','<span><i class="icon ion-ios-arrow-right"></i></span>']
        });
    } catch(err) {

    }
    /*-------------------------------------------------*/
    /* =  Scroll between sections
    /*-------------------------------------------------*/
    $('a.btn-alt[href*=#], a.btn-pro[href*=#], a.anchor[href*=#]').on("click",function(event) {
        var $this = $(this);
        var offset = -70;
        $.scrollTo( $this.attr('href') , 850, { easing: 'swing' , offset: offset , 'axis':'y' } );
        event.preventDefault();
    });
    /*-------------------------------------------------*/
    /* =  Skills
    /*-------------------------------------------------*/
    try {
        $('#skills').appear(function() {
            jQuery('.skill-list li span').each(function(){
                jQuery(this).animate({
                    width:jQuery(this).attr('data-percent')
                },2000);
            });
            $('.skill-list li .count').each(function () {
                var number = $(this).attr('data-to');
                $(this).prop('Counter',0).animate({
                    Counter: number
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
    } catch(err) {

    }
    /*-------------------------------------------------*/
    /* =  Modaal
    /*-------------------------------------------------*/
    try {
        $(".inline").modaal({
            background:'#fff',
            overlay_opacity: 1
        });
    } catch(err) {

    }
    /*-------------------------------------------------*/
    /* =  Added Custom Modal 
    /*-------------------------------------------------*/
        $('.popup').click(function(){
          var buttonId = $(this).attr('id');
          $('#modal-container').removeAttr('class').addClass(buttonId);
          $('body').addClass('modal-active');
        })

        $('#modal-container').click(function(){
          $(this).addClass('out');
          $('body').removeClass('modal-active');
        });
    /*-------------------------------------------------*/
    /* =  Added Hospital discount list  
    /*-------------------------------------------------*/                    
        $("#discount-panel").click(function(){
            $("#panel-show").slideDown("slow");
            $("#discount-panel").addClass("active");
        });
    
    /*-------------------------------------------------*/
    /* =  Doctor details page datepicker
    /*-------------------------------------------------*/
        // var SelectDate=$('#dateInput').val() ;
        //
        // $(function() {
        //   $( ".calendar" ).datepicker({
        //         dateFormat: 'yy-mm-dd',
        //         minDate: '1',
        //         maxDate: '15',
        //         defaultDate: SelectDate
        //   });
        //
        //     $(document).on('click', '.date-picker .input', function(e){
        //         var $me = $(this),
        //                 $parent = $me.parents('.date-picker');
        //         $parent.toggleClass('open');
        //     });
        //
        //
        //     $(".calendar").on("change",function(){
        //         var $me = $(this),
        //                 $selected = $me.val(),
        //                 $parent = $me.parents('.date-picker');
        //         $parent.find('.result').children('span').html($selected);
        //         $parent.find('#dateInput').val($selected);
        //
        //     });
        // });

    /*-------------------------------------------------*/
    /* =  Doctor details page Modal
    /*-------------------------------------------------*/
      var Modal = (function() {
      var trigger = $qsa('.modal__trigger'); // what you click to activate the modal
      var modals = $qsa('.modal'); // the entire modal (takes up entire window)
      var modalsbg = $qsa('.modal__bg'); // the entire modal (takes up entire window)
      var content = $qsa('.modal__content'); // the inner content of the modal
        var closers = $qsa('.modal__close'); // an element used to close the modal
      var w = window;
      var isOpen = false;
        var contentDelay = 400; // duration after you click the button and wait for the content to show
      var len = trigger.length;

      // make it easier for yourself by not having to type as much to select an element
      function $qsa(el) {
        return document.querySelectorAll(el);
      }

      var getId = function(event) {

        event.preventDefault();
        var self = this;
        // get the value of the data-modal attribute from the button
        var modalId = self.dataset.modal;
        var len = modalId.length;
        // remove the '#' from the string
        var modalIdTrimmed = modalId.substring(1, len);
        // select the modal we want to activate
        var modal = document.getElementById(modalIdTrimmed);
        // execute function that creates the temporary expanding div
        makeDiv(self, modal);
      };

      var makeDiv = function(self, modal) {

        var fakediv = document.getElementById('modal__temp');

        /**
         * if there isn't a 'fakediv', create one and append it to the button that was
         * clicked. after that execute the function 'moveTrig' which handles the animations.
         */

        if (fakediv === null) {
          var div = document.createElement('div');
          div.id = 'modal__temp';
          self.appendChild(div);
          moveTrig(self, modal, div);
        }
      };

      var moveTrig = function(trig, modal, div) {
        var trigProps = trig.getBoundingClientRect();
        var m = modal;
        var mProps = m.querySelector('.modal__content').getBoundingClientRect();
        var transX, transY, scaleX, scaleY;
        var xc = w.innerWidth / 2;
        var yc = w.innerHeight / 2;

        // this class increases z-index value so the button goes overtop the other buttons
        trig.classList.add('modal__trigger--active');

        // these values are used for scale the temporary div to the same size as the modal
        scaleX = mProps.width / trigProps.width;
        scaleY = mProps.height / trigProps.height;

        scaleX = scaleX.toFixed(3); // round to 3 decimal places
        scaleY = scaleY.toFixed(3);


        // these values are used to move the button to the center of the window
        transX = Math.round(xc - trigProps.left - trigProps.width / 2);
        transY = Math.round(yc - trigProps.top - trigProps.height / 2);

            // if the modal is aligned to the top then move the button to the center-y of the modal instead of the window
        if (m.classList.contains('modal--align-top')) {
          transY = Math.round(mProps.height / 2 + mProps.top - trigProps.top - trigProps.height / 2);
        }


            // translate button to center of screen
            trig.style.transform = 'translate(' + transX + 'px, ' + transY + 'px)';
            trig.style.webkitTransform = 'translate(' + transX + 'px, ' + transY + 'px)';
            // expand temporary div to the same size as the modal
            div.style.transform = 'scale(' + scaleX + ',' + scaleY + ')';
            div.style.webkitTransform = 'scale(' + scaleX + ',' + scaleY + ')';


            window.setTimeout(function() {
                window.requestAnimationFrame(function() {
                    open(m, div);
                });
            }, contentDelay);

      };

      var open = function(m, div) {

        if (!isOpen) {
          // select the content inside the modal
          var content = m.querySelector('.modal__content');
          // reveal the modal
          m.classList.add('modal--active');
          // reveal the modal content
          content.classList.add('modal__content--active');

          /**
           * when the modal content is finished transitioning, fadeout the temporary
           * expanding div so when the window resizes it isn't visible ( it doesn't
           * move with the window).
           */

          content.addEventListener('transitionend', hideDiv, false);

          isOpen = true;
        }

        function hideDiv() {
          // fadeout div so that it can't be seen when the window is resized
          div.style.opacity = '0';
          content.removeEventListener('transitionend', hideDiv, false);
        }
      };

      var close = function(event) {

            event.preventDefault();
        event.stopImmediatePropagation();

        var target = event.target;
        var div = document.getElementById('modal__temp');

        /**
         * make sure the modal__bg or modal__close was clicked, we don't want to be able to click
         * inside the modal and have it close.
         */

        if (isOpen && target.classList.contains('modal__bg') || target.classList.contains('modal__close')) {

          // make the hidden div visible again and remove the transforms so it scales back to its original size
          div.style.opacity = '1';
          div.removeAttribute('style');

                /**
                * iterate through the modals and modal contents and triggers to remove their active classes.
          * remove the inline css from the trigger to move it back into its original position.
                */

                for (var i = 0; i < len; i++) {
                    modals[i].classList.remove('modal--active');
                    content[i].classList.remove('modal__content--active');
                    trigger[i].style.transform = 'none';
            trigger[i].style.webkitTransform = 'none';
                    trigger[i].classList.remove('modal__trigger--active');
                }

          // when the temporary div is opacity:1 again, we want to remove it from the dom
                div.addEventListener('transitionend', removeDiv, false);

          isOpen = false;

        }

        function removeDiv() {
          setTimeout(function() {
            window.requestAnimationFrame(function() {
              // remove the temp div from the dom with a slight delay so the animation looks good
              div.remove();
            });
          }, contentDelay - 50);
        }

      };

      var bindActions = function() {
        for (var i = 0; i < len; i++) {            
          trigger[i].addEventListener('click', getId, false);
          closers[i].addEventListener('click', close, false);
          modalsbg[i].addEventListener('click', close, false);
        }
      };

      var init = function() {
        bindActions();
      };

      return {
        init: init
      };

    }());
        Modal.init();
    
    /* Profile page tab*/
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
    /*Ask a Doctor Page login area*/
    /*Ask a Doctor Page login area*/
    /*$(".ask-login").click(function(){
        $(".ask-doc-login").fadeIn();
    });
    $(".ask-close").click(function(){
        $(".ask-doc-login-out").fadeOut();
    });*/
    $('#close-panel').click(function() {
        $('#exp').slideToggle('slow');
        $(this).toggleClass('transform');
    });

});
