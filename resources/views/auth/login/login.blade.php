<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="login-card">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email:</label><br>
            <input type="email" name="email"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password"><br>
            @if ($errors->any())
                <span>{{ $errors->first() }}</span>
            @endif
            <div class="btn">
                <button type="submit">Login</button>
            </div>
            <p>Don't <a href="#">have an account?</a></p>
        </form>
    </div>
</body>
</html>