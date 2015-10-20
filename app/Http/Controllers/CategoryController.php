<?php

namespace App\Http\Controllers;

use App\Category ;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{

    public function __construct()
    {
        $this->uri = 'category';
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
        $data = Category::all();
        
        return response( [ 
            'ok' => true,
            'data' => $data 
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
            ]);
        
        if( $v->fails() )
        {   
            return response( $v->errors() ,422); 
        }    

        $category = new Category;
        $category->name = $request->name;
        $category->active = $request->active ? 1 : 0 ;
        $category->save();

        return response( [ 
            'ok'=> true, 
            'data' => $category 
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
         $data = Category::findOrFail( $id );
        
        return response( $data  , 200); 
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
            'name'=> 'required'
            ]);
        
        if( $v->fails() )
        {   
            return response( $v->errors() ,422); 
        }    

        $id = $request->id;
        $category = Category::findOrFail( $id );
        $category->name = $request->name;
        $category->active = $request->active ? 1 : 0 ;
        $category->save();

        return response( [ 
            'ok'=> true, 
            'data' => $category 
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
        $category = Category::findOrFail( $id );
        $category->delete();

        return response( [ 
            'ok'=> true, 
            'data' => null 
        ] , 200);         
    }


}
