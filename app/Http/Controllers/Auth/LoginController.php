<?php

namespace news_portal\Http\Controllers\Auth;

use news_portal\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Request;

class LoginController extends Controller
{
     use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Formulario de Login
     *
     * @return 
     */
    public function form()
    {
        return view('form_login');
    }

    /**
     * Formulario de Login
     *
     * @return 
     */
    public function login()
    {
        $credentials = Request::only('email','password');

        if (Auth::attempt($credentials)) {
            return 'Sucesso';
        }
            return 'Failed';
    }
}
