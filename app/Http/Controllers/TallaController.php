<?php

namespace App\Http\Controllers;

use App\Http\Requests\TallaStore;
use App\Models\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  public function index(){
      $talla = Talla::all();
return view('products.tallas.index',compact('talla'));

  }
  public function create(){

    return view('products.tallas.create');
}
public function store(TallaStore $request){
$talla = new Talla();
$talla->talla= $request->talla;
$talla->save();
return redirect()->route('talla.index');
}
 public function show($id)
    {
        //
    }

public function edit($id){
    $talla=Talla::findOrFail($id);
    return view('products.tallas.edit', compact('talla'));
}
public function update(TallaStore $request,$id){
    $talla = Talla::findOrFail($id);
    $talla->talla = $request->talla;
    $talla->update();
    return redirect()->route('talla.index');
}
public function destroy($id)
    {
        $talla = Talla::findOrFail($id);
        $talla->delete();
        return back()->with('Success', 'Se elimino correctamente');
    }
}
