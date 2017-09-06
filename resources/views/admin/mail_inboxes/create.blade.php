@extends('layouts.admin.default', ['title' => 'Create Mail Inbox', 'subtitle' => ''])
@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Add a new mail inbox
                        <small></small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        {{--<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
                        {{--<i class="fa fa-minus"></i></button>--}}
                        {{--<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
                        {{--<i class="fa fa-times"></i></button>--}}
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">

                    @include('layouts.errors')

                    <form method="POST" action="/admin/mail_inboxes" enctype="multipart/form-data">
                        {{method_field('POST')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="host">Host</label>
                            <input type="text" class="form-control" name="host" id="host" placeholder="Host">
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="IMAP">IMAP</option>
                                <option value="POP3">POP3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="host_username">Username</label>
                            <input type="text" class="form-control" name="host_username" id="host_username" placeholder="Host username" autocomplete="off" value="">
                        </div>

                        <div class="form-group">
                            <label for="host_password">Host password</label>
                            <input type="password" class="form-control" name="host_password" id="host_password" placeholder="Host password" autocomplete="off" value="">
                        </div>

                        <div class="form-group">
                            <label for="active">Active</label>
                            <select name="active" id="active" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="label_name">Label name</label>
                            <input type="text" class="form-control" name="label_name" id="label_name" placeholder="Label name">
                        </div>

                        <div class="form-group">
                            <label for="label_color">Label color</label> &nbsp;&nbsp;
                            <input type="color" name="label_color" id="label_color" placeholder="Label color">
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-mail-forward"></i> Submit
                            </button>
                            <a href="/admin/mail_inboxes" class="btn btn-default pull-right">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.box -->

        </div>
    </div>

@endsection

