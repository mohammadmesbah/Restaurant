@extends('layouts.app')

@section('content')

    <div class="container" >
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" >
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Customer</a></li>
                      <li class="breadcrumb-item active" aria-current="page">orders</li>
                    </ol>
                  </nav>

                <div class="card ">
                    <div class="card-header">
                        <a style="float:right;" href="{{route('categories.index')}}"><button class="btn btn-success btn-default"
                                style="margin-left:6px ;">Add New Type</button></a>

                        <a style="float:right;" href=""><button class="btn btn-danger btn-default"
                                style="margin-left:6px ;">Add New Meal</button></a>
                        <a style="float:right;" href=""><button class="btn btn-info btn-default"
                                style="margin-left:6px ;">View Meals</button></a>

                    </div>
                    <div class="card-body text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">date</th>
                                    <th scope="col">time</th>
                                    <th scope="col">Meal name</th>
                                    <th scope="col"> Meal price($)</th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Total ($)</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status </th>
                                    <th scope="col">Accept order</th>
                                    <th scope="col">Refeuse order</th>
                                    <th scope="col">Finish order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                
                                    <tr>
                                        <td>{{$order->user->name}}</td>
                                        <td>{{$order->user->email}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->date}}</td>
                                        <td>{{$order->time}}</td>
                                        <td>{{$order->meal->name}}</td>
                                        <td>{{$order->meal->price}}</td>
                                        <td>{{$order->qty}}</td>
                                        <td>{{$order->meal->price * $order->qty}}</td>
                                        <td>{{$order->address}}</td>
                                    @if ($order->status == 'accept')
                                        <td > <span class="badge rounded-pill text-bg-primary"> {{$order->status}} </span> </td>
                                    @elseif ($order->status =='refuse')
                                        <td > <span class="badge rounded-pill text-bg-danger"> {{$order->status}} </span> </td>
                                    @elseif ($order->status =='complete')
                                        <td > <span class="badge rounded-pill text-bg-success"> {{$order->status}} </span> </td>
                                    @else
                                        <td class="text-secondary"> <span class="badge rounded-pill text-bg-secondary"> {{$order->status}} </span> </td>
                                    @endif
                                        

                                    <form action="{{route('orders.update', $order->id)}}" method="post">
                                        @method('PATCH')
                                        @csrf
                                        <td>
                                            <input type="submit" name="status" value= "accept" class="btn btn-primary btn-sm">
                                        </td>
                                        <td>
                                            <input type="submit" name="status" value= "refuse" class="btn btn-danger btn-sm">
                                        </td>
                                        <td>
                                            <input type="submit" name="status" value= "complete" class="btn btn-success btn-sm">
                                        </td>
                                    </form>    

                                    </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
