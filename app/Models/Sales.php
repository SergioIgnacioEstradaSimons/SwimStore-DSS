<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sales extends Model
{
    protected $fillable = [
        'customer_id',
        'fecha',
        'total',
    ];
    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customers::class);
    }
    public function sales_details() : HasMany
    {
        return $this->hasMany(Sales_Details::class);
    }
}
