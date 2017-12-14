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

    var stickyHeaderTop = $('#sticky-wrapper').offset().top;
    $(window).scroll(function () {
        if ($(window).scrollTop() > stickyHeaderTop - 40) {
            $('#sticky-wrapper').css({position: 'fixed', top: '40px'});
        } else {
            $('#sticky-wrapper').css({position: 'relative', top: '0px'});
        }
    });

// var stickySideBar = $('.cart-container').offset().top;
//    $(window).scroll(function () {
//        if ($(window).scrollTop() > stickySideBar - 40) {
//            $('.cart-container').css({position: 'fixed', top: '40px'});
//        } else {
//            $('.cart-container').css({position: 'relative', top: '0px'});
//        }
//    });
});
        