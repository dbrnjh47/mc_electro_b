$('a[href^="#"]').bind('click.smoothscroll',function (e) {
    let target = this.hash,
    $target = $(target);
    let minus = 100;
    if(window.innerWidth <= 650)
    {
        minus = 180;
    }
    console.log(minus);
    $('html, body').stop().animate({
      'scrollTop': $target.offset().top + $("body").scrollTop() - minus
    }, 500, 'swing', function () {
      window.location.hash = target;
    });
  });