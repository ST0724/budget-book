<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Budget;
use App\Http\Requests\BudgetRequest;

class BudgetController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $budgets = Budget::with('category')->orderBy('date', 'desc')->simplePaginate(5);
        return view('index', compact('categories', 'budgets'));
    }

    public function store(BudgetRequest $request)
    {
        //$budget = $request->only(['date', 'category', 'price']);

        $budget = [
            'date' => $request->date,
            'price' => $request->price,
            'category_id' => $request->category];
        //dd($budget); //デバッグ用の関数

        Budget::create($budget);
        return redirect('/')->with('message', '支出を登録しました。');
    }
}
