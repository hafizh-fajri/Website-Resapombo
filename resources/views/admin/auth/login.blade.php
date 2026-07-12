<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Website Desa</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <div class="login-wrapper">
        <h1>Login Admin</h1>

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <div>
                <label>Username</label><br>
                <input type="text" name="username" value="{{ old('username') }}">
            </div>

            <div>
                <label>Password</label><br>
                <input type="password" name="password">
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>