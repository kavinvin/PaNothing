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
    $(this).siblings(".sidepic").stop().fadeTo('1000', 0.4);
    $(this).siblings(".sidepic").velocity({left: '0px'}, {queue: false});
    $(this).parent().velocity({width: '250px'}, {queue: false});
    $(this).parent().siblings(".product-name").css('color', 'white');
  },
  function() {
    $(this).siblings(".sidepic").stop().fadeTo('1000', 1);
    $(this).siblings(".sidepic").velocity({left: '-80px'}, {queue: false});
    $(this).parent().velocity({width: '70px'}, {queue: false});
    $(this).parent().siblings(".product-name").css('color', 'black');
  });

});
