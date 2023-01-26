@extends('admin.base')
@section('admi_ranking_management')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ランキング管理画面</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">Home</a></li>
              <li class="breadcrumb-item active">ランキング管理</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="card">
      <p><font size="5">　現在の週間ランキングの期間<br>　[{{ $ranking_data->week_start }}〜{{ $ranking_data->week_finish }}]</font></p>
    </div>
    <div class="card">
      <p><font size="5">　現在の月間ランキングの期間<br>　[{{ $ranking_data->month_start }}〜{{ $ranking_data->month_finish }}]</font></p>
    </div>
    　<a href="{{ route('ranking_update_ready') }}" class="btn btn-secondary">期間変更</a>
    
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