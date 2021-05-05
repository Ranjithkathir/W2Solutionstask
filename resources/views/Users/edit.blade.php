@extends('layouts.main')

@section('head')
    <title>{{ config('app.name', 'W2Solutions') }} | Edit User Form</title>
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/style.css')}}">
@endsection

@section('content')
    <div class = "row" style="margin:15px 0px;">
        <div class = "col-md-12">
            <h3 class="h4 mb-2 text-gray-800">Edit User</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{url('users')}}/{{$user->id}}" method="POST" id="userEditForm">

            {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="col-md-12 col-form-label">User Name</label>
                    </div>
                    <div class="col-md-10">
                        <input type = "text" value="{{$user->name}}" name="name" class="form-control" placeholder="Enter User Name"/>
                        @if ($errors->has('name'))
                            <span class="error" style="font-size: 14px;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="col-md-12 col-form-label">Email</label>
                    </div>
                    <div class="col-md-10">
                        <input type = "email" value="{{$user->email}}" name="email" class="form-control" placeholder="Enter User Email"/>
                        @if ($errors->has('email'))
                            <span class="error" style="font-size: 14px;">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="col-md-12 col-form-label">Mobile Number</label>
                    </div>
                    <div class="col-md-10">
                        <input type = "text" value="{{$user->mobilenumber}}" name="mobilenumber" class="form-control" placeholder="Enter User Mobile Number"/>
                        @if ($errors->has('mobilenumber'))
                            <span class="error" style="font-size: 14px;">{{ $errors->first('mobilenumber') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="col-md-12 col-form-label">User Role</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" name="role">
                            <option value="">--Select the Role--</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($user->roles[0]->id == $role->id) selected @endif>{{$role->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <span class="error" style="font-size: 14px;">{{ $errors->first('role') }}</span>
                        @endif
                    </div>
                </div>

                <div class="formbtnarrange">
                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Update User</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection

@section('foot')

@endsection