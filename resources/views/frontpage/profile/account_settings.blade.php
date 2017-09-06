@extends('layouts.top-nav.default',  ['title' => ' ', 'subtitle' => ''])
@section('content')

    <div class="row">

        <div class="col-xs-12">
            @include('layouts.errors')
        </div>
        <form method="POST" class="form-horizontal" action="/profile/account_change_password/{{$user->id}}" enctype="multipart/form-data">

            <div class="col-sm-6 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Change password</h3>

                    </div>
                    <div class="box-body">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-sm-3 control-label">Retype password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-default pull-right">Submit</button>
                        </div>
                    </div>
                </div>

            </div>

        </form>

        <form method="POST" class="form-horizontal" action="/profile/account_change_details/{{$user->id}}" enctype="multipart/form-data">

            <div class="col-sm-6 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Change account details</h3>

                    </div>
                    <div class="box-body">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-default pull-right">Submit</button>
                        </div>
                    </div>
                </div>

            </div>

        </form>

    </div>

@endsection