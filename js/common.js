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

  $('.sidepic').hover(function() {
    this.parent();
  });

});
