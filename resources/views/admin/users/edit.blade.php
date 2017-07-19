@extends('layouts.admin.default')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit User - <span class="label label-default">{{$user->name}}</span></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/admin/users/{{$user->id}}" method="POST">
                    <div class="box-body">

                        @include('layouts.errors')

                        {{ method_field('PUT') }}
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="display_name">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="active">Active</label>
                            <select class="form-control" name="active" id="active">
                                <option {{$user->active == 1 ? 'selected' : ''}} value="1">Active</option>
                                <option {{$user->active != 1 ? 'selected' : ''}} value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" id="role">
                                @foreach(\App\Role::all() as $role)
                                    <option {{$user->hasRole($role->name) ? 'selected' : 'not_selected'}} value="{{$role->id}}">{{$role->display_name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-mail-forward"></i> Submit
                        </button>
                        <a href="/admin/users" class="btn btn-default pull-right">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
    </div>
@endsection