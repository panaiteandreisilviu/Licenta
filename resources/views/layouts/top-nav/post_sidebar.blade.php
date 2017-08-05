<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tags</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <ol class="list-unstyled">
            @foreach($tags as $tag)
                <li>
                    <a href="/?tag={{$tag->name}}">
                        <button class="btn btn-default btn-block" style="margin-bottom: 10px; padding-left:7px;">
                            <span class="pull-left" style="margin-top:3px;">
                                {{$tag->name}}
                            </span>
                            <span class="label label-default pull-right" style="margin-top:6px;">{{$tag->posts->count()}}</span>
                        </button>
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
    <!-- /.box-body -->
</div>


<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Archives</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <ol class="list-unstyled">
            <li>
                <a href="/" >
                    <button class="btn btn-default btn-block" style="margin-bottom: 10px;">
                        <b class="pull-left">All posts</b>
                        <span class="label label-default pull-right" style="margin-top:3px;">{{$postCount}}</span>
                    </button>
                </a>
            </li>
            @foreach($archives as $archive)
                <li>
                    <a href="/?month={{$archive['month']}}&year={{$archive['year']}}">
                        <?php
                        $dateObj = DateTime::createFromFormat('!m', $archive['month']);
                        $monthName = $dateObj->format('F'); // March
                        ?>
                        <button class="btn btn-default btn-block" style="margin-bottom: 10px;">
                                    <span class="pull-left">
                                        {{$monthName. ' ' .  $archive['year'] }}
                                    </span>
                            <span class="label label-default pull-right" style="margin-top:3px;">{{$archive['no_posts']}}</span>
                        </button>
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
    <!-- /.box-body -->
</div>


<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Posts by user</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <ol class="list-unstyled">
            @foreach($userArchives as $userArchive)
                <li>
                    <a href="/?user={{$userArchive['user_id']}}">
                        <?php
                        $user = \App\User::find($userArchive['user_id']);
                        ?>
                        <button class="btn btn-default btn-block" style="margin-bottom: 10px; padding-left:7px;">
                            <span class="pull-left" style="margin-top:3px;">
                                <img src="{{$user->picture_url}}" onerror="this.src='/storage/avatars/default'" alt="User Image"
                                     style="height:25px; width:25px; border-radius: 50%; margin-right:3px; margin-top:-2px; border:1px solid #d5d5d5;">
                                {{$user->name }}
                            </span>
                            <span class="label label-default pull-right" style="margin-top:6px;">{{$userArchive['no_posts']}}</span>
                        </button>
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
    <!-- /.box-body -->
</div>
