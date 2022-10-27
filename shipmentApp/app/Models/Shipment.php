<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    //Allow mass assignment for these fields.
    protected $fillable = [
        'shiper', 'weight', 'description', 'status', 'price', 'img_path', 'code'
    ];

}
