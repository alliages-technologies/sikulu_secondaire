<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorieDepense extends Model
{
    protected $guarded = [];
    protected $table = 'categories_depenses';

    public function depense(){
        return $this->hasMany('App\Models\Depense', 'categorie_id');
    }
}
