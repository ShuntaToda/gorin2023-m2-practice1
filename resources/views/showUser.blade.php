<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
    </style>
    <title>Document</title>
</head>

<body class="">

    <div class="container mt-3">

        <header class="d-flex justify-content-between">
            <h1><a href="{{ route('home') }}" class="text-black text-decoration-none">CreateUser</a></h1>
        </header>
        <main>

            <div class="mt-5 py-4 px-3 border rounded">
                <h2 class="mb-4">User Show Page</h2>
                <div class="d-flex border-bottom mb-3">
                    <div class="w-7 fw-bold">Id</div>
                    <div>{{ $user->id }}</div>
                </div>
                <div class="d-flex border-bottom mb-3">
                    <div class="w-7 fw-bold">Name</div>
                    <div>{{ $user->name }}</div>
                </div>
                <div class="d-flex border-bottom mb-3">
                    <div class="w-7 fw-bold">Email</div>
                    <div>{{ $user->email }}</div>
                </div>
                <div class="d-flex border-bottom mb-3">
                    <div class="w-7 fw-bold">Role</div>
                    <div>{{ $user->role }}</div>
                </div>
                <div class="d-flex border-bottom mb-3">
                    <div class="w-7 fw-bold">Is Active</div>
                    <div>{{ $user->is_active }}</div>
                </div>
            </div>

        </main>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
