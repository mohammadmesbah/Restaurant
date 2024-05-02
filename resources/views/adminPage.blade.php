@extends('layouts.app')

@section('content')


	
</div>
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
                                <tr>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">date</th>
                                    <th scope="col">time</th>
                                    <th scope="col">Meal name</th>
                                    <th scope="col">Count</th>
                                    <th scope="col"> Meal price($)</th>
                                    <th scope="col">Total ($)</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status </th>
                                    <th scope="col">Accept order</th>
                                    <th scope="col">Refeuse order</th>
                                    <th scope="col">Finish order</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                              


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
