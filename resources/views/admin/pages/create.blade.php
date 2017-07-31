@extends('layouts.admin.default', ['title' => 'Create page', 'subtitle' => ''])
@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Add a new page
                        <small></small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        {{--<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
                        {{--<i class="fa fa-minus"></i></button>--}}
                        {{--<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
                        {{--<i class="fa fa-times"></i></button>--}}
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">

                    @include('layouts.errors')

                    <form method="POST" action="/admin/pages/store" enctype="multipart/form-data">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="post_title">Page slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Page slug">
                        </div>

                        <div class="form-group">
                            <label for="post_title">Page title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Page title">
                        </div>

                        <div class="form-group">
                            <label for="post_title">Menu title</label>
                            <input type="text" class="form-control" name="menu_title" id="menu_title" placeholder="Menu title">
                        </div>

                        <div class="form-group">
                            <label for="post_title">Menu icon</label>
                            <input type="text" class="form-control" name="menu_icon" id="menu_icon" placeholder="Menu icon">
                        </div>

                        <div class="form-group">
                            <label for="page_editor">Page content</label>
                            <textarea id="page_editor" name="content" rows="6" cols="80"></textarea>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-mail-forward"></i> Submit
                            </button>
                            <a href="/admin/pages" class="btn btn-default pull-right">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.box -->

        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script src="{{ URL::asset('AdminLTE-2.3.11/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>


    <script>
        $(function () {
            CKEDITOR.replace('page_editor');
//            $(".textarea").wysihtml5();

        });
    </script>


@endsection

