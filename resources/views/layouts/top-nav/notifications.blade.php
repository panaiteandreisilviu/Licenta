<!-- Messages: style can be found in dropdown.less-->


    <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            @if(count($unseenMails))
                <span class="label label-success">{{count($unseenMails)}}</span>
            @endif
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have {{count($unseenMails)}} unseen messages</li>
            @if(count($unseenMails))
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        @foreach($unseenMails as $mail)
                            <!-- start message -->
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <div class="email-circle" style="color:{{$mail->mailInbox()->getLabelContrastColor()}}; background-color:{{$mail->mailInbox()->label_color}}; !important;">
                                            {{substr($mail->mailInbox()->label_name, 0 , 1)}}
                                        </div>
                                    </div>
                                    <h4 style="margin-left: 40px;">
                                        {{substr($mail->from_name ? $mail->from_name : $mail->from_email, 0, 20) . (strlen($mail->from_name ? $mail->from_name : $mail->from_email) > 20 ? '...' : '')}}
                                        <small><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($mail->sent_on)->diffForHumans()}}</small>
                                    </h4>
                                    <p style="margin-left: 40px;">{{substr($mail->subject, 0, 27) . (strlen($mail->subject) > 27 ? '...' : '') }}</p>
                                </a>
                            </li>
                            <!-- end message -->
                        @endforeach
                    </ul>
                </li>
            @endif
            <li class="footer"><a href="/mail">See All Messages</a></li>
        </ul>
    </li>


{{--<!-- Notifications: style can be found in dropdown.less -->--}}
{{--<li class="dropdown notifications-menu">--}}
    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
        {{--<i class="fa fa-bell-o"></i>--}}
        {{--<span class="label label-warning">10</span>--}}
    {{--</a>--}}
    {{--<ul class="dropdown-menu">--}}
        {{--<li class="header">You have 10 notifications</li>--}}
        {{--<li>--}}
            {{--<!-- inner menu: contains the actual data -->--}}
            {{--<ul class="menu">--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="footer"><a href="#">View all</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}
{{--<!-- Tasks: style can be found in dropdown.less -->--}}
{{--<li class="dropdown tasks-menu">--}}
    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
        {{--<i class="fa fa-flag-o"></i>--}}
        {{--<span class="label label-danger">9</span>--}}
    {{--</a>--}}
    {{--<ul class="dropdown-menu">--}}
        {{--<li class="header">You have 9 tasks</li>--}}
        {{--<li>--}}
            {{--<!-- inner menu: contains the actual data -->--}}
            {{--<ul class="menu">--}}
                {{--<li><!-- Task item -->--}}
                    {{--<a href="#">--}}
                        {{--<h3>--}}
                            {{--Design some buttons--}}
                            {{--<small class="pull-right">20%</small>--}}
                        {{--</h3>--}}
                        {{--<div class="progress xs">--}}
                            {{--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                {{--<span class="sr-only">20% Complete</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<!-- end task item -->--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="footer">--}}
            {{--<a href="#">View all tasks</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</li>--}}

