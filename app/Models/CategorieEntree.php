<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorieEntree extends Model
{
    protected $guarded = [];
    protected $table = 'categories_entrees';

    public function entrees(){
        return $this->hasMany('App\Models\Entree');
    }
}
