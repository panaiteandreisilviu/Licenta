@extends('layouts.admin.default', ['title' => 'Edit tag', 'subtitle' => ''])
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Tag - <span class="label label-default">{{$tag->name}}</span></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form tag="form" action="/admin/tags/{{$tag->id}}" method="POST">
                    <div class="box-body">

                        @include('layouts.errors')

                        {{ method_field('PUT') }}
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$tag->name}}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description">{{$tag->description}}</textarea>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-mail-forward"></i> Submit
                        </button>
                        <a href="/admin/tags" class="btn btn-default pull-right">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
    </div>
@endsection