<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\listBarang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = listBarang::all();
        if (Auth::user()) {
            return view('home',[
                'list'=> $data
            ]);
        } else {
            return view('auth.login');
        }
        
    }
    public function akun(){
        return view('public.akun');
    }
    public function logout(){
        Auth::logout();

        return view('auth.login');
    }

}
