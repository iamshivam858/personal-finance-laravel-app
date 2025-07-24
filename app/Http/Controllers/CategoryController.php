<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $req){
        if($req->isMethod('post')){
            $id = $req->session()->get('user_id');
            Category::create([
                'user_id' => $id,
                'name' => $req->get('name'),
                'type' => $req->get('type')
            ]);
            return redirect('category/all');
        }
        return view('category.create');
    }

    public function all(Request $req){
        $id = $req->session()->get('user_id');
        $categories = Category::where('user_id',$id)->get();
        return view('category.all',compact('categories'));
    }

    public function deleteCategory($id){
        Category::find($id)->delete();
        return redirect('/category/all');
    }

    public function updateCategory(Request $req,$id){
        $category = Category::where('id',$id)->first();

        if($req->isMethod('post')){
           $fields = ['name', 'type']; 
            foreach ($fields as $field) {
                if ($req->filled($field)) {
                    $category->$field = $req->get($field);
                }
            }
            $cat = $category->save();
            if($cat){
                return redirect('/category/all')->with('message','Category Updated Successfully!');
            }else{
                return redirect('/category/all')->with('message','Something Went wrong');
            }
        }
        
        return view('category.update',compact('category'));
    }

}
