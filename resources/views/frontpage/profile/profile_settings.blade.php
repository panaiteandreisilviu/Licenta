@extends('layouts.top-nav.default',  ['title' => ' ', 'subtitle' => ''])
@section('content')

    <div class="row">

        <div class="col-xs-12">
            @include('layouts.errors')
        </div>
        <form method="POST" class="form-horizontal" action="/profile/settings/{{$user->id}}" enctype="multipart/form-data">

            <div class="col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile pictures</h3>

                    </div>
                    <div class="box-body">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="profile_picture" class="control-label col-sm-3">Avatar</label>

                                <div class="col-sm-8">

                                    <img src="{{$user->picture_url}}" onerror="this.src='/storage/avatars/default'" class="img-responsive pad" id="image_preview_picture"
                                         style="max-height:175px; padding:0; margin-bottom:5px;" alt="">

                                    <div class="input-group">
                                      <span class="input-group-btn">
                                        <label class="btn btn-default btn-file">
                                            Browse <input type="file" name="profile_picture" id="profile_picture" style="display: none;" onchange="loadFilePicture(event)">
                                        </label>
                                      </span>
                                        <input type="text" class="form-control" placeholder="Select an image ..." style="width:100%; background: white;" id="image_path_preview_picture" readonly>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group">
                                <label for="profile_cover" class="control-label col-sm-3">Cover</label>

                                <div class="col-sm-8">

                                    <img src="{{$user->cover_url}}" onerror="this.src='/storage/covers/default'" class="img-responsive pad" id="image_preview_cover"
                                         style="max-height:175px; padding:0; margin-bottom:5px;" alt="">

                                    <div class="input-group">
                                      <span class="input-group-btn">
                                        <label class="btn btn-default btn-file">
                                            Browse <input type="file" name="profile_cover" id="profile_cover" style="display: none;" onchange="loadFileCover(event)">
                                        </label>
                                      </span>
                                        <input type="text" class="form-control" placeholder="Select an image ..." style="width:100%; background: white;" id="image_path_preview_cover" readonly>
                                    </div>
                                </div>


                            </div>




                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile details</h3>

                    </div>
                    <div class="box-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" readonly placeholder="Name" value="{{$user->name}}">
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
                                <input type="text" name="department" class="form-control" id="department" placeholder="Department" value="{{$user->profile ? $user->profile->department : ''}}">
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
                            <label for="phone" class="col-sm-3 control-label">Phone</label>

                            <div class="col-sm-8">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{$user->profile ? $user->profile->phone : ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="studies" class="col-sm-3 control-label">Website</label>

                            <div class="col-sm-8">
                                <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="{{$user->profile ? $user->profile->website : ''}}">
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </div>

        </form>

    </div>


    <script>
        function loadFilePicture(event){
            var output = document.getElementById('image_preview_picture');
            var output_path = document.getElementById('image_path_preview_picture');
            output.src = URL.createObjectURL(event.target.files[0]);
            output_path.value = event.target.files[0].name;
        }

        function loadFileCover(event){
            var output = document.getElementById('image_preview_cover');
            var output_path = document.getElementById('image_path_preview_cover');
            output.src = URL.createObjectURL(event.target.files[0]);
            output_path.value = event.target.files[0].name;
        }
    </script>
@endsection