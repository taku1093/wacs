//初回のみモーダルをすぐ出す判定。flagがモーダル表示のstart_open後に代入される
/*var access = $.cookie('access')
if(!access){
  flag = true;
  $.cookie('access', false);
}else{
  flag = false 
}

//モーダル表示
$(".modal-open").modaal({
start_open:flag, // ページロード時に表示するか
overlay_close:true,//モーダル背景クリック時に閉じるか
before_open:function(){// モーダルが開く前に行う動作
  $('html').css('overflow-y','hidden');//縦スクロールバーを出さない
},
after_close:function(){// モーダルが閉じた後に行う動作
  $('html').css('overflow-y','scroll');//縦スクロールバーを出す
}
});*/

//ログイン画面のスクリプト
$(document).ready(function(){
    var formInputs = $('input[type="email"],input[type="password"]');
    formInputs.focus(function() {
        $(this).parent().children('p.formLabel').addClass('formTop');
        $('div#formWrapper').addClass('darken-bg');
        $('div.logo').addClass('logo-active');
    });
    formInputs.focusout(function() {
        if ($.trim($(this).val()).length == 0){
        $(this).parent().children('p.formLabel').removeClass('formTop');
        }
        $('div#formWrapper').removeClass('darken-bg');
        $('div.logo').removeClass('logo-active');
    });
    $('p.formLabel').click(function(){
        $(this).parent().children('.form-style').focus();
    });
    });

// パスワードの目
//  id="view"を取得
let viewicon = document.getElementById('view');

//  id="password"を取得
let inputtype = document.getElementById('password');

//  id="view"クリック時の処理を設定
$('#view').on('click', function () {

       //  passwordからtextへ
       if(inputtype.type === 'password'){
              inputtype.type = 'text';
              viewicon.innerHTML = '<i class="far fa-eye"></i>';

        //  textからpasswordへ
        } else {
               inputtype.type = 'password';
               viewicon.innerHTML = '<i class="far fa-eye-slash"></i>';
        }
});