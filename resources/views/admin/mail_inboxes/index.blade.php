@extends('layouts.admin.default', ['title' => 'Mail Inboxes', 'subtitle' => ''])
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Mail Inboxes</h3>
                    <a href="/admin/mail_inboxes/create" class="btn btn-info btn-xs pull-right">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="mailInboxesTable" class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Host</th>
                            <th>Label</th>
                            <th>Username</th>
                            <th>Type</th>
                            <th>Active</th>
                            <th>Created at</th>
                            <th style="max-width:110px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mailInboxes as $mailInbox)
                            <tr>
                                <td>{{$mailInbox->id}}</td>
                                <td>{{$mailInbox->host}}</td>
                                <td>
                                    <span class="label label-default" style="background-color: {{$mailInbox->label_color}}; color:{{$mailInbox->getLabelContrastColor()}};">
                                        {{$mailInbox->label_name}}
                                    </span>
                                </td>
                                <td>{{$mailInbox->host_username}}</td>
                                <td>
                                    {{$mailInbox->type}}
                                </td>

                                <td>
                                    @if($mailInbox->active == 1)
                                        <i class="fa fa-check"></i> Yes
                                    @else
                                       <i class="fa fa-times"></i> No
                                    @endif
                                </td>

                                <td>{{$mailInbox->created_at}}</td>
                                <td>
                                    <a href="/admin/mail_inboxes/{{$mailInbox->id}}/edit" class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a href="/admin/mail_inbox_associations/{{$mailInbox->id}}" class="btn btn-info btn-xs">
                                        <i class="fa fa-edit"></i> Associations
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


    <script>
        $(function(){
            $('#mailInboxesTable').DataTable({
//            "paging": true,
//            "lengthChange": false,
//            "searching": false,
//            "ordering": true,
//            "info": true,
//            "autoWidth": false
            });
        })
    </script>

    <!-- /.box -->
@endsection