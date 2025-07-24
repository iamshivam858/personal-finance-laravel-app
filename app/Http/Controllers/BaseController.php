<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function dashboard(Request $req){
        $user_id = $req->session()->get('user_id');
        $transactions = Transaction::where('user_id',$user_id)->with('category')->get();

    $income = $transactions->where('category.type', 'income')->sum('amount');
    $expense = $transactions->where('category.type', 'expense')->sum('amount');

    // Group expenses by category
    $expenseByCategory = $transactions
        ->where('category.type', 'expense')
        ->groupBy('category.name')
        ->map(function ($row) {
            return $row->sum('amount');
        });
    
        $trans = Transaction::where('user_id',$user_id)->orderBy('date', 'desc')->take(3)->get();

        return view('welcome', compact('income', 'expense', 'expenseByCategory', 'trans'));
    }

    public function reporting(Request $req){

        $user_id = $req->session()->get('user_id');

        if($req->isMethod('post')){
            $start_date = $req->get('start_date');
            $end_date = $req->get('end_date');

            $transactions = Transaction::where('user_id',$user_id)
                            ->whereDate('date','>=',$start_date)
                            ->whereDate('date','<=',$end_date)
                            ->orderBy('date','desc')
                            ->get();
            return view('reports',compact('transactions'));
        }

        return view('reports');
    }


}
