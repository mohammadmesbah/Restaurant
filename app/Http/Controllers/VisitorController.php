<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class VisitorController extends Controller
{
    public function index(Request $request)
    {

        $cats= Category::all();

            if(!$request->category)
            {
                $category_name= 'All Categories';
                $meals= Meal::all();

                return view('visitors', compact('cats','meals','category_name'));
            }
                $category_name= $request->category.' Category';
                $cat_id= Category::where('cat_name',$request->category)->pluck('id');
                //dd($cat_id);
                $meals= Meal::where('category_id', $cat_id)->get();
                return view('visitors', compact('cats','meals','category_name'));

    }
}
