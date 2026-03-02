<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="category__card">
            <form action="{{ route('home.category.create') }}" method="POST">
                @csrf
                <Label for="title">Category title:</Label><br>
                <input type="text" required name="title" id="title"><br><br>
                <button type="submit">Create Category</button>
            </form>
        </div>
    </main>
</body>
</html>