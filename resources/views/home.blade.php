<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
    </style>
    <title>Document</title>
</head>

<body class="">

    <div class="container mt-3">

        <header class="d-flex justify-content-between">
            <h1><a href="{{ route('home') }}" class="text-black text-decoration-none">M2 練習問題</a></h1>
            <div class="d-flex flex-grow-1 justify-content-around">
                @auth
                    <div>
                        <div>name: {{ Auth::user()->name }}</div>
                        <div>role: {{ Auth::user()->role }}</div>
                    </div>
                    <a class="btn btn-outline-danger" href="{{ route('logout') }}">logout</a>
                @else
                    <a class="btn btn-outline-primary" href="{{ route('login') }}">login</a>
                @endauth
            </div>
        </header>
        <main class="mt-5">
            @can('admin-higher')

                <div>
                    @if (session('deleteMessage'))
                        <div>{{ session('deleteMessage') }}</div>
                    @endif
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <div>
                                        <a class="btn btn-sm btn-outline-primary" href="">表示</a>
                                        <a class="btn btn-sm btn-outline-primary" href="">編集</a>
                                        <form action="{{ route('admin.delete', $user->id) }}" method="DELETE">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">削除</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="w-full text-center"><a class="btn btn-outline-primary"
                        href="{{ route('admin.createUser') }}">ユーザー追加</a></div>
            @endcan
        </main>
    </div>
    {{-- <div>{{ Hash::make("password") }}</div> --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
