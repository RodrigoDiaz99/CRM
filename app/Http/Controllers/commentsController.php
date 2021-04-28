<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CommentProduct;
use App\Http\Requests\CommentStore;
use App\Models\User;

class commentsController extends Controller
{
    public function index(){
        $comments = CommentProduct::all();
        $products = Product::orderBy('name','ASC')->get();
        $user=User::orderBy('first_name','asc')->get();
        return view('store.comments.index', compact('comments','products','user'));
    }

    public function create(){
        $products = Product::orderBy('name','ASC')->get();
    }



    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
