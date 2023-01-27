<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>管理者ログイン</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="name">ユーザーネーム</label>
        <input type="text" name="name" id="name">
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="ログイン">
    </form>
    @error('error')
        <p>{{ $message }}</p>
    @enderror
</body>
</html>