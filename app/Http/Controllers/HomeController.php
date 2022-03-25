<?php

namespace App\Http\Controllers;

use App\Cart;
use App\category;
use Illuminate\Http\Request;
use App\product;
use App\Product as AppProduct;
use App\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homePage');
    }
    //untuk menampilkan top 4 penjualan
    public function welcome()
    {
        $categories = DB::select('
            select c.id, c.name, c.image 
            from categories c 
            join products p on c.id = p.category_id 
            join transaction_details d on p.id = d.product_id 
            group by c.id, c.name, c.image 
            order by sum(quantity) desc
            limit 4
        ');
        return view('welcome', compact('categories'));
    }

    public function detailPage()
    {
        return view('detailPage');
    }

    //untuk menentukan categori
    public function addProduct()
    {
        $categories = DB::select('select * from categories');
        return view('addProduct', compact('categories'));
    }

    //untuk add product
    public function addProductt(Request $request)
    {
        $this->validate($request,[
            'imageProduct'=>'required',
            'nameProduct'=>'required|unique:products,name|min:5',
            'descProduct'=>'required|min:10',
            'stockProduct'=>'required|integer|gt:0',
            'priceProduct'=>'required|integer|gt:5000',
            'typeProduct' => 'required'
        ]);

        $imageName = uniqid().$request->input('nameProduct').'.png';
        $file = $request->file('imageProduct');
        $file->move('image/', $imageName);

            $product = new Product;
            $product->image = $imageName;
            $product->name = $request->input('nameProduct');
            $product->description = $request->input('descProduct');
            $product->stock = $request->input('stockProduct');
            $product->price = $request->input('priceProduct');
            $product->category_id = $request->input('typeProduct');
            $product->save();
        return redirect('homePage');
    }

    //untuk menampilkan cart 
    public function cartPage()
    {
        $carts = DB::select('select * from carts c join products p on c.product_id = p.id where user_id = ?', [auth()->user()->id]);
        return view('cartPage', compact('carts'));
    }

    //untuk meng edit cart
    public function editCart($product_id)
    {
        $cart = collect(DB::select(
            'select p.name as product_name, ct.name as category_name, quantity, price, description, p.image, product_id
            from carts c
            join products p on c.product_id = p.id
            join categories ct on ct.id = p.category_id
            where product_id = ? 
            and user_id = ?'
        , [$product_id,auth()->user()->id]))->first();
        return view('editCart', compact('cart'));
    }

    //untuk update cart
    public function updateCart(Request $request, $product_id)
    {
        $request->validate([
            'quantity' => 'required|gt:0',
        ]);

        $c = Cart::where('product_id', $product_id)->where('user_id', auth()->user()->id)->first();
        $c->quantity = $request['quantity'];
        $c->save();

        return redirect('cartPage');
    }

    //untuk menampilkan product yang akan di edit
    public function editProduct()
    {
        $categories = DB::select('select * from categories');
        return view('editProduct', compact('categories'));
    }


    //untuk edit typetproduct
    public function editTypeProduct(Request $request, $category_id)
    {
        $request->validate([
            'name'.$category_id => 'required|unique:categories,name'
        ]);

        $category = Category::find($category_id);
        $category->name = $request['name' . $category_id];
        $category->save();

        return back();
    }

    //untuk delete category
    public function deleteCategory($category_id)
    {
        Category::find($category_id)->delete();

        return back();
    }

    //untuk menampilkan history pembelian
    public function historyPage()
    {
        $headers = TransactionHeader::where('user_id', auth()->user()->id)->get();
        return view('historyPage', compact('headers'));
    }

    //untuk checkout cart
    public function checkout()
    {
        $header = new TransactionHeader();
        $header->date = Carbon::now();
        $header->user_id = auth()->user()->id;
        $header->save();

        $carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cart) {
            DB::table('transaction_details')->insert([
                'transaction_id' => $header->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity
            ]);
        }
        Cart::where('user_id', auth()->user()->id)->delete();

        return redirect('historyPage');
    }

    //untuk menampilkan type apa saja yang sudah ada
    public function typeProduct()
    {
        $categories = DB::select('select * from categories');
        return view('typeProduct', compact('categories'));
    }

    //untuk add type product
    public function addTypeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required'
        ]);

        $imageName = uniqid() . $request->input('name') . '.png';
        $file = $request->file('image');
        $file->move('image/', $imageName);

        $category = new Category();
        $category->name = $request['name'];
        $category->image = $imageName;
        $category->save();

        return back();
    }

    
    public function updatePage($id)
    {
        $p = Product::find($id);
        return view('updatePage', compact('p'));
    }

    // untuk update product
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'unique:products'],
            'description' => ['required', 'min:10'],
            'stock' => ['required', 'integer', 'gt:0'],
            'price' => ['required', 'integer', 'gt:5000']
        ]);

        $p = Product::find($id);
        $p->name = $request->name;
        $p->description = $request->description;
        $p->stock = $request->stock;
        $p->price = $request->price;
        $p->save();

        return back();
    }

}
