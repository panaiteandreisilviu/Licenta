@extends('layouts.admin.default', ['title' => 'Create post', 'subtitle' => ''])
@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">

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
                            <label for="post_title">Post title</label>
                            <input type="text" class="form-control" name=title id="post_title" placeholder="Post title">
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <select class="form-control" name="author" id="author">
                                {{--<option value="" disabled selected>Author</option>--}}
                                @foreach(\App\User::all() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tags</label>
                            <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select tags"
                                    style="width: 100%;">
                                @foreach(\App\Tag::all() as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="post_image" class="control-label">Post cover</label>
                            <img src="" onerror="" class="img-responsive pad" id="image_preview"
                                 style="max-width: 289px; padding:0; margin-bottom:5px;" alt="">

                            <div class="input-group">
                              <span class="input-group-btn">
                                <label class="btn btn-primary btn-file">
                                    Browse <input type="file" name="image" id="post_image" onchange="loadFile(event)">
                                </label>
                              </span>
                                <input type="text" class="form-control" placeholder="Select an image ..." style="max-width:220px; background: white;" id="image_path_preview" readonly>
                            </div><!-- /input-group -->
                        </div>

                        <div class="form-group">
                            <label for="post_title">Publish post</label>
                            <div class="clearfix"></div>
                            <post_publisher></post_publisher>
                        </div>

                        <div class="form-group">
                            <label for="post_editor">Post body</label>
                            <textarea id="post_editor" name="body" rows="6" cols="80"></textarea>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-mail-forward"></i> Submit
                            </button>
                            <a href="/admin/posts" class="btn btn-default pull-right">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
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
    </div>

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script src="{{ URL::asset('AdminLTE-2.3.11/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>


    <script>
        $(function () {
            CKEDITOR.replace('post_editor');
//            $(".textarea").wysihtml5();

            //Initialize Select2 Elements
            $(".select2").select2();

        });

        function loadFile(event){
            var output = document.getElementById('image_preview');
            var output_path = document.getElementById('image_path_preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output_path.value = event.target.files[0].name;
        }
    </script>


@endsection

