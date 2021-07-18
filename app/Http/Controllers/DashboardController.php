<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_count = User::count();
        $user = User::all();
        $reports = Report::count();
        $sales_count = Voucher::where('status', 'Pendiente')->count();
        $sale = Voucher::sum('expense');

        $monthlySale = collect([]);

   /*      for ($i = 1; $i <= 12; $i++) {
            $aux = whereMonth('created_at', '=', $month)
                ->get();
            $monthlySale->push($i);
        }

        dd($monthlySale); */

        return view('dashboard', compact('users_count', 'user', 'sales_count', 'sale', 'reports', 'monthlySale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
}
