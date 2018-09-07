<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caps;
use App\Category;
use App\Supplier;
class CapsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caps= Caps::orderBy('created_at','desc')->paginate(3);
        return view('caps.index')->with('caps',$caps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys=Category::all();
        $suppliers=Supplier::all();
        return view('caps.create')->with('categorys',$categorys)->with('suppliers',$suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'image'=>'image|max:1999',
            'price'=>'required'

        ]);
        if($request->hasFile('image')){
            //get filename with extension
            $fileNameWithExt=$request->file('image')->getClientOriginalName();
            
            //get just filename
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension=$request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            //upload the image
            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
            //to link storage to public storage 
            //php artisan storage:link
        }else{
            $fileNameToStore='noimage.jpg';
        }
        $caps=new Caps;
        $caps->name=$request->input('name');
        $caps->description=$request->input('description');
        $caps->image=$fileNameToStore;
        $caps->price=$request->input('price');
        $caps->category_id=$request->input('category_id');
        $caps->supplier_id=$request->input('supplier_id');
        $caps->save();
        return redirect('caps')->with('success','caps created');

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
