<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Transaction extends Model
{
    protected $fillable = ['user_id','category_id','title','amount','date','notes'];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

}
