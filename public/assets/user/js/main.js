$(document).ready(function() {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 100
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 50
        }
    });
    
    //wow-js
    new WOW().init();

    $('html').on('DOMMouseScroll mousewheel', function (e) {
      if(e.originalEvent.detail > 0 || e.originalEvent.wheelDelta < 0) { //alternative options for wheelData: wheelDeltaX & wheelDeltaY
        //scroll down
        $( "#mainNav" ).addClass( "hide-nav-bar" );
      } else {
        //scroll up
        $( "#mainNav" ).removeClass( "hide-nav-bar" );
      }
    });

    //slider-banner
    $('.myslider').slick({
        infinite: true,
        speed: 300,
        autoplay: false,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        arrows: true,
        prevArrow: '<div class="btn-prev"><i class=" fa fa-angle-left"></i></div>',
        nextArrow: '<div class="btn-next"><i class=" fa fa-angle-right"></i></div>',
        dots: true,
    });

    $('#container_chart .content-step3').hide();

    //step - collapse 
    $(".content-step1").on("hide.bs.collapse", function() {
        $(".collapse1").html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
    });
    $(".content-step1").on("show.bs.collapse", function() {
        $(".ollapse1").html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
    });
    $(".chart-data").on("hide.bs.collapse", function() {
        $(".collapse2").html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
    });
    $(".chart-data").on("show.bs.collapse", function() {
        $(".collapse2").html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
    });
    $(".content-step").on("hide.bs.collapse", function() {
        $(".collapse3").html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
    });
    $(".content-step").on("show.bs.collapse", function() {
        $(".collapse3").html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
    });

    //slider-team
    $('.collection-wrapper').slick({
        infinite: true,
        speed: 1000,
        autoplay: false,
        autoplaySpeed: 5000,
        slidesToScroll: 1,
        slidesToShow: 4,
        arrows: true,
        prevArrow: '<div class="btn-prev"><i class=" fa fa-angle-left"></i></div>',
        nextArrow: '<div class="btn-next"><i class=" fa fa-angle-right"></i></div>',
        dots: true,
        responsive: [{
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                dots: false,
            }
        }]
    });

    //partner
    $('.partner-wrapper').slick({
        infinite: true,
        speed: 1000,
        //autoplay: true,
        autoplaySpeed: 1000,
        slidesToShow: 6,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        responsive: [{
                breakpoint: 767,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 3,
                }
            }
        ]
    });

    setTimeout(function() {
        $('.grid-topic').isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
        });
    }, 500);
    $(' .isotope-nav button').click(function() {
        $('.isotope-nav button').removeClass('active');
        $(this).addClass('active');
        var selector = $(this).attr('data-filter');
        $('.grid-topic').isotope({
            filter: selector
        });
        return false
    });


    if ($('.back-top').length) {
        var scrollTrigger = 100; // px
        var backToTop = function() {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('.back-top .link').addClass('show');
            } else {
                $('.back-top .link').removeClass('show');
            }
        };
        backToTop();
        $(window).on('scroll', function() {
            backToTop();
        });
        $('.back-top .link').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }    


    ///////////////////////////////
    //      login + register     //
    //////////////////////////////

    // register
    $('#btn_register').on('click', function(e) {
        e.preventDefault();
        var url = $('#frm_register').attr('action');
        var data = $('#frm_register').serialize();
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(res) {
                clear_error('frm_register');
                if (res.errors == null || res.errors == '') {
                    swal({
                            title: "Logged in!",
                            text: "Welcome to Drawchart website.",
                            type: "success",
                            timer: 1000,
                        },
                        function() {
                            window.location.reload();
                        });
                } else {
                    associate_errors(res.errors, 'frm_register');
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    });
    // login
    $('#btn_login').on('click', function(e) {
        e.preventDefault();
        var url = $('#frm_login').attr('action');
        var data = $('#frm_login').serialize();
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(res) {
                clear_error('frm_login');
                if (res.errors == null || res.errors == '') {
                    $('.close').trigger('click');
                    swal({
                            title: "Logged in!",
                            text: "Welcome to Drawchart website.",
                            type: "success",
                            timer: 1000,
                        },
                        function() {
                            window.location.reload();
                        });

                } else {
                    associate_errors(res.errors, 'frm_login');
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    });

    //////////////////////////////
    //         mycollect         //
    //////////////////////////////
    $('#btn_mycollect').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'get',
            url: url,
            success: function(data) {
                if(data != null && data !=""){
                    $('#modal_mycollect').html(data);
                    $('#modal_mycollect').modal('show');
                }
                else
                    swal({
                        title: 'Info',
                        text: 'My collection empty!',
                        confirmButtonColor: "#38c7e0",
                        type: "info"
                    }); 
            }
        });
    });

     //////////////////////////////
     //        DELETE mycollect  //
    //////////////////////////////
    $(document).on('click', '#del_mycollect', function(e) {
        e.preventDefault();
        var title = 'Bạn chắc không?';
        var text = 'Bạn chắc chắn muốn xóa biểu đồ này?';
        var url = $(this).attr('href');  
        var id = $(this).attr('data');
        //$('#'+ id).remove(); 
        swal({
                title: title,
                text: text,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Đồng ý!",
                cancelButtonText: "Không!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'get',
                        url: url,
                       success: function(data){
                        if(data.errors == null) {
                            swal({
                                title: 'Deleted!',
                                text: data.success,
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                                
                            }, function(cfr) { $('#'+ id).remove(); });
                        }
                        else {
                            swal({
                                title: 'Errors!',
                                text: data.error,
                                confirmButtonColor: "#66BB6A",
                                type: "error"
                            });  
                        }
                    },
                        error: function(res) {
                            console.log(res);
                        }
                    });
                }
            }
        );
    });
      /////////////////////////////
     //         contact         //
    /////////////////////////////
    $('#btn_send_mail').on('click', function(e) {
        e.preventDefault();
        var url = $('#form_send_mail').attr('action');
        var data = $('#form_send_mail').serialize();
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(res) {
                clear_error('form_send_mail');
                if (res.errors == null || res.errors == '') {
                    sweetAlert("Sent!", res.success, "success");
                } else {
                    associate_errors(res.errors, 'form_send_mail');
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    });
});
// SUPPORT FUNCTION
// 
//
function clear_error(id_form) {
    $('#' + id_form + ' input').each(function(k, v) {
        var group = $('#' + id_form + ' #' + v['name']);
        if (group.length) {
            group.removeClass('has-error');
            group.find('.help-block').text('');
        }
    });
}

function associate_errors(errors, id_form) {
    $.each(errors, function(k, v) {
        var group = $('#' + id_form + ' #' + k);
        group.addClass('has-error');
        group.find('.help-block').text(v);
    });
}