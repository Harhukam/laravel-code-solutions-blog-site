<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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

    public function index(Request $request)
    {
        // $now_date = Carbon::now()->toDateString();
        //$my_date = dateFormat($now_date);

        if(Auth::user()->isAdmin())
        {
            return view('admin.home');
        }

        if(Auth::user()->isSeller())
        {
           // return view('seller.home');
            return view('home');
        }

        if(Auth::user()->isUser())
        {
            return view('home');
        }

    }


    public function logout () {
        auth()->logout();
        return redirect('/');
    }

}
