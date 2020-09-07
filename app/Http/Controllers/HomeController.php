<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artiste;
use App\Category;
use App\song;

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
        return view('admin.home')->with('users',User::all())
                        ->with('artistes',Artiste::all())
                        ->with('categories',Category::all())
                        ->with('songs',Song::all());
    }
}
