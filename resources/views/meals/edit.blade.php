@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
           <div class="card">
               <div class="card-header bg-danger text-center text-light">Edit Meal</div>

                 <form action="{{ route('meals.update', $meal->id)}}" method="post" enctype="multipart/form-data">
                   @csrf
                   @method('PATCH')
                   <input type="hidden" name="old_image" value="{{ $meal->image }}">

                   <div class="card-body text-right">
                       <div class="form-group">
                           <h5 class="text-danger" for="name">Meal Name</h5>
                           <input type="text" class="form-control" value="{{ $meal->name }}" name="name" placeholder="اسم الوجبة">
                       </div>
                       <div class="form-group">
                           <h5 class="text-danger" for="description">Meal Description</h5>
                           <textarea class="form-control" name="description"> {{ $meal->description }}</textarea>
                       </div>

                       <div class="row">
                           <div class="col">
                               <h5 class="text-danger">Price</h5>
                               <input type="number" value="{{ $meal->price }}" name="price" class="form-control" placeholder="سعر الوجبة">
                           </div>

                       </div>




                       <div class="form-group">
                           <h5 class="text-danger">Choose Category<span class="text-danger">*</span></h5>
                           <div class="controls">

                               <select name="category" class="form-control" required="">
                                   <option value="" selected="" disabled="">{{$meal->category->cat_name}}</option>
                                   @foreach ($cats as $cat)
                                       <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                   @endforeach
                               </select>






                               <br>

                               <div class="form-group">
                                   <h5 class="text-danger">Meal Image</h5>
                                   <input type="file" name="image" class="form-control" id="image">
                               </div>
                               <br>
                               <div class="form-group">
                                   <img  id="showImage" src="{{asset('/img/meals/'.$meal->image) }}" style="width: 100px; height: 100px;">
                               </div>


                               <br>
                               <div class="form-group text-center">
                                   <button class="btn btn-danger" type="submit">Update</button>
                               </div>
                               
                           </div>
               </form>


           </div>
       </div>
    </div>

@endsection