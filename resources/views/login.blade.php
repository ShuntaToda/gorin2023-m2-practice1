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
            <h1><a href="{{ route('home') }}" class="text-black text-decoration-none">Login</a></h1>
        </header>
        <main>
            <div class="mt-5 py-4 px-3 border rounded">
                <h2>Login Form</h2>
                <form action="{{ route('login') }}" method="POST" class="py-3 px-2">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                            aria-describedby="basic-addon1" name="name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Password</span>
                        <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                            aria-describedby="basic-addon2" name="password">
                    </div>
                    @error('message')
                        <div>{{ $errors->first('message') }}</div>
                    @enderror
                    <div>
                        <div>admin</div>
                        <div>username: admin</div>
                        <div>password: password</div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>

        </main>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
