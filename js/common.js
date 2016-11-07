$(document).ready(function() {
  $('#header').owlCarousel({
    navigation : false,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem : true,
    autoPlay : true,
  });

  $('.arrowup').click(function() {
    $(this).siblings('input').val(function(i, oldval) {
      if (oldval >= 99) {
        return oldval;
      }
      return ++oldval;
    });
  });

  $('.arrowdown').click(function() {
    $(this).siblings('input').val(function(i, oldval) {
      if (oldval == 0) {
        return oldval
      }
      return --oldval;
    });
  });

  $('.checkhover').hover(function() {
    $(this).siblings(".sidepic").stop().fadeTo('1000', 0.5);
    $(this).siblings(".sidepic").animate({left: '0px'}, {queue: false})
    $(this).siblings(".sidepic").animate({top: '-20px'}, {queue: false});
    $(this).siblings(".sidepic").animate({height: '200%'}, {queue: false});
    $(this).parent().animate({width: '260px'}, {queue: false});
    $(this).parent().siblings(".product-name").css('color', 'white');
  },
  function() {
    $(this).siblings(".sidepic").stop().fadeTo('1000', 1);
    $(this).siblings(".sidepic").animate({left: '-60px'}, {queue: false});
    $(this).siblings(".sidepic").animate({top: '0px'}, {queue: false});
    $(this).siblings(".sidepic").animate({height: '100%'}, {queue: false});
    $(this).parent().animate({width: '50px'}, {queue: false});
    $(this).parent().siblings(".product-name").css('color', 'black');
  }); 
  
});
