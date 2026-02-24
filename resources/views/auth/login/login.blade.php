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
            <input type="email"><br><br>
            <label for="password">Password:</label><br>
            <input type="password">
            <div class="btn">
                <button>Login</button>
            </div>
            <p>Don't <a href="#">have an account?</a></p>
        </form>
    </div>
</body>
</html>