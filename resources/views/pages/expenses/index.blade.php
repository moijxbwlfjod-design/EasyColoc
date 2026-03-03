@extends('pages.layouts.dashboard_layout')
@section('main')
    <div class="card bg-white py-[15px] px-[20px] rounded-[15px] h-[50%] w-[50%]">
        <div class="navb">
            <ul class="flex justify-around">
                <li><button id="create-expense-btn">Create Expense</button></li>
                <li><button id="colocation-expenses">Colocation Expenses</button></li>
                <li><button id="wallet">Wallet</button></li>
            </ul>
        </div>

        <div class="container flex py-[20px] justify-center items-center">
            <div id="create-expense-div" class="create-expense-div py-[10px] px-[5px] bg-gray-100 rounded-[8px] h-[80%]">
                <form action="{{ route('home.expense.create') }}" method="POST">
                    @csrf
                    <label for="title">Title:</label><br>
                    <input class="bg-gray-100 rounded-[8px]" type="text" id="title" name="title" required><br><br>
                    <label for="mount">Mount:</label><br>
                    <input class="bg-gray-100 rounded-[8px]" type="number" name="mount" id="mount" required><br><br>
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select><br><br>
                    <button type="submit">Create Expense</button>
                </form>
                @if (session('msg'))
                    <p>{{ session('msg') }}</p>
                @endif
            </div>

            <div id="colocation-expenses-div" class="colocation-expenses-div">
                @if (isset($colocation) && count($colocation->expenses) > 0)
                    @foreach ($colocation->expenses as $expense)
                        <p>Title: {{ $expense->title }} | Price: {{ $expense->mount }}</p>
                    @endforeach
                @else
                    <p>There are no expenses yet!</p>
                @endif
            </div>

            <div id="wallet-div" class="wallet-div">
                @if (isset($colocation) && count($colocation->expenses) > 0)
                    @foreach ($user_expenses as $user_expense)
                        <p>Mount to pay: {{ $user_expense->mount_to_pay }} | Status: {{ $user_expense->status }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function(){
        const create_expense_btn = document.getElementById('create-expense-btn');
        const create_expense_div = document.getElementById('create-expense-div');
        const colocation_expenses_btn = document.getElementById('colocation-expenses');
        const colocation_expenses = document.getElementById('colocation-expenses-div');
        const wallet_btn = document.getElementById('wallet');
        const wallet_div = document.getElementById('wallet-div');

        function hideAll(){
            create_expense_div.classList.add('hidden');
            colocation_expenses.classList.add('hidden');
            wallet_div.classList.add('hidden');
        }

        hideAll();
        colocation_expenses.classList.remove('hidden');
        wallet_btn.addEventListener('click', function(){
            hideAll();
            wallet_div.classList.remove('hidden');
        });

        colocation_expenses_btn.addEventListener('click', function (){
            hideAll();
            colocation_expenses.classList.remove('hidden');
        });

        create_expense_btn.addEventListener('click', function(){
            hideAll();
            create_expense_div.classList.remove('hidden');
        })
    })
</script>