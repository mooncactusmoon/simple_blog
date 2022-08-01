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