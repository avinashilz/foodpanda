$(document).ready(function () {
    $('#areaSearch').on('keyup', function () {
        var keyword = $(this).val();
        var searchUrl = $(this).data('url');
        if (keyword.length) {
            $.ajax({
                url: searchUrl,
                dataType: 'json',
                type: 'get',
                data: {
                    restaurantName: keyword
                },
                success: function (response) {
                    $('#searchResults').html('');
                    var restaurantUrl = $('#searchResults').data('url');
                    $.each(response, function (i, v) {
                        $('#searchResults').append('<li><a href="' + restaurantUrl + '/' + v.id + '">' + v.name + '</a></li>');
                    });

                },
                error: function (err) {

                }
            });
            return;
        } else {
            $('#searchResults').html('');
        }
    });

//select restaurant or city
    $('.area').show();
    $('.loc').hide();
    $('#one').show();
    $('#two').hide();

    $('select[name="size"]').change(function () {
        console.log($(this).val());
        if ($(this).val() === "restaurant") {
            $('.area').show();
            $('.loc').hide();
            $('#one').show();
            $('#two').hide();
            $('#areaSearch').prop('disabled', false);
        }
        if ($(this).val() === "city") {

            $('.area').hide();
            $('.loc').show();
            $('#one').hide();
            $('#two').show();


        }
    });

//geolocation
    $(".placepicker").placepicker();
    $(".placepicker").each(function () {
        var target = this;
        var $collapse = $(this).parents('.form-group').next('.collapse');
        var $map = $collapse.find('.placepicker-map');
        var placepicker = $(this).placepicker({
            map: $map.get(0),
            placeChanged: function (place) {
                console.log("place changed: ", place.formatted_address, this.getLocation());
            }
        }).data('placepicker');
    });
    $('.refer').on('click', function (e) {
        var jump = $(this).attr('href');
        var new_position = $(jump).offset();
        $('html, body').stop().animate({scrollTop: new_position.top}, 400);
        e.preventDefault();
    });
    $('.menu-food-category-list').floatit();
    $('.my-order').floatit();
    $('.food-category-list').floatit();


//    var stickyHeaderTop = $('#sticky-wrapper').offset().top;
//    $(window).scroll(function () {
//        if ($(window).scrollTop() > stickyHeaderTop - 40) {
//            $('#sticky-wrapper').css({position: 'fixed', top: '40px'});
//        } else {
//            $('#sticky-wrapper').css({position: 'relative', top: '0px'});
//        }
//    });

// var stickyHeaderTop = $('.menu-food-category-list').offset().top;
//    $(window).scroll(function () {
//        if ($(window).scrollTop() > stickyHeaderTop - 40) {
//            $('#sticky-wrapper').css({position: 'fixed', top: '40px'});
//        } else {
//            $('#sticky-wrapper').css({position: 'relative', top: '0px'});
//        }
//    });
// var stickySideBar = $('.cart-container').offset().top;
//    $(window).scroll(function () {
//        if ($(window).scrollTop() > stickySideBar - 40) {
//            $('.cart-container').css({position: 'fixed', top: '40px'});
//        } else {
//            $('.cart-container').css({position: 'relative', top: '0px'});
//        }
//    });

    $('.additem').on('click', function (e) {
        e.preventDefault();
        var Name = $(this).siblings(':first').text();
        console.log(Name);
        
        var Price = $(this).prev().text();
          console.log(Price);
        
        var urlsearch = $(this).attr('href');
        console.log(urlsearch);

        $.ajax({
            url: urlsearch,
            dataType: 'json',
            type: 'get',
            data: {
                name: Name,
                price: Price
            },
            success: function (response) {
                
                $(".basket p").html('');
                $.each(response, function (i, v) {
                    $(".basket p").append( v.name + v.price );
                });
            },
              error: function (err) {

                }
        });
    });

   
});
        