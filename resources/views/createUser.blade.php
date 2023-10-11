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
                <h2>User Store Form</h2>
                <form action="{{ route('admin.createUser') }}" method="POST" class="py-3 px-2">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="w-7 input-group-text" id="basic-addon1">Name</span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                            aria-describedby="basic-addon1" name="name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="w-7 input-group-text" id="basic-addon1">Email</span>
                        <input type="email" class="form-control" placeholder="aaaa@aaa.aaa" aria-label="Name"
                            aria-describedby="basic-addon1" name="email">
                    </div>
                    <div class="input-group mb-3">
                        <span class="w-7 input-group-text" id="basic-addon1">Role</span>
                        <select class="form-select" name="role" aria-label="Default select example">
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="w-7 input-group-text" id="basic-addon1">Password</span>
                        <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                            aria-describedby="basic-addon2" name="password">
                    </div>
                    <div class="input-group mb-3">
                        <span class="w-7 input-group-text" id="basic-addon1">Confirm</span>
                        {{-- ここのinputのnameはpassword_confirmationじゃないとvalidateできない --}}
                        <input type="password" class="form-control" placeholder="Confirm" aria-label="Password"
                            aria-describedby="basic-addon2" name="password_confirmation">
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    @if (session('message'))
                        <div>{{ session('message') }}</div>
                    @endif
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
