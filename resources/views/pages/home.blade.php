<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    <main>
        <nav class="bg-[red]">
            <ul class="flex justify-around">
                <li><a href="#" class="decoration-none text-none">Current Colocation</a></li>
                <li><a href="{{ route('colocation.index') }}" class="decoration-none text-none">Create Colocation</a></li>
                <li><a href="#" class="decoration-none text-none">Expenses</a></li>
            </ul>
        </nav>
    </main>
</body>
</html>