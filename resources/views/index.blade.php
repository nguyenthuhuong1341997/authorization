@extends('layouts.master')

@section('content')       
    <div class="col-lg-12" style="padding-top: 20px;">
        
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
                    <button class="btn btn-primary" id='buttonadd' ><i class=" fa fa-plus"></i>Add user</button>
                </a>
            @endcan
            </div>
        </div>

    </div>    

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTable
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
                                        <a href="{{asset('users/edit')}}/{{$user->id}}">
                                        <button  class="btn btn-success"><i class="fa fa-edit"></i></button>
                                        </a>
                                        @endcan
                                        @can('view',Auth::user())
                                        <a href='#modal-id-{{$user->id}}' data-toggle="modal">
                                        <button class="btn btn-warning showuser"><i class="fa fa-eye "></i></button>
                                        </a>
                                        @endcan
                                        @can('delete', Auth::user())
                                            <button user_id="{{$user->id}}"  class="btn btn-danger delete_user"><i class="fa fa-trash"></i></button>                                        
                                        @endcan
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-id-{{$user->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img src="https://zent.edu.vn/img/default-avatar_men.png">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Name: </b><p>{{$user->name}}</p>
                                                        <b>Email: </b><p>{{$user->email}}</p>
                                                        <b>Role: </b>
                                                        @foreach($user->roles as $roles)
                                                           {{$roles->type}}
                                                           <br>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>


@endsection
  
@section('footer')
<script>
    
    $(document).on('click','.delete_user', function(){
        var user_id = $(this).attr('user_id');
                swal({
                    title: "Bạn có muốn xóa bản người dùng này không",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then(function (willDelete) {
                    if (willDelete) {
                        swal("Xóa thành công", {
                            icon: "success"
                        });
                        $.ajax({
                            type: 'get',
                            data: {_method: 'get', _token: '{{csrf_token()}}'},
                            url: '/users/delete/'+ user_id,
                            success: function success(response) {
                                console.log(response[0]);
                                if(response[0]=='success'){
                                    window.location.reload();
                                }
                            }
                        });
                        
                    }
                });
    })
</script>
@endsection

