@extends('layouts.admin.default')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Permissions</h3>
                    <a href="/admin/permissions/create" class="btn bg-gray btn-xs pull-right">
                        <i class="fa fa-plus"></i> Add
                    </a>
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
                            <th style="max-width:50px">Actions</th>
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
                                    <a href="/admin/permissions/{{$permission->id}}/edit" class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
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