<?php

namespace App\Http\Controllers;

use App\cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $name)
    {
        $products = Product::where('products.name', 'like', "%$request->search%")
            ->join('categories as c', 'c.id', '=', 'products.category_id');

        if(strcmp($name, 'homePage')!=0){
            $products = $products->where('c.name', $name);
        }
        
        $products = $products->select('products.*')->paginate(6);
        return view('productPage', compact('products', 'name'));
    }

    public function detail($name, $id)
    {
        $p = Product::join('categories as c', 'c.id', '=', 'products.category_id')
            ->where('c.name', $name)
            ->where('products.id', $id)
            ->select('products.*')
            ->first();
        return view('detailPage', compact('name', 'p'));
    }

    public function addCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required', 'gt:0'],
        ]);

        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $id;
        $cart->quantity = $request['quantity'];
        $cart->save();

        return redirect('cartPage');
    }

    public function deleteProduct($id, $name)
    {
        Product::find($id)->delete();

        return redirect($name);
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
