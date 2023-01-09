
  
    $(".openbtn").click(function () {
    $(this).toggleClass('active');
    });
  

  
  
    (function () {
      document.addEventListener('DOMContentLoaded', function() { // HTML解析が終わったら
        // var array_10 = [];
        // for (var i = 1; i <= 10; i++) {
        //   const btn = array_10.push(document.getElementById('dropdown__btn' + i)); // ボタンをidで取得
        // }
        const btn = document.getElementById('dropdown__btn1'); 
        if(btn) { // ボタンが存在しないときにエラーになるのを回避
          btn.addEventListener('click', function(){ //ボタンがクリックされたら
            this.classList.toggle('is-open'); // is-openを付加する
          });
        }
      });
    }());
 