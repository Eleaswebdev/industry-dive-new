$(document).ready(function(){

    function headerFixed() {
        var logoHeight = $('.header_logo').outerHeight();
        var menuHeight = $('.id_grid_container').outerHeight();
        if ($(window).scrollTop() > 300) {
            $(".header").addClass("fixed-top");
            $('.custom_height').css({
                height: `${menuHeight}px`
            })
        } else {
            $(".header").removeClass("fixed-top");
            $('.custom_height').css({
                height: 'auto'
            })
        }
    }
    $(window).on('scroll', function () {
        headerFixed();
    });

    function resizeHeader() {
        if (w > 1024) {
            headerFixed();
        } 
    }
    var w = $(window).width();
    resizeHeader();

    $(window).resize(function () {
        headerFixed();
        resizeHeader()
    });

    
    $('.btn-load-more').click(function(e) {

        e.preventDefault();
        var button = $(this),
            data = {
                'action': 'loadmore',
                'limit': limit,
                'page': page,
                'type': type,
                'category': category
            };

        $.ajax({
            url: loadmore_params.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
                button.text('Loading...'); // change the button text, you can also add a preloader image
            },
            success: function(data) {
                
                if (data) {
                   $(".latest_posts_wrapper").append(data);
                    page++;
                    button.text('More Articles');
                    if (page == max_pages_latest)
                        button.remove(); // if last page, remove the button
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });

});