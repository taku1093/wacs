@extends('admin.base')
@section('admi_contact_management')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">問い合わせ画面</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">Home</a></li>
              <li class="breadcrumb-item active">問い合わせ</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @foreach ($reports as $report)
    <div class="card">
              <div class="card-haeder p-3 w-100 d-flex">
              
                  <div class="p-2 flex-grow-1 bd-highlight">
                      <p class="mb-0">　　問い合わせ種別  :{{ $report->report_kind }}<br>　　氏名  :{{ $report->report_name }}({{ $report->report_about }})</p>
                  </div>
                  <div class="p-2 bd-highlight">
                        <a href="contact_manage{{ $report->id }}" class="btn btn-primary" style="text-align: right">通報内容</a>
                        
                        <a href="contact_delete_ready{{ $report->id }}" class="btn btn-danger">削除</a>
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