<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_has_subcategory extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Product_id', 'Subcategory_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Product_id', 'Subcategory_id',
    ];
}
