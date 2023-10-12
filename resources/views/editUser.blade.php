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
                <h2>User Edit Form</h2>
                <form method="POST" action="{{ route('admin.update', $user->id) }}" class="py-3 px-2">
                    {{-- formタグはputメソッドに対応していないので@method("PUT")を書く必要がある --}}
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="w-7 input-group-text" id="basic-addon1">Name</span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                            aria-describedby="basic-addon1" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="w-7 input-group-text" id="basic-addon1">Email</span>
                        <input type="email" class="form-control" placeholder="aaaa@aaa.aaa" aria-label="Name"
                            aria-describedby="basic-addon1" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="w-7 input-group-text" id="basic-addon1">Role</span>
                        <select class="form-select" name="role" aria-label="Default select example">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" name="is_active" {{ $user->is_active ? 'checked' : '' }}
                            type="checkbox" id="inlineFormCheck">
                        <label class="form-check-label" for="inlineFormCheck">
                            Is Active
                        </label>
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
