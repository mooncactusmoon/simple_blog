<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>編輯文章</title>
</head>

<body>
    <nav class="m-3 text-right p-3">
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
    </nav>
    <main class="container text-center">
        <h1 class='text-secondary m-2'>編輯文章</h1>
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif()
        <form action="{{ route('articles.update' , $article ) }}" method="post" class="form-group">
            @csrf
            @method('patch')
            <table class="table table-striped text-secondary">
                <thead>
                    <tr>
                        <td>標題</td>
                        <td><input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}"></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>內容</td>
                        <td><textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $article->content }}</textarea></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <input type="submit" value="更新文章" class="btn btn-outline-secondary btn-block mt-3 p-2">
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>