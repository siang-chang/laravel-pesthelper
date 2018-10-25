/* Document Ready */
$(function () {
    /* goToTop 回置頁面頂端 */
    $("#goTop").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 1000);
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('#gotop').fadeIn("fast");
        } else {
            $('#gotop').stop().fadeOut("fast");
        }
    });



});
