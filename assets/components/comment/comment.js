$(document).ready(function () {
   $(".slider-comment").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      arrows: true,
      autoplay: true,
      autoplaySpeed: 3000,
      draggable: true,
      pauseOnFocus: false,
      swipeToSlide: true,
      cssEase: 'linear',
      prevArrow: `<button type='button' class='slick-prev slick-arrow'><ion-icon name="arrow-back-outline"></ion-icon></button>`,
      nextArrow: `<button type='button' class='slick-next slick-arrow'><ion-icon name="arrow-forward-outline"></ion-icon></button>`,
      dots: true,
      responsive: [{
            breakpoint: 1025,
            settings: {
               slidesToShow: 1,
            },
         },
         {
            breakpoint: 480,
            settings: {
               slidesToShow: 1,
               arrows: false,
               infinite: false,
            },
         },
      ],
      // autoplay: true,
      // autoplaySpeed: 1000,
   });
});