@extends('pages.layouts.dashboard_layout')
@section('main')
    <div class="card bg-white py-[15px] px-[20px] rounded-[15px]">
        <form action="{{ route('home.invite.create') }}" method="POST">
            <label for="email">Enter the email of the person you want to invite:</label><br>
            <input class="bg-gray-100 rounded-[8px] mt-[5px]" type="email" required name="email"><br><br>
            <div class="btn flex justify-center items-center bg-[#0a9396] text-white rounded-[12px]">
                <button type="submit">Invite</button>
            </div>
        </form>
    </div>
@endsection