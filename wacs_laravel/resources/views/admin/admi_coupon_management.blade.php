@extends('admin.base')
@section('admi_coupon_management')
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
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    　<a href="{{ route('coupon_create') }}" class="btn btn-secondary">新規作成</a>
    <p>　</p>
    @foreach ($coupons as $coupon)
    <div class="card">
              <div class="card-haeder p-3 w-100 d-flex">
              
                  <div class="p-2 flex-grow-1 bd-highlight">
                      <p class="mb-0">　　企業名  :{{ $coupon->coupon_comp_name }}　{{ $coupon->coupon_name }}<br>　　期間  :{{ $coupon->coupon_start }}　〜　{{ $coupon->coupon_finish }}</p>
                  </div>
                  <div class="p-2 bd-highlight">
                        <a href="coupon_manage{{ $coupon->id }}" class="btn btn-primary" style="text-align: right">詳細</a>
                        
                        <a href="coupon_delete_ready{{ $coupon->id }}" class="btn btn-danger">削除</a>
                  </div>
              </div>
          </div>
          @endforeach
    </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection