@extends('admin.base')
@section('admi_user_management_edit')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">広告管理画面</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">Home</a></li>
              <li class="breadcrumb-item active">広告管理</li>
              <li class="breadcrumb-item active">ID:{{$ad_data->id}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="card">
      <div class="contact">
                    <dl class="form-area">
                    <dt>　広告画像</dt>
                    <img src="{{ asset('storage/' .$ad_data->ad_img_path ) }}" width="200">
                        <dt><span class="required">　企業名</span></dt>
                        <dd>　{{ $ad_data->ad_name }}</dd> <!--name属性はフォームを受信したプログラムが各項目を判別するための属性、requiredは必須項目なので入力がなければ警告を表示-->
                        <dt>　広告URL</dt>
                        <dd>　{{ $ad_data->ad_url }}</dd>
                        <dt>　期間</dt>
                        <dd>　{{ $ad_data->created_at }}　〜　{{ $ad_data->ad_finish }}</dd>
                        <dt>　メモ</dt>
                        <dd>　{{ $ad_data->ad_message }}</dd>
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