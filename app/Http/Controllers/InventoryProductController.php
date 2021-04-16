<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryStore;
use Illuminate\Http\Request;
use App\Models\InventoryProduct;
use App\Models\Product;

class InventoryProductController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $inventory = InventoryProduct::all();
        return view('inventory.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventory = InventoryProduct::all();
        $product = Product::orderBy('name', 'desc')->get();
        return view('inventory.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryStore $request)
    {
        $inventory = new InventoryProduct();
        $inventory->product_id = $request->product_id;
        $inventory->total_count = $request->total_count;
        $inventory->purchase_price = $request->purchase_price;
        $inventory->percent_of_profit = $request->percent_of_profit;
        $inventory->sale_price = $request->sale_price;
        $inventory->cost_of_shipping  = $request->cost_of_shipping;
        $inventory->save();
        return redirect()->route('inventory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = InventoryProduct::findOrFail($id);
        $product = Product::orderBy('name', 'desc')->get();
        return view('inventory.edit', compact('product', 'inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryStore $request, $id)
    {
        $inventory = InventoryProduct::findOrFail($id);
        $inventory->product_id = $request->product_id;
        $inventory->total_count = $request->total_count;
        $inventory->purchase_price = $request->purchase_price;
        $inventory->percent_of_profit = $request->percent_of_profit;
        $inventory->sale_price = $request->sale_price;
        $inventory->cost_of_shipping = $request->cost_of_shipping;
         $inventory->update();
        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = InventoryProduct::find($id);
        $inventory->delete();
        return back()->with('Success', 'Se elimino correctamente');
    }
}
