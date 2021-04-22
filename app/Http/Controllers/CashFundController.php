<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryStore;
use Illuminate\Http\Request;
use App\Models\CashFund;
use App\Models\User;

class CashFundController extends Controller
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
        $cashfund = CashFund::all();
        return view('cashfund.index', compact('cashfund'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('cashfund.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cashfund = new CashFund();
        $cashfund->money = $request->money;
        $cashfund->user_id = $request->user_id;
        $cashfund->save();
        return redirect()->route('cashfund.index');
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
        $cashfund = CashFund::findOrFail($id);
        $users = User::all();
        return view('cashfund.edit', compact('users', 'cashfund'));
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
        $cashfund = CashFund::findOrFail($id);
        $cashfund->money = $request->money;
        $cashfund->user_id = $request->user_id;
        $cashfund->update();
        return redirect()->route('cashfund.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cashfund = CashFund::findOrFail($id);
        $cashfund->delete();
        return back()->with('Success', 'Se elimino correctamente');
    }
}
