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
            書籍リスト
        </h1>
        <div class="transition_btn">
            <a href="{{ route('create') }}">
                <button>新規書籍登録</button>
            </a>
        </div>

        <form action="{{ route('home') }}" method="get" class="search">
            <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ $keyword }}">
            <input type="submit" value="検索">
        </form>


        <form action="{{ route('logout') }}" method="get" class="login_btn">
        @csrf
            <input type="submit" value="ログアウト">
        </form>
    </header>
    <div class="book_table">
        <table>
            <thead>
                <tr>
                    <th scope="col" class="th">書籍名</th>
                    <th scope="col" class="th">作者</th>
                    <th scope="col" class="th">出版社</th>
                    <th scope="col" class="th">版数</th>
                    <th scope="col" class="th">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td class="td">{{ $book->book_name }}</td>
                        <td class="td">{{ $book->author }}</td>
                        <td class="td">{{ $book->publisher }}</td>
                        <td class="td">第{{ $book->edition }}版</td>
                        <td class="td">
                            <a href="{{ route('edit',$book->id) }}">
                                <button>編集</button>
                            </a>
                            <a href="{{ route('destroy',$book->id) }}">
                                <button>削除</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>