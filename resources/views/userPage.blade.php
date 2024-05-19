@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">Menu</div>
                    <div class="card-body text-right">
                        <form action="" method="get">
                            <a class="list-group-item list-group-item-action"  href="/home">home</a>
                            <ul class="list-group">
                            @foreach ($cats as $row)

                                <input type="submit" value="{{ $row->cat_name }}" name="category"
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                
                            @endforeach
                            </ul>

                        </form>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header text-center">الطلبات السابقة</div>
                    <div class="card-body text-right">
                        <form action="" method="get">
                            <a class="list-group-item list-group-item-action"  href="/order/show">اظهار الطلبات السابقة</a>
                           


                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{-- <h4>{{ $cat1 }}</h4> --}}
                        Meals Count <span class="badge text-bg-secondary rounded-pill">{{count($meals)}}</span> </div>
                    <div class="card-body">
                        <div class="row">
                           

                            @forelse ($meals as $meal )
                                <div class="col-md-4 mt-2 text-center" style="border: 1px solid rgb(149, 212, 159) ;">
                                    <img src="{{ asset('img/meals/'.$meal->image) }}" class="img-thumbnail" style="width:100%; height:150px;">
                                    <strong>{{ $meal->name }}</strong>
                                    <p><b>{{ $meal->price }}</b><i>L.E</i> </p>
                                    <p>{{ $meal->description }}</p>
                                    <div>

                                        <a href="{{-- {{ route('meal_deatails',$meal->id) }} --}}" class="btn btn-success" style="font-size:16px" title="Add Cart">
                                            <i class="fa fa-bell-slash-o" style="font-size:16px;color:white">Buy now
                                        </a></i>

                                    </div>
                                    <br>
                                </div>
                            @empty
                                <p>No Meals Found</p>
                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        a.list-group-item {
            font-size: 18px;
        }

        a.list-group-item:hover {
            background-color: rgb(61, 114, 56);
            color: #fff;
        }

        .card-header {
            background-color: rgb(47, 160, 36);
            color: #fff;
            font-size: 20px;
        }
        
    </style>

@endsection
