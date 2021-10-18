$().ready(()=> {
    console.log('reaedy')

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.slider-nav'
      });
    $('.slider-nav').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        infinite: true,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 3000,
      });

      $('.slick-next').html('<i class="fa-solid fa-chevron-right"></i>');
      $('.slick-prev').html('<i class="fa-solid fa-chevron-left"></i>');


    $(".clickable").click(function(e) {
        e.preventDefault();
        window.location = $(this).find('a').attr('href');
    });

    $(".menu-toggle").click(function(e) {
        $(".mobile__menu__overlay--container").css('left', '0');
    });

    $(".menu-close").click(function(e) {
        $(".mobile__menu__overlay--container").css('left', '-100%');
    });
});
