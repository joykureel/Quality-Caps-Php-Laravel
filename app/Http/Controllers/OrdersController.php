<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Auth;
use Session;
use Redirect;
class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => ['confirmation', 'memberindex','store','checkout']]);
        $this->middleware('Admin',['only' => ['index', 'update','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders= Order::all();
        $orders->transform(function($order,$key){
            $order->cart=unserialize($order->cart);
            return $order;
        });
        return view('orders.index',['orders'=>$orders]);
    }
    public function checkout()
    {
        return view('orders.checkout');
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
        if(!Session::has('cart')){
            return view('shoppingcart',['caps'=>null]);

        }
        $oldCart = Session::get('cart');
        $cart=new Cart($oldCart);      
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'address'=>'required',
        ]);
        $order=new Order();
        $order->cart=serialize($cart);
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->address=$request->input('address');
        $order->user_id=Auth::user()->id;
        $order->save();
        $request->session()->forget('cart');
        return redirect('/confirmation')->with('success','Order');
    }
    public function confirmation(){
        return view('orders.confirmation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function memberindex(){
        $id=Auth::user()->id;
        $orders= Order::where('user_id',$id)->paginate(3);
        $orders->transform(function($order,$key){
            $order->cart=unserialize($order->cart);
            return $order;
        });
        return view('orders.memberindex',['orders'=>$orders]);
    }
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $orders= Order::find($id);
        if($orders->status=="waiting"){
        $orders->status="shipped";
        $orders->save();
        }
        return Redirect::back();
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
