<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorStore;
use App\Models\Colores;
use Illuminate\Http\Request;

class ColoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  public function index(){
      $color =Colores::all();
return view('products.colores.index',compact('color'));

  }
  public function create(){

    return view('products.colores.create');
}
public function store(ColorStore $request){
$color = new Colores();
$color->color= $request->color;
$color->save();
return redirect()->route('color.index');
}
public function show($id)
{
    //
}

public function edit($id){
    $color=Colores::findOrFail($id);
    return view('products.colores.edit', compact('color'));
}
public function update(ColorStore $request,$id){
    $color = Colores::findOrFail($id);
    $color->color = $request->color;
    $color->update();
    return redirect()->route('color.index');
}
public function destroy($id)
    {
        $color = Colores::findOrFail($id);
        $color->delete();
        return back()->with('Success', 'Se elimino correctamente');
    }
}

