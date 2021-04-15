<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Product;
use App\Http\Requests\PromotionStore;

class PromotionController extends Controller
{

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('products.promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name','ASC')->get();
        return view('products.promotions.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionStore $request)
    {
        $promotions = new Promotion();
        $promotions->title = $request->title;
        $promotions->product_id = $request->product_id;
        $promotions->description = $request->description;
        $promotions->cash_discount = $request->cash_discount;
        $promotions->expiration_date = $request->expiration_date;
        $promotions->user_id = auth()->user()->id;
        
        $promotions->save();
        return redirect()->route('promotions.index');
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
        $promotions = Promotion::findOrFail($id);
        $products = Product::orderBy('name','desc')->get();
        return view('products.promotions.edit', compact('promotions','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionStore $request, $id)
    {
        $promotions = new Promotion();
        $promotions->title = $request->title;
        $promotions->product_id = $request->product_id;
        $promotions->description = $request->description;
        $promotions->cash_discount = $request->cash_discount;
        $promotions->expiration_date = $request->expiration_date;
        $promotions->update();
        return redirect()->route('promotions.index')->with('succes', 'Promocion actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotions = Promotion::find($id);

        $promotions->delete();
        return back()->with('Success', 'Se elimino correctamente');
    }
}
