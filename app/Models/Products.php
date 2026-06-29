<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    protected $fillable = [
        'categories_id',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'estado',
    ];
    public function category() : BelongsTo
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }
    public function sales_details() : HasMany
    {
        return $this->hasMany(Sales_Details::class);
    }
}
