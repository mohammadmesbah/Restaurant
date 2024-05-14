@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-danger text-light text-center ">Meals

                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Meal Image</th>
                                <th scope="col">Meal name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>

                            </tr>

                        </thead>
                        <tbody>

                          @if (count($meals) > 0)
                            @foreach ($meals as $meal)

                                <tr>
                                    <th scope="row">{{$loop->iteration }}</th>
                                    <td><img src="{{asset('/img/meals/'.$meal->image) }}" width="80" height="70"></td>
                                    <td>{{$meal->name  }}</td>
                                    <td>{{$meal->description }}</td>
                                    <td>{{$meal->category->cat_name }}</td>
                                    <td>{{$meal->price }}</td>

                                    <td>
                                     <a href="{{route('meals.edit', $meal->id)}}"><button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button></a>

                                     <a href="" class="btn btn-danger" id="delete"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                       
                                    
                                </tr>


                            @endforeach

                            @else
                            <p>No Meals Found</p>
                          @endif


                        </tbody>
                    </table>
                {{ $meals->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection