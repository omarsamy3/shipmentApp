<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntity extends Model
{
    use HasFactory;


    //Allow mass assignment for these fields.
    protected $fillable = [
        'amount', 'type', 'shipment_id'
    ];

          //Link with the shipments table
          public function shipments(){
            return $this->belongsTo(Shipment::class);
        }
}
