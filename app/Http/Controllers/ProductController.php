<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //DB::table('products')->get();
       $product=Product::with('productCategory')->get();
       if($product != null){
            return response()->json([
                'status'=>true,
                'product_list'=>$product
            ]);
       }else{
            return response()->json([
                'status'=>false,
                'product'=>null
            ]);
       }

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

        $rules=[
             'prod_name'=>'required',
            'prod_brand'=>'required',
            'prod_price'=>'required'
        ];

        $validation=Validator::make($request->all(),$rules);
  
        // $validation=$request->validate([
        //     'prod_name'=>'required',
        //     'prod_brand'=>'required',
        //     'prod_price'=>'required'
        // ]);

        if($validation->fails()){
            return response()->json([
                'status'=>false,
                'errors'=>$validation->errors()
          ]);
        }

        $product= new Product();
        $product->prod_name=$request->prod_name;
        $product->prod_brand=$request->prod_brand;
        $product->prod_price=$request->prod_price;
        $product->cat_id=$request->cat_id;

        if($product->save())
        {
            return response()->json([
                'status'=>true,
                'product'=>$product,
                'message'=>"Product Add has been successfull"
            ]);
        }
        else{
                return response()->json([
                'status'=>false,
                'product'=>null,
                
            ]);
        }

        return response()->json(['puduct data has been save']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::findorfail($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'prod_name'=>'required',
            'prod_brand'=>'required',
            'prod_price'=>'required'
        ]);
        // $product=DB::table('products')->where('id',$id)->first();
        $product=Product::findorfail($id);
        $product->prod_name=$request->prod_name;
        $product->prod_brand=$request->prod_brand;
        $product->prod_price=$request->prod_price;
        $product->cat_id=$request->cat_id;
        $product->save();
        return response()->json('puduct data has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findorfail($id);
        if($product->delete()){
            return response()->json([
            'status'=>true,
            'product' =>$product,
            'message'=>'Data delete has been successfull'
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'product'=>null
            ]);
        }
    }
}
