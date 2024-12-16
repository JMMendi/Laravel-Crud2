<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable=['nombre', 'color'];

    // Especificamos las relaciones: de una categoría vamos a tener muchos artículos

    public function articles() : HasMany {
        return $this->hasMany(Article::class);
    }
}
