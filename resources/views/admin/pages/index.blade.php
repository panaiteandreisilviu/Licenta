@extends('layouts.admin.default', ['title' => 'Pages', 'subtitle' => ''])
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pages</h3>
                    <a href="/admin/pages/create" class="btn btn-info btn-xs pull-right">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="pagesTable" class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Slug</th>
                            <th>Name</th>
                            <th>Menu title</th>
                            <th style="max-width:70px">Menu icon</th>
                            <th>Added by</th>
                            <th>Added at</th>
                            <th style="max-width:110px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{$page->id}}</td>
                                <td>
                                    <a href="/pages/{{$page->slug}}">{{$page->slug}}</a>
                                </td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->menu_title}}</td>
                                <td class="text-center">
                                    <i class="fa {{$page->menu_icon}}"></i>
                                </td>
                                <td>{{$page->user()->name}}</td>
                                <td>{{$page->created_at}}</td>
                                <td>
                                    <a href="/admin/pages/{{$page->slug}}/edit" class="btn btn-primary btn-xs">
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
            $('#pagesTable').DataTable({
//            "paging": true,
//            "lengthChange": false,
//            "searching": false,
//            "ordering": true,
//            "info": true,
//            "autoWidth": false
            });
        });
    </script>

    <!-- /.box -->
@endsection