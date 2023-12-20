<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliveryaddress extends Model
{
    use HasFactory; 
    protected $fillable = [
        'user_id',
        'country',
        'address',
        'type',
        'city',
        'state',
        'postcode',
        'phone',
        'email',
        'note',

    ];
}
