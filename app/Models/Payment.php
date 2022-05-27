<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'paymentDate',
        'productsPrice',
        'livraisonPrice',
        'total'
    ];

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }

}
