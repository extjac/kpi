<?php

namespace App\Http\Controllers\Auth;


use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware( 'guest', ['except' => 'getLogout' ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * Show create form
     *
     * @param  array  $data
     * @return User
     */
    protected function getRegister()
    {
        return view( 'auth.register' );
    }


    /**
     * Show login form
     *
     * @param  array  $data
     * @return User
     */
    protected function getLogin()
    {
        return view( 'auth.login' );
    }


    /**
     * Kill current user session and redirect to login
     *
     * @param  array  $data
     * @return User
     */
    protected function getLogout()
    {
        \Auth::logout();
       return redirect('/auth/login');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function postRegister( Request $request )
    {

        $v = Validator::make( $request->all() , [
            'first_name'=> 'required|max:255',
            'last_name' => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|confirmed|min:6',            
            ]);
        
        if( $v->fails() )
        {   
            // return response( [ 'errors' => $v->messages()->toArray() ] ,422); 
            // return response( [  $v->errors()->toArray() ] ,422); 
            return redirect('/auth/register')->withErrors($v);
        }

        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt( $request->input('password') );
        $user->save();

        return redirect('/home');
        //return response( [ 'data' => $user ] , 201); 

    }



    /**
     * Login a user instance
     *
     * @param  array  $request
     * @return User
     */
    protected function postLogin( Request $request )
    {

        $v = Validator::make( $request->all() , [
            'email'     => 'required|email',
            'password'  => 'required',            
            ]);
        
        if( $v->fails() )
        {   
            return response( [ 'errors' => $v->messages()->toArray() ] ,422);   
        }

         $credentials = array(
            'email'         => $request->email,
            'password'      => $request->password
            //'active'        => 1, //is active
        );

        if ( \Auth::attempt( $credentials ) )
        {       
            return redirect('/home?welcome');
            //return response( [ 'data' => \Auth::user() ] , 200); 
        }
        else
        {
            return redirect('/auth/login?failed')
            ->withErrors('errors', true)
            ->with('message', 'Unauthorized credentials');
        }
        

    }


    


}