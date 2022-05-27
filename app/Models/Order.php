<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderDate',
        'productQuantity',
        'orderAmount',
        'orderStatus',
        'addressClient'
    ];

    //une commande a un seul payement
    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'payment_id');
    }
    
    //une commande appartient a un seul panier
    public function carrier()
    {
        return $this->hasOne('App\Models\Carrier', 'carrier_id');
    }
    //une commande appartient a un seul user
    public function user()
    {
        return $this->hasOne('App\Models\User', 'user_id');
    }
    //une commande peut apartenir plusieurs produits
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
