@extends('layouts.admin.default')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new Permission</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="/admin/permissions">

                    <div class="box-body">
                        @include('layouts.errors')

                        {{method_field('POST')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="display_name">Display name</label>
                            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="Display name">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-mail-forward"></i> Submit
                        </button>
                        <a href="/admin/permissions" class="btn btn-default pull-right">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
    </div>
@endsection