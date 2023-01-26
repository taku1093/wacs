@extends('admin.base')
@section('admi_user_management_edit')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ユーザ管理画面</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">Home</a></li>
              <li class="breadcrumb-item active">ユーザ管理</li>
              <li class="breadcrumb-item active">削除確認</li>
              <li class="breadcrumb-item active">削除完了</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      　削除完了
      <button type=“button” onclick="location.href='{{ route('user_manage') }}'">ユーザ一覧へ</button>
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