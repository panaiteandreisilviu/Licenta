@extends('layouts.top-nav.default', ['title' => " " , 'subtitle' => ''])

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



    <div class="col-sm-8 col-xs-12">

        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title"><b>{{$page->title}}</b></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! $page->getContent() !!}
            </div>
            <!-- /.box-body -->

            @role('admin')
                <div class="box-footer">
                    <a href="/admin/pages" class="btn btn-xs btn-default pull-right">
                        <i class="fa fa-file-o"></i> All pages
                    </a>
                    &nbsp;&nbsp;
                    <a href="/admin/pages/{{$page->slug}}/edit" class="btn btn-xs btn-default pull-right">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                </div>
            @endrole

        </div>


    </div>

    <div class="col-sm-4 hidden-xs" data-spy="affix">
        @include('layouts.top-nav.post_sidebar')
    </div>

    {{--<div class="col-sm-4 hidden-xs">
        @include('layouts.top-nav.sidebar')
    </div>--}}


@endsection