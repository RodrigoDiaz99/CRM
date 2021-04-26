<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CommentProduct;
use App\Http\Requests\CommentStore;

class commentsController extends Controller
{
    public function index(){
        $comment_products = CommentProdcut::all();
        return view('store.product-detail', compact('comments'));   
    }

    public function create(){
        $products = Product::orderBy('name','ASC')->get();
    }

    public function store(CommentStore $request){
        $comment_products = new CommentProduct();
        $comment_products->comment = $request->comment; 
        $comment_products->product_id = $request->product_id;
        $comment_products->user_id = auth()->user()->id;
        $comment_products->save();
        return redirect()->route('promotions.index');
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}
