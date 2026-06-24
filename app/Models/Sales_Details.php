<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sales_Details extends Model
{
    protected $fillable = [
        'customer_id',
        'sale_id',
        'cantidad',
        'subtotal',
    ];
    public function sale() : BelongsTo
    {
        return $this->belongsTo(Sales::class);
    }
    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customers::class);
    }
}
