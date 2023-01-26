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
              <li class="breadcrumb-item active">期間変更</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <form action="{{ route('ranking_update_comp') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <dl class="form-area">
        <dt>　週間ランキング開始日</dt>
        <dd>　<input class="input-text" type="text" name="week_start" placeholder="20XX-XX-XX XX:XX:XX"></dd>
        <dt>　週間ランキング終了日</dt>
        <dd>　<input class="input-text" type="text" name="week_finish" placeholder="20XX-XX-XX XX:XX:XX"></dd>
        <dt>　月間ランキング開始日</dt>
        <dd>　<input class="input-text" type="text" name="month_start" placeholder="20XX-XX-XX XX:XX:XX"></dd>
        <dt>　月間ランキング終了日</dt>
        <dd>　<input class="input-text" type="text" name="month_finish" placeholder="20XX-XX-XX XX:XX:XX"></dd>
    </dl>
    <p class="confirm-text">　ご入力内容をご確認の上、お間違いがなければ [変更] ボタンを押してください。</p>
                    　<button class="submit-button" type="submit">変更</button>
    </form>
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