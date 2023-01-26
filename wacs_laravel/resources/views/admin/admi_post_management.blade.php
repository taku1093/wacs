@extends('admin.base')
@section('admi_post_management')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">投稿管理画面</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">Home</a></li>
              <li class="breadcrumb-item active">投稿管理</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    @foreach ($posts as $post)
    <div class="card">
              <div class="card-haeder p-3 w-100 d-flex">
              
                  <div class="p-2 flex-grow-1 bd-highlight">
                      <p class="mb-0">　　投稿タイトル:{{ $post->post_title }}</p>
                  </div>
                  <div class="p-2 bd-highlight">
                        <a href="{{ url('posts/' .$post->id) }}" class="btn btn-primary" style="text-align: right">投稿詳細</a>
                        
                        <a href="post_delete_ready{{ $post->id }}" class="btn btn-danger">削除</a>
                  </div>
              </div>
          </div>
          @endforeach
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