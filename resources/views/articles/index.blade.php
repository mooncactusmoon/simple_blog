<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>簡易blog練習首頁</title>
</head>

<body>
    @if (Route::has('login'))
    <nav class="m-3 text-right p-3">
        @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
        @endauth
    </nav>
    @endif
    <main class="container">
        @if(session()->has('notice'))
        <div class="alert alert-success p-2 m-2">
            {{ session()->get('notice')}}
        </div>
        @endif
        <div class="d-flex">
            <h1 class='text-secondary m-2'>文章表列</h1>
            <a href="{{ route('articles.create')}}" class="ml-5 m-3 btn btn-outline-primary btn-sm">新增文章</a>

        </div>

        @foreach ($articles as $article)
        <div class="my-2 border-top p-3 rounded">
            <h3 class="text-primary"><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
            <p class="text-secondary mt-3">{{ $article->created_at }} , 作者 : {{ $article->user->name }}</p>
            @auth
            <div class="d-flex">
                <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-success mx-3">編輯</a>
                <form action="{{ route('articles.destroy', $article) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">刪除</button>
                </form>
            </div>
            @endauth
        </div>
        @endforeach
        <div class="offset-6">
            {{ $articles->links('pagination::bootstrap-4') }}
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>