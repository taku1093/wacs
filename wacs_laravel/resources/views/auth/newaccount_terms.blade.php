<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>利用規約 | WACS</title>
    <meta name="description" content="利用規約ページです。">
    <link href="./newaccount_terms.css" rel="stylesheet">
</head>
<body>
    <h2>利用規約</h2>
    
    <div id="area" class="box">
        <p class="section">第1条(ご利用にあたって)</p>
        <p class="subsection">あいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえお</p>
        <p class="section">第2条(著作権について)</p>
        <p class="subsection">あいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえお</p>
        <p class="section">第3条(道具レンタルについて)</p>
        <p class="subsection">あいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえおあいうえお</p>
    </div>
    <form action="newaccount_create.html" method="get">     
        <dl class="form-area">
            <dt><input id="check" type="checkbox" name="kiyaku" disabled> 利用規約に同意する</dt>
            <div class="back"><dt><input id="submit" type="submit" value="アカウント情報登録ページへ"></dt></div>
            <!-- <dt><input id="submit" type="submit" value="アカウント情報登録ページへ"></dt> -->
        </dl>
    </form>

    <script>
        let box = document.getElementsByClassName('box');
            box[0].onscroll = (event) => {
            if (event.target.clientHeight + event.target.scrollTop === event.target.scrollHeight) {
                document.getElementById('check').disabled = false;
            }       
        }
    </script>
</body>
</html>