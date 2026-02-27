<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="bg-[#e9d8a6] flex justify-center items-center py-[15px]">
            <ul class="flex justify-around bg-[#94d2bd] px-[5px] py-[10px] w-[80%] rounded-[24px]">
                <li><a class="hover:text-[#005f73] text-white text-[34px]" href="{{ route('home.index') }}" class="decoration-none text-none">Current Colocation</a></li>
                <li><a class="hover:text-[#005f73] text-white text-[34px]" href="{{ route('home.colocation.index') }}" class="decoration-none text-none">Create Colocation</a></li>
                <li><a class="hover:text-[#005f73] text-white text-[34px]" href="#" class="decoration-none text-none">Expenses</a></li>
            </ul>
        </nav>
    </header>
    <main class="main flex justify-center items-center bg-[#e9d8a6] h-[100vh]">
        @yield('main')
    </main>
</body>
</html>