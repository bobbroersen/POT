$(document).ready(function(){
    $('.your-class').slick({
    dots: true,
    prevArrow: false,
    nextArrow: false,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
    {
    breakpoint: 768,
    settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
    }
    },
    {
    breakpoint: 480,
    settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
    }
    }
]
    });
});