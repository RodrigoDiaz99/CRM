<?php

namespace App\Http\Controllers;

use App\Http\Requests\FirstStore;
use App\Http\Requests\SecondStore;
use App\Http\Requests\ThirdStore;
use App\Models\bannerone;
use App\Models\bannerthree;
use App\Models\bannertwo;
use Illuminate\Http\Request;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {


    }
     public function index()
    {
      $content1 = bannerone::orderBy('id', 'desc')->get()->take(1);
        $content2 = bannertwo::orderBy('id', 'desc')->get()->take(1);
        $content3 = bannerthree::orderBy('id', 'desc')->get()->take(1);
        return view('inicio.index', compact('content1', 'content2', 'content3'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1()
    {
        return view('inicio.first.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeone(FirstStore $request)
    {
        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            //obtenemos el nombre del archivo
            $coverName = time(); //$cover_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/first', $coverName);

            //Almacenamos los datos respectivos en la DB;
            bannerone::create([
                'title' => $request->title,
                'description' => $request->description,
                'img_paths' => $pathCover,

            ]);


        } else {
            return back();
        }

        return redirect()->route('content.list')->with('success', 'producto gurdado con éxito');
    }


    public function edit1($id)
    {
        $content1=bannerone::findOrFail($id);
        return view('inicio.first.edit',compact('content1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update1(FirstStore $request, $id)
    {
        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'cover_file' => 'required|mimes:jpeg,bmp,png'
            ]);
            //obtenemos el campo file definido en el formulario
            //Eliminamos archivos que estamos editando;
            Storage::delete($request->firstCoverDelete);

            $coverName = time(); //. $cover_file->getClientOriginalName();

            $cover_file = $request->file('cover_file');

            // Img del libro o documento PDF.
            $pathCover = $request->file('cover_file')->storeAs('public/first', $coverName);

            //Almacenamos los datos respectivos en la DB;
            bannerone::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'img_paths' => $pathCover,




            ]);
            //$video->update();
        } else {
            $request->validate([
                'title' => 'required',
                'description' => 'required'
            ]);
            //obtenemos el campo file definido en el formulario


            //Almacenamos los datos respectivos en la DB;
            bannerone::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'img_paths' => $pathCover,

            ]);
        }

        return redirect()->route('content.list')->with('update');
    }

    public function destroy1($id)
    {
        //
    }







    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create2()
    {
        return view('inicio.second.create');
    }
    public function store2(SecondStore $request)
    {
        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            //obtenemos el nombre del archivo
            $coverName = time(); //$cover_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/second', $coverName);

            //Almacenamos los datos respectivos en la DB;
            bannertwo::create([
                'title' => $request->title,
                'description' => $request->description,
                'img_paths' => $pathCover,

            ]);


        } else {
            return back();
        }

        return redirect()->route('content.list')->with('success', 'producto gurdado con éxito');
    }
    public function edit2($id)
    {

        return view('inicio.second.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(SecondStore $request, $id)
    {
        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'cover_file' => 'required|mimes:jpeg,bmp,png'
            ]);
            //obtenemos el campo file definido en el formulario
            //Eliminamos archivos que estamos editando;
            Storage::delete($request->productCoverDelete);

            $coverName = time(); //. $cover_file->getClientOriginalName();

            $cover_file = $request->file('cover_file');

            // Img del libro o documento PDF.
            $pathCover = $request->file('cover_file')->storeAs('public/second', $coverName);

            //Almacenamos los datos respectivos en la DB;
            bannertwo::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'img_paths' => $pathCover,




            ]);
            //$video->update();
        } else {
            $request->validate([
                'title' => 'required',
                'description' => 'required'
            ]);
            //obtenemos el campo file definido en el formulario


            //Almacenamos los datos respectivos en la DB;
            bannertwo::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'img_paths' => $pathCover,

            ]);
        }

        return redirect()->route('content.list')->with('update');
    }
    public function destroy2($id)
    {
        //
    }
    public function create3()
    {
        return view('inicio.three.create');
    }
    public function store3(ThirdStore $request)
    {
        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            //obtenemos el nombre del archivo
            $coverName = time(); //$cover_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/third', $coverName);

            //Almacenamos los datos respectivos en la DB;
            bannerthree::create([
                'title' => $request->title,
                'description' => $request->description,
                'img_paths' => $pathCover,

            ]);


        } else {
            return back();
        }

        return redirect()->route('content.list')->with('success', 'producto gurdado con éxito');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit3($id)
    {
        return view('inicio.three.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update3(ThirdStore $request, $id)
    {
        $cover_file = $request->file('cover_file');

        if ($cover_file) {

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'cover_file' => 'required|mimes:jpeg,bmp,png'
            ]);
            //obtenemos el campo file definido en el formulario
            //Eliminamos archivos que estamos editando;
            Storage::delete($request->productCoverDelete);

            $coverName = time(); //. $cover_file->getClientOriginalName();

            $cover_file = $request->file('cover_file');

            // Img del libro o documento PDF.
            $pathCover = $request->file('cover_file')->storeAs('public/first', $coverName);

            //Almacenamos los datos respectivos en la DB;
            bannerthree::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'img_paths' => $pathCover,




            ]);
            //$video->update();
        } else {
            $request->validate([
                'title' => 'required',
                'description' => 'required'
            ]);
            //obtenemos el campo file definido en el formulario


            //Almacenamos los datos respectivos en la DB;
            bannerthree::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'img_paths' => $pathCover,

            ]);
        }

        return redirect()->route('content.list')->with('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy3($id)
    {
        //
    }
}
