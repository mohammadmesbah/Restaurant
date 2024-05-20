<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $cats= Category::all();

        if(Auth::user()->is_admin ==1)
        {
            return view('adminPage');
            
        }elseif(Auth::user()->is_admin ==0)
        {
            if(!$request->category)
            {
                $category_name= 'All Categories';
                $meals= Meal::all();

                return view('userPage', compact('cats','meals','category_name'));
            }
                $category_name= $request->category.' Category';
                $cat_id= Category::where('cat_name',$request->category)->pluck('id');
                //dd($cat_id);
                $meals= Meal::where('category_id', $cat_id)->get();
                return view('userPage', compact('cats','meals','category_name'));
                
        }
        return view('visitors');
    }
}
