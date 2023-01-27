<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>
            書籍情報編集
        </h1>
        <div class="transition_btn">
            <a href="{{ route('home') }}">
                <button>書籍リストへ戻る</button>
            </a>
        </div>
        <form action="{{ route('logout') }}" method="get" class="login_btn">
        @csrf
            <input type="submit" value="ログアウト">
        </form>
    </header>
    <div>
        <form action="{{ route('edit',$books->id) }}" method="post" class="information_box">
        @csrf
            <div>
                <label for="book_name">書籍名</label>
                <input type="text" name="book_name" id="book_name" value="{{ $books->book_name }}">
            </div>
            <div>
                <label for="author">作者</label>
                <input type="text" name="author" id="author" value="{{ $books->author }}">
            </div>
            <div>
                <label for="publisher">出版社</label>
                <input type="text" name="publisher" id="publisher" value="{{ $books->publisher }}">
            </div>
            <div>
                <label for="edition">版数</label>
                <input type="number" name="edition" id="edition" value="{{ $books->edition }}">
            </div>
            <div>
                <button type="submit">送信</button>
            </div>
            <div>
                @isset($complete)
                    <span>{{ $complete }}</span>
                @endisset
            </div>
        </form>
    </div>
</body>
</html>