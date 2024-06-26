
@extends('layouts.app')

@section('content')


<div class="container" >
     <div class="row justify-content-center">
         <div class="col-md-11">

             <div class="card">
                 <div class="card-header text-center" >Previous Orders 
                    
                 </div>
                 <div class="card-body">
                     <table class="table table-bordered text-center">
                         <thead>
                             <tr class="table-success">
                                 <th scope="col">name</th>
                                 <th scope="col">phone</th>
                                 <th scope="col">email</th>
                                 <th scope="col">date</th>
                                 <th scope="col">time</th>
                                 <th scope="col">meal name</th>
                                 <th scope="col">quantity</th>
                                 <th scope="col">meal price</th>
                                 <th scope="col">total</th>
                                 <th scope="col">Address</th>
                                 <th scope="col">order status</th>
                                
                               
                             </tr>
                         </thead>
                         <tbody>
                            
                             @foreach ($orders as $row)
                                 <tr>
                                     <td>{{ $row->user->name }}</td>
                                     <td>  {{$row->phone}}</td>
                                     <td >{{ $row->user->email }} </td>
                                 
                                     <td>{{ $row->date }}</td>
                                     <td>{{ $row->time }}</td>
                            
                                     <td>{{ $row->meal->name }}</td>
                                     <td>{{ $row->qty }}</td>
                                     <td>{{ $row->meal->price}}</td>
                                     <td>${{ ($row->meal->price * $row->qty)}}</td>
                                         
                                     <td>{{ $row->address }}</td>

                                     @if($row->status=="reviewing")

                                     <td > <span class="badge rounded-pill text-bg-secondary">{{ $row->status }}</span> </td>

                                     @endif

                                     @if($row->status=="refuse")

                                     <td > <span class="badge rounded-pill text-bg-danger">{{ $row->status }}</span> </td>

                                     @endif

                                     @if($row->status=="accept")

                                     <td > <span class="badge rounded-pill text-bg-primary">{{ $row->status }}</span> </td>
 
                                     @endif

                                     @if($row->status=="complete")

                                     <td > <span class="badge rounded-pill text-bg-success">{{ $row->status }}</span> </td>

                                     @endif
                                    
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
 
 <style>
    
     .card-header {
         background-color:rgb(19, 85, 11);
         color: #fff;
         font-size: 20px;
     }

 </style>

@endsection