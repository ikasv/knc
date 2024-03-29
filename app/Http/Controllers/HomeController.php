<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function Products()
    {
        return view('product.index');
    }
    public function Product()
    {
        return view('product.single');
    }

    public function aboutUs(){
        return view('about');
    }
    public function contactUs(){
        return view('contact');
    }
    public function thankYou(){
        return view('thank_you');
    }
    
}
