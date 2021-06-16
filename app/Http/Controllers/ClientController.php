<?php

namespace App\Http\Controllers;

use App\Models\DeliveryData;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\ProductList;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $vouchers = Voucher::all();
        return view('report.client.order', compact('vouchers'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function card()
    {
        return view('Clients.card');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function street()
    {
        return view('Clients.streets');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order()
    {
        $vouchers = Voucher::where('user_id', auth()->user()->id)->get();
        return view('Clients.order', compact('vouchers'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vouchers = Voucher::findOrFail($id);
        if ($vouchers->status == "Pendiente") {
            $vouchers->status = "Enviado";
            // $users->password = bcrypt(Str::random(15));
            $vouchers->update();
            return back()->with('Success', 'Se ha inhabilitado');
        } else if ($vouchers->status == "Enviado") {
            $vouchers->status = "Entregado";
            $vouchers->update();
            return back()->with('success', 'Se ha habilitado la direccion.');
        } else {
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function orderDetails($id)
    {
        $delivery_id = Voucher::findOrFail($id);
        $row = DeliveryData::findOrFail($delivery_id->delivery_id);
        $getList = ProductList::where('list_id', $delivery_id->list_id)->get();
         $allProducts = Product::all();
 

        return view('report.client.orderDetails', compact('row', 'getList', 'allProducts'));
    }
}
