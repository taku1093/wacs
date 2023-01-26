@extends('admin.base')
@section('admi_ad_management')
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
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    　<a href="{{ route('ad_create') }}" class="btn btn-secondary">新規作成</a>
    <p>　</p>
    @foreach ($ads as $ad)
    <div class="card">
              <div class="card-haeder p-3 w-100 d-flex">
              
                  <div class="p-2 flex-grow-1 bd-highlight">
                      <p class="mb-0">　　企業名  :{{ $ad->ad_name }}<br>　　期間  :{{ $ad->created_at }}　〜　{{ $ad->created_at }}</p>
                  </div>
                  <div class="p-2 bd-highlight">
                        <a href="ad_manage{{ $ad->id }}" class="btn btn-primary" style="text-align: right">詳細</a>
                        
                        <a href="ad_delete_ready{{ $ad->id }}" class="btn btn-danger">削除</a>
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