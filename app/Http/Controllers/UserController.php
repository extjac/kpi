<?php

namespace App\Http\Controllers;

use App\User;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function __construct()
    {
        $this->uri = 'user';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if ( \Request::ajax() )
        {
            $user = User::all();
            return response( [ 
                'ok' => true, 
                'data' => $user 
            ] , 200); 
        }        

        return view( $this->uri.'.index')->with( 'uri' , $this->uri );
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
        $v = Validator::make( $request->all() , [
                'email'     => 'required|email|unique:users,email',
                 'password'  => 'required|min:6',
                'first_name'=> 'required',
                'last_name' => 'required'
            ]);
        
        if( $v->fails() )
        {   
            return response( $v->errors() ,422); 
        }    

        $User = new User;
        $User->first_name = $request->first_name;
        $User->last_name = $request->last_name;
        $User->email = $request->email;
        $User->password = bcrypt( $request->input('password') );
        $User->role_id = $request->role_id ;
        $User->active = 1 ;
        $User->save();

        return response( [ 
            'ok'=> true, 
            'data' => $User 
        ] , 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id , $name)
    {
        $user = User::find($id);

        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
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
    public function update(Request $request, $id=null)
    {
        $v = Validator::make( $request->all() , [
                'email'     => 'required|email|unique:users,email',
                'first_name'=> 'required',
                'last_name' => 'required'
            ]);
        
        if( $v->fails() )
        {   
            return response( $v->errors() ,422); 
        }    
        $id = $request->id;
        $User = User::find( $id );
        $User->first_name = $request->first_name;
        $User->last_name = $request->last_name;
        $User->email = $request->email;
        $User->role_id = $request->role_id;
        $User->active = 1 ;
        $User->save();

        return response( [ 
            'ok'=> true, 
            'data' => $User 
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
        //
    }
}
