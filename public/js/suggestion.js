$("#suggestSubmit").click(function () {
    var num = $("#num").val();
    var suggest = $("#suggest").val();
    var email = $("#email").val();
    thisUrl = LaravelUrl + "suggestion";
    $.ajax({
        type: "POST",
        url: thisUrl,
        data: {
            num: num,
            suggest: suggest,
            email: email
        },
        success: function (data) {
            if (data = 'success') {
                /* 建議傳送成功 -> 顯示感謝訊息 */
                var title = "感謝視窗";
                var inner = "我們已經收到您的寶貴建議<br/>感謝您的回覆！";

            } else {
                /* 建議傳送失敗 -> 顯示錯誤訊息 */
                var title = "錯誤";
                var inner = "對不起，建議傳送失敗<br/>請重新嘗試提出建議";
            }
            $('.prompt-message').children('.modal-dialog').children('.modal-content').children('.modal-header').children('h4').html(title);
            $('.prompt-message').children('.modal-dialog').children('.modal-content').children('.modal-body').children('.cta').html(inner);
            $('.prompt-message').modal('show');
        }
    })
});
