@extends('admin.base')
@section('admi_ad_create')
<script>
  
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">クーポン管理画面</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">Home</a></li>
              <li class="breadcrumb-item active">クーポン管理</li>
              <li class="breadcrumb-item active">新規作成</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <form action="{{ route('coupon_store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!--<input type="file" name="img_path"> -->
    <!-- フォームで選択した画像 -->
    <dt><span class="required">　イメージ画像</span></dt>
    
    　<input type="file" accept='image/*' name="coupon_img_path"onchange="previewImage1(this);">
    
    <p>
    　Preview:<br>
    　<img id="preview1" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:400px;">
    </p>

    <dt><span class="required">　QR画像</span></dt>
    
    　<input type="file" accept='image/*' name="coupon_qr_path"onchange="previewImage2(this);">
    
    <p>
    　Preview:<br>
    　<img id="preview2" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
    </p>
        <script>
        function previewImage1(obj)
        {
          var fileReader = new FileReader();
          fileReader.onload = (function() {
            document.getElementById('preview1').src = fileReader.result;
          });
          fileReader.readAsDataURL(obj.files[0]);
        }
        function previewImage2(obj)
        {
          var fileReader = new FileReader();
          fileReader.onload = (function() {
            document.getElementById('preview2').src = fileReader.result;
          });
          fileReader.readAsDataURL(obj.files[0]);
        }
        </script>
                    <dl class="form-area">
                        <dt><span class="required">　クーポン名</span></dt>
                        <dd>　<input class="input-text" type="text" name="coupon_name" required></dd> 
                        <dt><span class="required">　企業名</span></dt>
                        <dd>　<input class="input-text" type="text" name="coupon_comp_name" required></dd> <!--name属性はフォームを受信したプログラムが各項目を判別するための属性、requiredは必須項目なので入力がなければ警告を表示-->
                        <dt><span class="required">　クーポンコード</span></dt>
                        <dd>　<input class="input-text" type="text" name="coupon_code" required></dd>
                        <dt>　利用開始日</dt>
                        <dd>　<input class="input-text" type="text" name="coupon_start" placeholder="20XX-XX-XX XX:XX:XX"></dd>
                        <dt>　利用終了日</dt>
                        <dd>　<input class="input-text" type="text" name="coupon_finish" placeholder="20XX-XX-XX XX:XX:XX"></dd>

                        <dt>　<span class="required">クーポン詳細</span></dt>
                        <dd>　<textarea class="message" name="coupon_message" required></textarea></dd>
                    </dl>
                    <p class="confirm-text">　ご入力内容をご確認の上、お間違いがなければ [作成] ボタンを押してください。</p>
                    　<button class="submit-button" type="submit">作成</button>
    </form>
    </div>
    <!-- /.content-header -->
    </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection