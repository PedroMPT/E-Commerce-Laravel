<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','description','image','category_id','price'];
    public function category(){

        $this->belongsTo(Category::class);
    }
}
