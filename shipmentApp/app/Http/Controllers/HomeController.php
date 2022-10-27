<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home () {
        //Get all shipments from database.
        $shipments = Shipment::all();
        return view('home', ['shipments' => $shipments]);
    }
}
