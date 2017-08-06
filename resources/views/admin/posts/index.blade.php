@extends('layouts.admin.default', ['title' => 'Posts', 'subtitle' => ''])
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Posts</h3>
                    <a href="/admin/posts/create" class="btn btn-info btn-xs pull-right">
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
                            <th>Published</th>
                            <th>Published at</th>
                            <th>Author</th>
                            <th>Created at</th>
                            <th style="max-width:110px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>
                                    @if($post->published == 1)
                                        <span class="label label-success">
                                            <i class="fa fa-globe"></i>
                                        </span>
                                    @endif

                                    @if($post->published_facebook == 1)
                                        <span class="label label-primary">
                                            &nbsp; <i class="fa fa-facebook"></i>
                                        </span>
                                    @endif
                                    @if($post->published_twitter == 1)
                                        <span class="label label-info">
                                            <i class="fa fa-twitter"></i>
                                        </span>
                                    @endif

                                    @if($post->published != 1 && $post->published_facebook != 1 && $post->published_twitter != 1)
                                        -
                                            {{--<span class="label label-default">
                                            <i class="fa fa-times"></i> No
                                        </span>--}}
                                    @endif
                                </td>
                                <td>{{$post->published_at ? $post->published_at : ' - '}}</td>
                                <td>{{$post->user()->name}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-primary btn-xs">
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
        $(function(){
            $('#postsTable').DataTable({
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