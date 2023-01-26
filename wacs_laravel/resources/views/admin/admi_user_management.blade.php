@extends('admin.base')
@section('admi_user_management')
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
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

        @foreach ($users as $user)
          <div class="card">
              <div class="card-haeder p-3 w-100 d-flex">
              @if ($user->user_icon == null)
                {{--  デフォルトアイコン  --}}
              <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="rounded-circle" height="50">
              @else
                {{--  任意アイコン  --}}
              <img src="{{ asset('storage/user_icon/' .$user->user_icon) }}" class="rounded-circle"  height="50">
              @endif
                  <div class="p-2 flex-grow-1 bd-highlight">
                      <p class="mb-0">　　ユーザネーム:{{ $user->user_screen_name }}</p>
                  </div>
                  <div class="p-2 bd-highlight">
                        <a href="{{ url('users/' .$user->id) }}" class="btn btn-primary" style="text-align: right">マイページ</a>
                        
                        <a href="user_delete_ready{{ $user->id }}" class="btn btn-danger">削除</a>
                  </div>
              </div>
          </div>
        @endforeach
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