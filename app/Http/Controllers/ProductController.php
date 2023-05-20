<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('product',['products' => $products]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'required'
    ]);

    $files = [];
    if($request->hasfile('filenames'))
    {
        foreach($request->file('filenames') as $file)
        {
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('files'), $name);
            $files[] = $name;
        }
    }

    $product= new Product();
    $product->filenames = $files;
    $file->save();

    return back()->with('success', 'Data Your files has been successfully added');
        // $photo1 = $request->file('image1')->getClientOriginalName();
        // $request->file('image1')->storeAs('public/photos',$photo1);

        // $photo2 = $request->file('image2')->getClientOriginalName();
        // $request->file('image2')->storeAs('public/photos',$photo2);

        // $photo3 = $request->file('image3')->getClientOriginalName();
        // $request->file('image3')->storeAs('public/photos',$photo3);

        // $photo4 = $request->file('image4')->getClientOriginalName();
        // $request->file('image4')->storeAs('public/photos',$photo4);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        // $product->photo1 = $photo1;
        // $product->photo2 = $photo2;
        // $product->photo3 = $photo3;
        // $product->photo4 = $photo4;
        $product->save();
        return redirect("/addProduct");
    }
    function detail($id)
    {
        $data =Product::find($id);
        return view('detail',['product'=>$data]);
    }

    function search(Request $req)
    {
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
        // $search = $request->input('search');
        // $products = Product::query()->where('name','LIKE',"%{$search}$")
        // ->orWhere('price','LIKE',"%{$search}%")
        // ->get();
        // return view('search',compact('products','categories'));
    }


        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$files = Product::find($id);
        return view('create', ['list_images' => $files->filenames, 'id' => $id]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$input = $request->all();
        $files = [];
        $files_remove = [];
        if($request->hasfile('filenames'))
		{
			foreach($request->file('filenames') as $file)
			{
			    $name = time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('files'), $name);
			    $files[] = $name;
			}
		}

		if (isset($input['images_uploaded'])) {
			$files_remove = array_diff(json_decode($input['images_uploaded_origin']), $input['images_uploaded']);
			$files = array_merge($input['images_uploaded'], $files);
		} else {
			$files_remove = json_decode($input['images_uploaded_origin']);
		}

        $file = File::find($input['id']);
		$file->filenames = $files;
		if($file->update()) {
			foreach ($files_remove as $file_name) {
				File2::delete(public_path("files/".$file_name));
			}
		}

        return back()->with('success', 'Data Your files has been successfully updated');
    }


    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
           $cart= new Cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('/');

        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
     $userId=Session::get('user')['id'];
     return Cart::where('user_id',$userId)->count();
    }
    static function admin(){
        $check = Session::get('user')['is_admin'];
        return User::where('is_admin'.$check);
    }
    function cartList()
    {
        $userId=Session::get('user')['id'];
       $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=>$products]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function orderNow()
    {
        $userId=Session::get('user')['id'];
        $total= $products= DB::table('cart')
         ->join('products','cart.product_id','=','products.id')
         ->where('cart.user_id',$userId)
         ->sum('products.price');

         return view('ordernow',['total'=>$total]);
    }
    function orderPlace(Request $req)
    {
        $userId=Session::get('user')['id'];
         $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->save();
             Cart::where('user_id',$userId)->delete();
         }
         $req->input();
         return redirect('/');
    }
    function myOrders()
    {
        $userId=Session::get('user')['id'];
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$userId)
         ->get();

         return view('myorders',['orders'=>$orders]);
    }
}
