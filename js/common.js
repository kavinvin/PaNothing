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
    $(this).siblings(".cropper").children("img").stop().fadeTo('1000', 0.4);
    $(this).siblings(".cropper").children("img").velocity({left: '0px'}, {queue: false});
    $(this).siblings(".cropper").velocity({width: '250px'}, {queue: false});
    $(this).siblings(".product-name").css('color', 'white');
  },
  function() {
    $(this).siblings(".cropper").children("img").stop().fadeTo('1000', 1);
    $(this).siblings(".cropper").children("img").velocity({left: '-80px'}, {queue: false});
    $(this).siblings(".cropper").velocity({width: '70px'}, {queue: false});
    $(this).siblings(".product-name").css('color', 'black');
  }); 
  
});
