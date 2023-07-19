<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $casts = [
        'on_sale' => 'boolean',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'in_stock',
        'on_sale'
    ];

}

