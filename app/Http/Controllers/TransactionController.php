<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function createTransaction(Request $req){
        $user_id = $req->session()->get('user_id');
        if($req->isMethod('post')){
            $data = [
                'user_id' => $user_id,
                'category_id' => $req->get('category_id'),
                'title' => $req->get('title'),
                'amount' => $req->get('amount'),
                'date' => $req->get('date'),
                'notes' => $req->get('notes')
            ];
            $tra = Transaction::create($data);
            if($tra){
                return redirect()->back()->with('message','Transaction created');
            }else{
                return redirect()->back()->with('message','Error occurred');
            }

        }
        $categories = Category::where('user_id',$user_id)->get();
        return view('transactions.create',compact('categories'));
    }

    public function allTransactions(Request $req){

        $user_id = $req->session()->get('user_id');
        $transactions = Transaction::where('user_id',$user_id)->get();

        return view('transactions.all',compact('transactions'));
    }

    public function deleteTransaction($id){
        Transaction::find($id)->delete();
        return redirect('/transaction/all');
    }

    public function updateTransaction(Request $req, $id){
        $user_id = $req->session()->get('user_id');
        $transaction = Transaction::find($id)->first();
        if($req->isMethod('post')){
            $fields = ['title', 'amount','date','notes','category_id']; 
            foreach ($fields as $field) {
                if ($req->filled($field)) {
                    $transaction->$field = $req->get($field);
                }
            }
            $transaction->user_id = $user_id;
            $tr = $transaction->save();
            if($tr){
                return redirect('/transaction/all')->with('message','Category Updated Successfully!');
            }else{
                return redirect('/transaction/all')->with('message','Something Went wrong');
            }
        }
        $categories = Category::where('user_id',$user_id)->get();
        return view('transactions.update',compact('transaction','categories'));
    }

}
