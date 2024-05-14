@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-center text-light">Edit Meal</div>

                <form action="{{ route('meals.update', $meal->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="old_image" value="{{ $meal->image }}">

                    <div class="card-body text-right">
                        <div class="form-group">
                            <h5 class="text-primary" for="name">Meal Name</h5>
                            <input type="text" class="form-control" value="{{ $meal->name }}" name="name" placeholder="اسم الوجبة">
                        </div>
                        <div class="form-group">
                            <h5 class="text-primary" for="description">Meal Description</h5>
                            <textarea class="form-control" name="description"> {{ $meal->description }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h5 class="text-primary">Price</h5>
                                <input type="number" value="{{ $meal->price }}" name="price" class="form-control" placeholder="سعر الوجبة">
                            </div>

                        </div>




                        <div class="form-group">
                            <h5 class="text-primary">Choose Category<span class="text-danger">*</span></h5>
                            <div class="controls">

                                <select name="category" class="form-control" required="">
                                    <option value="{{$meal->category_id}}" selected>{{$meal->category->cat_name}}</option>
                                    @foreach ($cats as $cat)
                                    @if ($cat->id == $meal->category_id)
                                    continue;
                                    @else
                                    <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                    @endif
                                    @endforeach
                                </select>

                                <br>

                                <div class="form-group">
                                    <h5 class="text-primary">Meal Image</h5>
                                    <input type="file" name="image" class="form-control" id="uploadInput">
                                </div>
                                <br>
                                <div class="form-group">
                                    <img id="displayImage" src="{{asset('/img/meals/'.$meal->image) }}" style="width: 100px; height: 100px;">
                                </div>

                                <input type="hidden" value="{{$meal->image}}" name="old_image">
                                <br>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>

                            </div>
                </form>


            </div>
        </div>
    </div>

<script>
    // Get references to the input file and image elements
    var uploadInput = document.getElementById('uploadInput');
    var displayImage = document.getElementById('displayImage');
    
    // Add event listener for 'change' event on the file input
    uploadInput.addEventListener('change', function() {
        // Check if any file is selected
        if (uploadInput.files && uploadInput.files[0]) {
            // Create a FileReader object to read the file
            var reader = new FileReader();

            // Set up the FileReader to load when finished
            reader.onload = function (e) {
                // Set the src attribute of the image to the loaded data
                displayImage.src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(uploadInput.files[0]);
        }
    });
</script>
    
    @endsection
