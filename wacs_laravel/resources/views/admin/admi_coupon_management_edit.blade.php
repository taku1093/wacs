@extends('admin.base')
@section('admi_user_management_edit')
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
              <li class="breadcrumb-item active">広告管理</li>
              <li class="breadcrumb-item active">ID:{{$coupon_data->id}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="card">
      <div class="contact">
                    <dl class="form-area">
                    <dt>　イメージ画像</dt>
                    <img src="{{ asset('storage/' .$coupon_data->coupon_img_path ) }}" width="200">
                    <dt>　QR画像</dt>
                    <img src="{{ asset('storage/' .$coupon_data->coupon_qr_path ) }}" width="200">
                        <dt><span class="required">　クーポン名</span></dt>
                        <dd>　{{ $coupon_data->coupon_name }}</dd> 
                        <dt><span class="required">　企業名</span></dt>
                        <dd>　{{ $coupon_data->coupon_comp_name }}</dd> <!--name属性はフォームを受信したプログラムが各項目を判別するための属性、requiredは必須項目なので入力がなければ警告を表示-->
                        <dt>　クーポン</dt>
                        <dd>　{{ $coupon_data->coupon_code }}</dd>
                        <dt>　期間</dt>
                        <dd>　{{ $coupon_data->coupon_start }}　〜　{{ $coupon_data->coupon_finish }}</dd>
                        <dt>　クーポン詳細</dt>
                        <dd>　{{ $coupon_data->coupon_message }}</dd>
                    </dl>
            </div>
</div>
      
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