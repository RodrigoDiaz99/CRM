<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DeliverydataStore;
use App\Models\DeliveryData;
class DeliveryDataController extends Controller
{
    public function create(){
        return view('store.checkout');
    }
    public function store(DeliverydataStore $request ){
        $delivery = new DeliveryData();
        $delivery->name = $request->name;
        $delivery->last_name = $request->last_name;
        $delivery->phone = $request->phone;
        $delivery->country = $request->country;
        $delivery->state = $request->state;
        $delivery->city = $request->city;
        $delivery->street = $request->street;
        $delivery->number_exterior = $request->number_exterior;
        $delivery->number_interior = $request->number_interior;
        $delivery->suburb = $request->suburb;
        $delivery->zip = $request->zip;
        $delivery->reference = $request->reference;
        $delivery->save();
        return redirect()->route('payment')->with('success', 'Se ha publicado correctamente el contenido.');
    }
}
