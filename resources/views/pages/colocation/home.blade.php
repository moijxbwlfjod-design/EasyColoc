@extends('pages.layouts.dashboard_layout')
@section('main')
<div class="container bg-[#0a9396] rounded-[10px] flex justify-around wrap gap-[10%] py-[10px] px-[20px]">
    <div class="rate__container bg-gray-100 py-[5px] px-[10px]">
        <h3 class="text-gray-600">Your Rate is:</h3>
        <p class="text-gray-600">{{ $user->rate }}</p>
    </div>

    
    @if (isset($colocation))
        <div class="expense__container py-[10px] px-[20px] rounded-[10px] bg-red-100">
            <h3 class="text-red-600">Your Expenses are:</h3>
            <pa class="text-red-600">{{ $colocation->expenses }}</p>
        </div>
    @else
        <div class="expense__container py-[10px] px-[20px] rounded-[10px] bg-gray-100">
            <h3>Your Don't have a colocation to have expenses!</h3>
        </div>
    @endif
    

    
    @if (isset($colocation))
        <div class="colocation__container rounded-[10px] py-[10px] px-[20px] bg-blue-500 flex flex-col gap-[5px] items-center">
            <h3 class="text-white">Your Actual colocation</h3>
            <img class="rounded-[50%] h-[100px] w-[100px]" src="{{ asset($colocation->image_path) }}" alt="colocation_image">
            <p class="text-white">{{ $colocation->title }}</p>
        </div>
    @else
        <div class="colocation__container rounded-[10px] py-[10px] px-[20px] bg-gray-100">
            <h3>Your Don't have a colocation!</h3>
        </div>
    @endif

    @if (isset($colocation))
        <div class="colocation_members__container py-[10px] px-[20px] rounded-[10px] bg-black">
            <h3 class="text-yellow-600">{{ $colocation->title }} Members are</h3>
        </div>
    @else
        <div class="colocation_members__container py-[10px] px-[20px] rounded-[10px] bg-gray-100">
            <h3>Your Don't have a colocation to have Members!</h3>
        </div>
    @endif
    </div>
</div>
@endsection