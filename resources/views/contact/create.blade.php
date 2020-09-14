@extends('layouts.app')

@section('title', 'Contact Management System')

@section('content')

<div class="row">
<div class="col-md-12">



	<div class="row justify-content-center">
		<div class="col-12 col-md-8">
        <br>
        <div class="text-right"> <a href="{{url('/')}}" class="btn btn-danger btn-sm">Back to List</a> </div>

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
                @endif

                    <!--Form with header-->

                    <form action="{{route('store')}}" method="post">
                         @csrf 
                       <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                <h4 class="text-center">Create New Contact</h4>
                                    
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                              
                            
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="name" placeholder="Name">
                                        
                                    </div>
                                    @if ($errors->has('name'))
                             
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-phone text-info"></i></div>
                                        </div>
                                        <input type="number" class="form-control" id="nombre" name="phone_no" placeholder="phone no.">
                                        
                                    </div>
                                    @if ($errors->has('phone_no'))
                                            <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="nombre" name="email" placeholder="email">
                                        
                                    </div>
                                    @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" name="address" placeholder="address"></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Save" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>



</div> 
</div>

@endsection