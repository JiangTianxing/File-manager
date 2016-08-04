$(".delete-button").on('click',function () {
    var path = $(this).attr("attr-path");
    var url = SCOPE.delete_url;
    layer.confirm(
        '确定删除吗?',
        {btn: ['是','否']},
        function () {
            todelete(path,url);
        }
    )
});
function todelete(path,url) {
    $.post(
        url,
        {'path':path},
        function(result) {
            if(result.status == 1) {
                return dialog.success(result.message,result.data['url']);
            }else if(result.status == 0) {
                return dialog.error(result.message);
            }
        },
        'json'
    )
}