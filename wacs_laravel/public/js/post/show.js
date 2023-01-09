$(function () {
    var num = 1;
    var view_count = document.querySelectorAll("div[id]").length;

    $('button#reply').click(function () {

        if(view_count === 1 ){
                $('#message_material').html('※ 追加フォームは' + view_count + '個までです。<br>');
        }else{

            num = num + 1;
            view_count = view_count + 1;

            var tr_form = '' +
            '<div class="comment-header">'+
            '<form method="POST" >'+
            '@csrf'+
                '<div class="comment-input">'+
                    '<input type="hidden" name="post_id" value="{{ $post->id }}">'+

                    '<input id="comment_text" class="input-text validate[required,maxSize[16]]" type="text" name="comment_text" placeholder="コメントする"  >'+

                    '<button type="submit" class="btn-comment">送信</button>'+

                    '@error('+comment_text+')'
                        '<span class="invalid-feedback" role="alert">'+
                            '<strong>{{ $message }}</strong>'+
                        '</span>'+
                    '@enderror'+
                '</div>'+
            '</form>'+
        '</div>';
            $(tr_form).appendTo($('#comment-layout-info'));
            //$('#reload').html('<input type="button" value="リロードする" onclick="window.location.reload();" /><br>');

            imgView(num);
        }
    });
});