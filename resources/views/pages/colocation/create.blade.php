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
        <form action="{{ route('colocation.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label><br>
            <input required name="title" type="text" id="title"><br><br>
            <label for="description">Description:</label><br>
            <textarea required name="description" id="description" cols="30" rows="10"></textarea><br><br>
            <label for="image">Colocation Image:</label><br>
            <input required type="file" accept=".png" name="image"><br><br>
            <label for="location">Location:</label><br>
            <input required type="text" id="location" name="location"><br><br>
            <div class="btn">
                <button type="submit">Create Colocation</button>
            </div>
            <a href="{{ route('') }}"></a>
            @if (session('msg'))
                <div>
                    <h3>
                        {{ session('msg') }}
                    </h3>
                </div>
            @endif
            @if (session('error'))
                <div>
                    <h3>
                        {{ session('error') }}
                    </h3>
                </div>
            @endif
        </form>
    </main>
</body>
</html>