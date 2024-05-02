@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">

        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Categories</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add & View</li>
            </ol>
          </nav>

        <div class="col-md-4">

            <div class="card">
                <div class="card-header text-center">Category</div>
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="card-body text-right">
                        <div class="form-group">
                            <label for="name" class="form-label">Type name</label>
                            <input type="text" class="form-control" name="cat_name" placeholder="Type name">
                        </div>
                        <br>

                        <div class="form-group text-center">
                            <button class="btn btn-danger" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Categories</div>
               

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
                                <th scope="col">Category name</th>
                                <th scope="col">Operations</th>

                            </tr>
                        </thead>
                     <tbody>

                       @foreach ($cats as $key=> $row)
                       <tr>
                        
                           <td scope="row" style="width: 12%">{{ $loop->iteration }}</td>
                           <td>{{ $row->cat_name }}</td>
                           <td>
                            <button class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"  id="update"
                            data-id="{{ $row->id }}" data-cat_name="{{ $row->cat_name }}" onclick="setUpdateAction({{$row->id}}, {{$row->cat_name}})">
                                <i class="fa-solid fa-pen-to-square"></i>
                              </button>
                            <button class="btn btn-danger"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop2" data-id="{{ $row->id }}"
                                onclick="setDeleteAction({{ $row->id }})">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            </td>
                         
                       </tr>

                       @endforeach

                            
                     </tbody>
                  </table>

       
                </div>
               
            </div>

        </div>

    </div>

</div>




<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       <div class="modal-body">
         <form  action="{{route('categories.update','category')}}" id="updateForm" method="POST"> 
           @csrf
            
           <input type="hidden" class="form-control" id="id" name="id">

           <div class="mb-3">
             <label for="recipient-name" class="col-form-label">Type name</label>
             <input type="text" class="form-control" id="cat_name" name="cat_name">
           </div>
           
       
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-primary">Edit</button>
       </div>
   </form>
     </div>
   </div>
 </div>

 {{-- Delete Modal.... --}}
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       <div class="modal-body">

        <form id="deleteForm" method="post">
           @csrf
           @method('DELETE')
           <div class="mb-3">
             <h4>Are you sure you want to delete this category?</h4>
           <input type="hidden" id="hidden_id" name="id" class="form-control">
           </div>
       
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-danger">Delete</button>
       </div>
   </form>
     </div>
   </div>
 </div>


 <script>
    
  function setDeleteAction(catId) {
    var form = document.getElementById('deleteForm');
    var idInput = document.getElementById('hidden_id');
    idInput.value = catId;
    form.action = "{{route('categories.destroy','catId')}}" ;
    
}

  $('#staticBackdrop').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var cat_name = button.data('cat_name')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #cat_name').val(cat_name);
	}); 

  /* function setUpdateAction(catId , cat_name) {
      var form = document.getElementById('updateForm');
      var idInput = document.getElementById('id');
      var name = document.getElementById('cat_name');
      idInput.value = catId;
      name.value = cat_name;
      form.action = "{{route('categories.update','catId')}}" ; */

  /* $('#update').on('click', function(){
    $tr=$(this).closest('tr');
    var data= $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data);
  }); */
</script>

@endsection