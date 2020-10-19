@extends('layouts.main')

@section('content')




<div class="container">

<h1> List of Data </h1> 

@if (session('successMsg'))


<div class="alert alert-success" role="alert">
  {{session('successMsg')}}
</div>

@endif


<table class="table">
  <thead class="black white-text">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($students as $student)
    <tr>
      <th scope="row">{{$student->id}}</th>
      <td>{{$student->firstname}}</td>
      <td>{{$student->lastname}}</td>
      <td>{{$student->email}}</td>
      <td>{{$student->phone}}</td>
      <td> <a class=" btn btn-raised btn-primary btn-sm" href="{{route('edit',$student->id)}} "> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

      || <form method="post" id="delete-form-{{$student->id}}" action="{{route('delete',$student->id)}}" style=" display: none;">  
      	{{csrf_field()}}
      	{{method_field('delete')}}
       </form>

       <button onclick="if (confirm('ready')) {
       	event.preventDefault();
       	document.getElementById('delete-form-{{$student->id}}').submit();
       }else{
       	event.preventDefault();
       }


       " 
       	class=" btn btn-raised btn-danger btn-sm" href=" "> <i class="fas fa-trash-alt"></i>
       	</button>
        </td>
      
    </tr>
  
  @endforeach
  
  <tbody>
  </table>
  
{{ $students->links() }}


    


</div>



@endsection
