@extends('layouts.app')

@section('content')
     <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
            @if(session()->has('flag'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session()->get('flag')}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                @can('create',Auth::user())
                
                <a href="{{asset('')}}users/create">
                        <button class="btn btn-primary" id='buttonadd' ><i class=" fa fa-plus"></i>Thêm mới</button>
                    </a>
                @endcan
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=> $user)
                                <tr class="gradeU">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @can('edit',Auth::user())
                                        <a  href="{{asset('users/edit')}}/{{$user->id}}">
                                        <button  class="btn btn-success"><i class="fa fa-edit"></i></button>
                                        </a>
                                        @endcan
                                        @can('view',Auth::user())
                                        <a href="" >
                                        <button class="btn btn-warning showuser"><i class="fa fa-eye "></i></button>
                                        </a>
                                        @endcan
                                        @can('delete', Auth::user())
                                            <button user_id="{{$user->id}}"  class="btn btn-danger delete-user"><i class="fas fa-trash-alt"></i></button>
                                        
                                        @endcan
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
@endsection

