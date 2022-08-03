<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>{{$article->title}}</title>
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
        <div class="d-flex">
            <h1 class='text-secondary m-2'>{{$article->title}}</h1>
        </div>
        <div class="my-2 border-top p-3 rounded">
            <p class="text-secondary my-3">{{ $article->created_at }} , 作者 : {{ $article->user->name }}</p>
            <p>{{ $article->content }} </p>
        </div>
        <a href="{{ route('articles.index') }}" class="btn btn-sm btn-outline-info m-3"> 回首頁 </a>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>