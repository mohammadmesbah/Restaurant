<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        return view('meals.add_meal',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|min-3|max:40',
            'description'=> 'string',
            'price'=> 'required|number|min-1',
            'image'=> 'mimes:png,jpeg,jpg'
        ]);

        $image= $request->file('image');
        $number_gen= hexdec(unique()). "." . $image->getClientOriginalExtension();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
