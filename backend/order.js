$(document).ready(function() {
    $(".del").click(function() {
        $(this).closest(".orderlist").parent().fadeOut(1000);
    });

});
