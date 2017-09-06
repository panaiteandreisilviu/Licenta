@extends('layouts.admin.default', ['title' => 'Mail inbox', 'subtitle' => ''])
@section('content')

    <div class="row">
        <div class="col-md-3">
            <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Folders</h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                                <span class="label label-primary pull-right">12</span></a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                        <li><a href="#"><i class="fa fa-star-o"></i> Important</a></li>
                        <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                        <li><a href="#"><i class="fa fa-minus-square-o"></i> Spam</a></li>
                        <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Inboxes</h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        @foreach($mailInboxes as $mailInbox)
                            <li>
                                <a href="/mail?inbox={{$mailInbox->id}}">
                                    <div class="email-circle pull-left" style="color:{{$mailInbox->getLabelContrastColor()}}; background-color:{{$mailInbox->label_color}};">
                                        {{substr($mailInbox->label_name, 0 , 1)}}
                                    </div> &nbsp;&nbsp;
                                    <span style="line-height: 25px;">{{$mailInbox->label_name}} [{{$mailInbox->type}}]</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Inbox</h3>

                    <div class="box-tools pull-right">
                        {{--<div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Search Mail">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>--}}
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            {{--1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div>--}}
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                    <div class="table-responsive mailbox-messages" style="padding: 10px;overflow: hidden;">
                        @if(count($mails))

                            <table id="mailsTable" class="table table-hover table-striped">
                                <thead style="display:none">
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Published</th>
                                    <th>Published at</th>
                                    <th>Author</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($mails as $mail)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="mailbox-star">
                                                <div class="email-circle" style="color:{{$mail->mailInbox()->getLabelContrastColor()}}; background-color:{{$mail->mailInbox()->label_color}};">
                                                    {{substr($mail->mailInbox()->label_name, 0 , 1)}}
                                                </div>
                                            </td>
                                            <td class="mailbox-name"><a href="/mail/{{$mail->id}}">{{$mail->from_name ? $mail->from_name : $mail->from_email}}</a></td>
                                            <td class="mailbox-subject">
                                                <b>{{ substr(strip_tags($mail->subject), 0, 27) . (strlen($mail->subject) > 27 ? '...' : '') }}</b> -
                                                {!! substr(strip_tags($mail->body), 0, 27) . (strlen($mail->body) > 27 ? '...' : '') !!}
                                            </td>
                                            {{--<td class="mailbox-attachment"></td>--}}
                                            <td class="mailbox-date">{{\Carbon\Carbon::parse($mail->sent_on)->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->

                        @endif

                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            {{--1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                            </div>--}}
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <script>
        $(function(){
            $('#mailsTable').DataTable({
//            "paging": true,
//            "lengthChange": false,
//            "searching": false,
//            "ordering": true,
//            "info": true,
//            "autoWidth": false
            });
        })
    </script>


@endsection