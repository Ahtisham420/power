
    $('.newbasicpackagedetail').slick({
        arrows:true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: false,
        prevArrow: '<i class="fas fa-chevron-left"></i>' ,
        nextArrow: '<i class="fas fa-chevron-right"></i>',


        responsive: [
          {
            breakpoint: 992,
            settings: {
              arrows: true,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 2,

            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: true,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: true,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]

      });

      $('.packagedetaillogin').slick({
        arrows:true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,

        prevArrow: '<i class="fas fa-chevron-left"></i>' ,
        nextArrow: '<i class="fas fa-chevron-right"></i>',
        responsive: [
          {
            breakpoint: 992,
            settings: {
              arrows: true,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 2
            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: true,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: true,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]

      });

    $('.audimainimg').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        centerMode: true,
        fade: true,
        dots: false,
        adaptiveHeight: true, //add this line
        asNavFor: '#thumb_img_detail',


    });
    $('#thumb_img_detail').slick({
        slidesToShow:2,
        slidesToScroll: 1,
        asNavFor: '.audimainimg',
        arrow:true,
        dots: false,
        vertical:true,
        verticalSwiping:true,
        focusOnSelect: true,
        prevArrow: '<div class="back-prev-arrow"><i class="fas fa-chevron-left"></i></div>' ,
        nextArrow: '<div class="next-next-arrow"> <i class="fas fa-chevron-right"></i></div>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    vertical: false,
                    verticalSwiping:false,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    vertical: true,
                    verticalSwiping:true,
                }
            },
            {
                breakpoint: 766,
                settings: {
                    vertical: false,
                    verticalSwiping:false,
                }
            }
    ]
    });




//

//

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        vertical:true,
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true,
        verticalSwiping:true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    vertical: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    vertical: false,
                }
            },
            {
                breakpoint: 580,
                settings: {
                    vertical: false,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 380,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                }
            }
        ]
    });
