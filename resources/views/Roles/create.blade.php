@extends('layouts.main')

@section('head')
    <title>{{ config('app.name', 'W2Solutions') }} | New Role Form</title>
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/style.css')}}">
@endsection

@section('content')
    <div class = "row" style="margin:15px 0px;">
        <div class = "col-md-12">
            <h3 class="h4 mb-2 text-gray-800">Add new Role</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{url('roles')}}" method="POST" id="roleForm">

            {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="col-md-12 col-form-label">Role Name</label>
                    </div>
                    <div class="col-md-10">
                        <input type = "text" value="{{old('name')}}" name="name" class="form-control" placeholder="Enter Role Name"/>
                        @if ($errors->has('name'))
                            <span class="error" style="font-size: 14px;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="col-md-12 col-form-label">Slug Name</label>
                    </div>
                    <div class="col-md-10">
                        <input type = "text" value="{{old('slugname')}}" name="slugname" class="form-control" placeholder="Enter Role Slug Name"/>
                        @if ($errors->has('slugname'))
                            <span class="error" style="font-size: 14px;">{{ $errors->first('slugname') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="col-md-12 col-form-label">Description</label>
                    </div>
                    <div class="col-md-10">
                        <textarea name="description" placeholder="Enter Role Description" rows="4" class="form-control">{{old('description')}}</textarea>
                        @if ($errors->has('description'))
                            <span class="error" style="font-size: 14px;">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>

                <div class="formbtnarrange">
                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Create New Role</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection

@section('foot')

@endsection