@extends('layouts.admin.default')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Permissions - <span class="label label-primary"><b>{{$role->display_name}}</b></span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="usersTable" class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Display name</th>
                            <th>Description</th>
                            <th style="max-width:40px">Enabled</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->display_name}}</td>
                                <td>{{$permission->description}}</td>
                                <td>
                                    <role_permission_toggle role_id="{{$role->id}}" permission_id="{{$permission->id}}" enabled="{{$role->permissions()->find($permission->id) ? true : false}}">
                                    </role_permission_toggle>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>

                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <a href="/admin/roles" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back to roles</a>


        </div>
    </div>

    <script src="{{ URL::asset('AdminLTE-2.3.11/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('AdminLTE-2.3.11/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $('#usersTable').DataTable({
//            "paging": true,
//            "lengthChange": false,
//            "searching": false,
//            "ordering": true,
//            "info": true,
//            "autoWidth": false
        });
    </script>


    <!-- /.box -->
@endsection