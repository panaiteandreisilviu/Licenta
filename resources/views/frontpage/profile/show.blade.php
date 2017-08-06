@extends('layouts.top-nav.default',  ['title' => ' ', 'subtitle' => ''])
@section('content')

    <div class="row">

        <div class="col-xs-12">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-light-blue-gradient" style="position: relative; overflow:hidden; height:150px;">
                    <h3 class="widget-user-username">{{$user->name}}</h3>
                    <h5 class="widget-user-desc">{{$user->profile ? $user->profile->position: ''}}</h5>

                    <img src="{{$user->cover_url}}" onerror="" style="position:absolute; width:100%; top:-50%; left:0">

                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="{{$user->picture_url}}" onerror="this.src='/storage/avatars/default'" style="height:90px; width:90px; margin-top:38px;" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->profile ? $user->profile->position: ' - ' }}</h5>
                                <span class="description-text">Position</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->profile ? $user->profile->department: ' - ' }}</h5>
                                <span class="description-text">Department </span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->email ? $user->email : ' - '}}</h5>
                                <span class="description-text">Email</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <p class="text-muted text-center"><b>General</b></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <i class="fa fa-user"></i> Full name <a class="pull-right">{{ $user->name }}</a>
                        </li>

                        <li class="list-group-item">
                            <i class="fa fa-sitemap"></i> Position <a class="pull-right"> {{ $user->profile ? $user->profile->position: ' - ' }}</a>
                        </li>

                        <li class="list-group-item">
                            <i class="fa fa-building-o"> </i> Department <a class="pull-right"> {{ $user->profile ? $user->profile->department: ' - ' }}</a>
                        </li>

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <p class="text-muted text-center"><b>About</b></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <i class="fa fa-university"></i> Went to <a class="pull-right"> {{ $user->profile ? $user->profile->studies: ' - ' }} </a>
                        </li>

                        <li class="list-group-item">
                            <i class="fa fa-home"></i> Lives in <a class="pull-right"> {{ $user->profile ? $user->profile->address: ' - ' }} </a>
                        </li>

                        <li class="list-group-item">
                            <i class="fa fa-map-marker"></i> From <a class="pull-right"> {{ $user->profile ? $user->profile->birthplace: ' - ' }} </a>
                        </li>


                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="box box-info">
                <div class="box-body box-profile">

                    <p class="text-muted text-center"><b>Activity</b></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <i class="fa fa-book"></i> Posts <a class="pull-right">1,322</a>
                        </li>

                        <li class="list-group-item">
                            <i class="fa fa-file-o"></i> Pages <a class="pull-right">1,322</a>
                        </li>

                        <li class="list-group-item">
                            <i class="fa fa-calendar"> </i> Joined <a class="pull-right"> {{ \Carbon\Carbon::parse($user->created_at)->format('d.m.Y') }} </a>
                        </li>

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="box box-info">
                <div class="box-body box-profile">

                    <p class="text-muted text-center"><b>Contact</b></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <i class="fa fa-envelope-o"></i> Email <a class="pull-right">{{ $user->email ? $user->email : ' - ' }}</a>
                        </li>

                        <li class="list-group-item">
                            <i class="fa fa-phone"></i> Phone <a class="pull-right"> {{ $user->profile ? $user->profile->phone: ' - ' }} </a>
                        </li>

                        <li class="list-group-item">
                            <i class="fa fa-globe"></i> Website <a class="pull-right"> {{ $user->profile ? $user->profile->website : ' - ' }} </a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>

        {{--<div class="col-xs-12">
            <!-- The time line -->
            <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                    10 Feb. 2014
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                        <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Read more</a>
                            <a class="btn btn-danger btn-xs">Delete</a>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                        <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-green">
                    3 Jan. 2014
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
        </div>--}}

    </div>
    <!-- /.row -->

@endsection