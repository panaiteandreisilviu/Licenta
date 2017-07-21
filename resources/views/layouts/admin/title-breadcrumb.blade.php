<section class="content-header">
    <h1>
        {{$title ? $title : 'No page title set'}}
        <small>{{$subtitle ? $subtitle : '' }}</small>
    </h1>

    @if(count($breadcrumbs))
        <ol class="breadcrumb">
            <i class="fa fa-dashboard"></i>&nbsp;
            @foreach($breadcrumbs as $breadcrumb_title => $breadcrumb_url)
                @if($breadcrumb_url)
                    <li><a href="{{$breadcrumb_url}}">{{$breadcrumb_title}}</a></li>
                @else
                    <li>{{$breadcrumb_title}}</li>
                @endif
            @endforeach
        </ol>

    @endif

</section>