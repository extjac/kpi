<?php

namespace App\Http\Controllers;

use App\Kpi ;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class KpiController extends Controller
{

    public function __construct()
    {
        $this->uri = 'kpi';
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
        $data = Kpi::all();
        
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

        $kpi = new Kpi;
        $kpi->kpi = $request->name;
        $kpi->active = $request->active ? 1 : 0 ;
        $kpi->save();

        return response( [ 
            'ok'=> true, 
            'data' => $kpi 
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
         $data = Kpi::findOrFail( $id );
        
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
        $kpi = Kpi::findOrFail( $id );
        $kpi->name = $request->name;
        $kpi->active = $request->active ? 1 : 0 ;
        $kpi->save();

        return response( [ 
            'ok'=> true, 
            'data' => $kpi 
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
        $kpi = Kpi::findOrFail( $id );
        $kpi->delete();

        return response( [ 
            'ok'=> true, 
            'data' => null 
        ] , 200);         
    }


}
