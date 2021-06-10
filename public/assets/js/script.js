jQuery(document).ready(function() {

    // loader
    setTimeout(function() {
        $('.loaders').fadeOut();
    }, 1000);


    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true,
        callback: function(box) {

        },
        scrollContainer: null,
        resetAnimation: true,
    });
    wow.init();


    // fixedtop
    jQuery(window).scroll(function() {

        var headerTopHeight = jQuery(".header-area").outerHeight();

        var totalHeight = headerTopHeight;


        var utd = jQuery(window).scrollTop();

        if (utd > totalHeight) {
            jQuery(".header-area").addClass("fixedtop");
        } else {
            jQuery(".header-area").removeClass("fixedtop");
        }

        return false;
    });



    $('.navbar-nav .nav-link').click(function() {
        $('.navbar-nav .nav-link').removeClass('active');
        $(this).addClass('active');
    });

    // scroll-Top

    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('.scrolltotop').fadeIn();
        } else {
            $('.scrolltotop').fadeOut();
        }


    });

    $('.scrolltotop').click(function() {
        $('html,body').animate({ scrollTop: 0 }, 1000);
        return false;
    });


    //login
    $('.input').focus(function() {
        $(this).parent().find(".label-txt").addClass('label-active');
        $(this).parent().parent().find(".lll").addClass('input-active');
        $(this).addClass('input-bg');
    });

    $(".input").focusout(function() {
        if ($(this).val() == '') {
            $(this).parent().find(".label-txt").removeClass('label-active');
            $(this).parent().parent().find(".lll").removeClass('input-active');
            $(this).removeClass('input-bg');
        };
    });


    $(function() {
        $('.bussin').change(function() {
            $(this).parent().find(".label-txt").addClass('label-active');
            $(this).parent().parent().find(".lll").addClass('input-active');
            $(this).addClass('input-bg');
        });
    });


    $('.video-modal').on('hidden.bs.modal', function() {
        var $this = $(this).find('iframe'),
        tempSrc = $this.attr('src');
        $this.attr('src', "");
        $this.attr('src', tempSrc);
    });



jQuery('.statistic-counter').counterUp({
    delay: 10,
    time: 3000
});

// owl-carousel
$('.our-services .owl-carousel').owlCarousel({
  'items': 3,
  'autoplay': true,
  'loop': true,
  'dots': true,
  'nav': true,
  'pagination': true,
  'navText': ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
  'margin': 25,
    'responsiveClass':true,
    responsive:{
        0:{
            items:1,
            nav: false
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }

});

});




(function() {
    // Init
    var containers = document.getElementById("containers"),
        inner = document.getElementById("inner");

    // Mouse
    var mouse = {
        _x: 0,
        _y: 0,
        x: 0,
        y: 0,
        updatePosition: function(event) {
            var e = event || window.event;
            this.x = e.clientX - this._x;
            this.y = (e.clientY - this._y) * -1;
        },
        setOrigin: function(e) {
            this._x = e.offsetLeft + Math.floor(e.offsetWidth / 2);
            this._y = e.offsetTop + Math.floor(e.offsetHeight / 2);
        },
        show: function() {
            return "(" + this.x + ", " + this.y + ")";
        }
    };

    // Track the mouse position relative to the center of the container.
    mouse.setOrigin(containers);

    //-----------------------------------------

    var counter = 0;
    var updateRate = 10;
    var isTimeToUpdate = function() {
        return counter++ % updateRate === 0;
    };

    //-----------------------------------------

    var onMouseEnterHandler = function(event) {
        update(event);
    };

    var onMouseLeaveHandler = function() {
        inner.style = "";
    };

    var onMouseMoveHandler = function(event) {
        if (isTimeToUpdate()) {
            update(event);
        }
    };

    //-----------------------------------------

    var update = function(event) {
        mouse.updatePosition(event);
        updateTransformStyle(
            (mouse.y / inner.offsetHeight / 2).toFixed(2),
            (mouse.x / inner.offsetWidth / 2).toFixed(2)
        );
    };

    var updateTransformStyle = function(x, y) {
        var style = "rotateX(" + x + "deg) rotateY(" + y + "deg)";
        inner.style.transform = style;
        inner.style.webkitTransform = style;
        inner.style.mozTransform = style;
        inner.style.msTransform = style;
        inner.style.oTransform = style;
    };

    //-----------------------------------------

    containers.onmouseenter = onMouseEnterHandler;
    containers.onmouseleave = onMouseLeaveHandler;
    containers.onmousemove = onMouseMoveHandler;
})();