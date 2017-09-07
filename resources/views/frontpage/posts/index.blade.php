@extends('layouts.top-nav.default', ['title' => ' ', 'subtitle' => ''])

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


        @if($publishedPostCount)
            <div class="col-sm-8 col-xs-12">

                @foreach($posts as $post)

                    @if($post->published)
                        <div class="box box-widget {{--collapsed-box--}}">
                            <div class="box-header with-border">
                                <div class="user-block">

                                    <img class="img-circle" src="{{$post->user()->picture_url}}" onerror="this.src='storage/avatars/default'" alt="User Image">

                                    <span class="username">
                                <a href="/profile/{{$post->user()->id}}">{{$post->user()->name}}</a>

                                <span class="hidden-xs hidden-sm" style="font-size:16px; color:#6e6e6e"> -
                                    <a href="/post/{{$post->id}}">
                                        {{$post->title}}
                                    </a>
                                </span>

                            </span>

                                    <span class="description">{{$post->published_at ? $post->published_at->diffForHumans() : ''}}</span>

                                </div>
                                <!-- /.user-block -->
                                <div class="box-tools">
                                    {{--<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">--}}
                                    {{--<i class="fa fa-circle-o"></i></button>--}}
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- post text -->
                                <h4 class="hidden-md hidden-lg">
                                    <a href="/post/{{$post->id}}">
                                        {{$post->title}}
                                    </a>
                                </h4>
                                {!!$post->body !!}

                                <img src="/storage/post_images/{{$post->image_path}}" onerror="" class="img-responsive pad" alt="">

                                <!-- Attachment -->
                                <!-- /.attachment-block -->



                                @if($post->facebook_post_id)
                                <!-- Social sharing buttons -->
                                    @if(Session::get('fb_page_access_token'))
                                        <a href="/post/{{$post->id}}/like" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</a>&nbsp;
                                        <span class="text-muted">{{$post->facebook_like_count()}} likes - {{$post->facebook_comment_count()}} comments</span>
                                    @endif

                                    <a href="https://www.facebook.com/{{$post->facebook_post_id}}" target="_blank" class="btn btn-primary btn-xs pull-right"> <i class="fa fa-facebook"></i> View on Facebook</a>
                                @endif
                            </div>
                            <!-- /.box-body -->

                        @if(Session::get('fb_page_access_token') && $post->facebook_comment_count() > 0)
                                <div class="box-footer box-comments">
                                    @foreach($post->facebook_comments() as $comment)
                                        <div class="box-comment">
                                        <!-- User image -->
                                        <img class="img-circle img-sm" style="border:1px solid #dfdfdf" src="storage/avatars/default" alt="User Image">

                                        <div class="comment-text">
                        <span class="username">
                        {{$comment['from']['name']}}
                        <span class="text-muted pull-right">{{\Carbon\Carbon::parse($comment['created_time']->format('Y-m-d H:i:s'))->diffForHumans()}}</span>
                        </span><!-- /.username -->
                                            {{$comment['message']}}
                                        </div>
                                        <!-- /.comment-text -->
                                    </div>
                                    @endforeach
                                </div>
                        @endif
                        <!-- /.box-footer -->

                        @if(Session::get('fb_page_access_token'))
                            <div class="box-footer">
                                <form action="/post/{{$post->id}}/comment" method="post">
                                    {{csrf_field()}}
                                    <img class="img-responsive img-circle img-sm" src="/storage/avatars/{{Auth::user() ? Auth::user()->id : null}}" onerror="this.src='/storage/avatars/default'" alt="Alt Text">
                                    <div class="img-push">
                                        <input type="text" name="comment" class="form-control input-sm" placeholder="Press enter to post comment">
                                    </div>
                                </form>
                            </div>
                        @endif


                                    <!-- /.box-footer -->
                                    </div>
                                @endif

                            @endforeach
                        </div>

                    @else
                        <div class="col-xs-12">
                            <div class="alert alert-info alert-dismissible" style="background-color: #efefef !important; border:1px solid #bbbbbb; color:#444 !important;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Info</h4>
                                No posts have been published yet.
                            </div>
                        </div>
                    @endif

                <div class="col-sm-4 hidden-xs">
                    @include('layouts.top-nav.post_sidebar')
                </div>

            @endsection