<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'estado',
    ];
    public function categorie() : BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
    public function sales_details() : HasMany
    {
        return $this->hasMany(Sales_Details::class);
    }
}
