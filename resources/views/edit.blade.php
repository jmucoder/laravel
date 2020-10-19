@extends('layouts.main')

@section('content')
	
	<div class="container">

	
<h1> Add data to database </h1> <br>   <br>
@if ($errors->any())
    @foreach ($errors->all() as $error)
    <p style="color: red">{{ $error }}</p>
    @endforeach
@endif

	<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{route('update',$students->id)}}" method="post">

	{{csrf_field()}}	

    <p class="h4 mb-4">Add Data</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" value="{{$students->firstname}}" name="firstname" placeholder="First name"><br>
            @if ($errors->has('firstname'))
<div class="alert alert-danger" role="alert">{{ $errors->first('firstname') }}</div>
@endif
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="defaultRegisterFormLastName" class="form-control" value="{{$students->lastname}}" name="lastname" placeholder="Last name"><br>
                  @if ($errors->has('lastname'))
<div class="alert alert-danger" role="alert">{{ $errors->first('lastname') }}</div>
@endif
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" value="{{$students->email}}" name="email" placeholder="E-mail">

    @if ($errors->has('email'))
<div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
@endif

    <!-- Phone number -->
    <input type="text" id="defaultRegisterPhonePassword" class="form-control" value="{{$students->phone}}" name="phone" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
    	@if ($errors->has('phone'))
<div class="alert alert-danger" role="alert">{{ $errors->first('phone') }}</div>
@endif
        
    </small>

    <!-- Newsletter -->
    

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add</button>

    



</form>
<!-- Default form register -->
</div>

@endsection