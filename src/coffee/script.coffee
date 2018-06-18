$ ->
  $('.js-slider-top').slick
    autoplay: true
    arrows: true
    dots: true
    infinite: true
    centerMode: true
    slidesToShow: 1
    variableWidth: true
    speed: 1200
    autoplaySpeed: 5000
    initialSlide: 1
    cssEase: 'ease-in-out'
    responsive: [
      {
        breakpoint: 1367
        settings:
          centerMode: false
          variableWidth: false
      },
      {
        breakpoint: 768
        settings:
          centerMode: false
          variableWidth: false
          initialSlide: 3
      }
    ]

  $('.js-height').matchHeight()

  $('.nav-bars').on 'click', ->
    $('body').toggleClass('is-navopen')
    $(this).next().slideToggle()
  return