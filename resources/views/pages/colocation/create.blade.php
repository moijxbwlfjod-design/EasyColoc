@extends('pages.layouts.dashboard_layout')
@section('main')
    <div class="card bg-white py-[15px] px-[20px] rounded-[15px]">
        {{-- <a href="{{ route('home.index') }}">Back</a> --}}
        <form action="{{ route('home.colocation.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label><br>
            <input class="bg-gray-100 rounded-[8px] mt-[5px]" required name="title" type="text" id="title"><br><br>
            <label for="description">Description:</label><br>
            <textarea class="bg-gray-100 rounded-[8px] mt-[5px]" required name="description" id="description" cols="30" rows="10"></textarea><br><br>
            <label for="image">Colocation Image:</label><br>
            <input class="bg-gray-100 rounded-[8px] mt-[5px]" required type="file" accept=".png" name="image"><br><br>
            <label for="location">Location:</label><br>
            <input class="bg-gray-100 rounded-[8px] mt-[5px]" required type="text" id="location" name="location"><br><br>
            <div class="btn flex justify-center items-center">
                <button class="bg-[#0a9396] text-white rounded-[12px] py-[5px] px-[10px]" type="submit">Create Colocation</button>
            </div>
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
    </div>
@endsection