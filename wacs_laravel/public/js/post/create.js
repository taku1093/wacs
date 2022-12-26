// 画像
$(function () {
        var num = 1;
        var view_count = document.querySelectorAll("div[id]").length;

        function imgView(n) {
            var reader = new FileReader();
            document.getElementById('file_' + n).onchange = function (e) {
                reader.addEventListener('load', function (e) {
                    $('#view_' + n).html('<img class="post_img" src="' + e.target.result + '" />');
                });
                reader.readAsDataURL(this.files[0]);
            }

        }

        imgView(num);

        $('button#add').click(function () {

            if(view_count === 3 ){
                    $('#message').html('※ 追加フォームは' + view_count + '個までです。<br>');
            }else{
    
                num = num + 1;
                view_count = view_count + 1;
    
                var tr_form = '' +
                    '<dd>' +
                        '<div  id="view_' + num + '"></div><input type="file" id="file_' + num + '" name="post_img'+ num +'" accept="image/*" autocomplete="post_img"/>' +
                    '</dd>';
                $(tr_form).appendTo($('#img'));
                //$('#reload').html('<input type="button" value="リロードする" onclick="window.location.reload();" /><br>');
    
                imgView(num);
            }
        });

});

//テキスト 材料
$(function () {
    var num = 1;
    var view_count = document.querySelectorAll("div[id]").length;

    // function imgView(n) {
    //     var reader = new FileReader();
    //     document.getElementById('file_' + n).onchange = function (e) {
    //         reader.addEventListener('load', function (e) {
    //             $('#view_' + n).html('<img class="post_img" src="' + e.target.result + '" />');
    //         });
    //         reader.readAsDataURL(this.files[0]);
    //     }

    // }

    // imgView(num);

    $('button#add_material').click(function () {

        if(view_count === 10 ){
                $('#message_material').html('※ 追加フォームは' + view_count + '個までです。<br>');
        }else{

            num = num + 1;
            view_count = view_count + 1;

            var tr_form = '' +
                '<dd>' +
                '● <input id="material_name'+ num + '" class="input-text validate[required,maxSize[16]]" type="text" name="material_name'+ num + '" placeholder="材料">' +
                '</dd>';
            $(tr_form).appendTo($('#material'));
            //$('#reload').html('<input type="button" value="リロードする" onclick="window.location.reload();" /><br>');

            imgView(num);
        }
    });

});

//テキスト 道具
$(function () {
    var num = 1;
    var view_count = document.querySelectorAll("div[id]").length;


    $('button#add_tool').click(function () {

        if(view_count === 10 ){
                $('#message_tool').html('※ 追加フォームは' + view_count + '個までです。<br>');
        }else{

            num = num + 1;
            view_count = view_count + 1;

            var tr_form = '' +
                '<dd>' +
                '● <input id="tool" class="input-text validate[required,maxSize[16]]" type="text" name="tool" placeholder="道具">' +
                '</dd>';
            $(tr_form).appendTo($('#tool'));
            //$('#reload').html('<input type="button" value="リロードする" onclick="window.location.reload();" /><br>');

            imgView(num);
        }
    });

});





