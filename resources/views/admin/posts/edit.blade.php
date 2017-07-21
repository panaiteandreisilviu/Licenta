@extends('layouts.admin.default', ['title' => 'Edit post', 'subtitle' => ''])
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Edit Post <b>{{$post->id}}</b>
                        <small></small>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">

                    @include('layouts.errors')

                    <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">

                        {{csrf_field()}}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="post_title">Post title</label>
                            <input type="text" class="form-control" name=title id="post_title" placeholder="Post title" value="{{$post->title}}">
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <select class="form-control" name="author" id="author">
                                @foreach(\App\User::all() as $user)
                                    <option {{$user->id == $post->user_id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="post_image" class="control-label">Post cover</label>
                            <img src="/storage/post_images/{{$post->image_path}}" onerror="" class="img-responsive pad" id="image_preview"
                                 style="max-width: 289px; padding:0; margin-bottom:5px;" alt="">

                            <div class="input-group">
                              <span class="input-group-btn">
                                <label class="btn btn-default btn-file">
                                    Browse <input type="file" name="image" id="post_image" style="display: none;" onchange="loadFile(event)">
                                </label>
                              </span>
                                <input type="text" class="form-control" placeholder="Select an image ..." style="max-width:220px; background: white;" id="image_path_preview" readonly>
                            </div><!-- /input-group -->
                        </div>

                        <div class="form-group">
                            <label for="post_title">Publish post</label>
                            <div class="clearfix"></div>
                            <post_publisher published="{{(bool)$post->published}}" published_twitter="{{(bool)$post->published_twitter}}" published_facebook="{{(bool)$post->published_facebook}}"></post_publisher>
                        </div>

                        <div class="form-group">
                            <label for="post_editor">Post body</label>
                            <textarea class="form-control" id="post_editor" name="body" rows="6" cols="80">{{$post->body}}</textarea>
                        </div>

                        <br>
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
        });

        function loadFile(event){
            var output = document.getElementById('image_preview');
            var output_path = document.getElementById('image_path_preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output_path.value = event.target.files[0].name;
        }

/*        $(function(){
            PNotify.prototype.options.styling = "fontawesome";

            new PNotify({
                title: 'Regular Notice',
                text: 'Check me out! I\'m a notice.'
            });
        });*/

    </script>


@endsection

