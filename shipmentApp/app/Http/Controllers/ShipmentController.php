<?php

namespace App\Http\Controllers;

use App\Models\JournalEntity;
use App\Models\Shipment;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use Nette\Utils\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use app\Http\Controllers\JournalEntityController;


class ShipmentController extends Controller
{
    public function create()
    {
        return view('shipments.create');
    }


    public function store(StoreShipmentRequest $request)
    {
        //Create a new shipment.
        $shipment = new Shipment();

        //Fill the shipment with the validated data.
        $shipment-> code = $request->input('code');
        $shipment->shiper = $request->input('shiper');
        $shipment->description = $request->input('description');
        $shipment->weight = $request->input('weight');
        $shipment->status = $request->input('status');

        //Save the image.
        if($request->hasFile('img-path')){
        $img = $request->file('img-path');
        $img_name = $img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $ourImgPath = 'images/' . $img_name;
        $shipment->img_path = $ourImgPath;
        }

        //Calculate the price.
        $weightInput = $request->input('weight');
        switch($weightInput){
            //price is 10 if, 1 <= weight <= 10
            case ($weightInput >= 1 && $weightInput < 10):
                $shipment->price = 10;
                break;

            //price is 100 if, 11 <= weight <= 25
            case ($weightInput >= 10 && $weightInput <= 25):
                $shipment->price = 100;
                break;

            //price is 300 if, 25 < weight
            case ($weightInput > 25):
                $shipment->price = 300;
                break;
        }

        //Save the shipment.
        $shipment->save();

        //Check if the status is done, then set the journal entities.
        if($shipment->status == 'done'){
            //route to the JournalEntityController, to create the journal entities.
            app('App\Http\Controllers\JournalEntityController')->create($shipment);
        }

        //Redirect to the home page.
        return redirect()
        ->route('shipments.create', [$shipment])
        ->with('success', 'Shipment created successfully.');
    }

    public function show(Shipment $shipment)
    {
        return view('shipments.show', ['shipment'=> $shipment]);
    }


    public function edit(Shipment $shipment)
    {
        return view('shipments.edit', ['shipment'=> $shipment]);
    }


    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        //Update the Shipment.
        $shipment-> code = $request->input('code');
        $shipment->shiper = $request->input('shiper');
        $shipment->description = $request->input('description');
        $shipment->weight = $request->input('weight');
        $shipment->status = $request->input('status');

        //Save the image.
        if($request->hasFile('img-path')){
            $img = $request->file('img-path');
            $img_name = $img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $ourImgPath = 'images/' . $img_name;
            $shipment->img_path = $ourImgPath;
            }

        //Calculate the price.
        $weightInput = $request->input('weight');
        switch($weightInput){
            //price is 10 if, 1 <= weight <= 10
            case ($weightInput >= 1 && $weightInput < 10):
                $shipment->price = 10;
                break;

            //price is 100 if, 11 <= weight <= 25
            case ($weightInput >= 10 && $weightInput <= 25):
                $shipment->price = 100;
                break;

            //price is 300 if, 25 < weight
            case ($weightInput > 25):
                $shipment->price = 300;
                break;
        }

        //Save the shipment.
        $shipment->save();

        //Check if the status is done, then set the journal entities.
        if($shipment->status == 'done'){
            //route to the JournalEntityController, to create the journal entities.
            app('App\Http\Controllers\JournalEntityController')->create($shipment);
        }
        return redirect()
        ->route('shipments.show',[$shipment])
        ->with('success', 'Shipment updated successfully');
    }


    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        return redirect()
        ->route('home')
        ->with('success', 'Post deleted successfully ');
    }
}
