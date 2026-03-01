@extends('pages.layouts.dashboard_layout')
@section('main')
<div class="container bg-white rounded-[10px] flex justify-around wrap gap-[10%] py-[10px] px-[20px] z-[1]">
    @if (isset($colocation))
        <div class="first-container bg-[#94d2bd] rounded-[14px] flex flex-col justify-center gap-[10px] px-[10px] overflow-auto py-[10px]">
            <div class="colocation__container rounded-[10px] py-[10px] px-[20px] bg-blue-400 flex flex-col gap-[5px] items-center">
                <h3 class="text-white">Your Actual colocation</h3>
                <img class="rounded-[50%] h-[100px] w-[100px]" src="{{ asset($colocation->image_path) }}" alt="colocation_image">
                <p class="text-white">{{ $colocation->title }}</p>
            </div>

            <div class="expense__container py-[10px] px-[20px] rounded-[10px] bg-red-100">
                <h3 class="text-red-600">Your Expenses are:</h3>
                @foreach ($colocation->expenses as $expense)
                    <pa class="text-red-600">{{ $expense->sum('mount') }}</p>
                @endforeach
            </div>

            <div class="rate__container rounded-[10px] bg-gray-100 py-[5px] px-[10px]">
                <h3 class="text-gray-600">Your Rate is:</h3>
                <p class="text-gray-600">{{ $user->rate }}</p>
            </div>

            <div class="categories__container rounded-[10px] bg-white py-[5px] px-[10px] flex flex-col gap-[10px] items-center">
                <div class="categories rounded-[10px] bg-gray-100 overflow-auto py-[3px] px-[7px] w-[90%]">
                    @foreach ($categories as $category)
                        <p>{{ $category->title }}</p>
                    @endforeach
                </div>
                <a href="{{ route('home.category.index') }}"class="bg" >Add Category</a>
            </div>
        </div>

        <div class="colocation_members__container py-[10px] px-[20px] rounded-[10px] bg-black">
            <h3 class="text-yellow-600">{{ $colocation->title }} Members are</h3>
            @foreach ($colocation->members as $member)
                <p class="text-white">{{ $member->name }} ({{ $member->colocationRole->name }})</p>
            @endforeach
        </div>
    @else
        <div class="colocation__container rounded-[10px] py-[10px] px-[20px] bg-gray-100">
            <h3>Your Don't have a colocation!</h3>
        </div>

        <div class="expense__container py-[10px] px-[20px] rounded-[10px] bg-gray-100">
            <h3>Your Don't have a colocation to have expenses!</h3>
        </div>

        <div class="colocation_members__container py-[10px] px-[20px] rounded-[10px] bg-gray-100">
            <h3>Your Don't have a colocation to have Members!</h3>
        </div>
    @endif
</div>
@endsection