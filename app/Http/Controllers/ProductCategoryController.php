<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate=ProductCategory::all();
        if($cate !=null ){
            return response()->json([
                "status"=>true,
                "categories"=>$cate
    
            ]);
        }

        return response()->json([
            "status"=>false,
            "categories"=>null

        ]);
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
        $validation=$request->validate([
        'cat_name'=>'required',
        'description'=>'required|max:30',
        
        ]);

    $cate= new ProductCategory();
    $cate->cat_name=$request->cat_name;
    $cate->description=$request->description;
    $cate->save();
    return response()->json('Category data has been save');
        
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
        $validation=$request->validate([
            'cat_name'=>'required',
            'description'=>'required|max:30',
            
            ]);
    
        $cate= ProductCategory::findorfail($id);
        $cate->cat_name=$request->cat_name;
        $cate->description=$request->description;
        $cate->save();
        return response()->json('Category data has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate= ProductCategory::findorfail($id);
        $cate->delete();

        return response()->json('Category Data Delete succees full');
    }
}
