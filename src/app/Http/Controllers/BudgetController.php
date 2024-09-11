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
        return view('index', compact('categories'));
    }

    public function store(BudgetRequest $request)
    {
        $budget = $request->only(['date', 'category', 'price']);
        Budget::create($budget);
        return redirect('/')->with('message', '支出を登録しました。');
    }
}
