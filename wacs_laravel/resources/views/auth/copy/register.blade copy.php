@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{--  アカウント作成  --}}
                <div class="card-header">{{ __('アカウント作成') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        {{--  ユーザネーム  --}}
                        <div class="form-group row">
                            <label for="user_screen_name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザネーム') }}</label>

                            <div class="col-md-6">
                                <input id="user_screen_name" type="text" class="form-control @error('user_screen_name') is-invalid @enderror" name="user_screen_name" value="{{ old('user_screen_name') }}" required autocomplete="user_screen_name" autofocus>

                                @error('user_screen_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  メールアドレス  --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  電話番号  --}}
                        <div class="form-group row">
                            <label for="user_tell" class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>

                            <div class="col-md-6">
                                <input id="user_tell" type="user_tell" class="form-control @error('user_tell') is-invalid @enderror" name="user_tell" value="{{ old('user_tell') }}" required autocomplete="user_tell">

                                @error('user_tell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  パスワード  --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  パスワード確認  --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード（確認）') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{--  本人情報登録  --}}
                        {{--  <div class="card-header">{{ __('本人情報登録') }}</div>  --}}

                        {{--  姓（全角）  --}}
                        <div class="form-group row">
                            <label for="user_sur" class="col-md-4 col-form-label text-md-right">{{ __('姓（全角）') }}</label>

                            <div class="col-md-6">
                                <input id="user_sur" type="text" class="form-control @error('user_sur') is-invalid @enderror" name="user_sur" value="{{ old('user_sur') }}" required autocomplete="user_sur" autofocus>

                                @error('user_sur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  名（全角）  --}}
                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('名（全角）') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="user_name" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name">

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  姓（カナ）  --}}
                        <div class="form-group row">
                            <label for="user_sur_kana" class="col-md-4 col-form-label text-md-right">{{ __('姓（カナ）') }}</label>

                            <div class="col-md-6">
                                <input id="user_sur_kana" type="user_sur_kana" class="form-control @error('user_sur_kana') is-invalid @enderror" name="user_sur_kana" value="{{ old('user_sur_kana') }}" required autocomplete="user_sur_kana">

                                @error('user_sur_kana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  名（カナ）  --}}
                        <div class="form-group row">
                            <label for="user_name_kana" class="col-md-4 col-form-label text-md-right">{{ __('名（カナ）') }}</label>

                            <div class="col-md-6">
                                <input id="user_name_kana" type="user_name_kana" class="form-control @error('user_name_kana') is-invalid @enderror" name="user_name_kana" value="{{ old('user_name_kana') }}" required autocomplete="new-user_name_kana">

                                @error('user_name_kana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  性別  --}}
                        <div class="form-group row">
                            <label for="user_gen" class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>

                            <div class="col-md-6">
                                <input id="user_gen" type="email" class="form-control @error('user_gen') is-invalid @enderror" name="user_gen" value="{{ old('user_gen') }}" required autocomplete="new-user_gen">

                                @error('user_gen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  登録  --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
