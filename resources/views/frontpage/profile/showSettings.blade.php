@extends('layouts.top-nav.default',  ['title' => ' ', 'subtitle' => ''])
@section('content')

    <div class="row">

    {{--<div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" alt="User profile picture" src="{{ asset('storage/avatars/' . $user->id) }}" onerror="this.src='/storage/avatars/default'"/>
                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Followers</b> <a class="pull-right">-</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="pull-right">-</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="pull-right">-</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                <p class="text-muted">
                    {{$user->profile ? $user->profile->education : ''}}
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                <p class="text-muted">{{$user->profile ? $user->profile->location : ''}}</p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                <p>
                    {{$user->profile ? $user->profile->skills : ''}}
                    --}}{{--<span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>--}}{{--
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                <p>{{$user->profile ? $user->profile->notes : ''}}</p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>--}}
        <!-- /.col -->

        <div class="col-xs-12">
            @include('layouts.errors')
        </div>


        <div class="col-sm-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Profile details</h3>

                </div>
                <div class="box-body">
                    <form method="POST" class="form-horizontal" action="/profile/{{$user->id}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="profilePicture" class="col-sm-2 control-label">Profile picture</label>
                            <input type="file" name="profilePicture" id="profilePicture">
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Email" value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="education" class="col-sm-2 control-label">Education</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="education" id="education" placeholder="Education">{{$user->profile ? $user->profile->education : ''}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="education" class="col-sm-2 control-label">Position</label>

                            <div class="col-sm-10">
                                <input type="text" name="position" class="form-control" id="position" placeholder="Position" value="{{$user->profile ? $user->profile->position : ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location" class="col-sm-2 control-label">Location</label>

                            <div class="col-sm-10">
                                <input type="text" name="location" class="form-control" id="location" placeholder="Location" value="{{$user->profile ? $user->profile->location : ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location" class="col-sm-2 control-label">Skills</label>

                            <div class="col-sm-10">
                                <input type="text" name="skills" class="form-control" id="skills" placeholder="Skills" value="{{$user->profile ? $user->profile->skills : ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="education" class="col-sm-2 control-label">Notes</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="notes" id="notes" placeholder="Notes">{{$user->profile ? $user->profile->notes : ''}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Account settings</h3>

                </div>
                <div class="box-body">
                    <form method="POST" class="form-horizontal" action="/profile/{{$user->id}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        {{--<div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>--}}
                    </form>

                </div>
            </div>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection