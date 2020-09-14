@extends('layouts.app')

@section('title', 'Contact Management System')

@section('content')

<div class="row">
<div class="col-md-12">

@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
</div>
@endif

<div class="text-left"> <strong> <i class="fa fa-list"></i> Contact List</strong> </div>
<div class="text-right"> <a href="{{route('create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle"></i> Create New </a> </div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Phone No.</th>
        <th>Email</th>
        <th>Details</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($contacts as $con)
      <tr>
        <td>{{++$i}}</td>
        <td>{{$con->name}}</td>
        <td>{{$con->phone_no}}</td>
        <td>{{$con->email}}</td>
        <td>{{$con->address}}</td>
        <td>
    
        
            <a class="btn btn-primary btn-sm" href="{{route('contact.edit',$con->id)}}"><i class="fa fa-edit"></i></a>
            <a href="{{route('contact.destroy',$con->id)}}" onclick="return confirm('Are you sure to delete this contact?')"class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>   
           
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  <div class="text-right">
      {!! $contacts->links() !!}
  </div>
</div> 
</div>

@endsection