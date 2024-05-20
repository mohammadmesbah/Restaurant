<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Flasher\Prime\FlasherInterface;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats= Category::all();
        return view('category.category',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['cat_name'=>'required|string|unique:categories|min:3|max:40']);
        Category::create([
            'cat_name'=>$request->cat_name,
            'created_at'=> Carbon::now(),
        ]);
        flash()->success('Category created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $cat_id= $request->id;
        $request->validate(['cat_name'=>'required|string|unique:categories|min:3|max:40']);
        Category::find($cat_id)->update([
            'cat_name'=>$request->cat_name,
        ]);
        return back()->with('message','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return back()->with('message','Category deleted successfully');
    }
}
