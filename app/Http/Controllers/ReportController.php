<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Product;

use App\Models\ScoreProduct;

use App\Models\User;
use App\Models\Voucher;

class ReportController extends Controller
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


        $report = Report::all();
        return view('report.index', compact('report'));
    }
    public function index2()
    {
        $score = ScoreProduct::all();
        $product = Product::orderBy('name', 'desc')->get();
        return view('reports.sales.index', compact('score', 'product'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('report.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report();
        $report->user_id = auth()->user()->id;
        $report->startDate = $request->startDate;
        $report->endDate = $request->endDate;
        $report->save();
        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        $voucher = Voucher::whereBetween('created_at', array($report->startDate, $report->endDate))->get();
        return view('report.show', compact('report', 'voucher'));
    }

    public function mostSoldItem()
    {
        $score = ScoreProduct::all();
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

    public function clients()
    {
        $client = ScoreProduct::orderBy('total')->get();
        $allUsers = User::all();
        

        return view('report.client.index', compact('client', 'allUsers'));
    }
}
