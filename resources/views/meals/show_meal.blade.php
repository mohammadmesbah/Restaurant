@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-6">
             <div class="card">
                 <div class="card-header bg-success text-center">The Meal</div>

                 <div class="card-body">
                     <div class="row">
                        <div class="col-md-6">
                             <p>
                             <h4> <strong style="color: seagreen ; font-size: 22px  "> Meal Category :
                                 </strong>{{ $meal->category->cat_name }}</h4>
                             </p>

                             <p>
                             <h4> <strong style="color: seagreen ; font-size: 22px  "> Meal Name :
                                 </strong>{{ $meal->name }}</h4>
                             </p>

                             <p>
                             <h4> <strong style="color: seagreen ; font-size: 22px  "> Meal Price :
                                 </strong> {{ $meal->price }}$</h4>
                             </p>
                             <p>
                             <h4> <strong style="color: seagreen ; font-size: 22px  "> Meal Description  :</p>
                                     <p></strong>{{ $meal->description }}</h4>
                             </p>

                         </div>

                         <div class="col-md-6">
                             <img src="{{ asset('img/meals/'.$meal->image) }}" class="img-thumbnail" style="width: 500px ">
                         </div>

                     </div>
                 </div>
             </div>
         </div>

     <div class="col-md-4">
     <div class="card">
          <div class="card-header bg-success  text-center">Order Information</div>

     <div class="card-body">
  @if (Auth::check())
     <form action="{{-- {{ route('order.store') }} --}}" method="post">
          @csrf
          <div class="form-group ">
          <p><strong style="color: seagreen ; font-size: 18px  ">Name : </strong>{{ auth()->user()->name }}</p>
          <p><strong style="color: seagreen ; font-size: 18px  ">Email : </strong>{{ auth()->user()->email }}</p>
          <p> <strong style="color: seagreen ; font-size: 18px  ">Phone Number  : </strong> <input type="phone" class="form-control" name="phone" required></p>
          <p><strong style="color: seagreen ; font-size: 18px  ">Meal Count : </strong>  <input type="number" class="form-control" name="qty" value="0"></p>

          <p><input type="hidden" name="meal_id" value="{{ $meal->id }}"></p>
          <p><strong style="color: seagreen ; font-size: 18px  ">Date : </strong><input type="date" name="date" class="form-control" required></p>
          <p><strong style="color: seagreen ; font-size: 18px  ">Time : </strong><input type="time" name="time" class="form-control" required></p>
          <p><strong style="color: seagreen ; font-size: 18px  ">Address </strong> :<textarea class="form-control" name="address" required></textarea></p>
          <p class="text-center">
               <button class="btn btn-success" type="submit" style="font-size: 20px">Buy Now</button>
          </p>
          

          </div>
     </form>


          @else
               <p><a href="/login">Please, Login first !!</a></p>
          @endif
     </div>
     </div>
     </div>



</div>
 </div>


 <style>
  
     .card-header {

         color: #fff;
         font-size: 22px;
     }

 </style>
  
@endsection
