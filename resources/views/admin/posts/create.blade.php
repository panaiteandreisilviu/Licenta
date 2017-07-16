@extends('layouts.admin.default')
@section('content')

    <div class="col-md-12">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Add a new post
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

                    <form method="POST" action="/admin/posts/store" enctype="multipart/form-data">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post title</label>
                            <input type="text" class="form-control" name=title id="post_title" placeholder="Post title">
                        </div>

                        <div class="form-group">
                            <label for="post_image" class="control-label">Post image</label>
                            <input type="file" name="image" id="post_image">
                        </div>

                        <div class="form-group">
                            <label for="post_editor">Post body</label>
                            <textarea id="post_editor" name="body" rows="10" cols="80"></textarea>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.box -->

            {{--<div class="box">--}}
                {{--<div class="box-header">--}}
                    {{--<h3 class="box-title">Bootstrap WYSIHTML5--}}
                        {{--<small>Simple and fast</small>--}}
                    {{--</h3>--}}
                    {{--<!-- tools box -->--}}
                    {{--<div class="pull-right box-tools">--}}
                        {{--<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
                            {{--<i class="fa fa-minus"></i></button>--}}
                        {{--<button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
                            {{--<i class="fa fa-times"></i></button>--}}
                    {{--</div>--}}
                    {{--<!-- /. tools -->--}}
                {{--</div>--}}
                {{--<!-- /.box-header -->--}}
                {{--<div class="box-body pad">--}}
                    {{--<form>--}}
                        {{--<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script src="{{ URL::asset('AdminLTE-2.3.11/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>


    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('post_editor');

//            $(".textarea").wysihtml5();

        });
    </script>


@endsection

