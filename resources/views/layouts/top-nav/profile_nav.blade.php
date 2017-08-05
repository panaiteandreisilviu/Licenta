<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{Auth::user()->picture_url}}" onerror="this.src='/storage/avatars/default'" class="user-image" alt="User Image">
        <span class="hidden-xs">{{Auth::user()->name}}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{Auth::user()->picture_url}}" onerror="this.src='/storage/avatars/default'" class="img-circle" alt="User Image">

            <p>
                {{Auth::user()->name}} {{ Auth::user()->profile ? ' - ' .  Auth::user()->profile->position : ''}}
                <small>Member since {{Carbon\Carbon::parse(Auth::user()->created_at)->format('M Y')}}</small>
            </p>
        </li>
        <!-- Menu Body -->

        {{--<li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
            <!-- /.row -->
        </li>--}}

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="/profile/{{Auth::user()->id}}" class="btn btn-default btn-flat">Profile</a>
            </div>

            @if(!preg_match( '/admin/', Request::path()))
                @role('admin')
                <div class="pull-left" style="margin-left:2px;">
                    <a href="/admin" class="btn btn-default btn-flat">Admin console</a>
                </div>
                @endrole
            @else
                <div class="pull-left" style="margin-left:6px;">
                    <a href="/" class="btn btn-default btn-flat">Landing page</a>
                </div>
            @endif

            <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
