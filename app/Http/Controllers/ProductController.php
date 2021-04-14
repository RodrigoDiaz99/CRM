<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStore;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\InventoryProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $product = Product::all();
        $category = CategoryProduct::orderBy('name', 'desc')->get();
        return view('products.products.index', compact('product', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = CategoryProduct::orderBy('name', 'desc')->get();
        return view('products.products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStore $request)
    {
        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            //obtenemos el nombre del archivo
            $coverName = time(); //$cover_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/productsImg', $coverName);

            //Almacenamos los datos respectivos en la DB;
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'img_paths' => $pathCover,
                'category_id' => $request->category_id,
            ]);

            $product = Product::latest('id')->first();
            if ($product != null) {
                InventoryProduct::create([
                    'product_id' => $product->id,
                    'total_count' => $request->total_count,
                    'purchase_price' => $request->purchase_price,
                    'percent_of_profit' => $request->percent_of_profit,
                    'sale_price' => $request->sale_price,

                ]);
            }
        } else {
            return back();
        }

        return redirect()->route('products.index')->with('success', 'producto gurdado con éxito');
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
        $product = Product::findOrFail($id);
        $category = CategoryProduct::orderBy('name', 'desc')->get();
        return view('products.products.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStore $request, $id)
    {

        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'cover_file' => 'required|mimes:jpeg,bmp,png'
            ]);
            //obtenemos el campo file definido en el formulario
            //Eliminamos archivos que estamos editando;
            Storage::delete($request->productCoverDelete);

            $coverName = time(); //. $cover_file->getClientOriginalName();

            $cover_file = $request->file('cover_file');

            // Img del libro o documento PDF.
            $pathCover = $request->file('cover_file')->storeAs('public/productsImg', $coverName);

            //Almacenamos los datos respectivos en la DB;
            Product::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'img_paths' => $pathCover,
                'category_id' => $request->category_id,



            ]);
            //$video->update();
        } else {
            $request->validate([
                'name' => 'required',
                'description' => 'required'
            ]);
            //obtenemos el campo file definido en el formulario


            //Almacenamos los datos respectivos en la DB;
            Product::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'img_paths' => $pathCover,
                'category_id' => $request->category_id,
            ]);
        }

        return redirect()->route('products.index')->with('update', 'Video Actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
