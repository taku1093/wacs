@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', ['posts' => $posts]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-0">
                            <div class="col-md-12 p-3 w-100 d-flex">
                                <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50">
                                @if ($user->user_icon == null)
                                    {{--  デフォルトアイコン  --}}
                                <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                @else
                                    {{--  任意アイコン  --}}
                                <img src="{{ asset('storage/user_icon/' .$user->user_icon) }}"  class="circle-image">
                                @endif

                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $user->user_screen_name }}</p>
                                    <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control @error('post_exp') is-invalid @enderror" name="post_exp" required autocomplete="post_exp" rows="4">{{ old('post_exp') ? : $posts->post_exp }}</textarea>

                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <p class="mb-4 text-danger">140文字以内</p>
                                <button type="submit" class="btn btn-primary">
                                    ツイートする
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection