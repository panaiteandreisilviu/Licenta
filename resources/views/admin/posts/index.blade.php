@extends('layouts.admin.default')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Posts</h3>
                    <a href="/admin/posts/create" class="btn bg-gray btn-xs pull-right">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="postsTable" class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created by</th>
                            <th>Created at</th>
                            <th style="max-width:110px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->body}}</td>
                                <td>{{$post->user()->name}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <a href="/admin/post/{{$post->id}}/edit" class="btn btn-primary btn-xs">
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

    <script>
        $('#postsTable').DataTable({
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