<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_has_product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Order_id, User_id, quantity, Product_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Order_id, User_id, quantity, Product_id',
    ];
}
