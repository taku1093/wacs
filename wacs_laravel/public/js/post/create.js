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

        $('button#delete').click(function () {

            if(view_count === 3 ){
                $('#message').html('');
            }
    
            if(view_count !== 1 ){
    
                num = num - 1;
                view_count = view_count - 1;
    
                var list_element = document.getElementById("img");
                var remove_element = list_element.removeChild(list_element.lastChild);
    
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
                '<div class="material_text">' +
                '<input id="material_name'+ num + '" class="input-text validate[required,maxSize[16]]" type="text" name="material_name'+ num + '" placeholder="材料">' +
                '<span><select id="material_num'+ num +'" class="validate[required] material_num" name="material_num' + num + '">'+
                '<option value="" selected="selected">数量を選択</option>'+
                            '<option value="1" data-pref-id="1">1</option>'+
                            '<option value="2" data-pref-id="2">2</option>'+
                            '<option value="3" data-pref-id="3">3</option>'+
                            '<option value="4" data-pref-id="4">4</option>'+
                            '<option value="5" data-pref-id="5">5</option>'+
                            '<option value="6" data-pref-id="6">6</option>'+
                            '<option value="7" data-pref-id="7">7</option>'+
                            '<option value="8" data-pref-id="8">8</option>'+
                            '<option value="9" data-pref-id="9">9</option>'+
                            '<option value="10" data-pref-id="10">10</option>'+
                            '<label for="material_num1"></label>'+
                        '</select></span>'+
                '</div>' +
                '</dd>';
            $(tr_form).appendTo($('#material'));
            //$('#reload').html('<input type="button" value="リロードする" onclick="window.location.reload();" /><br>');

            imgView(num);
        }
    });

    $('button#delete_material').click(function () {

        if(view_count === 10 ){
            $('#message_material').html('');
        }

        if(view_count !== 1 ){

            num = num - 1;
            view_count = view_count - 1;

            var list_element = document.getElementById("material");
            var remove_element = list_element.removeChild(list_element.lastChild);

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
                '<div class="tool_text">'+
                '<input id="tool_name'+ num + '" class="input-text validate[required,maxSize[16]]" type="text" name="tool_name' + num + '" placeholder="道具">' +
                '</div>'+
                '</dd>';
            $(tr_form).appendTo($('#tool')); 
            //$('#reload').html('<input type="button" value="リロードする" onclick="window.location.reload();" /><br>');

            imgView(num);
        }
    });

    $('button#delete_tool').click(function () {

        if(view_count === 10 ){
            $('#message_tool').html('');
        }

        if(view_count !== 1 ){

            num = num - 1;
            view_count = view_count - 1;

            var list_element = document.getElementById("tool");
            var remove_element = list_element.removeChild(list_element.lastChild);

            imgView(num);
        }
    });

});





