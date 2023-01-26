@extends('admin.base')
@section('admi_user_management_edit')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">問い合わせ管理画面</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">Home</a></li>
              <li class="breadcrumb-item active">問い合わせ管理</li>
              <li class="breadcrumb-item active">ID:{{$contact_data->id}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="card">
      <div class="contact">
                    <dl class="form-area">
                        <dt><span class="required">　お名前</span></dt>
                        <dd>　{{ $contact_data->report_name }}</dd> <!--name属性はフォームを受信したプログラムが各項目を判別するための属性、requiredは必須項目なので入力がなければ警告を表示-->
                        <dt><span class="required">　メールアドレス</span></dt>
                        <dd>　{{ $contact_data->report_mail }}</dd>
                        <dt>　お電話番号</dt>
                        <dd>　{{ $contact_data->report_tell }}</dd>
                        <dt>　お問い合わせ種別</dt>
                        <dd>　{{ $contact_data->report_kind }}</dd>
                        <dt>　お客様について</dt>
                        <dd>　{{ $contact_data->report_about }}</dd>
                        <dt><span class="required">　お問い合わせ内容</span></dt>
                        <dd>　{{ $contact_data->report_text }}</dd>
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