<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class HomeController extends Controller
{
    private function validateUser()
    {
        if(Auth::check())
        {
            if(Auth::user()->role == "admin")
            {
                return true;
            }
        }
        return false;
    }

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function createCMS()
    {
        if(!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            return view('cms.cms_home');
        }
    }
}
