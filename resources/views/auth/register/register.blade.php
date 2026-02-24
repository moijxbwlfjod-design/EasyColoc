<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="register-card">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name">Name:</label><br>
            <input type="text" name="name"><br><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password"><br><br>
            <label for="gender">Gender:</label>
            <select name="gender">
                <option value="male" name="male">Male</option>
                <option value="female" name="female">Female</option>
            </select><br><br>
            @if ($errors->any())
                <span>{{ $errors->first() }}</span>
            @endif
            <div class="btn">
                <button type="submit">Login</button>
            </div>
            <p>Already <a href="{{ route('login') }}">have an account?</a></p>
        </form>
    </div>
</body>
</html>