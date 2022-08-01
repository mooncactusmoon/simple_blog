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
            <h3 class="text-primary">{{ $article->title }}</h3>
            <p class="text-secondary mt-3">{{ $article->created_at }} , 作者 : {{ $article->user->name }}</p>
        </div>
        @endforeach
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>