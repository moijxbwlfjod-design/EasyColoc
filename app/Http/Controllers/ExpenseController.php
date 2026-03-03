<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use App\Models\ExpensePayer;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(){
        $user = Auth::user();
        $colocation = $user->colocations()->latest()->first();
        $user_expenses = ExpensePayer::where('payer_id', $user->id)->get();
        return view('pages.expenses.index', ['categories' => $user->colocations[count($user->colocations) - 1]->categories, 'colocation' => $colocation, 'user_expenses' => $user_expenses]);
    }

    public function create(ExpenseRequest $request){
        $user = Auth::user();
        $colocation = $user->colocations[count($user->colocations) - 1];
        $members = $colocation->members;
        $mount = $request->mount / count($members);
        $expense = Expense::create([
            'title' => $request->title,
            'mount' => $request->mount,
            'colocation_id' => $colocation->id,
            'category_id' => $request->category_id,
        ]);
        //dd(gettype($expense->id));
        $status = 'payed';
        foreach ($members as $member){
        if ($member->id == $user->id){
            $status = 'payed';
        } else{
            $status = 'not payed';   
        }
        ExpensePayer::create([
            'expense_id' => $expense->id,
            'payer_id' => $member->id,
            'mount_to_pay' => $mount,
            'status' => $status
        ]);
        }
        return redirect()->back()->with('msg', 'Expense created successfully');
    }
}
