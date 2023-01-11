<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Laravel test_users_rest_api_server</title>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="nav p-3">
            <a class="nav-item btn btn-info m-1" href="{{ route('main.index') }}">Main</a>
            <a class="nav-item btn btn-info m-1" href="{{ route('users.index') }}">List all users</a>
            <a class="nav-item btn btn-info m-1" href="{{ route('users.create') }}">Add new user</a>
        </nav>
        @yield('content')
    </div>
</div>
</body>
</html>
