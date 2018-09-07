<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use App\Caps;
use App\Category;
use Session;
use Redirect;
class MemberCapsController extends Controller
{
    public function index(Request $request)
    {
        $searchkey=$request->input('search');
        if(request()->has('price')){
            $caps= Caps::orderBy('price',request('price'))->paginate(3);
        }
        elseif(request()->has('category_id')){
            $caps= Caps::where('category_id',request('category_id'))->paginate(3);
        }
        else{
            $caps= Caps::orderBy('name')->paginate(3);
        }
        
        if(request()->has('search')){
            $caps= Caps::where('name',$searchkey)->paginate(3);
            
        }
        
        return view('membercaps')->with('caps',$caps);
    }
    public function AddToCart(Request $request,$id){
        $caps= Caps::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($caps,$caps->id);

        $request->session()->put('cart',$cart);
        
        return redirect()->route('membercaps');
    }
    public function remove(Request $request,$id){
       
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        
        $p = array_pull($cart->items, $id);
        dd($p);
        if(($key = array_search($id, $cart->items)) !== false) {
            
        unset($cart->items[$key]);
        }
        $request->session()->put('cart', $cart);

        return redirect('shoppingcart');
    }
    public function getCart(){
        if(!Session::has('cart')){
            return view('shoppingcart',['caps'=>null]);

        }
        $oldCart = Session::get('cart');
        $cart=new Cart($oldCart);
        
        return view('shoppingcart',['caps'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }
    
    
}
