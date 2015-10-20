<?php

namespace App\Http\Controllers;

use App\Product ;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->uri = 'product';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( $this->uri.'.index')
        ->with( 'uri' , $this->uri );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $products = Product::select(
                'products.*', 
                'categories.name as category'
        )
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->get();
        
        return response( [ 
            'data' => $products 
        ] , 200); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make( $request->all() , [
                'name' => 'required',
                'category_id' => 'required'
            ]);
        
        if( $v->fails() )
        {   
            return response( $v->errors() ,422); 
        }    

        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->active = $request->active ? 1 : 0 ;
        $product->save();

        return response( [ 
            'ok'=> true, 
            'data' => $product 
        ] , 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
         $product = Product::findOrFail( $id );
        return response( $product  , 200); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=null )
    {
        $v = Validator::make( $request->all() , [
            'name'       => 'required',
            'category_id'=> 'required'
            ]);
        
        if( $v->fails() )
        {   
            return response( $v->errors() ,422); 
        }    

        $id = $request->id;
        $product = Product::findOrFail( $id );
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->active = $request->active ? 1 : 0 ;
        $product->save();

        return response( [ 
            'ok'=> true, 
            'data' => $product 
        ] , 200); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail( $id );
        $product->delete();
        
        return response( [ 
            'ok'=> true, 
            'data' => null 
        ] , 200);         
    }


}
