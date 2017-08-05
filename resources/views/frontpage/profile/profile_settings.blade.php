@extends('layouts.top-nav.default',  ['title' => ' ', 'subtitle' => ''])
@section('content')

    <div class="row">

        <div class="col-xs-12">
            @include('layouts.errors')
        </div>


        <div class="col-sm-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Profile details</h3>

                </div>
                <div class="box-body">
                    <form method="POST" class="form-horizontal" action="/profile/settings/{{$user->id}}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="profilePicture" class="control-label">Profile picture</label>
                            </div>

                            <div class="col-sm-8">

                                <img src="{{$user->picture_url}}" onerror="" class="img-responsive pad" id="image_preview"
                                     style="width:100%; padding:0; margin-bottom:5px;" alt="">

                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <label class="btn btn-default btn-file">
                                        Browse <input type="file" name="profilePicture" id="profilePicture" style="display: none;" onchange="loadFile(event)">
                                    </label>
                                  </span>
                                    <input type="text" class="form-control" placeholder="Select an image ..." style="width:100%; background: white;" id="image_path_preview" readonly>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="position" class="col-sm-3 control-label">Position</label>

                            <div class="col-sm-8">
                                <input type="text" name="position" class="form-control" id="position" placeholder="Position" value="{{$user->profile ? $user->profile->position : ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="position" class="col-sm-3 control-label">Department</label>

                            <div class="col-sm-8">
                                <input type="text" name="position" class="form-control" id="position" placeholder="Department" value="{{$user->profile ? $user->profile->department : ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="studies" class="col-sm-3 control-label">Studies</label>

                            <div class="col-sm-8">
                                <input type="text" name="studies" class="form-control" id="studies" placeholder="Studies" value="{{$user->profile ? $user->profile->studies : ''}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Address</label>

                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address" placeholder="Address">{{$user->profile ? $user->profile->address : ''}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="education" class="col-sm-3 control-label">Birthplace</label>

                            <div class="col-sm-8">
                                <textarea class="form-control" name="birthplace" id="birthplace" placeholder="Birthplace">{{$user->profile ? $user->profile->birthplace : ''}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
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
                            <label for="inputName" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        {{--<div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
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

    <script>
        function loadFile(event){
            var output = document.getElementById('image_preview');
            var output_path = document.getElementById('image_path_preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output_path.value = event.target.files[0].name;
        }
    </script>
@endsection