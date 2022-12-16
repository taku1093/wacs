<div class="card-text">
    <form method="POST" action="{{ route('user.resister_resister') }}">
        @csrf
        <div class="md-form">
            <label for="user_name">氏名</label>
            {{ $input["user_name"] }}
            <input class="form-control" type="hidden" id="user?name" name="user_name" required value="{{ $input["user_name"] }}">
        </div>


        <div class="md-form">
            <label for="name">メールアドレス</label>
            {{--  {{ $input["email] }}  --}}
            {{ $input["email"] }}
            <input class="form-control" type="hidden" id="email" name="email" required value="{{ $input["email"] }}">
        </div>

        <div class="md-form">
            <label for="password">パスワード</label>
            {{ $input["password"] }}
            <input class="form-control" type="hidden" id="password" name="password" required value="{{ $input["password"] }}">
        </div>

        <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit" name="back">戻って変更する</button>
        <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit">確認して登録する</button>
    </form>
</div>