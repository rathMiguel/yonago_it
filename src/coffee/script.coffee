$ ->
  # トップのスライダー
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
        breakpoint: 1200
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

  # セル同士の高さをそろえる
  $('.js-height').matchHeight()

  # ナビボタン
  $('.nav-bars').on 'click', ->
    $('body').toggleClass('is-navopen')
    $(this).next().slideToggle()

  # instagramの表示
  feed = new Instafeed({
      clientId: '8ef65f0b87704ca0ad94ad89fcf4067f',
      get: 'user', 
      userId: '4683078494',
      accessToken:'4683078494.8ef65f0.37254e31fa3f414ab6696f3d48d3b6a7',
      links: true,
      limit: 12,
      resolution:'standard_resolution',
      template: '<li><a href="{{link}}"><img src={{image}} alt={{caption}}></a></li>'
  });
  feed.run();

  # 店のフィルタリング
  mixer = mixitup('.js-shoplist');
  return