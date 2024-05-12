@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">

        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Meals</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add & View</li>
            </ol>
          </nav>

        <div class="col-md-5 ">

            <div class="card border-warning">
                <div class="card-header text-center bg-warning">Add New Meal</div>
                
                @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                @endif

                <form action="{{route('meals.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body text-right ">
                        <div class="form-group mb-4 col-5">
                        <label for="name" class="form-label">Meal name</label>
                        <input type="text" class="form-control border-warning" name="name" placeholder="Meal name" autofocus>
                    </div>

                    <div class="mb-4 col-9">
                        <label class="form-label">Description</label>
                        <textarea class="form-control border-warning" placeholder="Write Meal Description Here...." name="description"></textarea>
                    </div>

                    <div class="mb-4 col-5">
                        <label for="exampleInputEmail1" class="form-label">Meal Price</label>
                        <input type="number" class="form-control border-warning" step="0.01" name="price" placeholder="Meal Price">
                    </div>

                    <div class="mb-4 col-5">
                        <label for="disabledSelect" class="form-label">Select Category</label>
                        <select name="category" class="form-select border-warning">
                            <option value="" selected disabled>select category</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4 col-9">
                        <label for="formFile" class="form-label">Choose Image:</label>
                        <input class="form-control border-warning" type="file" name="image" id="formFile">
                    </div>

                    <div class="mb-4 col-9">
                        <img src="{{asset('/img/no_img.jpg')}}" style="width:100px; height:100px;" alt="view choosen image" id="showImage" > 
                    </div>

                        <div class="form-group text-center">
                            <button class="btn btn-warning text-dark" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


{{--         <div class="col-md-8">
            <div class="card border-secondary">
                <div class="card-header text-center text-light bg-secondary">Categories</div>
               

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

       
                </div>
               
            </div>

        </div>
 --}}
    </div>

</div>

@endsection