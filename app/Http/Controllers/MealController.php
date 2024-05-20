<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Image;

use function Flasher\Prime\flash;
use function Flasher\Toastr\Prime\toastr;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$meals= Meal::all();
        $meals= Meal::paginate(3);
        return view('meals.index', compact('meals'));
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
        
        $validate= Validator::make($request->all(),[
            'name'=> 'required|string|min:3|max:40',
            'description'=> 'string',
            'price'=> 'required|numeric|min:1',
            'image'=> 'mimes:jpeg,jpg,png|max:10240'
        ]);

        $image= $request->file('image');
        //dd($image->getClientOriginalExtension());
        $number_gen= hexdec(uniqid()). "." . $image->getClientOriginalExtension();
        $image->move(public_path('img/meals/'),$number_gen);
        //Image::make($image)->resize(300,300)->save('img/meals/'.$number_gen);
        Meal::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'image'=>$number_gen
        ]);
        
        flash()->success('Meal created successfully');
        //toastr()->success('Meal created successfully');
        return back();

    if($validate->fails()){
        flash()->error('Meal not created successfully');
        return back();
    }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $meal= Meal::find($id);
        return view('meals.show_meal', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource~.
     */
    public function edit($id)
    {
        $meal= Meal::find($id);
        $cats= Category::all();
        return view('meals.edit', compact('meal','cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $request->validate([
            'name'=> 'required|string|min:3|max:40',
            'description'=> 'string',
            'price'=> 'required|numeric|min:1',
            'image'=> 'mimes:png,jpeg,jpg'
        ]);

        $old_image= $request->old_image;
        //dd($old_image);
        $image= $request->file('image');

        if($request->file('image'))
        {
            $path= public_path("/img/meals/$old_image");
            //dd($path);
            unlink($path);
        //dd($image->getClientOriginalExtension());
        $number_gen= hexdec(uniqid()). "." . $image->getClientOriginalExtension();
        $image->move(public_path('img/meals/'),$number_gen);
        //Image::make($image)->resize(300,300)->save('img/meals/'.$number_gen);
        Meal::findOrFail($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'image'=>$number_gen
        ]);
    }else{
        Meal::findOrFail($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category,
            
        ]);
    }
        flash()->flash('info','Meal Updated Successfully',['timeout' => 3000, 'position' => 'top-center'],'Updated_done');
        //toastr()->success('Meal created successfully');
        return redirect()->route('meals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
