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

        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="/profile/settings/{{Auth::user()->id}}">Settings</a>
                </div>

                @if(!preg_match( '/admin/', Request::path()))
                    <div class="col-xs-4 text-center">
                        @role('admin')
                        <a href="/admin">CMS</a>
                        @endrole
                    </div>
                @else
                    <span> - </span>
                @endif

                <div class="col-xs-4 text-center pull-right">
                    <a href="/profile/account/{{Auth::user()->id}}">Account</a>
                </div>
            </div>
            <!-- /.row -->
        </li>

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="/profile/{{Auth::user()->id}}" class="btn btn-default btn-flat">Profile</a>
            </div>

            <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
