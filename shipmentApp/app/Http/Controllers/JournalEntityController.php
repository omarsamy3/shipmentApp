<?php

namespace App\Http\Controllers;

use App\Models\JournalEntity;
use App\Http\Requests\StoreJournalEntityRequest;
use App\Http\Requests\UpdateJournalEntityRequest;
use App\Models\Shipment;

class JournalEntityController extends Controller
{
    public function create($shipment)
    {
        //Loop three times to create three journal entities.
        for($i=0; $i<3; $i++){
            //Create a new journal entity.
            $journalEntity = new JournalEntity();

            //Set the shipment id.
            $journalEntity->shipment_id = $shipment->id;

            //Set the journal entity type and price.
            switch($i){
                case 0:
                    $journalEntity->type = 'Debit Cash';
                    $journalEntity->amount = $shipment->price;
                    break;
                case 1:
                    $journalEntity->type = 'Credit Revenue';
                    $journalEntity->amount = $shipment->price * 0.2;
                    break;
                case 2:
                    $journalEntity->type = 'Credit Payable';
                    $journalEntity->amount = $shipment->price * 0.8;
                    break;
            }
            $journalEntity->save();
        }
    }
}
