@extends('layouts.main')

@section('head')
    <title>{{ config('app.name', 'W2solutions') }} | Users Management</title>
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/sweet-alert.css')}}" />
@endsection

@section('content')

<!-- Page Heading -->
    <div class = "row" style="margin:15px 0px;">
        <div class = "col-md-9">
            <h3 class="h4 mb-2 text-gray-800">Users Lists</h3>
        </div>
        <div class = "col-md-3">
            <a href="{{url('/users/create')}}" class="btn btn-success"><i class="fas fa-fw fa-plus"></i> Create New User</a>
        </div>
    </div>
    @foreach ($errors->all() as $error)
        <div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>{{ $error }}</div>
    @endforeach
    @if ( session()->has('message') )
        <div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>{{ session()->get('message') }}</div>
    @endif

<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                    <div class="">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Mobile Number</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Mobile Number</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>  
                                @if(count($users) > 0)
                                    @foreach($users as $user)          
                                    <tr>
                                        <td class="text-center">{{$user->id}}</td>
                                        <td class="text-center">{{$user->name}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center">{{$user->mobilenumber}}</td>
                                        <td class="text-center">{{$user->roles[0]->name}}</td>
                                        <td class="text-center">
                                            <a href="{{url('/users') }}/{{base64_encode($user->id)}}" class="text-primary" data-toggle="tooltip" data-plcement="top" title="Edit"><i class="fas fa-edit fa-fw" aria-hidden="true"></i></a>
                                            @if(auth()->user()->id != $user->id)
                                            <a class="text-danger remove" data-id="{{$user->id}}" data-toggle="tooltip" data-placement="top" href="#" data-toggle="tooltip" data-plcement="top" title="Delete" ><i class="fas fa-trash fa-fw" aria-hidden="true"></i> </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="3" class="text-center">No Users Found</td></tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
      <!-- Page level plugins -->
    <script src="{{url('public/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('public/assets/js/sweet-alert.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('public/assets/js/datatables-demo.js')}}"></script>
    <script>
    $(document).on('click','.remove',function(e){
        e.preventDefault();
        var APP_URL = {!! json_encode(url('/')) !!};
        var id = $(this).attr("data-id");
        
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this user!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm){
                $.ajax({
                    url: APP_URL+'/users/delete/'+id,
                    type: 'GET',
                    error: function() {
                        alert('Sorry Something is wrong! Unable to remove now');
                    },
                    success: function(data) {
                          // swal("Deleted!", "Your member has been deleted.", "success", function(){
                          //   location.reload();
                          // });
                          swal({title: "Deleted!", text: "Your user has been deleted", type: "success"},
                            function(){ 
                                location.reload();
                            }); 
                    }     
                });
            } else {
                swal({title: "Cancelled", text: "Your user is safe :)", type: "error"},
                function(){ 
                    //location.reload();
                });
            }
        });
    });
    </script>
@endsection

@section('foot')

@endsection