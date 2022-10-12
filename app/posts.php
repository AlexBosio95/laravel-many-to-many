<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = ['name', 'content', 'slug', 'tag', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
