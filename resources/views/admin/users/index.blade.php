@extends('layouts.admin.default')
@section('content')
    {{--<div class="callout callout-info">--}}
    {{--<h4>Tip!</h4>--}}

    {{--<p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a--}}
    {{--sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular--}}
    {{--links instead.</p>--}}
    {{--</div>--}}
    {{--<div class="callout callout-danger">--}}
    {{--<h4>Warning!</h4>--}}

    {{--<p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar--}}
    {{--and the content will slightly differ than that of the normal layout.</p>--}}
    {{--</div>--}}


    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="usersTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Active</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                @if($user->active == 1)
                                    <span class="label label-success"> <i class="fa fa-check"></i> Yes</span>
                                @else
                                    <span class="label label-danger"> <i class="fa fa-times"></i> No &nbsp;</span>
                                @endif
                            </td>
                            <td>-role-</td>
                            <td>
                                <a href="/admin/users/" class="btn btn-primary btn-xs">
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

    <flash></flash>

    <!-- /.box -->
@endsection