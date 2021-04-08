<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStore;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
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
        $category = CategoryProduct::all();
        return view('products.category.index', compact('category'));
    }


    public function create($id)
    {
        $category = CategoryProduct::findOrFail($id);
        return view('products.category.create', compact('category'));
    }


    public function store(CategoryStore $request)
    {

        $category = new CategoryProduct();
        $category->name = $request->name;

        $category->save();
        return redirect()->route('category.index')->with('success', 'Se ha publicado correctamente el contenido.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = CategoryProduct::find($id);
        return redirect()->route('category.index')->with('success','Se ha publicada correctamente');
    }


    public function update(CategoryStore $request, $id)
    {
        $category = new CategoryProduct();
        $category->name = $request->name;

        $category->update();
        return redirect()->route('category.index')->with('success', 'Se ha publicado correctamente el contenido.');
    }


    public function destroy($id)
    {
        $category = CategoryProduct::find($id);

        $category->delete();
        return back()->with('Success', 'Se elimino correctamente');
        /*
   foreach(item as items){

   }
   */
    }
    public function restore($id)
    {
        $category = CategoryProduct::onlyTrashed()->get();
        $category->restore();
    }
}
