<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;


    // declearation database fields from Migragtion
    protected $fillable=[
        'pizza_id',
        'pizza_name',
        'image',
        'price',
        'publish_status',
        'category_id',
        'discount_price',
        'buy_one_get_one_staut',
        'waiting_time',
        'description',
    ];


}
