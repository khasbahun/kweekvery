<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'user_id',
        'image',
        'category_id',
        'created_at',
        'updated_at',
        'price_per',
        'in_stock'
    ];
    public function category() {
    	return $this->belongsTo('App\Models\Category');
    }
    public function discount() {
    	return $this->belongsTo('App\Models\Discount');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
