<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
       $state = State::all();
       $category = Category::all();
       $product = Product::all();
        return view('front.index', compact('product','category','state'));  
    }


    public function getCity($id){
     
        $city = City::where('s_id',$id)->get();   
        return response()->json($city);   
       }

    // public function state(){
    //     $state = State::get();
    //     return view('front.header',compact('state'));
    // }   

    public function About(){
       $state = State::all();
        return view('front.about',compact('state'));
    }

    public function ProDetails($id){
        $data = Product::find($id);
        $state = State::all();
        return view('front.product_details', ["product" => $data,'state'=>$state]);
    }

    public function show(){
        $state = State::all();
        $data = Product::all();
        return view('front.products', ['product' => $data,'state'=>$state]);
    }

    public function category($id){
        $state = State::all();
        $category = Category::find($id);
        if(!is_null($category)){
            return view('front.show',compact('category','state'));
        }else{
            session()->flash('error','Sorry There is no category by this id');
            return redirect('/');
        }
    }

    public function OrderNow()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');
        return view('order', ['total' => $total]);
    }

    public static function cartItem()
    {
        $userId = Session::get('users')['id'];
        if($userId){
            return Cart::where('user_id', $userId)->count();
        }
        
    }

    public function cartList(Request $request){
        $state = State::all();

     if($request->session()->has('users'))
     {
         $userId = Session::get('users')['id'];
         $tot = DB::table('carts')
         ->join('products', 'carts.product_id', 'products.id')
         ->where('carts.user_id', $userId)
         ->sum('products.offer_price');
         $data = Cart::where('user_id',$userId)->get();
         return view('front.cartbackup',['product'=>$data,'state'=>$state,'tot'=>$tot]);
     }else
      {
         $session_id = Session::get('session_id');
         $tot = DB::table('carts')
         ->join('products','carts.product_id','products.id')
         ->where('carts.session_id',$session_id)
         ->sum('products.offer_price');
         $data = Cart::where('session_id',$session_id)->get();
         return view('front.cartbackup',['product'=>$data,'state'=>$state,'tot'=> $tot]);
         // return view('front.cart')->with(compact('userCartItem','state'));
     }
    }

   public function search(Request $req)
   {
     $search = $req->search;
     $product = Product::orWhere('name', 'like', '%' . $search . '%')
         ->orWhere('desc', 'like', '%' . $search . '%')
         ->orWhere('short_description', 'like', '%' . $search . '%')
         ->orWhere('price', 'like', '%' . $search . '%')
         ->orWhere('slug', 'like', '%' . $search . '%')
         ->orWhere('quantity', 'like', '%' . $search . '%')
         ->orderBy('id', 'desc')
         ->paginate(9);
         if(!$product){
             return view('front.not_found');
         }else{
             return view('front.search', compact('search', 'product'));
         }  
   }

   public function ADDCART(Request $request){
    $data = $request->all();
    $getStock = Product::where('id',$data['product_id'])->first()->toArray();
    // echo $getStock['quantity'];
    // die();
    if($getStock['quantity'] < $data['quantity']){

        $message = "Required Quantity is Not Available";
        session::flash('error',$message);
        return redirect()->back();
    }
         $session_id = Session::get('session_id');
        if(empty($session_id)){
        $session_id = Str::random(40);
        Session::put('session_id',$session_id);
    }
    if(Auth::check()){
    $user =  $request->session()->get('users')['id'];
        $countProduct = Cart::where([
            'product_id'   =>$data['product_id'],
            'name'         =>$data['name'],
            'brand'        =>$data['brand'],
            'slug'        =>$data['slug'],
            'weight'       =>$data['weight'], 
            'user_id'   => $user
        ])->count();
    }else{
         // user is not logged in
         $countProduct = Cart::where([
            'session_id'   =>$session_id,
            'product_id'   =>$data['product_id'],
            'name'         =>$data['name'],
            'brand'        =>$data['brand'],
            'slug'        =>$data['slug'],
            'weight'       =>$data['weight'] 
            ])->count();
    }
    if($countProduct>0){
       echo "Already in a cart";
       return redirect('/cart'); 
    }
    if($request->session()->has('users')){
        $userId = Session::get('users')['id'];
    }
    else{
        $userId = 0;
    }
    $cart = new Cart;
    $cart->session_id = $session_id;
    $cart->user_id = $userId;
    $cart->product_id = $data['product_id'];
    $cart->name = $data['name'];
    $cart->brand = $data['brand'];
    $cart->slug = $data['slug'];
    $cart->price = $data['price'];
    $cart->offer_price = $data['offer_price'];
    $cart->weight = $data['weight'];
    $cart->quantity = $data['quantity'];
    $cart->save();
    Session::put('flash_message', 'Product added to cart!');
    return redirect()->back();

   }

   public function deleteCartProduct($id){
    $data = Cart::find($id);
    $data->delete();
    // $request->session()->flash('message','product deleted');
    return redirect('/cart');
}

public function updateCartQuantity($id=null,$quantity=null){
    $cartDetails = Cart::where('id',$id)->first();
    $get_product_stock = Product::where('slug',$cartDetails->product_slug)->first();
    // echo $get_product_stock->quantity;
    DB::table('carts')->where('id',$id)->increment('quantity',$quantity);
    return redirect('/cart')->with('flash_message','Product Quantity Updated Successfully');

}

public function checkout(Request $request){
    $state = State::all();
    return view('front.checkout',['state'=>$state]);
}

    // public function AddToCart(Request $req){
    //     if ($req->session()->has('users')) {
    //         $cart = new Cart;
    //         $session_id = Session::get('session_id');
    //         if(empty($session_id)){
    //             $session_id= Str::random(40);
    //             Session::put('session_id',$session_id);
    //         }
            
    //         $cart->session_id = $session_id;
    //         $cart->user_id = $req->session()->get('users')['id'];
    //         $cart->product_id = $req->product_id;
    //         $cart->name = $req->name;
    //         $cart->brand = $req->brand;
    //         $cart->price = $req->price;
    //         $cart->offer_price = $req->offer_price;
    //         $cart->weight = $req->weight;
    //         $cart->quantity = $req->quantity;
    //         $cart->save();
    //         return redirect('/');
    //     } else {
    //         // return redirect('/');
    //         echo "<script>";
    //         echo "alert('hello');";
    //         echo "</script>";
    //         return redirect('/');
    //     } 
    // }
    
  

    // else{
    //     $session_id = Session::get('session_id');
    //     return Cart::where('session_id', $session_id)->count();
    // }

    // public function cartList(){
    //     $userId = Session::get('users')['id'];
    //     $data = DB::table('carts')
    //         ->join('products', 'carts.product_id', 'products.id')
    //         ->where('carts.user_id', $userId)
    //         ->select('products.*', 'carts.id as cart_id')
    //         ->get();
    //     return view('front.cart', ['product' => $data]);
    // }

    // public function cartList(){
    //     $state = State::all();
    //     $session_id = Session::get('session_id');
    //     $userCart = DB::table('carts')->where(['session_id'=>$session_id])->get();
    //     // $state = State::all();
    //     // echo "<pre>";
    //     // print_r($userCart);
    //     // die();
    //     // $state = State::all();
    //     return view('front.cart',['product'=>$userCart,'state'=>$state]);
    // }

       


        // public function orderNow(){
        //     $state = State::all();
        //     $userId = Session::get('users')['id'];
        //     $tot = DB::table('carts')
        //         ->join('products', 'carts.product_id', 'products.id')
        //         ->where('carts.user_id', $userId)
        //         ->sum('products.offer_price');
        //     return view('front.cart', ['tot' => $tot,'state'=>$state]);
        // }
    


        // public function addCart(Request $request){

        //     $product_id = $request->input('product_id');
        //     $quantity = $request->input('quantity');

        //     $product = Product::find($product_id);
        //     $product_name = $product->name;
        //     // $product_image = $product->image;
        //     $pro_price = $product->price;

        //     if($product){
        //         $item_array = array(
        //             'item_id' => $product_id,
        //             'item_name' => $product_name,
        //             'item_quantity' =>  $quantity,
        //         );
        //         $cart_data[] = $item_array;
        //         $item_data = json_encode($cart_data);
        //         $minutes = 60;
        //         Cookie::queue(Cookie::make('shopping_cart',$item_data,$minutes));
        //         return response()->json(['status' =>'"'.$product_name.'"Added to cart']);
        //     }

        // }

        // public function cartList(){
        //     $userId = Session::get('users')['id'];
        //     if(!$userId){
        //         return view('front.cart');
        //     }else{
        //         $data = DB::table('carts')
        //         ->join('products', 'carts.product_id', 'products.id')
        //         ->select('products.*', 'carts.id as cart_id')
        //         ->where('carts.user_id', $userId)
        //         ->get();
        //     return view('front.cart', ['product' => $data]);
        //     }
            
        // }

    //     public function search(Request $req){
    //     $data = Product::where('name', 'like', '%' . $req->input('query') . '%')
    //         ->get();
    //     return view('front.search', ['product' => $data]);
    // }

 
    
    // public function AddToCart(Request $request)
    // {
    //     $data = $request->all();
    //     $user =  $request->session()->get('users')['id'];
    //     $session_id = Session::get('session_id');
    //     if(empty($session_id)){
    //         $session_id = Str::random(40);
    //         Session::put('session_id',$session_id);
    //     }
    //     $countProduct = DB::table('carts')->where(
    //         [
    //         'product_id'   =>$data['product_id'],
    //         'name'         =>$data['name'],
    //         'brand'        =>$data['brand'],
    //         'slug'        =>$data['slug'],
    //         'weight'       =>$data['weight'], 
    //         'session_id'   =>$session_id
    //     ])->count();
    //     if($countProduct > 0){
    //         // $request->session()->flash('error_message','Product Already exists');
    //         return redirect()->back()->with('error','Product Already Exists in Cart');
    //     }else{
    //         DB::table('carts')->insert(
    //             [
    //             'user_id'=>$user,
    //             'product_id'=>$data['product_id'],
    //             'name'=>$data['name'],
    //             'brand'=>$data['brand'],
    //             'slug'=>$data['slug'],
    //             'price'=>$data['price'],
    //             'offer_price'=>$data['offer_price'],
    //             'weight'=>$data['weight'],
    //             'quantity'=>$data['quantity'],
    //             'session_id'=>$session_id
    //             ]);
    //     }
    //     return redirect('/cart');
    // }

  

    // public function ADDCART(Request $request){
    //     $data = $request->all();
    //     $getStock = Product::where('id',$data['product_id'])->first()->toArray();
    //     // echo $getStock['quantity'];
    //     // die();

    //     if($getStock['quantity']<$data['quantity']){
    //         $message = "Required Quantity is Not Available";
    //         session::flash('error',$message);
    //         return redirect()->back();
    //     }
        
    //     $session_id = Session::get('session_id');
    //     if(empty($session_id)){
    //         $session_id = Str::random(10);
    //         Session::put('session_id',$session_id);
    //     }

    //     $user = $request->session()->get('users')['id'];

    //     if($user){
    //         $countProduct = DB::table('carts')->where(
    //             [
    //             'user_id'      =>$user,
    //             'product_id'   =>$data['product_id'],
    //             'name'         =>$data['name'],
    //             'brand'        =>$data['brand'],
    //             'slug'        =>$data['slug'],
    //             'weight'       =>$data['weight']
    //         ])->count();

    //     }else{
            
    //         $countProduct = DB::table('carts')->where(
    //             [
    //             'session_id'   =>Session::get(['session_id']),
    //             'product_id'   =>$data['product_id'],
    //             'name'         =>$data['name'],
    //             'brand'        =>$data['brand'],
    //             'slug'        =>$data['slug'],
    //             'weight'       =>$data['weight']
                
    //         ])->count();

    //     }

            

    //     if($countProduct > 0){
    //         return redirect()->back()->with('error','Product Already Exists in Cart');
    //     }
    //     // Cart::insert(
    //     // [
    //     // 'session_id'=>$session_id,
    //     // 'product_id'=>$data['product_id'],
    //     // 'name'=>$data['name'],  
    //     // 'brand'=>$data['brand'],
    //     // 'slug'=>$data['slug'],
    //     // 'price'=>$data['price'],
    //     // 'offer_price'=>$data['offer_price'],
    //     // 'weight'=>$data['weight'],
    //     // 'quantity'=>$data['quantity']
    //     // ]);
    //     $cart = new Cart;
    //     $cart->session_id = $session_id;
    //     $cart->product_id = $data['product_id'];
    //     $cart->name = $data['name'];
    //     $cart->brand = $data['brand'];
    //     $cart->slug = $data['slug'];
    //     $cart->price = $data['price'];
    //     $cart->offer_price = $data['offer_price'];
    //     $cart->weight = $data['weight'];
    //     $cart->quantity = $data['quantity'];
    //     $cart->save();

    //     return redirect('/cart');
    // }




   
}
